<?php

namespace questbluesdk\Models\Responses\Lnp;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class CheckPortabilityResponse extends BaseResponse
{

    #[Type('int')]
    private int $foc_days;


    public function getFocDays(): int
    {
        return $this->foc_days;

    }//end getFocDays()


}//end class
