<?php

namespace questbluesdk\Models\Responses\Sms\Data;

use JMS\Serializer\Annotation\Type;

class SmsRecordData
{
    #[Type(name: "string")]
    protected string $id;

    #[Type(name: "string")]
    protected string $time;

    #[Type(name: "string")]
    protected string $from;

    #[Type(name: "string")]
    protected string $to;

    #[Type(name: "string")]
    protected string $direction;

    #[Type(name: "string")]
    protected string $msgType;

    #[Type(name: "string")]
    protected string $status;

    public function getId(): string
    {
        return $this->id;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }

    public function getMsgType(): string
    {
        return $this->msgType;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
