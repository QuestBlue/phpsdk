<?php

namespace questbluesdk\tests;

use PHPUnit\Framework\TestCase;
use questbluesdk\Api\Sms;
use questbluesdk\Models\Requests\Sms\GetSmsHistoryRequest;
use questbluesdk\Models\Requests\Sms\ManageOffnetSmsServiceRequest;
use questbluesdk\Models\Requests\Sms\SendSmsRequest;
use questbluesdk\Models\Requests\Sms\UpdateSmsConfigV1Request;
use questbluesdk\Models\Requests\Sms\UpdateSmsConfigV2Request;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\Sms\ListSmsSupportedDidsResponse;
use questbluesdk\Models\Responses\Sms\UpdateSmsSettingsResponse;
use questbluesdk\Models\Responses\Sms\SendSmsMmsResponse;
use questbluesdk\Models\Responses\Sms\RetrieveOffnetSmsServiceStatusResponse;
use questbluesdk\Models\Responses\Sms\RetrieveSmsHistoryResponse;
use questbluesdk\Models\Responses\Sms\RetrieveMessageDeliveryStatusResponse;

class SmsApiTest extends TestCase
{
    private Sms $sms;

    protected function setUp(): void
    {
        $this->sms = new Sms();
    }

    public function testListAvailableDids()
    {
        $response = $this->sms->listAvailableDids();
        $this->assertNotNull($response);

        if ($response instanceof ListSmsSupportedDidsResponse) {
            $this->assertInstanceOf(ListSmsSupportedDidsResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
        var_dump($response);
    }

    public function testUpdateSmsConfigV1()
    {
        $request = new UpdateSmsConfigV1Request('did', 'smsmode');
        $response = $this->sms->updateSmsConfigV1($request);
        $this->assertNotNull($response);

        if ($response instanceof UpdateSmsSettingsResponse) {
            $this->assertInstanceOf(UpdateSmsSettingsResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
    }

    public function testUpdateSmsConfigV2()
    {
        $request = new UpdateSmsConfigV2Request('did', 'smsmode', 'sms_v2_value');
        $response = $this->sms->updateSmsConfigV2($request);
        $this->assertNotNull($response);

        if ($response instanceof UpdateSmsSettingsResponse) {
            $this->assertInstanceOf(UpdateSmsSettingsResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
    }

    public function testDeliveryStatus()
    {
        $response = $this->sms->deliveryStatus('sampleMsgId');
        $this->assertNotNull($response);

        if ($response instanceof RetrieveMessageDeliveryStatusResponse) {
            $this->assertInstanceOf(RetrieveMessageDeliveryStatusResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
        var_dump($response);
    }

    public function testSendMsg()
    {
        $request = new SendSmsRequest('did_from', 'did_to', 'message');
        $response = $this->sms->sendMsg($request);
        $this->assertNotNull($response);

        if ($response instanceof SendSmsMmsResponse) {
            $this->assertInstanceOf(SendSmsMmsResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
        var_dump($response);
    }

    public function testManageOffnetSmsService()
    {
        $request = new ManageOffnetSmsServiceRequest('did', 'offnet_action');
        $response = $this->sms->manageOffnetSmsService($request);
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
    }

    public function testStatusOffnetSmsService()
    {
        $response = $this->sms->statusOffnetSmsService('sampleDID');
        $this->assertNotNull($response);

        if ($response instanceof RetrieveOffnetSmsServiceStatusResponse) {
            $this->assertInstanceOf(RetrieveOffnetSmsServiceStatusResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
        var_dump($response);
    }

    public function testGetSmsHistory()
    {
        $request = new GetSmsHistoryRequest();
        $response = $this->sms->getSmsHistory($request);
        $this->assertNotNull($response);

        if ($response instanceof RetrieveSmsHistoryResponse) {
            $this->assertInstanceOf(RetrieveSmsHistoryResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail("Error response received: " . $response->getMessage());
        }
        var_dump($response);
    }
}