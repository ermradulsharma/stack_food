<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\Payment\PaymentService;

class StripePaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function payment_process_3d()
    {
        $order_id = session('order_id');
        $order = Order::with(['details'])->where(['id' => $order_id])->first();

        // Pass any necessary data to the initialize method
        $data = ['order' => $order];

        // Use the PaymentService to get the 'stripe' gateway and initialize payment
        return $this->paymentService->getGateway('stripe')->initialize($data);
    }

    public function success(Request $request)
    {
        return $this->paymentService->getGateway('stripe')->verify($request);
    }

    public function fail(Request $request)
    {
        return $this->paymentService->getGateway('stripe')->fail($request);
    }
}
