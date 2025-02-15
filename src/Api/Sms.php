<?php

namespace questbluesdk\Api;

use questbluesdk\ApiRequestExecutor;
use questbluesdk\Models\Requests\Sms\GetSmsHistoryRequest;
use questbluesdk\Models\Requests\Sms\ManageOffnetSmsServiceRequest;
use questbluesdk\Models\Requests\Sms\SendSmsRequest;
use questbluesdk\Models\Requests\Sms\UpdateSmsConfigV2Request;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\Sms\ListSmsSupportedDidsResponse;
use questbluesdk\Models\Responses\Sms\UpdateSmsSettingsResponse;
use questbluesdk\Models\Responses\Sms\SendSmsMmsResponse;
use questbluesdk\Models\Responses\Sms\RetrieveOffnetSmsServiceStatusResponse;
use questbluesdk\Models\Responses\Sms\RetrieveSmsHistoryResponse;
use questbluesdk\Models\Responses\Sms\RetrieveMessageDeliveryStatusResponse;

/**
 * Class Sms
 * Manages SMS-related operations, including configuration updates, message sending, and off-network service management.
 */
class Sms extends ApiRequestExecutor
{
    public function listAvailableDids(?string $did = null, int $perPage = 10): ListSmsSupportedDidsResponse|ErrorResponse
    {
        $response = $this->get('sms', ['did' => $did, 'per_page' => $perPage]);
        return $this->parseResponse($response, ListSmsSupportedDidsResponse::class);
    }

    public function updateSmsConfigV2(UpdateSmsConfigV2Request $request): UpdateSmsSettingsResponse|ErrorResponse
    {
        $response = $this->put('smsv2', $request->toArray());
        return $this->parseResponse($response, UpdateSmsSettingsResponse::class);
    }

    public function deliveryStatus(string $msgId): RetrieveMessageDeliveryStatusResponse|ErrorResponse
    {
        $response = $this->get('smsv2/deliverystatus', ['msg_id' => $msgId]);
        return $this->parseResponse($response, RetrieveMessageDeliveryStatusResponse::class);
    }

    public function sendMsg(SendSmsRequest $request): SendSmsMmsResponse|ErrorResponse
    {
        $response = $this->post('smsv2', $request->toArray());
        return $this->parseResponse($response, SendSmsMmsResponse::class);
    }

    public function manageOffnetSmsService(ManageOffnetSmsServiceRequest $request): bool|ErrorResponse
    {
        $response = $this->post('sms/offnetorder', $request->toArray());
        return $this->parseResponse($response);
    }

    public function statusOffnetSmsService(string $did): RetrieveOffnetSmsServiceStatusResponse|ErrorResponse
    {
        $response = $this->get('sms/offnetstatus', ['did' => $did]);
        return $this->parseResponse($response, RetrieveOffnetSmsServiceStatusResponse::class);
    }

    public function getSmsHistory(GetSmsHistoryRequest $request): RetrieveSmsHistoryResponse|ErrorResponse
    {
        $response = $this->get('sms', $request->toArray());
        return $this->parseResponse($response, RetrieveSmsHistoryResponse::class);
    }
}
