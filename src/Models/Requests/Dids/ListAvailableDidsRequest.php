<?php

namespace questbluesdk\Models\Requests\Dids;

use questbluesdk\Models\Requests\BaseRequest;

class ListAvailableDidsRequest extends BaseRequest
{
    protected string $type;              // Required: 'local' or 'tf'
    protected ?string $tier = null;      // Optional: '0', '1', '1b', '2'
    protected ?string $state = null;     // Optional: Two-character state abbreviation
    protected ?string $ratecenter = null;// Optional: Rate center for local DIDs
    protected ?string $zip = null;       // Optional: Five-character zip code
    protected ?string $mask = null;      // Optional: Mask for searching DIDs by partial match

    public function __construct(
        string $type,
        ?string $tier = null,
        ?string $state = null,
        ?string $ratecenter = null,
        ?string $zip = null,
        ?string $mask = null
    ) {
        $this->type = $type;
        $this->tier = $tier;
        $this->state = $state;
        $this->ratecenter = $ratecenter;
        $this->zip = $zip;
        $this->mask = $mask;
    }

    public function toArray(): array
    {
        return array_filter(
            [
            'type'       => $this->type,
            'tier'       => $this->tier,
            'state'      => $this->state,
            'ratecenter' => $this->ratecenter,
            'zip'        => $this->zip,
            'mask'       => $this->mask,
            ],
            fn($value) => $value !== null
        );
    }
}
