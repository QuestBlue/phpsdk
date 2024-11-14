<?php

namespace questbluesdk\Api;

use questbluesdk\ApiRequestExecutor;
use questbluesdk\Models\Responses\Account\AccountDetailsResponse;
use questbluesdk\Models\Responses\Account\GetBalanceResponse;
use questbluesdk\Models\Responses\Account\RatesResponse;
use questbluesdk\Models\Responses\Account\CountryListResponse;
use questbluesdk\Models\Responses\Account\CountryRateResponse;
use questbluesdk\Models\Responses\Account\RateZone2Response;
use questbluesdk\Models\Responses\Account\NonUsTfRateResponse;
use questbluesdk\Models\Responses\Account\CallbackConfigResponse;
use questbluesdk\Models\Responses\Error\ErrorResponse;

/**
 * Class Account
 * Handles various account-related operations, such as retrieving account details, managing balance alerts,
 * handling auto-refill settings, and fetching rates.
 */
class Account extends ApiRequestExecutor
{
    public function getAccountDetails(): AccountDetailsResponse|ErrorResponse
    {
        $response = $this->get('account/getaccoundetails');
        return $this->parseResponse($response, AccountDetailsResponse::class);
    }//end getAccountDetails()


    public function setLowBalanceAlert(int $amount): bool|ErrorResponse
    {
        $response = $this->put('account/setlowbalancealert', ['low_balance_alert_amount' => $amount]);
        return $this->parseResponse($response);
    }//end setLowBalanceAlert()


    public function setDailyBalanceAlert(string $action): bool|ErrorResponse
    {
        $response = $this->put('account/setdailybalancealert', ['action' => $action]);
        return $this->parseResponse($response);
    }//end setDailyBalanceAlert()


    public function getBalance(): GetBalanceResponse|ErrorResponse
    {
        $response = $this->get('account/getbalance');
        return $this->parseResponse($response, GetBalanceResponse::class);
    }//end getBalance()


    public function setAutorefill(string $autorefill): bool|ErrorResponse
    {
        $response = $this->put('account/setautorefill', ['autorefill' => $autorefill]);
        return $this->parseResponse($response);
    }//end setAutorefill()


    public function setBalanceReload(int $minBalance, int $reloadAmount): bool|ErrorResponse
    {
        $response = $this->put('account/setbalancereload', ['min_balance' => $minBalance, 'reload_amount' => $reloadAmount]);
        return $this->parseResponse($response);
    }//end setBalanceReload()


    public function refillBalance(int $amount, string $mode = 'all'): bool|ErrorResponse
    {
        $response = $this->post('account/refillbalance', ['amount' => $amount, 'mode' => $mode]);
        return $this->parseResponse($response);
    }//end refillBalance()


    public function getRates(): RatesResponse|ErrorResponse
    {
        $response = $this->get('account/rates');
        return $this->parseResponse($response, RatesResponse::class);
    }//end getRates()


    public function getCountryList(): CountryListResponse|ErrorResponse
    {
        $response = $this->get('account/countrylist');
        return $this->parseResponse($response, CountryListResponse::class);
    }//end getCountryList()


    public function getCountryRate(int $countryId): CountryRateResponse|ErrorResponse
    {
        $response = $this->get('account/countryrate', ['country_id' => $countryId]);
        return $this->parseResponse($response, CountryRateResponse::class);
    }//end getCountryRate()


    public function getRateZone2CountryList(): RateZone2Response|ErrorResponse
    {
        $response = $this->get('account/ratezone2', ['country_list_only' => 'on']);
        return $this->parseResponse($response, RateZone2Response::class);
    }//end getRateZone2CountryList()


    public function getNonUsInTfRate(): NonUsTfRateResponse|ErrorResponse
    {
        $response = $this->get('account/nonusintfrate');
        return $this->parseResponse($response, NonUsTfRateResponse::class);
    }//end getNonUsInTfRate()


    public function getCallbackConfig(): CallbackConfigResponse|ErrorResponse
    {
        $response = $this->get('account/callbackstatus');
        return $this->parseResponse($response, CallbackConfigResponse::class);
    }//end getCallbackConfig()
}//end class
