<?php

namespace NhanChauKP\MomoPayment\Support;

use Illuminate\Http\Response;
use NhanChauKP\MomoPayment\Constants\ErrorCodes;
use NhanChauKP\MomoPayment\Exceptions\MomoException;

class MomoResponseHandler
{
    /**
     * @throws MomoException
     */
    public static function handle(Response $response): array
    {
        $body = $response->json();

        if (! $response->successful()) {
            throw new MomoException(
                message: 'Lỗi HTTP: '.$response->status(),
                code: $response->status(),
                response: $body
            );
        }

        if (($body['resultCode'] ?? null) !== ErrorCodes::SUCCESS) {
            throw new MomoException(
                message: ErrorCodes::getDescription($body['resultCode']),
                code: $body['resultCode'],
                response: $body
            );
        }

        return $body;
    }
}
