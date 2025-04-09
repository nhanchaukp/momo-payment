<?php

namespace NhanChauKP\MomoPayment\Requests;

use NhanChauKP\MomoPayment\Contracts\DatableRequest;
use NhanChauKP\MomoPayment\Traits\HandlesSignature;
use Spatie\LaravelData\Data;

class QueryRequest extends Data implements DatableRequest
{
    use HandlesSignature;

    public function __construct(
        public string $partnerCode,
        public string $requestId,
        public string $orderId,
        public string $lang = 'vi',
        public ?string $signature = null,
    ) {}

    public function signatureFields(): array
    {
        return [
            'amount',
            'description',
            'orderId',
            'partnerCode',
            'requestId',
            'requestType',
        ];
    }
}
