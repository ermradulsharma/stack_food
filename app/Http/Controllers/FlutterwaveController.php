<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Services\Payment\PaymentService;

class FlutterwaveController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * Initialize Rave payment process
     * @return void
     */
    public function initialize()
    {
        $order = Order::with(['details'])->where(['id' => session('order_id'), 'user_id' => session('customer_id')])->first();
        $data = ['order' => $order];

        return $this->paymentService->getGateway('flutterwave')->initialize($data);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {
        // Flutterwave facade callback uses request() globally usually, but our service verify takes a request.
        // We'll pass the current request instance.
        return $this->paymentService->getGateway('flutterwave')->verify(request());
    }
}
