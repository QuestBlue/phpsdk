<?php

namespace questbluesdk\Models\Account;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\PostDeserialize;

/**
 * Class AccountLocationRate
 * Represents the account location rate data model, containing an array of rate information for various locations.
 */
class AccountLocationRate
{
    /**
     * @var AccountLocationRateData[] Array of location rate data.
     */
    #[Type(name: "array<questbluesdk\Models\Account\AccountLocationRateData>")]
    public array $data;
}

/**
 * Class AccountLocationRateData
 * Contains individual rate details associated with a specific location.
 */
class AccountLocationRateData
{
    /**
     * @var string The location associated with the rate.
     */
    #[Type(name: "string")]
    public string $location;

    /**
     * @var int The code representing the location.
     */
    #[Type(name: "int")]
    public int $code;

    /**
     * @var float The rate associated with the location.
     */
    #[Type(name: "float")]
    public float $rate;

    /**
     * @var string|null The origin location, used for deserialization purposes.
     */
    #[Type(name: "string")]
    private ?string $origin = null;

    /**
     * @var string|null The destination location, used for deserialization purposes.
     */
    #[Type(name: "string")]
    private ?string $destination = null;

    /**
     * Sets the `location` field based on `origin` or `destination` after deserialization.
     * This method is automatically called post-deserialization to ensure that `location`
     * is correctly populated.
     */
    #[PostDeserialize]
    public function setLocation(): void
    {
        if ($this->origin !== null) {
            $this->location = $this->origin;
            $this->origin = null;
        } elseif ($this->destination !== null) {
            $this->location = $this->destination;
            $this->destination = null;
        }
    }
}
