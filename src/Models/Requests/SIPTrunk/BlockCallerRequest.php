<?php

namespace questbluesdk\Models\Requests\SIPTrunk;

use questbluesdk\Models\Requests\BaseRequest;

class BlockCallerRequest extends BaseRequest
{

    protected ?string $trunk = null;

    protected string $did;

    protected string $action;


    public function __construct(string $did, string $action, ?string $trunk=null)
    {
        $this->did    = $did;
        $this->action = $action;
        $this->trunk  = $trunk;

    }//end __construct()


    public function setTrunk(string $trunk): self
    {
        $this->trunk = $trunk;
        return $this;

    }//end setTrunk()


    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;

    }//end setDid()


    public function setAction(string $action): self
    {
        $this->action = $action;
        return $this;

    }//end setAction()


    public function toArray(): array
    {
        return array_filter(
            [
                'trunk'  => $this->trunk,
                'did'    => $this->did,
                'action' => $this->action,
            ]
        );

    }//end toArray()


}//end class
