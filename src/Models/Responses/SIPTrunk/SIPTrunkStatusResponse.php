<?php

namespace questbluesdk\Models\Responses\SIPTrunk;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class SIPTrunkStatusResponse extends BaseResponse
{
    #[Type(name: "int")]
    private int $total;

    #[Type(name: "string")]
    private string $res;

    #[Type(name: "array")]
    private array $data;

    public function getTotal(): int
    {
        return $this->total;
    }

    public function getRes(): string
    {
        return $this->res;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
