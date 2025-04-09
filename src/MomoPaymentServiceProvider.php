<?php

namespace NhanChauKP\MomoPayment;

use Illuminate\Support\ServiceProvider;
use NhanChauKP\MomoPayment\Services\MomoPaymentClient;

class MomoPaymentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('momo-payment', function ($app) {
            return new MomoPayment(
                new MomoPaymentClient
            );
        });

        $this->app->singleton(MomoPaymentClient::class, function ($app) {
            return new MomoPaymentClient;
        });
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/momo-payment.php' => config_path('momo-payment.php'),
        ], 'momo-payment-config');
    }
}
