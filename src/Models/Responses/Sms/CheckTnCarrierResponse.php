<?php

namespace questbluesdk\Models\Responses\Sms;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class CheckTnCarrierResponse extends BaseResponse
{
    #[Type(name: "int")]
    protected int $total;

    #[Type(name: "array<questbluesdk\Models\Responses\Sms\Data\TnCarrierData>")]
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
