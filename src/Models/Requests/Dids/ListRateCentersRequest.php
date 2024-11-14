<?php

namespace questbluesdk\Models\Requests\Dids;

use questbluesdk\Models\Requests\BaseRequest;

class ListRateCentersRequest extends BaseRequest
{
    protected int $tier;
    protected string $state;

    public function __construct(int $tier, string $state)
    {
        $this->tier = $tier;
        $this->state = $state;
    }

    public function setTier(int $tier): self
    {
        $this->tier = $tier;
        return $this;
    }

    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'tier' => $this->tier,
            'state' => $this->state,
        ];
    }
}
