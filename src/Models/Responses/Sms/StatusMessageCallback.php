<?php

namespace questbluesdk\Models\Responses\Sms;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class StatusMessageCallback extends BaseResponse
{

    #[Type(name: 'string')]
    protected string $from;

    #[Type(name: 'string')]
    protected string $to;

    #[Type(name: 'string')]
    protected string $status;

    #[Type(name: 'string')]
    protected ?string $reason;

    #[Type(name: 'string')]
    protected string $segments;


    public function getFrom(): string
    {
        return $this->from;

    }//end getFrom()


    public function getTo(): string
    {
        return $this->to;

    }//end getTo()


    public function getStatus(): string
    {
        return $this->status;

    }//end getStatus()


    public function getReason(): ?string
    {
        return $this->reason;

    }//end getReason()


    public function getSegments(): string
    {
        return $this->segments;

    }//end getSegments()


}//end class
