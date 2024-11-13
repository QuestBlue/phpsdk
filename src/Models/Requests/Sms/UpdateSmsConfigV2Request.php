<?php

namespace questbluesdk\Models\Requests\Sms;

use questbluesdk\Models\Requests\BaseRequest;

class UpdateSmsConfigV2Request extends BaseRequest
{

    protected string $did;

    protected string $smsMode;

    protected string $smsV2Value;


    public function __construct(string $did, string $smsMode, string $smsV2Value)
    {
        $this->did        = $did;
        $this->smsMode    = $smsMode;
        $this->smsV2Value = $smsV2Value;

    }//end __construct()


    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;

    }//end setDid()


    public function setSmsMode(string $smsMode): self
    {
        $this->smsMode = $smsMode;
        return $this;

    }//end setSmsMode()


    public function setSmsV2Value(string $smsV2Value): self
    {
        $this->smsV2Value = $smsV2Value;
        return $this;

    }//end setSmsV2Value()


    public function toArray(): array
    {
        return [
            'did'      => $this->did,
            'sms_mode' => $this->smsMode,
            'value'    => $this->smsV2Value,
        ];

    }//end toArray()


}//end class
