<?php

namespace questbluesdk\Models\Responses\IFaxEnterprise;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class IFaxEnterpriseGroupsResponse extends BaseResponse
{
    #[Type('int')]
    private int $total;

    #[Type('array<questbluesdk\Models\Responses\IFaxEnterprise\Data\GroupData>')]
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
