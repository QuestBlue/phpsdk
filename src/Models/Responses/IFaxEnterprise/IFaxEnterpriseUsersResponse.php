<?php

namespace questbluesdk\Models\Responses\IFaxEnterprise;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use questbluesdk\Models\Responses\BaseResponse;

class IFaxEnterpriseUsersResponse extends BaseResponse
{
    #[Type('int')]
    private int $total;

    #[Type('int')]
    #[SerializedName('total_pages')]
    private int $totalPages;

    #[Type('int')]
    #[SerializedName('current_page')]
    private int $currentPage;

    #[Type('array<questbluesdk\Models\Responses\IFaxEnterprise\Data\UserData>')]
    protected array $data;

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
