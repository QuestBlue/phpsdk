<?php

namespace questbluesdk\Models\Responses\Account\Data;

use JMS\Serializer\Annotation\Type;

class NonUsTfRateData
{

    #[Type(name: 'string')]
    private string $origin;

    #[Type(name: 'string')]
    private string $code;

    #[Type(name: 'string')]
    private string $rate;


    public function getOrigin(): string
    {
        return $this->origin;

    }//end getOrigin()


    public function getCode(): string
    {
        return $this->code;

    }//end getCode()


    public function getRate(): string
    {
        return $this->rate;

    }//end getRate()


}//end class
