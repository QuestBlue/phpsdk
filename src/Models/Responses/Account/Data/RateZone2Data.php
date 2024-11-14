<?php

namespace questbluesdk\Models\Responses\Account\Data;

use JMS\Serializer\Annotation\Type;

class RateZone2Data
{
    #[Type(name: 'string')]
    protected string $destination;

    #[Type(name: 'string')]
    protected string $code;

    #[Type(name: 'string')]
    protected string $rate;


    public function getDestination(): string
    {
        return $this->destination;
    }//end getDestination()


    public function getCode(): string
    {
        return $this->code;
    }//end getCode()


    public function getRate(): string
    {
        return $this->rate;
    }//end getRate()
}//end class
