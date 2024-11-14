<?php

namespace questbluesdk\Models\Responses\Account;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\Account\Data\BalanceData;
use questbluesdk\Models\Responses\BaseResponse;

class GetBalanceResponse extends BaseResponse
{
    #[Type(name: 'questbluesdk\Models\Responses\Account\Data\BalanceData')]
    private BalanceData $data;


    public function getData(): BalanceData
    {
        return $this->data;
    }//end getData()
}//end class
