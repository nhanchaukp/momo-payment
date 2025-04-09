<?php

namespace NhanChauKP\MomoPayment\Contracts;

interface DatableRequest
{
    /**
     * Trả về danh sách các trường cần đưa vào chữ ký.
     */
    public function signatureFields(): array;

    /**
     * Trả về chữ ký của request.
     */
    public function generateSignature(string $accessKey, string $secretKey): string;

    /**
     * Trả về chữ ký của request.
     */
    public function withSignature(string $signature): static;
}
