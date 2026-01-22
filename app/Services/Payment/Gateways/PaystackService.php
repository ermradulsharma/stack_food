<?php

namespace App\Services\Payment\Gateways;

use App\Contracts\PaymentGatewayInterface;
use App\CentralLogics\Helpers;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaystackService implements PaymentGatewayInterface
{
    public function initialize(array $data)
    {
        // Paystack initialization often relies on request data being present or Paystack global setup.
        // In the controller, it used $request['orderID'] and $request['reference'].
        // API based intialization might set these in request or session before calling redirect.
        // Assuming $data contains 'request' or we construct payload.
        // The original controller: 
        // $order = Order::with(['details'])->where(['id' => $request['orderID']])->first();
        // Since we are moving to standard service, we assume $data['order'] is valid order object or we look up using data.

        $order = $data['order'];
        $reference = $data['reference'] ?? paystack()->genTranxRef();

        // We might need to inject into request if Paystack::getAuthorizationUrl() reads from request globals
        // or if we need to call with specific parameters.
        // Paystack Laravel package usually looks for 'email', 'amount', 'reference' in the request input.

        // Let's ensure the request has necessary data for Paystack facade to work if it relies on global request(), 
        // OR we manually build it if the package supports it. 
        // Looking at typical usage: Paystack::getAuthorizationUrl() uses request().

        // Ideally we shouldn't manipulate global request, but to keep 'Paystack' facade working as is:
        request()->merge([
            'email' => $order->customer->email,
            'orderID' => $order->id,
            'amount' => $order->order_amount * 100,
            'quantity' => 1,
            'currency' => Helpers::currency_code(),
            'reference' => $reference,
            'metadata' => json_encode($array = ['custom_fields' => [
                ['display_name' => "Order ID", "variable_name" => "order_id", "value" => $order->id]
            ]]),
        ]);

        try {
            DB::table('orders')
                ->where('id', $order->id)
                ->update([
                    'payment_method' => 'paystack',
                    'order_status' => 'failed',
                    'transaction_reference' => $reference,
                    'failed' => now(),
                    'updated_at' => now(),
                ]);

            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => trans('messages.your_currency_is_not_supported', ['method' => trans('messages.paystack')])]);
        }
    }

    public function verify(Request $request)
    {
        $paymentDetails = Paystack::getPaymentData(); // Reads ref from request or callback
        $order = Order::where(['transaction_reference' => $paymentDetails['data']['reference']])->first();

        if ($paymentDetails['status'] == true) {
            $order->payment_status = 'paid';
            $order->order_status = 'confirmed';
            $order->confirmed = now();
            $order->save();
            try {
                Helpers::send_order_notification($order);
            } catch (\Exception $e) {
            }

            if ($order->callback != null) {
                return redirect($order->callback . '&status=success');
            } else {
                return redirect()->route('payment-success');
            }
        } else {
            DB::table('orders')
                ->where('id', $order->id)
                ->update([
                    'payment_method' => 'paystack',
                    'order_status' => 'failed',
                    'failed' => now(),
                    'updated_at' => now(),
                ]);

            if ($order->callback != null) {
                return redirect($order->callback . '&status=fail');
            } else {
                return redirect()->route('payment-fail');
            }
        }
    }

    public function fail(Request $request)
    {
        return redirect()->route('payment-fail');
    }
}
