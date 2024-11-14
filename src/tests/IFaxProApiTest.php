<?php

namespace questbluesdk\tests;

use PHPUnit\Framework\TestCase;
use questbluesdk\Api\IFaxPro;
use questbluesdk\Models\Requests\Dids\UpdateDidRequest;
use questbluesdk\Models\Requests\IFaxPro\GetAvailableDIDsRequest;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\IFaxPro\IFaxProAvailableStatesResponse;
use questbluesdk\Models\Responses\IFaxPro\IFaxProOrderedDidsListResponse;
use questbluesdk\Models\Responses\IFaxPro\IFaxProRateCentersResponse;
use questbluesdk\Models\Responses\IFaxPro\SendIFaxProResponse;

class IFaxProApiTest extends TestCase
{
    private IFaxPro $ifaxPro;

    protected function setUp(): void
    {
        $this->ifaxPro = new IFaxPro();
    }

    public function testGetAvailableStates()
    {
        $response = $this->ifaxPro->getAvailableStates();
        $this->assertNotNull($response);

        if ($response instanceof IFaxProAvailableStatesResponse) {
            $this->assertInstanceOf(IFaxProAvailableStatesResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
        var_dump($response);
    }

    public function testGetRateCenters()
    {
        $response = $this->ifaxPro->getRateCenters('NY');
        $this->assertNotNull($response);

        if ($response instanceof IFaxProRateCentersResponse) {
            $this->assertInstanceOf(IFaxProRateCentersResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
        var_dump($response);
    }

    public function testGetAvailableDIDs()
    {
        $request = new GetAvailableDIDsRequest('tf');
        $response = $this->ifaxPro->getAvailableDIDs($request);

        $this->assertNotNull($response);

        var_dump($response);
    }

    public function testListOrderedDIDs()
    {
        $response = $this->ifaxPro->listOrderedDIDs();
        $this->assertNotNull($response);
        var_dump($response);
    }

    public function testUpdateDid()
    {
        $request = new UpdateDidRequest();
        $response = $this->ifaxPro->updateDid($request);
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
    }

    public function testPauseFaxAcc()
    {
        $response = $this->ifaxPro->pauseFaxAcc('1234567890', 'pause');
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
    }

    public function testDeleteDid()
    {
        $response = $this->ifaxPro->deleteDid('1234567890');
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
    }

    public function testSendFax()
    {
        $filePath = "./bill.pdf";
        file_put_contents($filePath, '%PDF-1.4 test document');

        $response = $this->ifaxPro->sendFax('1234567890', '0987654321', $filePath);
        unlink($filePath);

        $this->assertNotNull($response);

        var_dump($response);
    }

    public function testMoveToVoice()
    {
        $response = $this->ifaxPro->moveToVoice('1234567890');
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
    }
}
