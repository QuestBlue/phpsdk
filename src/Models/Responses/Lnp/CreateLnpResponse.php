<?php

namespace questbluesdk\Models\Responses\Lnp;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;
use questbluesdk\Models\Responses\Lnp\Data\CreateLnpData;

class CreateLnpResponse extends BaseResponse
{
    #[Type(name: "questbluesdk\Models\Responses\Lnp\Data\CreateLnpData")]
    protected ?CreateLnpData $data = null;

    public function getData(): ?CreateLnpData
    {
        return $this->data;
    }
}
