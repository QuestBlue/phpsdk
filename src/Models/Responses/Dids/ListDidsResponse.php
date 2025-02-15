<?php

namespace questbluesdk\Models\Responses\Dids;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class ListDidsResponse extends BaseResponse
{
    #[Type(name: "int")]
    private int $total;

    #[Type(name: "int")]
    private int $totalPages;

    #[Type(name: "int")]
    private int $currentPage;

    #[Type(name: "array<questbluesdk\Models\Responses\Dids\Data\DidData>")]
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
