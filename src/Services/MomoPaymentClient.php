<?php

namespace NhanChauKP\MomoPayment\Services;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use NhanChauKP\MomoPayment\Constants\ErrorCodes;
use NhanChauKP\MomoPayment\Contracts\DatableRequest;
use NhanChauKP\MomoPayment\Exceptions\MomoException;
use NhanChauKP\MomoPayment\Support\ConfigValidator;
use Spatie\LaravelData\Data;

class MomoPaymentClient
{
    protected string $baseUrl;

    protected string $accessKey;

    protected string $partnerCode;

    protected string $secretKey;

    protected int $timeout;

    protected bool $debug;

    protected bool $throw_error;

    public function __construct()
    {
        ConfigValidator::validate();
        $config = ConfigValidator::getConfig();

        $this->baseUrl = $config['base_url'];
        $this->accessKey = $config['access_key'];
        $this->partnerCode = $config['partner_code'];
        $this->secretKey = $config['secret_key'];
        $this->timeout = $config['timeout'];
        $this->debug = $config['debug'];
        $this->throw_error = $config['throw_error'];
    }

    /**
     * @throws MomoException
     * @throws ConnectionException
     */
    public function post(string $endpoint, Data $payload): array
    {
        if ($payload instanceof DatableRequest) {
            $signature = $payload->generateSignature(
                $this->accessKey,
                $this->secretKey,
            );

            $payload = $payload->withSignature($signature);
        }

        $response = Http::timeout($this->timeout)
            ->withOptions(['debug' => $this->debug])
            ->post($this->baseUrl.$endpoint, $payload);

        $json = $response->json();

        if ($this->debug) {
            Log::debug('[MoMo Payment] Request data', $payload->toArray());
            Log::debug('[MoMo Payment] Response data', $json);
        }

        if ($this->throw_error && isset($json['resultCode']) && $json['resultCode'] !== ErrorCodes::SUCCESS) {
            throw new MomoException(ErrorCodes::getDescription($json['resultCode']), $json['resultCode'], $json);
        }

        return $json;
    }
}
