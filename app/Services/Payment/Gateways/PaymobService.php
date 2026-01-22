<?php

namespace App\Services\Payment\Gateways;

use App\Contracts\PaymentGatewayInterface;
use App\CentralLogics\Helpers;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymobService implements PaymentGatewayInterface
{
    protected function cURL($url, $json)
    {
        $ch = curl_init($url);
        $headers = [];
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output);
    }

    public function initialize(array $data)
    {
        $order = $data['order'];
        $currency_code = Helpers::currency_code();

        if ($currency_code != "EGP") {
            // Service should ideally return response or throw execption, 
            // but relying on controller to handle "back" with errors is standard in this legacy codebase.
            return back()->withErrors(['error' => trans('messages.paymob_supports_EGP_currency')]);
        }

        $config = config('paymob');

        try {
            $token = $this->getToken();
            $paymobOrder = $this->createOrder($token, $order);
            $paymentToken = $this->getPaymentToken($paymobOrder, $token, $order);

            return Redirect::away('https://portal.weaccept.co/api/acceptance/iframes/' . config('paymob.iframe_id') . '?payment_token=' . $paymentToken);
        } catch (\Exception $exception) {
            return back()->withErrors(['error' => trans('messages.country_permission_denied_or_misconfiguration')]);
        }
    }

    protected function getToken()
    {
        $response = $this->cURL(
            'https://accept.paymobsolutions.com/api/auth/tokens',
            ['api_key' => config('paymob.api_key')]
        );

        return $response->token;
    }

    protected function createOrder($token, $order)
    {
        // Using $order passed to initialize
        // Assumes relations are loaded or will lazy load.
        $items = [];
        foreach ($order->details as $detail) {
            array_push($items, [
                'name' => $detail->campaign ? $detail->campaign->title : $detail->food['name'],
                'amount_cents' => round($detail['price'], 2) * 100,
                'description' => $detail->campaign ? $detail->campaign->title : $detail->food['name'],
                'quantity' => $detail['quantity']
            ]);
        }

        $data = [
            "auth_token" => $token,
            "delivery_needed" => "false",
            "amount_cents" => round($order->order_amount, 2) * 100,
            "currency" => "EGP",
            "items" => $items,
        ];

        $response = $this->cURL(
            'https://accept.paymob.com/api/ecommerce/orders',
            $data
        );

        return $response;
    }

    protected function getPaymentToken($paymobOrder, $token, $order)
    {
        $value = $order->order_amount;
        $billingData = [
            "apartment" => "not given",
            "email" => "not given",
            "floor" => "not given",
            "first_name" => "not given",
            "street" => "not given",
            "building" => "not given",
            "phone_number" => "not given",
            "shipping_method" => "PKG",
            "postal_code" => "not given",
            "city" => "not given",
            "country" => "not given",
            "last_name" => "not given",
            "state" => "not given",
        ];

        $data = [
            "auth_token" => $token,
            "amount_cents" => round($value, 2) * 100,
            "expiration" => 3600,
            "order_id" => $paymobOrder->id, // Paymob's order ID
            "billing_data" => $billingData,
            "currency" => "EGP",
            "integration_id" => config('paymob.integration_id')
        ];

        $response = $this->cURL(
            'https://accept.paymob.com/api/acceptance/payment_keys',
            $data
        );

        return $response->token;
    }

    public function verify(Request $request)
    {
        // Logic from PaymobController::callback
        // Note: verify is usually for return URL. Paymob callback might be IPN or redirect.
        // Assuming this handles the redirect return.

        // Logic from PaymobController::callback
        // Note: verify is usually for return URL. Paymob callback might be IPN or redirect.
        // Assuming this handles the redirect return.

        $data = $request->all();
        ksort($data);
        $hmac = $data['hmac'];
        $array = [
            'amount_cents',
            'created_at',
            'currency',
            'error_occured',
            'has_parent_transaction',
            'id',
            'integration_id',
            'is_3d_secure',
            'is_auth',
            'is_capture',
            'is_refunded',
            'is_standalone_payment',
            'is_voided',
            'order',
            'owner',
            'pending',
            'source_data_pan',
            'source_data_sub_type',
            'source_data_type',
            'success',
        ];
        $connectedString = '';
        foreach ($data as $key => $element) {
            if (in_array($key, $array)) {
                $connectedString .= $element;
            }
        }
        $secret = config('paymob.hmac');
        $hased = hash_hmac('sha512', $connectedString, $secret);

        // In the controller, it uses session('order_id').
        // If this is a server-to-server callback (webhook), session might not exist!
        // But if it's a redirect, session exists.
        // Usually verify() in interface implies redirect return.
        // If 'order' in response is Paymob ID, we need to map it if we stored it.
        // BUT the controller uses session('order_id').
        // We will assume session is available for redirect based verification.

        $order = Order::where('id', session('order_id'))->first();

        if ($hased == $hmac && $request['success'] == "true") {
            $order->transaction_reference = $request['id']; // Paymob transaction ID?
            $order->payment_method = 'paymob_accept';
            $order->order_status = 'confirmed';
            $order->confirmed = now();
            $order->updated_at = now();
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
        }

        $order->order_status = 'failed';
        $order->failed = now();
        $order->save();
        if ($order->callback != null) {
            return redirect($order->callback . '&status=fail');
        } else {
            return redirect()->route('payment-fail');
        }
    }

    public function fail(Request $request)
    {
        return redirect()->route('payment-fail');
    }
}
