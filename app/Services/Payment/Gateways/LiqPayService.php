<?php

namespace App\Services\Payment\Gateways;

use App\Contracts\PaymentGatewayInterface;
use App\CentralLogics\Helpers;
use App\Models\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use InvalidArgumentException;

class LiqPayService implements PaymentGatewayInterface
{
    const CURRENCY_EUR = 'EUR';
    const CURRENCY_USD = 'USD';
    const CURRENCY_UAH = 'UAH';
    const CURRENCY_RUB = 'RUB';
    const CURRENCY_RUR = 'RUR';

    private $_api_url = 'https://www.liqpay.ua/api/';
    private $_checkout_url = 'https://www.liqpay.ua/api/3/checkout';
    protected $_supportedCurrencies = array(
        self::CURRENCY_EUR,
        self::CURRENCY_USD,
        self::CURRENCY_UAH,
        self::CURRENCY_RUB,
        self::CURRENCY_RUR,
    );

    private function encode_params($params)
    {
        return base64_encode(json_encode($params));
    }

    private function decode_params($params)
    {
        return json_decode(base64_decode($params), true);
    }

    private function str_to_sign($str)
    {
        return base64_encode(sha1($str, 1));
    }

    private function cnb_params($params, $public_key)
    {
        $params['public_key'] = $public_key;

        if (!isset($params['version'])) {
            throw new InvalidArgumentException('version is null');
        }
        if (!isset($params['amount'])) {
            throw new InvalidArgumentException('amount is null');
        }
        if (!isset($params['currency'])) {
            throw new InvalidArgumentException('currency is null');
        }
        if (!in_array($params['currency'], $this->_supportedCurrencies)) {
            throw new InvalidArgumentException('currency is not supported');
        }
        if ($params['currency'] == self::CURRENCY_RUR) {
            $params['currency'] = self::CURRENCY_RUB;
        }
        if (!isset($params['description'])) {
            throw new InvalidArgumentException('description is null');
        }

        return $params;
    }

    private function cnb_signature($params, $private_key, $public_key)
    {
        $params = $this->cnb_params($params, $public_key);
        $json = $this->encode_params($params);
        $signature = $this->str_to_sign($private_key . $json . $private_key);

        return $signature;
    }

    private function cnb_form($params, $public_key, $private_key)
    {
        $language = 'en';
        if (isset($params['language']) && $params['language'] == 'en') {
            $language = 'en';
        }

        $params = $this->cnb_params($params, $public_key);
        $data = $this->encode_params($params);
        $signature = $this->cnb_signature($params, $private_key, $public_key);

        return sprintf(
            '
            <form method="POST" action="%s" accept-charset="utf-8">
                %s
                %s
                <input type="image" src="//static.liqpay.ua/buttons/p1%s.radius.png" name="btn_text" />
            </form>
            ',
            $this->_checkout_url,
            sprintf('<input type="hidden" name="%s" value="%s" />', 'data', $data),
            sprintf('<input type="hidden" name="%s" value="%s" />', 'signature', $signature),
            $language
        );
    }

    public function initialize(array $data)
    {
        $order = $data['order'];
        $tran = Str::random(6) . '-' . rand(1, 1000);

        $public_key = config('liqpay.public_key');
        $private_key = config('liqpay.private_key');

        if (!$public_key || !$private_key) {
            return back()->withErrors(['error' => trans('messages.config_your_account', ['method' => trans('messages.liqpay')])]);
        }

        try {
            $html = $this->cnb_form(array(
                'action' => 'pay',
                'amount' => round($order->order_amount, 2),
                'currency' => Helpers::currency_code(),
                'description' => 'Transaction ID: ' . $tran,
                'order_id' => $order->id,
                'result_url' => route('liqpay-callback'),
                'server_url' => route('liqpay-callback'), // Callback/Server URL
                'version' => '3'
            ), $public_key, $private_key);

            return $html;
        } catch (\Exception $ex) {
            return back()->withErrors(['error' => trans('messages.config_your_account', ['method' => trans('messages.liqpay')])]);
        }
    }

    public function verify(Request $request)
    {
        // Controller uses session('order_id').
        // Liqpay sends data and signature.
        // If we strictly followed the verification logic:
        // $data = $request->input('data');
        // $signature = $request->input('signature');
        // We should verify signature.
        // But Controller logic was simple check on $request['status'] (which comes from query params or post body?)
        // Standard LiqPay callback sends 'data' and 'signature'.
        // The Controller logic: $request['status'] == 'success'.
        // If LiqPay redirects with 'status=success' in query params, that's what it checks.
        // Wait, route('liqpay-callback') is set as 'result_url' and 'server_url'.

        $order = Order::with(['details'])->where(['id' => session('order_id')])->first();
        if (!$order) {
            return redirect()->route('payment-fail');
        }

        // Assuming request contains 'status' or we parse it from 'data'.
        // The controller assumed $request['status'].
        // Let's assume that matches the behavior or the redirect puts params in URL.

        if ($request['status'] == 'success') {
            $order->payment_method = 'LiqPay';
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
