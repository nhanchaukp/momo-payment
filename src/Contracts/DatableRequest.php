<?php

namespace NhanChauKP\MomoPayment\Contracts;

interface DatableRequest
{
    /**
     * Trả về danh sách các trường cần đưa vào chữ ký.
     */
    public function signatureFields(): array;
}
