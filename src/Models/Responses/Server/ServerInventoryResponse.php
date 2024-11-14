<?php

namespace questbluesdk\Models\Responses\Server;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class ServerInventoryResponse extends BaseResponse
{
    #[Type(name: "int")]
    private int $total;

    #[Type(name: "array<questbluesdk\Models\Data\Server\ServerData>")]
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
