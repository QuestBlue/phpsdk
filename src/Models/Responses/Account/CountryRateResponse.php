<?php

namespace questbluesdk\Models\Responses\Account;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class CountryRateResponse extends BaseResponse
{

    #[Type(name: 'array<questbluesdk\Models\Responses\Account\Data\CountryRateData>')]
    protected array $data;


    public function getData(): array
    {
        return $this->data;

    }//end getData()


}//end class
