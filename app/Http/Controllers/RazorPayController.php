<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\Payment\PaymentService;

class RazorPayController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function payWithRazorpay()
    {
        $data = []; // Add any necessary data if needed by the view
        return $this->paymentService->getGateway('razor_pay')->initialize($data);
    }

    public function payment(Request $request, $order_id)
    {
        // Service expects request. We might need to ensure order_id is accessible if not in request.
        // The original code used $request['razorpay_payment_id'] which contained the transaction ref.
        // The order_id was passed as a route param.
        // But logic inside relied on $api->payment->fetch()->description to find order id or fallback?
        // Let's pass the request as is. If verify needs the route param order_id, we should merge it.
        // In the service implementation I wrote, I mainly looked at razorpay_payment_id.
        // Let's merge order_id into request to be safe if we change service logic later.
        $request->merge(['order_id' => $order_id]);

        return $this->paymentService->getGateway('razor_pay')->verify($request);
    }
}
