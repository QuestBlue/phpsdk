<?php

namespace questbluesdk\src\Models\Responses\Lnp\Data;

use JMS\Serializer\Annotation\Type;

class CreateLnpData
{
    #[Type(name: "int")]
    protected ?string $id = null;

    public function getId(): string
    {
        return $this->id;
    }
}
