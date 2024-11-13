<?php

namespace questbluesdk\Models\Responses\InterDids;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class InterDidListResponse extends BaseResponse
{

    #[Type(name: "int")]
    #[SerializedName("total")]
    protected int $total;

    #[Type(name: "int")]
    #[SerializedName("total_pages")]
    protected int $totalPages;

    #[Type(name: "int")]
    #[SerializedName("current_page")]
    protected int $currentPage;

    #[Type(name: "array")]
    #[SerializedName("data")]
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