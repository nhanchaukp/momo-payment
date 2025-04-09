<?php

namespace NhanChauKP\MomoPayment\Traits;

/**
 * @method signatureFields()
 * @method toArray()
 * @method static from(array $array)
 */
trait HandlesSignature
{
    public function signatureRaw(string $accessKey): string
    {
        $fields = $this->signatureFields();

        $data = ['accessKey' => $accessKey, ...$this->toArray()];

        return collect($fields)
            ->map(fn ($key) => "$key={$data[$key]}")
            ->implode('&');
    }

    public function generateSignature(string $accessKey, string $secretKey): string
    {
        return hash_hmac('sha256', $this->signatureRaw($accessKey), $secretKey);
    }

    public function withSignature(string $signature): static
    {
        return static::from([...$this->toArray(), 'signature' => $signature]);
    }
}
