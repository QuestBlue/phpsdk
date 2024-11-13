<?php

namespace questbluesdk\Models\Responses\Account;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class RateZone2Response extends BaseResponse
{

    #[Type(name: 'array<questbluesdk\Models\Responses\Account\Data\RateZone2Data>')]
    protected array $data;


    public function getData(): array
    {
        return $this->data;

    }//end getData()


}//end class
