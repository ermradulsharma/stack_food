<?php

namespace App\Services\Payment\Gateways;

use App\Contracts\PaymentGatewayInterface;
use App\CentralLogics\Helpers;
use App\Models\Order;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Redirect;

class RazorPayService implements PaymentGatewayInterface
{
    private $api;

    public function __construct()
    {
        $this->api = new Api(config('razor.razor_key'), config('razor.razor_secret'));
    }

    public function initialize(array $data)
    {
        // Razorpay often handles initialization on the frontend or simply returns a view with necessary keys.
        // Assuming the controller returns a view, we might not strictly need this for standard flow if using JS SDK.
        // However, if we need to pre-create an order via API, we would do it here.
        // For consistent interface usage, we might return the view from here or data for the view.
        return view('razor-pay');
    }

    public function verify(Request $request)
    {
        // In the controller, $order_id was passed as a route parameter. 
        // We might need to handle extraction of order_id either from request or session inside the controller 
        // before calling this, or rely on passing it in $request if merged.
        // Looking at the controller, it takes $request and $order_id.
        // Our interface `verify(Request $request)` expects standard request. 
        // The loop in controller `payment(Request $request, $order_id)` fetches order by ID.
        // We will assume the controller merges order_id into request or we might need to adjust interface slightly 
        // OR the service extracts it if possible. 

        // However, the controller uses `razorpay_payment_id` to get payment details, and THEN finds order from description?
        // Wait, controller code: `$order = Order::where(['id' => $payment->description])->first();` 
        // This implies the description set in razorpay contains the order ID.

        if (empty($request['razorpay_payment_id'])) {
            return redirect()->route('payment-fail');
        }

        try {
            $payment = $this->api->payment->fetch($request['razorpay_payment_id']);
            // Capture if needed (commented out in original controller)
            // $response = $this->api->payment->fetch($request['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

            // Original code trusted the description to hold the order ID.
            $order_id = $payment->description;
            $order = Order::where(['id' => $order_id])->first();

            if ($order) {
                $tr_ref = $request['razorpay_payment_id'];
                $order->transaction_reference = $tr_ref;
                $order->payment_method = 'razor_pay';
                $order->payment_status = 'paid';
                $order->order_status = 'confirmed';
                $order->confirmed = now();
                $order->save();

                try {
                    Helpers::send_order_notification($order);
                } catch (\Exception $e) {
                    info($e);
                }

                if ($order->callback != null) {
                    return redirect($order->callback . '&status=success');
                } else {
                    return redirect()->route('payment-success');
                }
            }
        } catch (\Exception $e) {
            info($e);
            // If order extraction failed but we have order_id from some other source?
            // The original controller relied on description. If that fails, it tried to update `Order::where('id', $order)` 
            // but $order variable would be null or overwritten. 
            // It seems the original code had a bug if finding order failed or $order was overwritten.
            // We will do our best to fail gracefully.
        }

        return redirect()->route('payment-fail');
    }

    public function fail(Request $request)
    {
        return redirect()->route('payment-fail');
    }
}
