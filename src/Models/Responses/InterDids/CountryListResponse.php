<?php

namespace questbluesdk\Models\Responses\InterDids;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class CountryListResponse extends BaseResponse
{
    #[Type(name: "int")]
    private int $total;

    #[Type(name: "array<string>")]
    private array $data;

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getData(): array
    {
        return $this->data;
    }
}