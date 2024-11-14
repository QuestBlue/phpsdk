<?php

namespace questbluesdk\Api;

use questbluesdk\ApiRequestExecutor;
use questbluesdk\Models\Requests\Lnp\CreateLnpRequest;
use questbluesdk\Models\Requests\Lnp\DeleteLnpRequest;
use questbluesdk\Models\Requests\Lnp\ListLnpRequest;
use questbluesdk\Models\Requests\Lnp\UpdateLnpRequest;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\Lnp\CheckPortabilityResponse;
use questbluesdk\Models\Responses\Lnp\CreateLnpResponse;
use questbluesdk\Models\Responses\Lnp\ListLnpResponse;

/**
 * Class Lnp
 * Handles Local Number Portability (LNP) operations, including checking portability, creating LNP requests,
 * listing, updating, and deleting LNP entries.
 */
class Lnp extends ApiRequestExecutor
{
    public function checkPortability(string $number2port): CheckPortabilityResponse|ErrorResponse
    {
        $response = $this->get('lnp/check', ['number2port' => $number2port]);
        return $this->parseResponse($response, CheckPortabilityResponse::class);
    }

    public function createLnp(CreateLnpRequest $lnpRequest): CreateLnpResponse|ErrorResponse
    {
        $response = $this->post('lnp', $lnpRequest->toArray());
        return $this->parseResponse($response, CreateLnpResponse::class);
    }

    public function listLnp(ListLnpRequest $listRequest): ListLnpResponse|ErrorResponse
    {
        $response = $this->get('lnp', $listRequest->toArray());
        return $this->parseResponse($response, ListLnpResponse::class);
    }

    public function updateLnp(UpdateLnpRequest $updateRequest): bool|ErrorResponse
    {
        $response = $this->put('lnp', $updateRequest->toArray());
        return $this->parseResponse($response);
    }

    public function deleteLnp(DeleteLnpRequest $deleteRequest): bool|ErrorResponse
    {
        $response = $this->delete('lnp', $deleteRequest->toArray());
        return $this->parseResponse($response);
    }
}
