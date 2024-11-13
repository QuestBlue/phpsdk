<?php

namespace questbluesdk\Models\Responses\Sms\Data;

use JMS\Serializer\Annotation\Type;

class SmsRecordData
{

    #[Type(name: 'string')]
    protected string $id;

    #[Type(name: 'string')]
    protected string $time;

    #[Type(name: 'string')]
    protected string $from;

    #[Type(name: 'string')]
    protected string $to;

    #[Type(name: 'string')]
    protected string $direction;

    #[Type(name: 'string')]
    protected string $msgType;

    #[Type(name: 'string')]
    protected string $status;


    public function getId(): string
    {
        return $this->id;

    }//end getId()


    public function getTime(): string
    {
        return $this->time;

    }//end getTime()


    public function getFrom(): string
    {
        return $this->from;

    }//end getFrom()


    public function getTo(): string
    {
        return $this->to;

    }//end getTo()


    public function getDirection(): string
    {
        return $this->direction;

    }//end getDirection()


    public function getMsgType(): string
    {
        return $this->msgType;

    }//end getMsgType()


    public function getStatus(): string
    {
        return $this->status;

    }//end getStatus()


}//end class
