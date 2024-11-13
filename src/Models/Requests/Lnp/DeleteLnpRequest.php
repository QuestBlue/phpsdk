<?php

namespace questbluesdk\Models\Requests\Lnp;

use questbluesdk\Models\Requests\BaseRequest;

/**
 * Class DeleteLnpRequest
 * Represents a request model for deleting an LNP entry.
 */
class DeleteLnpRequest extends BaseRequest
{

    protected int $id;


    public function __construct(int $id)
    {
        $this->id = $id;

    }//end __construct()


    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;

    }//end setId()


    public function toArray(): array
    {
        return [
            'id' => $this->id,
        ];

    }//end toArray()


}//end class
