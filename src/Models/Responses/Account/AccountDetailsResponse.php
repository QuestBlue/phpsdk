<?php

namespace questbluesdk\Models\Responses\Account;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\Account\Data\AccountDetailsData;
use questbluesdk\Models\Responses\BaseResponse;

class AccountDetailsResponse extends BaseResponse
{
    #[Type(name: 'questbluesdk\Models\Responses\Account\Data\AccountDetailsData')]
    private AccountDetailsData $data;


    public function getData(): AccountDetailsData
    {
        return $this->data;
    }//end getData()
}//end class
