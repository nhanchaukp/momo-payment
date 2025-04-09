<?php

namespace NhanChauKP\MomoPayment\Support;

use RuntimeException;

class ConfigValidator
{
    public static function validate(): void
    {
        $required = [
            'momo.partner_code' => 'Partner Code',
            'momo.access_key' => 'Access Key',
            'momo.secret_key' => 'Secret Key',
        ];

        foreach ($required as $key => $label) {
            if (empty(config($key))) {
                throw new RuntimeException("Missing config: {$label} ({$key})");
            }
        }
    }
}
