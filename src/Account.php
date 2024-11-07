<?php

namespace questbluesdk;

use questbluesdk\Models\AccountBalance;
use questbluesdk\Models\AccountCountryList;
use questbluesdk\Models\AccountLocationRate;
use questbluesdk\Models\AccountDetail;
use questbluesdk\Models\AccountRates;
use questbluesdk\Models\ErrorResponse;

class Account extends Connect
{
    public function getAccountDetails(): AccountDetail|ErrorResponse
    {
        $response = $this->query('account/getaccoundetails');
        return $this->handleResponse($response, AccountDetail::class);
    }

    public function setLowBalanceAlert(int $amount): bool|ErrorResponse
    {
        $params = [
            'low_balance_alert_amount' => $amount,
        ];

        $response = $this->query('account/setlowbalancealert', $params, 'PUT');

        return $this->handleResponse($response);
    }

    public function setDailyBalanceAlert(string $action): bool|ErrorResponse
    {
        $params = [
            'action' => $action,
        ];

        $response = $this->query('account/setdailybalancealert', $params, 'PUT');

        return $this->handleResponse($response);
    }

    public function getAccountBalance(): AccountBalance|ErrorResponse
    {
        $response = $this->query('account/getbalance');

        return $this->handleResponse($response, AccountDetail::class);
    }

    public function setAutorefill(string $autorefill): bool|ErrorResponse
    {
        $params = [
            'autorefill' => $autorefill,
        ];

        $response = $this->query('account/setautorefill', $params, 'PUT');

        return $this->handleResponse($response);
    }

    public function setBalanceReload(int $minBalance, int $reloadAmount): bool|ErrorResponse
    {
        $params = [
            'min_balance' => $minBalance,
            'reload_amount' => $reloadAmount,
        ];

        $response = $this->query('account/setbalancereload', $params, 'PUT');

        return $this->handleResponse($response);
    }

    public function refillBalance(int $amount, string $mode = 'all'): bool|ErrorResponse
    {
        $params = [
            'amount' => $amount,
            'mode'   => $mode
        ];

        $response = $this->query('account/refillbalance',  $params, 'POST');

        return $this->handleResponse($response);
    }

    public function getRates(): AccountRates|ErrorResponse
    {
        $response = $this->query('account/rates');
        return $this->handleResponse($response, AccountRates::class);
    }

    public function countryList(): AccountCountryList|ErrorResponse
    {
        $response = $this->query('account/countrylist');
        return $this->handleResponse($response, AccountCountryList::class);
    }

    public function countryRate(int $countryId): AccountLocationRate|ErrorResponse
    {
        $params = [
            'country_id'  => $countryId,
        ];

        $response = $this->query('account/countryrate', $params);

        return $this->handleResponse($response, AccountLocationRate::class);
    }

    public function interRatesZone2(): AccountLocationRate|ErrorResponse
    {
        $response = $this->query('account/ratezone2');

        return $this->handleResponse($response, AccountLocationRate::class);
    }

    public function nonUsInTfRate(): AccountLocationRate|ErrorResponse
    {
        $response = $this->query('account/nonusintfrate');

        return $this->handleResponse($response, AccountLocationRate::class);
    }
}
