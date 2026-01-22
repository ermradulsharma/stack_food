<?php

namespace App\Services\Payment\Gateways;

use App\Contracts\PaymentGatewayInterface;
use App\CentralLogics\Helpers;
use App\Models\BusinessSetting;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\DB;

class StripeService implements PaymentGatewayInterface
{
    /**
     * Initialize the Stripe payment session.
     *
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function initialize(array $data)
    {
        $order = $data['order'];
        $config = Helpers::get_business_settings('stripe');
        Stripe::setApiKey($config['api_key']);

        $tran = Str::random(6) . '-' . rand(1, 1000);
        session()->put('transaction_ref', $tran);
        session()->put('order_id', $order->id);

        $domain = url('/');
        $checkout_session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => Helpers::currency_code(),
                    'unit_amount' => $order->order_amount * 100,
                    'product_data' => [
                        'name' => BusinessSetting::where(['key' => 'business_name'])->first()->value,
                        'images' => [asset('storage/app/public/business') . '/' . BusinessSetting::where(['key' => 'logo'])->first()->value],
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $domain . '/pay-stripe/success',
            'cancel_url' => url()->previous(),
        ]);

        return response()->json(['id' => $checkout_session->id]);
    }

    /**
     * Handle Stripe payment success.
     *
     * @param Request $request
     * @return mixed
     */
    public function verify(Request $request)
    {
        $order_id = session('order_id');
        $transaction_ref = session('transaction_ref');

        if (!$order_id) {
            return redirect()->route('payment-fail');
        }

        $order = Order::find($order_id);
        $order->order_status = 'confirmed';
        $order->payment_method = 'stripe';
        $order->transaction_reference = $transaction_ref;
        $order->payment_status = 'paid';
        $order->confirmed = now();
        $order->save();

        try {
            Helpers::send_order_notification($order);
        } catch (\Exception $e) {
            // Log error
        }

        if ($order->callback != null) {
            return redirect($order->callback . '&status=success');
        }

        return redirect()->route('payment-success');
    }

    /**
     * Handle Stripe payment failure.
     *
     * @param Request $request
     * @return mixed
     */
    public function fail(Request $request)
    {
        $order_id = session('order_id');
        if ($order_id) {
            DB::table('orders')
                ->where('id', $order_id)
                ->update(['order_status' => 'failed', 'payment_status' => 'unpaid', 'failed' => now()]);

            $order = Order::find($order_id);
            if ($order && $order->callback != null) {
                return redirect($order->callback . '&status=fail');
            }
        }

        return redirect()->route('payment-fail');
    }
}
