<?php

namespace questbluesdk\Models\Responses\IFaxPro;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class IFaxProRateCentersResponse extends BaseResponse
{
    #[Type(name: "int")]
    private int $total;

    #[Type(name: "array<string, string>")]
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
