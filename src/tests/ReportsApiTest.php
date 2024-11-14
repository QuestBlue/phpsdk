<?php

namespace questbluesdk\tests;

use PHPUnit\Framework\TestCase;
use questbluesdk\Api\Reports;
use questbluesdk\Models\Requests\IFaxEnterprise\IFaxHistoryRequest;
use questbluesdk\Models\Requests\Reports\VoiceCallHistoryRequest;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterprisePermissionsResponse;
use questbluesdk\tests\Traits\AssertNoUninitializedPropertiesTrait;

class ReportsApiTest extends TestCase
{
    use AssertNoUninitializedPropertiesTrait;


    public function testVoiceCallHistory()
    {
        $request  = (new VoiceCallHistoryRequest());
        $response = (new Reports())->voiceCallHistory($request);

        $this->assertNotNull($response, 'Expected a non-null response');
        $this->assertNotEmpty($response->getData(), 'Expected data in the response');
        var_dump($response);
    }//end testVoiceCallHistory()


    public function testFaxHistory()
    {
        $request  = new IFaxHistoryRequest();
        $response = (new Reports())->faxHistory($request);

        $this->assertNoUninitializedProperties($response);
        $this->assertNotNull($response, 'Expected a non-null response');
        var_dump($response->toArray());
    }//end testFaxHistory()


    public function testFaxDownload()
    {
        $faxId    = '12345';
        $period   = '2023-08';
        $response = (new Reports())->faxDownload($faxId, $period);
        $this->assertNotNull($response, 'Expected a non-null response');

        if ($response instanceof ErrorResponse) {
            $this->assertInstanceOf(ErrorResponse::class, $response, 'Expected an error response');
        } else {
            $this->assertTrue($response, 'Expected a successful download response');
        }
    }//end testFaxDownload()
}//end class
