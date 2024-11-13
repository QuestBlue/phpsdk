<?php

namespace questbluesdk\Models\Responses\Account\Data;

use JMS\Serializer\Annotation\Type;

class CountryData
{
    #[Type(name: "int")]
    private int $countryId;

    #[Type(name: "string")]
    private string $countryName;

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function getCountryName(): string
    {
        return $this->countryName;
    }
}