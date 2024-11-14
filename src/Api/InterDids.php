<?php

namespace questbluesdk\Api;

use questbluesdk\ApiRequestExecutor;
use questbluesdk\Models\Requests\Dids\OrderDidRequest;
use questbluesdk\Models\Requests\Dids\UpdateDidRequest;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\InterDids\CityListResponse;
use questbluesdk\Models\Responses\InterDids\CountryListResponse;
use questbluesdk\Models\Responses\InterDids\InterDidListResponse;

/**
 * Class InternationalDids
 * Handles international DID management, including listing countries and cities,
 * as well as ordering, updating, and deleting DIDs.
 */
class InterDids extends ApiRequestExecutor
{
    public function getCountryList(): CountryListResponse|ErrorResponse
    {
        $response = $this->get('didinter/countrylist');
        return $this->parseResponse($response, CountryListResponse::class);
    }

    public function getCityList(string $countryCode): CityListResponse|ErrorResponse
    {
        $response = $this->get('didinter/citylist', ['country_code' => $countryCode]);
        return $this->parseResponse($response, CityListResponse::class);
    }

    public function listDIDs(?string $did = '', ?int $perPage = 25, ?int $page = 1): InterDidListResponse|ErrorResponse
    {
        $response = $this->get('didinter', ['did' => $did, 'per_page' => $perPage, 'page' => $page]);
        return $this->parseResponse($response, InterDidListResponse::class);
    }

    public function updateDID(UpdateDidRequest $request): bool|ErrorResponse
    {
        $response = $this->put('didinter', $request->toArray());
        return $this->parseResponse($response);
    }

    public function orderDID(OrderDidRequest $request): InterDidListResponse|ErrorResponse
    {
        $response = $this->post('didinter', $request->toArray());
        return $this->parseResponse($response, InterDidListResponse::class);
    }

    public function deleteDID(string $did): bool|ErrorResponse
    {
        $response = $this->delete('didinter', ['did' => $did]);
        return $this->parseResponse($response);
    }
}
