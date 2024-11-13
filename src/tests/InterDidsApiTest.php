<?php

namespace questbluesdk\tests;

use PHPUnit\Framework\TestCase;
use questbluesdk\Api\InterDids;
use questbluesdk\Models\Requests\Dids\OrderDidRequest;
use questbluesdk\Models\Requests\Dids\UpdateDidRequest;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\InterDids\CityListResponse;
use questbluesdk\Models\Responses\InterDids\CountryListResponse;
use questbluesdk\Models\Responses\InterDids\InterDidListResponse;

class InterDidsApiTest extends TestCase
{

    private InterDids $interDids;


    protected function setUp(): void
    {
        $this->interDids = new InterDids();

    }//end setUp()


    public function testGetCountryList()
    {
        $response = $this->interDids->getCountryList();
        $this->assertNotNull($response);

        if ($response instanceof CountryListResponse) {
            $this->assertInstanceOf(CountryListResponse::class, $response);
        } else if ($response instanceof ErrorResponse) {
            $this->fail('Error response received: '.$response->getMessage());
        }

        var_dump($response);

    }//end testGetCountryList()


    public function testGetCityList()
    {
        $response = $this->interDids->getCityList('US');
        $this->assertNotNull($response);

        if ($response instanceof CityListResponse) {
            $this->assertInstanceOf(CityListResponse::class, $response);
        } else if ($response instanceof ErrorResponse) {
            $this->fail('Error response received: '.$response->getMessage());
        }

        var_dump($response);

    }//end testGetCityList()


    public function testListDIDs()
    {
        $response = $this->interDids->listDIDs();
        $this->assertNotNull($response);

        var_dump($response);

    }//end testListDIDs()


    public function testUpdateDID()
    {
        $request  = new UpdateDidRequest();
        $response = $this->interDids->updateDID($request);
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } else if ($response instanceof ErrorResponse) {
            $this->fail('Error response received: '.$response->getMessage());
        }

    }//end testUpdateDID()


    public function testOrderDID()
    {
        $request = new OrderDidRequest(
            '1234567890',
            // DID number
            'mockuser',
            // Username
            'mockuser@example.com',
            // Email
            'US',
            // Country code
            '555-1234',
            // Phone number
            'Test Address',
            // Address
            'Test City',
            // City
            'TX',
            // State
            '12345',
            // Zip code
            'Any additional info'
            // Additional info
        );
        $response = $this->interDids->orderDID($request);
        $this->assertNotNull($response);

        if ($response instanceof InterDidListResponse) {
            $this->assertInstanceOf(InterDidListResponse::class, $response);
        } else if ($response instanceof ErrorResponse) {
            $this->fail('Error response received: '.$response->getMessage());
        }

        var_dump($response);

    }//end testOrderDID()


    public function testDeleteDID()
    {
        $response = $this->interDids->deleteDID('1234567890');
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } else if ($response instanceof ErrorResponse) {
            $this->fail('Error response received: '.$response->getMessage());
        }

    }//end testDeleteDID()


}//end class
