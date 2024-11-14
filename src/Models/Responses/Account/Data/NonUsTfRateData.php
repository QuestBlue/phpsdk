<?php

namespace questbluesdk\Models\Responses\Account\Data;

use JMS\Serializer\Annotation\Type;

class NonUsTfRateData
{
    #[Type(name: "string")]
    private string $origin;

    #[Type(name: "string")]
    private string $code;

    #[Type(name: "string")]
    private string $rate;

    public function getOrigin(): string
    {
        return $this->origin;
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
