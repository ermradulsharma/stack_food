<?php

namespace App\Services\Payment\Gateways;

use App\Contracts\PaymentGatewayInterface;
use App\CentralLogics\Helpers;
use App\Models\BusinessSetting;
use App\Models\Order;
use Illuminate\Http\Request;
use KingFlamez\Rave\Facades\Rave as Flutterwave;
use Illuminate\Support\Facades\Redirect;

class FlutterwaveService implements PaymentGatewayInterface
{
    public function initialize(array $data)
    {
        $order = $data['order'];
        $user_data = session('data'); // Assuming this session data is available
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer',
            'amount' => $order->order_amount,
            'email' => $user_data['email'],
            'tx_ref' => $reference,
            'currency' => Helpers::currency_code(),
            'redirect_url' => route('flutterwave_callback'),
            'customer' => [
                'email' => $user_data['email'],
                "phone_number" => $user_data['phone'],
                "name" => $user_data['name']
            ],
            "customizations" => [
                "title" => BusinessSetting::where(['key' => 'business_name'])->first()->value ?? 'Stack Food',
                "description" => $order->id,
            ]
        ];

        $payment = Flutterwave::initializePayment($data);

        if ($payment['status'] !== 'success') {
            return redirect()->route('payment-fail');
        }

        return redirect($payment['data']['link']);
    }

    public function verify(Request $request)
    {
        $status = $request->status;

        if ($status == 'successful') {
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $data = Flutterwave::verifyTransaction($transactionID);

            // Assuming we can retrieve the order from session as per original controller
            $order = Order::with(['details'])->where(['id' => session('order_id')])->first();

            if ($order) {
                $order->transaction_reference = $transactionID;
                $order->payment_method = 'flutterwave';
                $order->payment_status = 'paid';
                $order->order_status = 'confirmed';
                $order->confirmed = now();
                $order->save();

                try {
                    Helpers::send_order_notification($order);
                } catch (\Exception $e) {
                    // log error
                }

                if ($order->callback != null) {
                    return redirect($order->callback . '&status=success');
                } else {
                    return redirect()->route('payment-success');
                }
            }
        }

        // Handle failure or cancellation
        $order = Order::with(['details'])->where(['id' => session('order_id')])->first();
        if ($order) {
            $order->order_status = 'failed';
            $order->failed = now();
            $order->save();

            if ($order->callback != null) {
                return redirect($order->callback . '&status=fail');
            }
        }

        return redirect()->route('payment-fail');
    }

    public function fail(Request $request)
    {
        return redirect()->route('payment-fail');
    }
}
