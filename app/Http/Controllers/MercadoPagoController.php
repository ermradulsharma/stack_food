<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\CentralLogics\Helpers;
use App\Services\Payment\PaymentService;

class MercadoPagoController extends Controller
{
    private $data;
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->data = Helpers::get_business_settings('mercadopago'); // Keep this if used for other things or remove if fully serviced.
        $this->paymentService = $paymentService;
    }

    public function index(Request $request)
    {
        // Service initialize returns the view
        $order = Order::with(['details'])->where(['id' => session('order_id')])->first();
        $data = ['order' => $order];

        return $this->paymentService->getGateway('mercadopago')->initialize($data);
    }

    public function make_payment(Request $request)
    {
        // Service verify handles the payment execution and returns JSON
        return $this->paymentService->getGateway('mercadopago')->verify($request);
    }

    public function get_test_user(Request $request)
    {
        // ... (Keep as is or move to service if strictly needed, but it seems like a dev tool)
        // For now, I'll keep it here but it's not part of the standard flow interface.
        // If I strictly follow interface, I can't invoke it via service easily without specific method.
        // Let's leave it as a controller helper or comment it out if unused.
        // Given it's a test helper, I will leave it but stripped down or just delegated if I added it to service.
        // I didn't add it to service interface. So I will keep implementation here or remove if unused.
        // The original code had it. I'll just leave it be for now or remove if I want strict cleanup.
        // It's safer to remove if we think it's not production code.

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.mercadopago.com/users/test_user");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->data['access_token']
        ));
        curl_setopt($curl, CURLOPT_POSTFIELDS, '{"site_id":"MLA"}');
        $response = curl_exec($curl);
        dd($response);
    }
}
