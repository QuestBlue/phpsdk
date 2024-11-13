<?php

namespace questbluesdk\Models\Responses\Account\Data;

use JMS\Serializer\Annotation\Type;

class RateZone2Data
{
    #[Type(name: "string")]
    protected string $destination;

    #[Type(name: "string")]
    protected string $code;

    #[Type(name: "string")]
    protected string $rate;

    public function getDestination(): string
    {
        return $this->destination;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getRate(): string
    {
        return $this->rate;
    }
}
