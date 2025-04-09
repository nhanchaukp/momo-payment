<?php

namespace NhanChauKP\MomoPayment;

use Illuminate\Http\Client\ConnectionException;
use NhanChauKP\MomoPayment\Request\QueryRequest;
use NhanChauKP\MomoPayment\Response\QueryResponse;
use NhanChauKP\MomoPayment\Services\MomoPaymentClient;

class MomoPayment
{
    public function __construct(protected MomoPaymentClient $client) {}

    public function create(QueryRequest $data): QueryResponse
    {
        $response = $this->client->post('/v2/gateway/api/query', $data->toArray());

        return QueryResponse::from($response->json());
    }

    public function confirm(array $payload): array
    {
        return $this->sendRequest('/gw_payment/confirm', $payload);
    }

    public function query(array $payload): array
    {
        return $this->sendRequest('/query', $payload);
    }

    public function refund(array $payload): array
    {
        return $this->sendRequest('/gw_payment/refund', $payload);
    }

    /**
     * @throws ConnectionException
     */
    protected function sendRequest(string $endpoint, array $payload): array
    {
        $data = array_merge($payload, [
            'partnerCode' => config('momo.partner_code'),
            'accessKey' => config('momo.access_key'),
            'secretKey' => config('momo.secret_key'),
            // 'signature' => $this->generateSignature($payload),
        ]);

        return MomoPaymentClient::post($endpoint, $data)->json();
    }
}
