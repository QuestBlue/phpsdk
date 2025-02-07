<?php

namespace questbluesdk\Models\Requests\SIPTrunk;

use questbluesdk\Models\Requests\BaseRequest;

class BlockCallerRequest extends BaseRequest
{
    protected string|array|null $trunk = null;
    protected string $did;
    protected string $action;

    public function __construct(string $did, string $action, string|array|null $trunk = null)
    {
        $this->did = $did;
        $this->action = $action;
        $this->trunk = $trunk;
    }

    public function setTrunk(string|array $trunk): self
    {
        $this->trunk = $trunk;
        return $this;
    }

    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;
        return $this;
    }

    public function toArray(): array
    {
        return array_filter(
            [
            'trunk' => $this->trunk,
            'did' => $this->did,
            'action' => $this->action,
            ]
        );
    }
}
