<?php

namespace questbluesdk\Models\Responses\Account\Data;

use JMS\Serializer\Annotation\Type;

class CallbackData
{
    #[Type(name: "string")]
    private string $url;

    #[Type(name: "string")]
    private string $sections;

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getSections(): string
    {
        return $this->sections;
    }
}
