<?php

namespace questbluesdk\Models\Responses\Reports;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class CallHistoryResponse extends BaseResponse
{

    #[Type(name: 'int')]
    protected int $total;

    #[Type(name: 'array<questbluesdk\Models\Responses\Reports\Data\CallHistoryData>')]
    protected array $data;


    public function getTotal(): int
    {
        return $this->total;

    }//end getTotal()


    public function getData(): array
    {
        return $this->data;

    }//end getData()


}//end class
