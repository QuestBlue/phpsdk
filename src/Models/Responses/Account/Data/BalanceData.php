<?php

namespace questbluesdk\Models\Responses\Account\Data;

use JMS\Serializer\Annotation\Type;

class BalanceData
{

    /**
     * @var string
     */
    #[Type(name: 'string')]
    private string $balance;

    /**
     * @var string
     */
    #[Type(name: 'string')]
    private string $allowedCredit;


    public function getBalance(): string
    {
        return $this->balance;

    }//end getBalance()


    public function getAllowedCredit(): string
    {
        return $this->allowedCredit;

    }//end getAllowedCredit()


}//end class
