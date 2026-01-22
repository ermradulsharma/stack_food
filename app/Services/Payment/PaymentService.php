<?php

namespace App\Services\Payment;

use App\Contracts\PaymentGatewayInterface;
use App\Services\Payment\Gateways\StripeService;
use Exception;

class PaymentService
{
    /**
     * Get the payment gateway instance.
     *
     * @param string $gateway
     * @return PaymentGatewayInterface
     * @throws Exception
     */
    public function getGateway(string $gateway): PaymentGatewayInterface
    {
        switch ($gateway) {
            case 'stripe':
                return new StripeService();
            case 'paypal':
                return new Gateways\PaypalService();
            case 'razor_pay':
                return new Gateways\RazorPayService();
            case 'flutterwave':
                return new Gateways\FlutterwaveService();
            case 'paystack':
                return new Gateways\PaystackService();
            case 'mercadopago':
                return new Gateways\MercadoPagoService();
            case 'ssl_commerz_payment':
                return new Gateways\SslCommerzService();
            case 'senang_pay':
                return new Gateways\SenangPayService();
            case 'paymob_accept':
                return new Gateways\PaymobService();
            case 'paytabs':
                return new Gateways\PaytabsService();
            case 'bkash':
                return new Gateways\BkashService();
            case 'paytm':
                return new Gateways\PaytmService();
            case 'liqpay':
                return new Gateways\LiqPayService();
                // Add other gateways here
            default:
                throw new Exception("Payment gateway {$gateway} not supported.");
        }
    }
}
