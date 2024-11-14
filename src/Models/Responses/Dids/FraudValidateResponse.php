<?php

namespace questbluesdk\Models\Responses\Dids;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class FraudValidateResponse extends BaseResponse
{
    #[Type(name: "array<questbluesdk\Models\Responses\Dids\Data\FraudRiskData>")]
    protected array $data;

    public function getData(): array
    {
        return $this->data;
    }
}
