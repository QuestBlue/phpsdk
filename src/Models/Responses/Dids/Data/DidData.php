<?php

namespace questbluesdk\Models\Responses\Dids\Data;

use JMS\Serializer\Annotation\Type;

class DidData
{
    #[Type(name: "string")]
    private string $did;

    #[Type(name: "array")]
    private array $configuration;

    public function getDid(): string
    {
        return $this->did;
    }

    public function getConfiguration(): array
    {
        return $this->configuration;
    }
}
