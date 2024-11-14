<?php

namespace questbluesdk\Models\Responses\Sms\Data;

use JMS\Serializer\Annotation\Type;

class SentMessageData
{
    #[Type(name: "string")]
    protected string $msgId;

    public function getMsgId(): string
    {
        return $this->msgId;
    }
}
