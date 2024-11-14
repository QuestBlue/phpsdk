<?php

namespace questbluesdk\Models\Responses;

use JMS\Serializer\SerializerBuilder;

abstract class BaseResponse
{
    public function toArray(): array
    {
        $serializer = SerializerBuilder::create()->build();
        return json_decode($serializer->serialize($this, 'json'), true);
    }//end toArray()
}//end class
