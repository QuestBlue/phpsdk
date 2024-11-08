<?php

namespace questbluesdk;

use questbluesdk\Models\Responses\ErrorResponse;

date_default_timezone_set('EST');

/**
 * Class History
 * Provides access to call history and country lists, with optional filtering parameters.
 */
class History extends Connect
{
    /**
     * Retrieve a list of available countries.
     *
     * @return string|ErrorResponse Returns the country list as a string or an error response on failure.
     */
    public function countryList(): string|ErrorResponse
    {
        return $this->query('account/countrylist');
    }

    /**
     * Retrieve a country list for rate zone 2.
     *
     * @return string|ErrorResponse Returns the country list for rate zone 2 or an error response on failure.
     */
    public function getRateZone2CountryList(): string|ErrorResponse
    {
        return $this->query('account/ratezone2', ['country_list_only' => 'on']);
    }


    /**
     * Retrieve the call history with optional filters.
     *
     * @param string|null $trunk Optional trunk identifier.
     * @param string|null $period Optional period for call history (e.g., '2024-01-01/2024-01-31').
     * @param string|null $did Optional DID to filter call history by.
     * @param string|null $type Optional call type (e.g., 'inbound', 'outbound').
     * @param int|null $countryId Optional country ID for filtering.
     * @param bool|null $successCallOnly If true, returns only successful calls.
     * @param bool|null $summaryOnly If true, returns only a summary.
     * @param int $page Pagination page number (default: 1).
     * @param int $perPage Number of records per page (default: 5).
     * @param string|null $timezone Optional timezone for results.
     * @return string|ErrorResponse Returns the call history or an error response on failure.
     */
    public function voiceCallHistory(
        ?string $trunk = null,
        ?string $period = null,
        ?string $did = null,
        ?string $type = null,
        ?int $countryId = null,
        ?bool $successCallOnly = null,
        ?bool $summaryOnly = null,
        int $page = 1,
        int $perPage = 5,
        ?string $timezone = null
    ): string|ErrorResponse {
        $params = [
            'trunk'             => $trunk,
            'period'            => $period,
            'did'               => $did,
            'type'              => $type,
            'country_id'        => $countryId,
            'success_call_only' => $successCallOnly,
            'summary_only'      => $summaryOnly,
            'page'              => $page,
            'per_page'          => $perPage,
            'timezone'          => $timezone,
        ];

        return $this->query('callhistory', $params);
    }
}
