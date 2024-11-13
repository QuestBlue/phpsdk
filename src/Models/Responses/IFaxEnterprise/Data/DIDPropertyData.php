<?php

namespace questbluesdk\Models\Responses\IFaxEnterprise\Data;

use JMS\Serializer\Annotation\Type;

class DIDPropertyData
{

    #[Type('string')]
    private string $did;

    #[Type('string')]
    private string $status;

    #[Type('string')]
    private string $didType;

    #[Type('string')]
    private string $note;

    #[Type('string')]
    private string $sname;


    public function getDid(): string
    {
        return $this->did;

    }//end getDid()


    public function getStatus(): string
    {
        return $this->status;

    }//end getStatus()


    public function getDidType(): string
    {
        return $this->didType;

    }//end getDidType()


    public function getNote(): string
    {
        return $this->note;

    }//end getNote()


    public function getSname(): string
    {
        return $this->sname;

    }//end getSname()


}//end class
