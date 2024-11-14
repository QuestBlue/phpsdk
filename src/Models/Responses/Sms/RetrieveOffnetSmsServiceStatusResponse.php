<?php

namespace questbluesdk\Models\Responses\Sms;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;
use questbluesdk\Models\Responses\Sms\Data\OffnetStatusData;

class RetrieveOffnetSmsServiceStatusResponse extends BaseResponse
{
    #[Type(name: 'questbluesdk\Models\Responses\Sms\Data\OffnetStatusData')]
    protected OffnetStatusData $data;


    public function getData(): OffnetStatusData
    {
        return $this->data;
    }//end getData()
}//end class
