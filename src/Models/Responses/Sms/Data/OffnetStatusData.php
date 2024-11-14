<?php

namespace questbluesdk\Models\Responses\Sms\Data;

use JMS\Serializer\Annotation\Type;

class OffnetStatusData
{
    #[Type(name: 'string')]
    protected string $status;


    public function getStatus(): string
    {
        return $this->status;
    }//end getStatus()
}//end class
