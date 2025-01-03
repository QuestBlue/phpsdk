<?php

namespace questbluesdk\Models\Requests\Sms;

use questbluesdk\Models\Requests\BaseRequest;

class ManageOffnetSmsServiceRequest extends BaseRequest
{
    protected string $did;
    protected string $offnetAction;

    public function __construct(string $did, string $offnetAction)
    {
        $this->did = $did;
        $this->offnetAction = $offnetAction;
    }

    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }

    public function setOffnetAction(string $offnetAction): self
    {
        $this->offnetAction = $offnetAction;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'did' => $this->did,
            'offnetaction' => $this->offnetAction,
        ];
    }
}
