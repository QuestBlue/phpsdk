<?php

namespace questbluesdk\Api;

use questbluesdk\ApiRequestExecutor;
use questbluesdk\Models\Requests\Dids\UpdateDidRequest;
use questbluesdk\Models\Requests\IFaxPro\GetAvailableDIDsRequest;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\IFaxPro\IFaxProAvailableDidsResponse;
use questbluesdk\Models\Responses\IFaxPro\IFaxProAvailableStatesResponse;
use questbluesdk\Models\Responses\IFaxPro\IFaxProOrderedDidsListResponse;
use questbluesdk\Models\Responses\IFaxPro\IFaxProRateCentersResponse;
use questbluesdk\Models\Responses\IFaxPro\SendIFaxProResponse;

/**
 * Class IFaxPro
 * Manages operations for fax-related services, including states, rate centers, DIDs, fax sending, and account management.
 */
class IFaxPro extends ApiRequestExecutor
{
    public function getAvailableStates(): IFaxProAvailableStatesResponse|ErrorResponse
    {
        $response = $this->get('fax/states');
        return $this->parseResponse($response, IFaxProAvailableStatesResponse::class);
    }

    public function getRateCenters(string $state): IFaxProRateCentersResponse|ErrorResponse
    {
        $response = $this->get('fax/ratecenters', ['state' => $state]);
        return $this->parseResponse($response, IFaxProRateCentersResponse::class);
    }

    public function getAvailableDIDs(GetAvailableDIDsRequest $request): IFaxProAvailableDidsResponse|ErrorResponse
    {
        $response = $this->get('fax/available', $request->toArray());
        return $this->parseResponse($response, IFaxProAvailableDidsResponse::class);
    }

    public function listOrderedDIDs(?string $did = '', int $perPage = 10, int $page = 1): IFaxProOrderedDidsListResponse|ErrorResponse
    {
        $response = $this->get('fax', [
            'did'      => $did,
            'per_page' => $perPage,
            'page'     => $page
        ]);
        return $this->parseResponse($response, IFaxProOrderedDidsListResponse::class);
    }

    public function updateDid(UpdateDidRequest $request): bool|ErrorResponse
    {
        $response = $this->put('fax', $request->toArray());
        return $this->parseResponse($response);
    }

    public function pauseFaxAcc(string $did, string $action): bool|ErrorResponse
    {
        $response = $this->put('fax/pause', [
            'did'    => $did,
            'action' => $action
        ]);
        return $this->parseResponse($response);
    }

    public function deleteDid(string $did): bool|ErrorResponse
    {
        $response = $this->delete('fax', ['did' => $did]);
        return $this->parseResponse($response);
    }

    public function sendFax(string $didFrom, string $didTo, string $fpath): SendIFaxProResponse|ErrorResponse
    {
        $fileContent = base64_encode(file_get_contents($fpath));
        $fileName = base64_encode(pathinfo($fpath, PATHINFO_BASENAME));

        $response = $this->post('fax/send', [
            'did_from'  => $didFrom,
            'did_to'    => $didTo,
            'file'      => $fileContent,
            'filename'  => $fileName,
        ]);

        return $this->parseResponse($response, SendIFaxProResponse::class);
    }

    public function moveToVoice(string $did): bool|ErrorResponse
    {
        $response = $this->put('fax/move2voice', ['did' => $did]);
        return $this->parseResponse($response);
    }
}
