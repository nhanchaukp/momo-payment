<?php

namespace NhanChauKP\MomoPayment\Responses;

use Spatie\LaravelData\Data;

class CreateResponse extends Data
{
    public function __construct(
        public string $partnerCode,
        public string $requestId,
        public string $orderId,
        public int $amount,
        public int $responseTime,
        public string $message,
        public int $resultCode,
        public string $partnerClientId,
        public string $mToken,
    ) {}
}
