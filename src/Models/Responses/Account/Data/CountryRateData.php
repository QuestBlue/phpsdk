<?php

namespace questbluesdk\Models\Responses\Account\Data;

use JMS\Serializer\Annotation\Type;

class CountryRateData
{

    #[Type(name: 'string')]
    private ?string $destination = null;

    #[Type(name: 'string')]
    private ?string $code = null;

    #[Type(name: 'string')]
    private ?string $rate = null;


    public function getDestination(): ?string
    {
        return $this->destination;

    }//end getDestination()


    public function getCode(): ?string
    {
        return $this->code;

    }//end getCode()


    public function getRate(): ?string
    {
        return $this->rate;

    }//end getRate()


}//end class
