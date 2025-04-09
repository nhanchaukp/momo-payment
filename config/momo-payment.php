<?php

// config for NhanChauKP/MomoPayment
return [
    /**
     * Config can get in https://business.momo.vn/portal/app/payment-integration-center
     */
    'partner_code' => env('MOMO_PARTNER_CODE'),
    'access_key' => env('MOMO_ACCESS_KEY'),
    'secret_key' => env('MOMO_SECRET_KEY'),

    /**
     * Http client config
     */
    'base_url' => env('MOMO_BASE_URL', 'https://test-payment.momo.vn'),
    'timeout' => env('MOMO_CLIENT_TIMEOUT', 30),
    'debug' => env('MOMO_CLIENT_DEBUG', false),

    /**
     * Throw exception when momo response with error
     */
    'throw_error' => true,
];
