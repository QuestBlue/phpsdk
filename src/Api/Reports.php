<?php

namespace questbluesdk\Api;

use questbluesdk\ApiRequestExecutor;
use questbluesdk\Models\Requests\Reports\VoiceCallHistoryRequest;
use questbluesdk\Models\Requests\IFaxEnterprise\IFaxHistoryRequest;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterpriseHistoryResponse;
use questbluesdk\Models\Responses\Reports\CallHistoryResponse;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterprisePermissionsResponse;

/**
 * Class Reports
 * Provides access to call history and country lists, with optional filtering parameters.
 */
class Reports extends ApiRequestExecutor
{
    public function voiceCallHistory(VoiceCallHistoryRequest $request): CallHistoryResponse|ErrorResponse
    {
        $response = $this->get('callhistory', $request->toArray());
        return $this->parseResponse($response, CallHistoryResponse::class);
    }//end voiceCallHistory()


    public function faxHistory(IFaxHistoryRequest $request): IFaxEnterpriseHistoryResponse|ErrorResponse
    {
        $response = $this->get('faxhistory', $request->toArray());
        return $this->parseResponse($response, IFaxEnterpriseHistoryResponse::class);
    }//end faxHistory()


    public function faxDownload(string $faxId, string $period): bool|ErrorResponse
    {
        $response = $this->get('faxdownload', ['fax_id' => $faxId, 'period' => $period]);
        return $this->parseResponse($response);
    }//end faxDownload()
}//end class
