<?php

namespace questbluesdk\Models\Responses\Lnp\Data;

use JMS\Serializer\Annotation\Type;

class CreateLnpData
{
    #[Type(name: "int")]
    protected ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
