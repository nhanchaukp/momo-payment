<?php

namespace NhanChauKP\MomoPayment\Facades;

use Illuminate\Support\Facades\Facade;

class MomoPayment extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \NhanChauKP\MomoPayment\MomoPayment::class;
    }
}
