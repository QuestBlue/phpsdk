<?php

namespace questbluesdk;

use questbluesdk\Models\AccountBalance;
use questbluesdk\Models\AccountDetail;
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

    public function setBalanceReload($minBalance, $reloadAmount)
    {
        $params = [
            'min_balance' => $minBalance,
            'reload_amount' => $reloadAmount,
        ];
        return $this->query('account/setbalancereload', $params, 'PUT');
    }

    public function refillBalance($amount, $mode = 'all')
    {
        $params = [
            'amount' => $amount,
            'mode'   => $mode
        ];

        return $this->query('account/refillbalance',  $params, 'POST');
    }

    public function getRates()
    {
        return $this->query('account/rates');
    }

    public function countryList()
    {
        return $this->query('account/countrylist');
    }

    public function countryRate($countryId)
    {
        $params = [
            'country_id'  => $countryId,
        ];

        return $this->query('account/countryrate', $params);
    }

    public function interRatesZone2()
    {
        return $this->query('account/ratezone2');
    }

    public function nonUsInTfRate()
    {
        return $this->query('account/nonusintfrate');
    }
}
