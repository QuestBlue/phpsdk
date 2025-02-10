<?php

namespace questbluesdk\Api;

use questbluesdk\ApiRequestExecutor;
use questbluesdk\Models\Requests\SIPTrunk\BlockCallerRequest;
use questbluesdk\Models\Requests\SIPTrunk\CreateSIPTrunkRequest;
use questbluesdk\Models\Requests\SIPTrunk\UpdateSipTrunkRequest;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\SIPTrunk\BlockedCallersResponse;
use questbluesdk\Models\Responses\SIPTrunk\SIPTrunkListResponse;
use questbluesdk\Models\Responses\SIPTrunk\SIPTrunkStatusResponse;

/**
 * Class SipTrunks
 * Manages SIP trunk-related operations, including creating, listing, updating, and deleting SIP trunks, as well as handling blocked callers.
 */
class SipTrunks extends ApiRequestExecutor
{
    public function listSIPTrunks(string $trunk = '', int $perPage = 25, int $page = 1): SIPTrunkListResponse|ErrorResponse
    {
        $response = $this->get('siptrunk', ['trunk' => $trunk, 'per_page' => $perPage, 'page' => $page]);
        return $this->parseResponse($response, SIPTrunkListResponse::class);
    }

    public function updateSIPTrunk(UpdateSIPTrunkRequest $request): bool|ErrorResponse
    {
        $response = $this->put('siptrunk', $request->toArray());
        return $this->parseResponse($response);
    }

    public function createSIPTrunk(CreateSIPTrunkRequest $request): bool|ErrorResponse
    {
        $response = $this->post('siptrunk', $request->toArray());
        return $this->parseResponse($response);
    }

    public function deleteSIPTrunk(string $trunk): bool|ErrorResponse
    {
        $response = $this->delete('siptrunk', ['trunk' => $trunk]);
        return $this->parseResponse($response);
    }

    public function checkRegistrationStatus(string $trunk): SIPTrunkStatusResponse|ErrorResponse
    {
        $response = $this->get('siptrunk/statuschecker', ['trunk' => $trunk]);
        return $this->parseResponse($response, SIPTrunkStatusResponse::class);
    }

    public function blockCaller(BlockCallerRequest $request): bool|ErrorResponse
    {
        $response = $this->post('siptrunk/blockcaller', $request->toArray());
        return $this->parseResponse($response);
    }

    public function listBlockedCallers(?string $trunk = null, ?string $did = null, int $perPage = 25, int $page = 1): BlockedCallersResponse|ErrorResponse
    {
        $response = $this->get('siptrunk/blockedcallers', ['trunk' => $trunk, 'did' => $did, 'per_page' => $perPage, 'page' => $page]);
        return $this->parseResponse($response, BlockedCallersResponse::class);
    }
}
