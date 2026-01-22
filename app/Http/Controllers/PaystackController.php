<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\Payment\PaymentService;

class PaystackController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function redirectToGateway(Request $request)
    {
        // Service expects 'order' in data array.
        // Original code: $order = Order::with(['details'])->where(['id' => $request['orderID']])->first();
        // We will fetch the order first.
        $order = Order::with(['details'])->where(['id' => $request['orderID']])->first();
        $data = [
            'order' => $order,
            'reference' => $request['reference'] // Pass reference if present
        ];

        return $this->paymentService->getGateway('paystack')->initialize($data);
    }

    public function handleGatewayCallback()
    {
        // Paystack callback handling. Service verify expects request passed.
        // Paystack facade might use global request, but verify takes generic request.
        return $this->paymentService->getGateway('paystack')->verify(request());
    }
}
