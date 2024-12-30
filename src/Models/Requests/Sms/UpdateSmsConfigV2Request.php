<?php

namespace questbluesdk\Models\Requests\Sms;

use questbluesdk\Models\Requests\BaseRequest;

class UpdateSmsConfigV2Request extends BaseRequest
{
    protected string $did;
    protected string $smsMode;
    protected string $smsV2Value;
    protected string $yeastarSecret;

    public function __construct(string $did, string $smsMode, string $smsV2Value)
    {
        $this->did = $did;
        $this->smsMode = $smsMode;
        $this->smsV2Value = $smsV2Value;
    }

    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }

    public function setSmsMode(string $smsMode): self
    {
        $this->smsMode = $smsMode;
        return $this;
    }

    public function setSmsV2Value(string $smsV2Value): self
    {
        $this->smsV2Value = $smsV2Value;
        return $this;
    }

    public function setYeastarSecret(string $yeastarSecret): self
    {
        $this->yeastarSecret = $yeastarSecret;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'did' => $this->did,
            'sms_mode' => $this->smsMode,
            'value' => $this->smsV2Value,
            'secret' => $this->yeastarSecret,
        ];
    }
}
