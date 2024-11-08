<?php

namespace questbluesdk;

use questbluesdk\Models\Account\AccountCountryList;
use questbluesdk\Models\Account\AccountDetail;
use questbluesdk\Models\Account\AccountLocationRate;
use questbluesdk\Models\Account\AccountRates;
use questbluesdk\Models\Responses\ErrorResponse;

/**
 * Class Account
 * Handles various account-related operations, such as retrieving account details, managing balance alerts,
 * handling auto-refill settings, and fetching rates.
 */
class Account extends Connect
{
    /**
     * Retrieve detailed account information.
     *
     * @return AccountDetail|ErrorResponse Returns account details or an error response.
     */
    public function getAccountDetails(): AccountDetail|ErrorResponse
    {
        $response = $this->query('account/getaccoundetails');
        return $this->handleResponse($response, AccountDetail::class);
    }

    /**
     * Set a low balance alert threshold.
     *
     * @param int $amount Threshold amount for low balance alert.
     * @return bool|ErrorResponse Returns true on success or an error response on failure.
     */
    public function setLowBalanceAlert(int $amount): bool|ErrorResponse
    {
        $params = [
            'low_balance_alert_amount' => $amount,
        ];

        $response = $this->query('account/setlowbalancealert', $params, 'PUT');
        return $this->handleResponse($response);
    }

    /**
     * Set a daily balance alert.
     *
     * @param string $action The action to set (e.g., 'enable', 'disable').
     * @return bool|ErrorResponse Returns true on success or an error response on failure.
     */
    public function setDailyBalanceAlert(string $action): bool|ErrorResponse
    {
        $params = [
            'action' => $action,
        ];

        $response = $this->query('account/setdailybalancealert', $params, 'PUT');
        return $this->handleResponse($response);
    }

    /**
     * Retrieve the current account balance.
     *
     * @return AccountDetail|ErrorResponse Returns the account balance or an error response on failure.
     */
    public function getAccountBalance(): AccountDetail|ErrorResponse
    {
        $response = $this->query('account/getbalance');
        return $this->handleResponse($response, AccountDetail::class);
    }

    /**
     * Set the autorefill setting for the account.
     *
     * @param string $autorefill Auto-refill setting value.
     * @return bool|ErrorResponse Returns true on success or an error response on failure.
     */
    public function setAutorefill(string $autorefill): bool|ErrorResponse
    {
        $params = [
            'autorefill' => $autorefill,
        ];

        $response = $this->query('account/setautorefill', $params, 'PUT');
        return $this->handleResponse($response);
    }

    /**
     * Set balance reload options, including minimum balance and reload amount.
     *
     * @param int $minBalance Minimum balance to trigger reload.
     * @param int $reloadAmount Amount to reload when triggered.
     * @return bool|ErrorResponse Returns true on success or an error response on failure.
     */
    public function setBalanceReload(int $minBalance, int $reloadAmount): bool|ErrorResponse
    {
        $params = [
            'min_balance' => $minBalance,
            'reload_amount' => $reloadAmount,
        ];

        $response = $this->query('account/setbalancereload', $params, 'PUT');
        return $this->handleResponse($response);
    }

    /**
     * Refill account balance with a specified amount and mode.
     *
     * @param int $amount Amount to refill.
     * @param string $mode Refill mode (default is 'all').
     * @return bool|ErrorResponse Returns true on success or an error response on failure.
     */
    public function refillBalance(int $amount, string $mode = 'all'): bool|ErrorResponse
    {
        $params = [
            'amount' => $amount,
            'mode'   => $mode,
        ];

        $response = $this->query('account/refillbalance', $params, 'POST');
        return $this->handleResponse($response);
    }

    /**
     * Retrieve various rates for the account.
     *
     * @return AccountRates|ErrorResponse Returns account rates or an error response on failure.
     */
    public function getRates(): AccountRates|ErrorResponse
    {
        $response = $this->query('account/rates');
        return $this->handleResponse($response, AccountRates::class);
    }

    /**
     * Retrieve a list of countries for the account.
     *
     * @return AccountCountryList|ErrorResponse Returns the country list or an error response on failure.
     */
    public function countryList(): AccountCountryList|ErrorResponse
    {
        $response = $this->query('account/countrylist');
        return $this->handleResponse($response, AccountCountryList::class);
    }

    /**
     * Retrieve rate information for a specific country.
     *
     * @param int $countryId The ID of the country to retrieve rates for.
     * @return AccountLocationRate|ErrorResponse Returns location rates or an error response on failure.
     */
    public function countryRate(int $countryId): AccountLocationRate|ErrorResponse
    {
        $params = [
            'country_id' => $countryId,
        ];

        $response = $this->query('account/countryrate', $params);
        return $this->handleResponse($response, AccountLocationRate::class);
    }

    /**
     * Retrieve rates for zone 2 international calls.
     *
     * @return AccountLocationRate|ErrorResponse Returns international rates for zone 2 or an error response.
     */
    public function interRatesZone2(): AccountLocationRate|ErrorResponse
    {
        $response = $this->query('account/ratezone2');
        return $this->handleResponse($response, AccountLocationRate::class);
    }

    /**
     * Retrieve non-US international toll-free rates.
     *
     * @return AccountLocationRate|ErrorResponse Returns non-US toll-free rates or an error response.
     */
    public function nonUsInTfRate(): AccountLocationRate|ErrorResponse
    {
        $response = $this->query('account/nonusintfrate');
        return $this->handleResponse($response, AccountLocationRate::class);
    }
}
