<?php

namespace NhanChauKP\MomoPayment\Requests;

use NhanChauKP\MomoPayment\Contracts\DatableRequest;
use NhanChauKP\MomoPayment\Traits\HandlesSignature;
use Spatie\LaravelData\Data;

class CreateRequest extends Data implements DatableRequest
{
    use HandlesSignature;

    public function __construct(
        public string $partnerCode,
        public string $partnerName,
        public string $storeId,
        public string $requestId,
        public int $amount,
        public string $orderId,
        public string $orderInfo,
        public string $redirectUrl,
        public string $ipnUrl,
        public string $requestType,
        public array $userInfo, // Assuming it's a nested object or array
        public string $extraData = '', // Can use setExtraData method.
        public string $partnerClientId = '',
        public string $lang = 'vi', // Language of returned message (vi or en)
        public ?string $signature = null,
    ) {}

    public function signatureFields(): array
    {
        return [
            'amount',
            'extraData',
            'ipnUrl',
            'orderId',
            'orderInfo',
            'partnerClientId',
            'partnerCode',
            'redirectUrl',
            'requestId',
            'requestType',
        ];
    }

    public function setExtraData(array $data): self
    {
        $this->extraData = base64_encode(json_encode($data, JSON_UNESCAPED_UNICODE));

        return $this;
    }
}
