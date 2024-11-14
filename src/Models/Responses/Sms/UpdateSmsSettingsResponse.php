<?php

namespace questbluesdk\Models\Responses\Sms;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class UpdateSmsSettingsResponse extends BaseResponse
{
    #[Type(name: 'bool')]
    protected bool $success;

    #[Type(name: 'string')]
    protected string $message;


    public function isSuccess(): bool
    {
        return $this->success;
    }//end isSuccess()


    public function getMessage(): string
    {
        return $this->message;
    }//end getMessage()
}//end class
