<?php

namespace questbluesdk\Models\Responses\Dids\Data;

use JMS\Serializer\Annotation\Type;

class DidData
{
    #[Type(name: "string|int")]
    private string|int $did;

    #[Type(name: "string")]
    private string $status;

    #[Type(name: "int")]
    private int $tier;

    #[Type(name: "string")]
    private string $type;

    #[Type(name: "string")]
    private string $location;

    #[Type(name: "string")]
    private string $note;

    #[Type(name: "string")]
    private string $route2trunk;

    #[Type(name: "string")]
    private string $lidb;

    #[Type(name: "string")]
    private string $cnam;

    #[Type(name: "array")]
    private array $e911;

    #[Type(name: "string")]
    private string $e911AlertBy;

    #[Type(name: "string")]
    private string $e911AlertTo;

    #[Type(name: "string")]
    private string $pin;

    #[Type(name: "array")]
    private array $dlda;

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
