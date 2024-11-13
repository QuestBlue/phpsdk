<?php

namespace questbluesdk\Models\Responses\Sms\Data;

use JMS\Serializer\Annotation\Type;

class TnCarrierData
{

    #[Type(name: 'int')]
    protected int $tn;

    #[Type(name: 'string')]
    protected string $carrier;

    #[Type(name: 'string')]
    protected string $isWireless;


    public function getTn(): int
    {
        return $this->tn;

    }//end getTn()


    public function getCarrier(): string
    {
        return $this->carrier;

    }//end getCarrier()


    public function getIsWireless(): string
    {
        return $this->isWireless;

    }//end getIsWireless()


}//end class
