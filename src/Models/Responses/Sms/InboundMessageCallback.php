<?php

namespace questbluesdk\Models\Responses\Sms;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class InboundMessageCallback extends BaseResponse
{
    #[Type(name: 'string')]
    protected string $from;

    #[Type(name: 'array<string>')]
    protected array $to;

    #[Type(name: 'string')]
    protected string $text;

    #[Type(name: 'array<string>')]
    protected array $media;

    #[Type(name: 'string')]
    protected string $segments;

    #[Type(name: 'string')]
    protected string $type;


    public function getFrom(): string
    {
        return $this->from;
    }//end getFrom()


    public function getTo(): array
    {
        return $this->to;
    }//end getTo()


    public function getText(): string
    {
        return $this->text;
    }//end getText()


    public function getMedia(): array
    {
        return $this->media;
    }//end getMedia()


    public function getSegments(): string
    {
        return $this->segments;
    }//end getSegments()


    public function getType(): string
    {
        return $this->type;
    }//end getType()
}//end class
