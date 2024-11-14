<?php

namespace questbluesdk\Models\Responses\IFaxEnterprise;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class IFaxEnterprisePermissionsResponse extends BaseResponse
{
    #[Type('int')]
    private int $total;

    #[Type('int')]
    private int $totalPages;

    #[Type('int')]
    private int $currentPage;

    #[Type('array<questbluesdk\Models\Responses\IFaxEnterprise\Data\PermissionData>')]
    private array $data;


    public function getTotal(): int
    {
        return $this->total;
    }//end getTotal()


    public function getTotalPages(): int
    {
        return $this->totalPages;
    }//end getTotalPages()


    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }//end getCurrentPage()


    public function getData(): array
    {
        return $this->data;
    }//end getData()
}//end class
