<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface PaymentGatewayInterface
{
    /**
     * Initialize the payment (e.g., create session, get token).
     *
     * @param array $data
     * @return mixed
     */
    public function initialize(array $data);

    /**
     * Handle payment verification/success.
     *
     * @param Request $request
     * @return mixed
     */
    public function verify(Request $request);

    /**
     * Handle payment failure.
     *
     * @param Request $request
     * @return mixed
     */
    public function fail(Request $request);
}
