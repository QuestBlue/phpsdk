<?php

namespace questbluesdk\Models\Responses\IFaxEnterprise\Data;

use JMS\Serializer\Annotation\Type;

class EmailPermissionData
{
    #[Type('string')]
    private string $sname;

    #[Type('string')]
    private string $did;

    #[Type('string')]
    private string $email;

    #[Type('string')]
    private string $allowSend;

    #[Type('string')]
    private string $allowReceive;


    public function getSname(): string
    {
        return $this->sname;
    }//end getSname()


    public function getDid(): string
    {
        return $this->did;
    }//end getDid()


    public function getEmail(): string
    {
        return $this->email;
    }//end getEmail()


    public function getAllowSend(): string
    {
        return $this->allowSend;
    }//end getAllowSend()


    public function getAllowReceive(): string
    {
        return $this->allowReceive;
    }//end getAllowReceive()
}//end class
