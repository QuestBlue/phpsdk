<?php

namespace questbluesdk\Api;

use questbluesdk\ApiRequestExecutor;
use questbluesdk\Models\Requests\Dids\ListAvailableDidsRequest;
use questbluesdk\Models\Requests\Dids\ListRateCentersRequest;
use questbluesdk\Models\Requests\Dids\OrderDidRequest;
use questbluesdk\Models\Requests\Dids\UpdateDidRequest;
use questbluesdk\Models\Responses\Dids\AvailableDidsResponse;
use questbluesdk\Models\Responses\Dids\AvailableStatesResponse;
use questbluesdk\Models\Responses\Dids\FraudValidateResponse;
use questbluesdk\Models\Responses\Dids\ListDidsResponse;
use questbluesdk\Models\Responses\Dids\RateCentersResponse;
use questbluesdk\Models\Responses\Error\ErrorResponse;

/**
 * Class Dids
 *
 * Provides methods for managing DID (Direct Inward Dialing) numbers, including
 * listing available states, rate centers, available DIDs, ordering DIDs, updating DID settings,
 * moving DIDs to fax, and deleting DIDs.
 *
 * @package questbluesdk\Api
 */
class Dids extends ApiRequestExecutor
{


    public function listDids(string $did='', int $perPage=25, int $page=1): ListDidsResponse|ErrorResponse
    {
        $response = $this->get('did', ['did' => $did, 'per_page' => $perPage, 'page' => $page]);
        return $this->parseResponse($response, ListDidsResponse::class);

    }//end listDids()


    public function updateDid(UpdateDidRequest $request): bool|ErrorResponse
    {
        $response = $this->put('did', $request->toArray());
        return $this->parseResponse($response);

    }//end updateDid()


    public function orderDid(OrderDidRequest $request): bool|ErrorResponse
    {
        $response = $this->post('did', $request->toArray());
        return $this->parseResponse($response);

    }//end orderDid()


    public function deleteDid(string $did): bool|ErrorResponse
    {
        $response = $this->delete('did', ['did' => $did]);
        return $this->parseResponse($response);

    }//end deleteDid()


    public function getAvailableStates(): AvailableStatesResponse|ErrorResponse
    {
        $response = $this->get('did/states');
        return $this->parseResponse($response, AvailableStatesResponse::class);

    }//end getAvailableStates()


    public function getRateCenters(ListRateCentersRequest $request): RateCentersResponse|ErrorResponse
    {
        $response = $this->get('did/ratecenters', $request->toArray());
        return $this->parseResponse($response, RateCentersResponse::class);

    }//end getRateCenters()


    public function getAvailableDids(ListAvailableDidsRequest $request): AvailableDidsResponse|ErrorResponse
    {
        $response = $this->get('did/available', $request->toArray());
        return $this->parseResponse($response, AvailableDidsResponse::class);

    }//end getAvailableDids()


    public function moveToFax(string $did): bool|ErrorResponse
    {
        $response = $this->put('did/move2fax', ['did' => $did]);
        return $this->parseResponse($response);

    }//end moveToFax()


    public function fraudValidate(array $numbers): FraudValidateResponse|ErrorResponse
    {
        $response = $this->post('did/fraudvalidate', ['tn' => $numbers]);
        return $this->parseResponse($response, FraudValidateResponse::class);

    }//end fraudValidate()


}//end class
