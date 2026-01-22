<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\Payment\PaymentService;

class PaypalPaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function payWithpaypal(Request $request)
    {
        $order = Order::with(['details'])->where(['id' => session('order_id')])->first();
        $data = ['order' => $order];

        return $this->paymentService->getGateway('paypal')->initialize($data);
    }

    public function getPaymentStatus(Request $request)
    {
        return $this->paymentService->getGateway('paypal')->verify($request);
    }
}
