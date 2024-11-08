<?php

namespace questbluesdk;

use questbluesdk\Models\Responses\ErrorResponse;

/**
 * Class Interdids
 * Handles international DID (Direct Inward Dialing) management, including listing countries and cities,
 * ordering, updating, and deleting DIDs.
 */
class Interdids extends Connect
{
    /**
     * List all available countries for DIDs.
     *
     * @return string|ErrorResponse
     */
    public function listCountries(): string|ErrorResponse
    {
        return $this->query('didinter/countrylist');
    }

    /**
     * List cities available for DIDs within a specific country.
     *
     * @param string $countryCode The country code to list cities for.
     * @return string|ErrorResponse
     */
    public function listCities(string $countryCode): string|ErrorResponse
    {
        $params = [
            'country_code' => $countryCode,
        ];

        return $this->query('didinter/citylist', $params);
    }

    /**
     * Order a DID for a specific country and city, with optional routing to a trunk.
     *
     * @param string $countryCode The country code.
     * @param string $city The city name.
     * @param string|null $route2trunk Optional trunk routing.
     * @return string|ErrorResponse|bool Returns true on success, or an error string/message on failure.
     */
    public function orderDid(string $countryCode, string $city, ?string $route2trunk = null): string|ErrorResponse|bool
    {
        $params = [
            'country_code' => $countryCode,
            'city'         => $city,
            'route2trunk'  => $route2trunk,
        ];

        $result = $this->query('didinter', $params, 'POST');
        if ($result === false) {
            return 'DID ordering error';
        }

        return $result->error ?? true;
    }

    /**
     * List ordered DIDs with an optional filter for a specific DID.
     *
     * @param string|null $did Optional DID to filter the list.
     * @return string|ErrorResponse
     */
    public function listDids(?string $did = null): string|ErrorResponse
    {
        $params = [
            'did' => $did,
        ];

        return $this->query('didinter', $params);
    }

    /**
     * Update a DID with optional trunk and forward-to-DID configurations.
     *
     * @param string $did The DID to update.
     * @param string|null $route2trunk Optional routing to a trunk.
     * @param string|null $forward2did Optional forwarding to another DID.
     * @return string|ErrorResponse
     */
    public function updateDid(string $did, ?string $route2trunk = null, ?string $forward2did = null): string|ErrorResponse
    {
        $params = [
            'did'          => $did,
            'route2trunk'  => $route2trunk,
            'forward2did'  => $forward2did,
        ];

        return $this->query('didinter', $params, 'PUT');
    }

    /**
     * Delete a specified DID.
     *
     * @param string $did The DID to delete.
     * @return string|ErrorResponse
     */
    public function deleteDid(string $did): string|ErrorResponse
    {
        $params = [
            'did' => $did,
        ];

        return $this->query('didinter', $params, 'DELETE');
    }
}
