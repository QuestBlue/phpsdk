<?php

namespace questbluesdk\Models\Responses\Server;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class DeleteIpAddressResponse extends BaseResponse
{
    #[Type(name: 'string')]
    private ?string $message;


    public function getMessage(): ?string
    {
        return $this->message;
    }//end getMessage()
}//end class
