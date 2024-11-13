<?php

namespace questbluesdk\Models\Responses\Account\Data;

use JMS\Serializer\Annotation\Type;

class RateData
{
    #[Type(name: "string")]
    private string $localDidCost;

    #[Type(name: "string")]
    private string $inboundCallRate;

    #[Type(name: "string")]
    private string $vpsServerRate;

    #[Type(name: "string")]
    private string $ccrf;

    public function getLocalDidCost(): string
    {
        return $this->localDidCost;
    }

    public function getInboundCallRate(): string
    {
        return $this->inboundCallRate;
    }

    public function getVpsServerRate(): string
    {
        return $this->vpsServerRate;
    }

    public function getCcrf(): string
    {
        return $this->ccrf;
    }

}
