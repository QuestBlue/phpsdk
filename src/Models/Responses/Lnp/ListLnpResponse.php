<?php

namespace questbluesdk\Models\Responses\Lnp;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;
use questbluesdk\Models\Responses\BaseResponse;

class ListLnpResponse extends BaseResponse
{
    #[Type("int")]
    protected int $total;

    #[Type("int")]
    #[SerializedName("total_pages")]
    protected int $totalPages;

    #[Type("int")]
    #[SerializedName("current_page")]
    protected int $currentPage;

    #[Type("array<questbluesdk\Models\Responses\Lnp\Data\LnpResponseData>")]
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
