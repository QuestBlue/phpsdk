<?php

namespace questbluesdk\Models\Responses\Dids;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class AvailableDidsResponse extends BaseResponse
{
    #[Type(name: "int")]
    private int $total;

    #[Type(name: "array<string>")]
    protected array $data;

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
