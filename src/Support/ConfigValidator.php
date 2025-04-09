<?php

namespace NhanChauKP\MomoPayment\Support;

use RuntimeException;

class ConfigValidator
{
    public static function validate(?array $config = null): void
    {
        $required = [
            'partner_code' => 'Partner Code',
            'access_key' => 'Access Key',
            'secret_key' => 'Secret Key',
        ];

        if ($config === null) {
            // Validate Laravel config
            foreach ($required as $key => $label) {
                if (empty(config("momo-payment.{$key}"))) {
                    throw new RuntimeException("Missing config: {$label} (momo-payment.{$key})");
                }
            }
        } else {
            // Validate array config
            foreach ($required as $key => $label) {
                if (empty($config[$key])) {
                    throw new RuntimeException("Missing config: {$label} ({$key})");
                }
            }
        }
    }

    public static function getConfig(): array
    {
        return config('momo-payment');
    }
}
