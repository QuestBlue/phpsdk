<?php

namespace questbluesdk\Models\Responses\Account;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class CountryListResponse extends BaseResponse
{
    #[Type(name: "array<questbluesdk\Models\Responses\Account\Data\CountryData>")]
    private array $data = [];

    public function getData(): array
    {
        return $this->data;
    }
}
