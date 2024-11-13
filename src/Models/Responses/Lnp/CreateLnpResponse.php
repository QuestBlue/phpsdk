<?php

namespace questbluesdk\Models\Responses\Lnp;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class CreateLnpResponse extends BaseResponse
{

    #[Type(name: 'array<questbluesdk\Models\Responses\Lnp\Data\CreateLnpData')]
    protected array $data = [];


    public function getData(): array
    {
        return $this->data;

    }//end getData()


}//end class
