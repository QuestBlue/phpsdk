<?php

namespace questbluesdk\Models\Responses\Account;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class NonUsTfRateResponse extends BaseResponse
{
    #[Type(name: "array<questbluesdk\Models\Responses\Account\Data\NonUsTfRateData>")]
    private array $data;

    public function getData(): array
    {
        return $this->data;
    }
}
