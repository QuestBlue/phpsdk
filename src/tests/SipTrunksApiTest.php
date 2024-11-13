<?php

namespace questbluesdk\tests;

use PHPUnit\Framework\TestCase;
use questbluesdk\Api\SipTrunks;
use questbluesdk\Models\Requests\SIPTrunk\BlockCallerRequest;
use questbluesdk\Models\Requests\SIPTrunk\CreateSIPTrunkRequest;
use questbluesdk\Models\Requests\SIPTrunk\UpdateSIPTrunkRequest;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\SIPTrunk\BlockedCallersResponse;
use questbluesdk\Models\Responses\SIPTrunk\SIPTrunkListResponse;
use questbluesdk\Models\Responses\SIPTrunk\SIPTrunkStatusResponse;

class SipTrunksApiTest extends TestCase
{
    private SipTrunks $sipTrunks;

    protected function setUp(): void
    {
        $this->sipTrunks = new SipTrunks();
    }

    public function testListSIPTrunks()
    {
        $response = $this->sipTrunks->listSIPTrunks();
        $this->assertNotNull($response);

        if ($response instanceof SIPTrunkListResponse) {
            $this->assertInstanceOf(SIPTrunkListResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
        var_dump($response);
    }

    public function testUpdateSIPTrunk()
    {
        $request = new UpdateSIPTrunkRequest();
        $response = $this->sipTrunks->updateSIPTrunk($request);
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
    }

    public function testCreateSIPTrunk()
    {
        $request = new CreateSIPTrunkRequest();
        $response = $this->sipTrunks->createSIPTrunk($request);
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
    }

    public function testDeleteSIPTrunk()
    {
        $response = $this->sipTrunks->deleteSIPTrunk('exampleTrunk');
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
    }

    public function testCheckRegistrationStatus()
    {
        $response = $this->sipTrunks->checkRegistrationStatus('exampleTrunk');
        $this->assertNotNull($response);

        if ($response instanceof SIPTrunkStatusResponse) {
            $this->assertInstanceOf(SIPTrunkStatusResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
        var_dump($response);
    }

    public function testBlockCaller()
    {
        $request = new BlockCallerRequest('did', 'action', 'reason');
        $response = $this->sipTrunks->blockCaller($request);
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
    }

    public function testListBlockedCallers()
    {
        $response = $this->sipTrunks->listBlockedCallers();
        $this->assertNotNull($response);

        if ($response instanceof BlockedCallersResponse) {
            $this->assertInstanceOf(BlockedCallersResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
        var_dump($response);
    }
}