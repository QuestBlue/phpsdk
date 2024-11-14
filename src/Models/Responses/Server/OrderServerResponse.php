<?php

namespace questbluesdk\Models\Responses\Server;

use JMS\Serializer\Annotation\Type;
use questbluesdk\Models\Responses\BaseResponse;

class OrderServerResponse extends BaseResponse
{
    #[Type(name: 'int')]
    private int $serverId;


    public function getServerId(): int
    {
        return $this->serverId;
    }//end getServerId()
}//end class
