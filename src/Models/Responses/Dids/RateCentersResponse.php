<?php

namespace questbluesdk\Models\Responses\Dids;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class RateCentersResponse extends BaseResponse
{
    #[Type(name: 'int')]
    private int $total;

    #[Type(name: 'array')]
    private array $data;


    public function getTotal(): int
    {
        return $this->total;
    }//end getTotal()


    public function getData(): array
    {
        return $this->data;
    }//end getData()
}//end class
