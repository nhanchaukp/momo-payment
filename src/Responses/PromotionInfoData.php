<?php

namespace NhanChauKP\MomoPayment\Responses;

use Spatie\LaravelData\Data;

class PromotionInfoData extends Data
{
    public function __construct(
        public int $amount,
        public int $amountSponsor,
        public string $voucherId,
        public string $voucherType,
        public string $voucherName,
        public string $merchantRate,
    ) {}
}
