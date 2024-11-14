<?php

namespace questbluesdk\tests;

use PHPUnit\Framework\TestCase;
use questbluesdk\Api\Dids;
use questbluesdk\Models\Requests\Dids\ListAvailableDidsRequest;
use questbluesdk\Models\Requests\Dids\ListRateCentersRequest;
use questbluesdk\Models\Requests\Dids\OrderDidRequest;
use questbluesdk\Models\Requests\Dids\UpdateDidRequest;
use questbluesdk\tests\Traits\AssertNoUninitializedPropertiesTrait;
use ReflectionClass;

class DidsApiTest extends TestCase
{
    use AssertNoUninitializedPropertiesTrait;


    public function testListDids()
    {
        $response = (new Dids())->listDids('', 25, 1);
        $this->assertNotNull($response, 'Expected a non-null response');
        $this->assertNotEmpty($response, 'Expected a non-empty response');
        $this->assertNoUninitializedProperties($response);
        var_dump($response);
    }//end testListDids()


    public function testUpdateDid()
    {
        $request  = (new UpdateDidRequest())->setDid('1234567890')->setNote('Updated DID note');
        $response = (new Dids())->updateDid($request);
        $this->assertTrue($response, 'Expected the DID update to succeed');
        var_dump($response);
    }//end testUpdateDid()


    public function testOrderDid()
    {
        $request  = (new OrderDidRequest(
            did: '1234567890',
            faxName: 'Test Fax',
            faxEmail: 'test@example.com',
            faxLogin: 'testlogin',
            faxPassword: 'securepassword123',
            note: 'Test DID Order',
            pin: '1234',
            isFull: 'yes',
            reportAtt: 'yes'
        ))->setNote('Updated DID note');
        $response = (new Dids())->orderDid($request);
        $this->assertTrue($response, 'Expected the DID order to succeed');
        var_dump($response);
    }//end testOrderDid()


    public function testDeleteDid()
    {
        $response = (new Dids())->deleteDid('1234567890');
        $this->assertTrue($response, 'Expected the DID deletion to succeed');
    }//end testDeleteDid()


    public function testGetAvailableStates()
    {
        $response = (new Dids())->getAvailableStates();
        $this->assertNotNull($response, 'Expected a non-null response for available states');
        $this->assertNotEmpty($response->toArray(), 'Expected a non-empty response for available states');
        $this->assertNoUninitializedProperties($response);
        var_dump($response->toArray());
    }//end testGetAvailableStates()


    public function testGetRateCenters()
    {
        $request  = (new ListRateCentersRequest(12, 'SC'))->setState('SC');
        $response = (new Dids())->getRateCenters($request);
        $this->assertNotNull($response, 'Expected a non-null response for rate centers');
        var_dump($response->toArray());
    }//end testGetRateCenters()


    public function testGetAvailableDids()
    {
        $request  = (new ListAvailableDidsRequest(type: 'tf'));
        $response = (new Dids())->getAvailableDids($request);
        $this->assertNotNull($response, 'Expected a non-null response for available DIDs');
        $this->assertNoUninitializedProperties($response);
        var_dump($response->toArray());
    }//end testGetAvailableDids()


    public function testMoveToFax()
    {
        $response = (new Dids())->moveToFax('1234567890');
        $this->assertTrue($response, 'Expected the DID to be moved to fax successfully');
    }//end testMoveToFax()


    public function testFraudValidate()
    {
        $numbers = [
            '1234567890',
            '0987654321',
        ];
        $response = (new Dids())->fraudValidate($numbers);
        $this->assertNotNull($response, 'Expected a non-null response for fraud validation');
        $this->assertNotEmpty($response->toArray(), 'Expected a non-empty response for fraud validation');
        $this->assertNoUninitializedProperties($response);
        var_dump($response->toArray());
    }//end testFraudValidate()
}//end class
