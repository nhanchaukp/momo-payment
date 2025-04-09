<?php

namespace NhanChauKP\MomoPayment\Responses;

use Spatie\LaravelData\Data;

class ConfirmResponse extends Data
{
    public function __construct(
        public string $partnerCode,
        public string $requestId,
        public string $orderId,
        public int $amount,
        public int $transId,
        public int $resultCode,
        public string $message,
        public string $requestType,
        public int $responseTime,
    ) {}
}
