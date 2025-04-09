<?php

namespace NhanChauKP\MomoPayment;

use NhanChauKP\MomoPayment\Commands\MomoPaymentCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MomoPaymentServiceProvider extends PackageServiceProvider
{
    public function boot(): void {}

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('momo-payment')
            ->hasConfigFile()
//            ->hasViews()
//            ->hasMigration('create_momo_payment_table')
            ->hasCommand(MomoPaymentCommand::class);
    }
}
