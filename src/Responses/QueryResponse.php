<?php

namespace NhanChauKP\MomoPayment\Responses;

use Spatie\LaravelData\Data;

class QueryResponse extends Data
{
    public function __construct(
        public string $partnerCode,
        public string $requestId,
        public string $orderId,
        public ?string $extraData,
        public int $amount,
        public int $transId,
        public ?string $payType,
        public int $resultCode,
        public ?array $refundTrans,
        public string $message,
        public int $responseTime,
        public ?string $paymentOption,
        public ?array $promotionInfo,
    ) {}
}
