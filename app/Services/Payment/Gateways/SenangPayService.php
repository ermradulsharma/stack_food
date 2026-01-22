<?php

namespace App\Services\Payment\Gateways;

use App\Contracts\PaymentGatewayInterface;
use App\CentralLogics\Helpers;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SenangPayService implements PaymentGatewayInterface
{
    public function initialize(array $data)
    {
        $secretkey = config('senangpay.secret_key');
        $merchantId = config('senangpay.merchant_id');

        $order = $data['order'];
        $user = User::where(['id' => $order->user_id])->first();

        $detail = 'payment';
        $order_id = $order->id;
        $amount = $order->order_amount;
        $name = $user->f_name . ' ' . $user->l_name;
        $email = $user->email;
        $phone = $user->phone;

        $hashed_string = md5($secretkey . urldecode($detail) . urldecode($amount) . urldecode($order_id));

        $action_url = env('APP_MODE') == 'live'
            ? 'https://app.senangpay.my/payment/' . $merchantId
            : 'https://sandbox.senangpay.my/payment/' . $merchantId;

        return [
            'action_url' => $action_url,
            'detail' => $detail,
            'amount' => $amount,
            'order_id' => $order_id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'hash' => $hashed_string,
        ];
    }

    public function verify(Request $request)
    {
        $order = Order::where(['id' => $request['order_id']])->first();

        if ($request['status_id'] == 1) {
            $order->transaction_reference = $request['transaction_id'];
            $order->payment_method = 'senang_pay';
            $order->order_note = 'Senang pay, Hash : ' . $request['hash'];
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
                ->where('id', $request['order_id'])
                ->update([
                    'payment_method' => 'senang_pay',
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
        // SenangPay failures are handled in verify based on status_id, 
        // but if there's a specific fail route this interface method supports it.
        // For consistency with other gateways:
        return redirect()->route('payment-fail');
    }
}
