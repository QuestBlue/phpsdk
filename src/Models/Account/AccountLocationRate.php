<?php

namespace questbluesdk\Models\Account;

use JMS\Serializer\Annotation\Type as Type;
use JMS\Serializer\Annotation\PostDeserialize;

class AccountLocationRate
{
    #[Type(name: "array<questbluesdk\Models\AccountLocationRateData>")]
    public array $data;
}

class AccountLocationRateData
{
    public string $location;
    public int $code;
    public float $rate;

    private ?string $origin = null;
    private ?string $destination = null;

    #[PostDeserialize]
    public function setLocation(): void
    {
        if (isset($this->origin)) {
            $this->location = $this->origin;
            unset($this->origin);
        } elseif (isset($this->destination)) {
            $this->location = $this->destination;
            unset($this->destination);
        }
    }
}