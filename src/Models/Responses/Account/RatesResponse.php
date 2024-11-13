<?php

namespace questbluesdk\Models\Responses\Account;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\Account\Data\RateData;
use questbluesdk\Models\Responses\BaseResponse;

class RatesResponse extends BaseResponse
{

    #[Type(name: 'questbluesdk\Models\Responses\Account\Data\RateData')]
    private RateData $data;


    public function getData(): RateData
    {
        return $this->data;

    }//end getData()


}//end class
