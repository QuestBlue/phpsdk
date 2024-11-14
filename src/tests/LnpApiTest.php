<?php

namespace questbluesdk\tests;

use PHPUnit\Framework\TestCase;
use questbluesdk\Api\Lnp;
use questbluesdk\Models\Requests\Lnp\CreateLnpRequest;
use questbluesdk\Models\Requests\Lnp\DeleteLnpRequest;
use questbluesdk\Models\Requests\Lnp\ListLnpRequest;
use questbluesdk\Models\Requests\Lnp\UpdateLnpRequest;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\Lnp\CheckPortabilityResponse;
use questbluesdk\Models\Responses\Lnp\CreateLnpResponse;
use questbluesdk\Models\Responses\Lnp\ListLnpResponse;

class LnpApiTest extends TestCase
{
    private Lnp $lnp;


    protected function setUp(): void
    {
        $this->lnp = new Lnp();
    }//end setUp()


    public function testCheckPortability()
    {
        $response = $this->lnp->checkPortability('1234567890');
        $this->assertNotNull($response);

        if ($response instanceof CheckPortabilityResponse) {
            $this->assertInstanceOf(CheckPortabilityResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }

        var_dump($response);
    }//end testCheckPortability()


    public function testCreateLnp()
    {
        $request  = new CreateLnpRequest(
            '1234567890',
            'john.doe@example.com',
            'John Doe'
        );
        $response = $this->lnp->createLnp($request);
        $this->assertNotNull($response);

        if ($response instanceof CreateLnpResponse) {
            $this->assertInstanceOf(CreateLnpResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }

        var_dump($response);
    }//end testCreateLnp()


    public function testListLnp()
    {
        $request  = new ListLnpRequest(
            25,
            1
        );
        $response = $this->lnp->listLnp($request);
        $this->assertNotNull($response);

        if ($response instanceof ListLnpResponse) {
            $this->assertInstanceOf(ListLnpResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }

        var_dump($response);
    }//end testListLnp()


    public function testUpdateLnp()
    {
        $request  = new UpdateLnpRequest(
            ['email' => 'updated.email@example.com'],
            'path',
        );
        $response = $this->lnp->updateLnp($request);
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }
    }//end testUpdateLnp()


    public function testDeleteLnp()
    {
        $request  = new DeleteLnpRequest(
            '1234567890'
        );
        $response = $this->lnp->deleteLnp($request);
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }
    }//end testDeleteLnp()
}//end class
