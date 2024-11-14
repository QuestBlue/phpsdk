<?php

namespace questbluesdk\Models\Responses\Account\Data;

use JMS\Serializer\Annotation\Type;

class RateData
{
    #[Type(name: 'string')]
    private string $localDidCost;

    #[Type(name: 'string')]
    private string $inboundCallRate;

    #[Type(name: 'string')]
    private string $vpsServerRate;

    #[Type(name: 'string')]
    private string $ccrf;


    public function getLocalDidCost(): string
    {
        return $this->localDidCost;
    }//end getLocalDidCost()


    public function getInboundCallRate(): string
    {
        return $this->inboundCallRate;
    }//end getInboundCallRate()


    public function getVpsServerRate(): string
    {
        return $this->vpsServerRate;
    }//end getVpsServerRate()


    public function getCcrf(): string
    {
        return $this->ccrf;
    }//end getCcrf()
}//end class
