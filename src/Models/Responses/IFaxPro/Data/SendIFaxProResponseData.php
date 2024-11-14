<?php

namespace questbluesdk\Models\Responses\IFaxPro\Data;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class SendIFaxProResponseData
{
    #[Type('int')]
    #[SerializedName('fax_id')]
    protected int $faxId;


    public function getFaxId(): int
    {
        return $this->faxId;
    }//end getFaxId()
}//end class
