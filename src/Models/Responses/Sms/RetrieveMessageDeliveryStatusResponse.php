<?php

namespace questbluesdk\Models\Responses\Sms;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;
use questbluesdk\Models\Responses\Sms\Data\DeliveryStatusData;

class RetrieveMessageDeliveryStatusResponse extends BaseResponse
{
    #[Type(name: 'questbluesdk\Models\Responses\Sms\Data\DeliveryStatusData')]
    protected DeliveryStatusData $data;


    public function getData(): DeliveryStatusData
    {
        return $this->data;
    }//end getData()
}//end class
