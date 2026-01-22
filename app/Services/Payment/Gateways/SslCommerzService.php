<?php

namespace App\Services\Payment\Gateways;

use App\Contracts\PaymentGatewayInterface;
use App\CentralLogics\Helpers;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class SslCommerzService implements PaymentGatewayInterface
{
    public function initialize(array $data)
    {
        $order = $data['order'];
        $tr_ref = Str::random(6) . '-' . rand(1, 1000);

        $post_data = array();
        $post_data['total_amount'] = $order->order_amount;
        $post_data['currency'] = Helpers::currency_code();
        $post_data['tran_id'] = $tr_ref;

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $order->customer['f_name'];
        $post_data['cus_email'] = $order->customer['email'] == null ? "example@example.com" : $order->customer['email'];
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $order->customer['phone'] == null ? '0000000000' : $order->customer['phone'];
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Shipping";
        $post_data['ship_add1'] = "address 1";
        $post_data['ship_add2'] = "address 2";
        $post_data['ship_city'] = "City";
        $post_data['ship_state'] = "State";
        $post_data['ship_postcode'] = "ZIP";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Country";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        DB::table('orders')
            ->where('id', $order['id'])
            ->update([
                'transaction_reference' => $tr_ref,
                'payment_method' => 'ssl_commerz_payment',
                'order_status' => 'failed',
                'failed' => now(),
                'updated_at' => now(),
            ]);

        try {
            $sslc = new SslCommerzNotification();
            $payment_options = $sslc->makePayment($post_data, 'hosted');
            if (!is_array($payment_options)) {
                // In a service, we might throw an exception or return a redirect response directly if the interface allows.
                // The interface returns 'mixed', so returning the result of makePayment or redirect back is expected.
                // However, makePayment usually redirects or echoes. 
                // If it returns non-array, it might be an error or manual redirect.
                return back()->withErrors(['error' => trans('messages.your_currency_is_not_supported', ['method' => trans('messages.sslcommerz')])]);
            }
            return $payment_options;
        } catch (\Exception $exception) {
            return back()->withErrors(['error' => trans('messages.misconfiguration_or_data_missing')]);
        }
    }

    public function verify(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $sslc = new SslCommerzNotification();

        $order = Order::where('transaction_reference', $tran_id)->first();

        $validation = $sslc->orderValidate($tran_id, $amount, $currency, $request->all());
        if ($validation == TRUE) {
            $order->order_status = 'confirmed';
            $order->payment_method = 'ssl_commerz_payment';
            $order->transaction_reference = $tran_id;
            $order->payment_status = 'paid';
            $order->confirmed = now();
            $order->save();
            try {
                Helpers::send_order_notification($order);
            } catch (\Exception $e) {
            }

            if ($order->callback != null) {
                return redirect($order->callback . '&status=success');
            }

            return redirect()->route('payment-success');
        } else {
            DB::table('orders')
                ->where('transaction_reference', $tran_id)
                ->update(['order_status' => 'failed', 'payment_status' => 'unpaid', 'failed' => now()]);
            if ($order->callback != null) {
                return redirect($order->callback . '&status=fail');
            }
            return redirect()->route('payment-fail');
        }
    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');
        DB::table('orders')
            ->where('transaction_reference', $tran_id)
            ->update(['order_status' => 'failed', 'payment_status' => 'unpaid', 'failed' => now()]);

        $order_detials = DB::table('orders')
            ->where('transaction_reference', $tran_id)
            ->select('id', 'transaction_reference', 'order_status', 'order_amount', 'callback')->first();

        if ($order_detials->callback != null) {
            return redirect($order_detials->callback . '&status=fail');
        }
        return redirect()->route('payment-fail');
    }
}
