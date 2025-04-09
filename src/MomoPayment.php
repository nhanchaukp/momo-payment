<?php

namespace NhanChauKP\MomoPayment;

use Illuminate\Http\Client\ConnectionException;
use NhanChauKP\MomoPayment\Requests\ConfirmRequest;
use NhanChauKP\MomoPayment\Requests\CreateRequest;
use NhanChauKP\MomoPayment\Requests\QueryRequest;
use NhanChauKP\MomoPayment\Responses\ConfirmResponse;
use NhanChauKP\MomoPayment\Responses\CreateResponse;
use NhanChauKP\MomoPayment\Responses\QueryResponse;
use NhanChauKP\MomoPayment\Services\MomoPaymentClient;

class MomoPayment
{
    public function __construct(
        protected MomoPaymentClient $client
    ) {}

    public function create(CreateRequest $data): CreateResponse
    {
        $response = $this->client->post('/v2/gateway/api/query', $data);

        return CreateResponse::from($response);
    }

    public function confirm(ConfirmRequest $payload): ConfirmResponse
    {
        $response = $this->client->post('/gw_payment/confirm', $payload);
        return ConfirmResponse::from($response);
    }

    public function query(QueryRequest $payload): QueryResponse
    {
        $response = $this->client->post('/query', $payload);
        return QueryResponse::from($response);
    }

    // public function refund(array $payload): array
    // {
    //     return $this->sendRequest('/gw_payment/refund', $payload);
    // }
}
