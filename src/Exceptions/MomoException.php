<?php

namespace NhanChauKP\MomoPayment\Exceptions;

use Exception;

class MomoException extends Exception
{
    public function __construct(
        string $message,
        int $code = 0,
        public ?array $response = null
    ) {
        parent::__construct($message, $code);
    }
}
