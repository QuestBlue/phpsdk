<?php

namespace questbluesdk\Models\Responses\IFaxPro;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class SendIFaxProResponse extends BaseResponse
{
    #[Type(name: "array<questbluesdk\Models\Responses\IFaxPro\Data\SendIFaxProResponseData>")]
    private array $data;

    public function getData(): array
    {
        return $this->data;
    }
}
