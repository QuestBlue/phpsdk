<?php

namespace questbluesdk\Models\Responses\Dids;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class RateCentersResponse extends BaseResponse
{
    #[Type(name: "int")]
    private int $total;

    #[Type(name: "array")]
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
