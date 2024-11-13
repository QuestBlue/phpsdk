<?php

namespace questbluesdk\Models\Responses\Sms;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class SendSmsMmsResponse extends BaseResponse
{

    #[Type(name: 'array<questbluesdk\Models\Responses\Sms\Data\SentMessageData>')]
    protected array $data;


    public function getData(): array
    {
        return $this->data;

    }//end getData()


}//end class
