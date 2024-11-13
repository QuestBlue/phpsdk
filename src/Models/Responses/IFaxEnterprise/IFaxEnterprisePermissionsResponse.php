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
    }

    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
