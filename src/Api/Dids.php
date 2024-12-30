<?php

namespace questbluesdk\Api;

use questbluesdk\ApiRequestExecutor;
use questbluesdk\Models\Requests\Dids\DidModel;
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
    public function listDids(string $did = '', int $perPage = 25, int $page = 1): ListDidsResponse|ErrorResponse
    {
        $response = $this->get('did', ['did' => $did, 'per_page' => $perPage, 'page' => $page]);
        return $this->parseResponse($response, ListDidsResponse::class);
    }

    public function updateDid(UpdateDidRequest $request): bool|ErrorResponse
    {
        $response = $this->put('did', $request->toArray());
        return $this->parseResponse($response);
    }

    public function orderDid(OrderDidRequest $request): bool|ErrorResponse
    {
        $response = $this->post('did', $request->toArray());
        return $this->parseResponse($response);
    }

    public function deleteDid(string $did): bool|ErrorResponse
    {
        $response = $this->delete('did', ['did' => $did]);
        return $this->parseResponse($response);
    }

    public function getAvailableStates(): AvailableStatesResponse|ErrorResponse
    {
        $response = $this->get('did/states');
        return $this->parseResponse($response, AvailableStatesResponse::class);
    }

    public function getRateCenters(ListRateCentersRequest $request): RateCentersResponse|ErrorResponse
    {
        $response = $this->get('did/ratecenters', $request->toArray());
        return $this->parseResponse($response, RateCentersResponse::class);
    }

    public function getAvailableDids(ListAvailableDidsRequest $request): AvailableDidsResponse|ErrorResponse
    {
        $response = $this->get('did/available', $request->toArray());
        return $this->parseResponse($response, AvailableDidsResponse::class);
    }

    public function moveToFax(string $did): bool|ErrorResponse
    {
        $response = $this->put('did/move2fax', ['did' => $did]);
        return $this->parseResponse($response);
    }

    public function fraudValidate(array $numbers): FraudValidateResponse|ErrorResponse
    {
        $response = $this->post('did/fraudvalidate', ['tn' => $numbers]);
        return $this->parseResponse($response, FraudValidateResponse::class);
    }

    public function updateDidLegacy(DidModel $didModel): string|ErrorResponse
    {
        $params = [
            'did'             => $didModel->did,
            'note'            => $didModel->note,
            'pin'             => $didModel->pin,
            'route2trunk'     => $didModel->route2trunk,
            'forw2did'        => $didModel->forward2did,
            'failover'        => $didModel->failover,
            'lidb'            => $didModel->lidb,
            'cnam'            => $didModel->cnam,
            'e911'            => $didModel->e911,
            'dlda'            => $didModel->dlda,
            'e911_call_alert' => $didModel->e911CallAlert
        ];

        return $this->put('did', $params);
    }

    public function listAvailableDidsLegacy(DidModel $didModel)
    {
        $params = [
            'type'        => $didModel->type,
            'tier'        => $didModel->tier,
            'state'       => $didModel->location->state,
            'ratecenter'  => $didModel->location->ratecenter,
            'npa'         => $didModel->location->npa,
            'zip'         => $didModel->location->zip,
            'code'        => $didModel->code
        ];

        return $this->get('did/available', $params);
    }

    public function orderDidLegacy(DidModel $didModel)
    {
        $params = [
            'tier'         => $didModel->tier,
            'did'          => $didModel->did,
            'note'         => $didModel->note,
            'route2trunk'  => $didModel->route2trunk,
            'pin'          => $didModel->pin,
            'lidb'         => $didModel->lidb,
            'cnam'         => $didModel->cnam,
            'e911'         => $didModel->e911,
            'dlda'         => $didModel->dlda,
        ];

        $result = $this->post('did', $params);
        if($result instanceof ErrorResponse) {
            return 'DID ordering error';
        }

        return $result;
    }
}
