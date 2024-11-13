<?php

namespace questbluesdk\tests;

use PHPUnit\Framework\TestCase;
use questbluesdk\Api\Account;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\tests\Traits\AssertNoUninitializedPropertiesTrait;
use ReflectionObject;

class AccountApiTest extends TestCase
{

    use AssertNoUninitializedPropertiesTrait;

    private Account $account;


    protected function setUp(): void
    {
        $this->account = new Account();

    }//end setUp()


    public function testGetAccountDetails()
    {
        $response = $this->account->getAccountDetails();
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertNoUninitializedProperties($response);

    }//end testGetAccountDetails()


    public function testSetLowBalanceAlert()
    {
        $response = $this->account->setLowBalanceAlert(10);
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertTrue($response);

    }//end testSetLowBalanceAlert()


    public function testSetDailyBalanceAlert()
    {
        $response = $this->account->setDailyBalanceAlert('on');
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertTrue($response);

    }//end testSetDailyBalanceAlert()


    public function testGetBalance()
    {
        $response = $this->account->getBalance();
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertNoUninitializedProperties($response);

    }//end testGetBalance()


    public function testSetAutorefill()
    {
        $response = $this->account->setAutorefill('on');
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertTrue($response);

    }//end testSetAutorefill()


    public function testSetBalanceReload()
    {
        $response = $this->account->setBalanceReload(20, 50);
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertTrue($response);

    }//end testSetBalanceReload()


    public function testRefillBalance()
    {
        $response = $this->account->refillBalance(50);
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertTrue($response);

    }//end testRefillBalance()


    public function testGetRates()
    {
        $response = $this->account->getRates();
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertNoUninitializedProperties($response);

    }//end testGetRates()


    public function testGetCountryList()
    {
        $response = $this->account->getCountryList();
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertNoUninitializedProperties($response);
        var_dump($response);

    }//end testGetCountryList()


    public function testCountryRate()
    {
        $response = $this->account->getCountryRate(2689);
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertNoUninitializedProperties($response);
        var_dump($response);

    }//end testCountryRate()


    public function testGetRateZone2CountryList()
    {
        $response = $this->account->getRateZone2CountryList();
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertNoUninitializedProperties($response);

    }//end testGetRateZone2CountryList()


    public function testNonUsInTfRate()
    {
        $response = $this->account->getNonUsInTfRate();
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertNoUninitializedProperties($response);

    }//end testNonUsInTfRate()


    public function testGetCallbackConfig()
    {
        $response = $this->account->getCallbackConfig();
        $this->assertNotInstanceOf(ErrorResponse::class, $response, 'Expected success response');
        $this->assertNoUninitializedProperties($response);

    }//end testGetCallbackConfig()


}//end class
