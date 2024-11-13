<?php

namespace questbluesdk\Models\Requests\Dids;

use questbluesdk\Models\Requests\BaseRequest;

class ListRateCentersRequest extends BaseRequest
{

    protected int $tier;

    protected string $state;


    public function __construct(int $tier, string $state)
    {
        $this->tier  = $tier;
        $this->state = $state;

    }//end __construct()


    public function setTier(int $tier): self
    {
        $this->tier = $tier;
        return $this;

    }//end setTier()


    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;

    }//end setState()


    public function toArray(): array
    {
        return [
            'tier'  => $this->tier,
            'state' => $this->state,
        ];

    }//end toArray()


}//end class
