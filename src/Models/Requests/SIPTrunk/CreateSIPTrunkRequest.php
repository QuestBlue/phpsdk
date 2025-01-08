<?php

namespace questbluesdk\Models\Requests\SIPTrunk;

use questbluesdk\Models\Requests\BaseRequest;

class CreateSIPTrunkRequest extends BaseRequest
{
    protected ?string $trunk = null;
    protected ?string $trunkRegion = null;
    protected ?string $password = null;
    protected ?string $ipAddress = null;
    protected ?string $did = null;
    protected ?string $interCall = null;
    protected ?int $interLimit = null;
    protected ?string $failover = null;
    protected ?string $tn2forward = null;
    protected ?int $concurrentMax = null;
    protected string $allowE164Rewrite = 'no';
    protected string $allowRtpProxy = 'no';

    public function __construct(
        ?string $trunk = null,
        ?string $trunkRegion = null,
        ?string $password = null,
        ?string $ipAddress = null
    ) {
        $this->trunk = $trunk;
        $this->trunkRegion = $trunkRegion;
        $this->password = $password;
        $this->ipAddress = $ipAddress;
    }

    public function setTrunk(string $trunk): self
    {
        $this->trunk = $trunk;
        return $this;
    }

    public function setTrunkRegion(string $trunkRegion): self
    {
        $this->trunkRegion = $trunkRegion;
        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function setIpAddress(string $ipAddress): self
    {
        $this->ipAddress = $ipAddress;
        return $this;
    }

    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }

    public function setInterCall(string $interCall): self
    {
        $this->interCall = $interCall;
        return $this;
    }

    public function setInterLimit(int $interLimit): self
    {
        $this->interLimit = $interLimit;
        return $this;
    }

    public function setFailover(string $failover): self
    {
        $this->failover = $failover;
        return $this;
    }

    public function setTn2forward(string $tn2forward): self
    {
        $this->tn2forward = $tn2forward;
        return $this;
    }

    public function setConcurrentMax(int $concurrentMax): self
    {
        $this->concurrentMax = $concurrentMax;
        return $this;
    }

    public function setAllowE164Rewrite(bool $allowE164Rewrite): self
    {
        $this->allowE164Rewrite = $allowE164Rewrite ? 'yes' : 'no';
        return $this;
    }

    public function setAllowRtpProxy(bool $allowRtpProxy): self
    {
        $this->allowRtpProxy = $allowRtpProxy ? 'yes' : 'no';
        return $this;
    }

    public function toArray(): array
    {
        return array_filter(
            [
            'trunk' => $this->trunk,
            'region' => $this->trunkRegion,
            'password' => $this->password,
            'ip_address' => $this->ipAddress,
            'did' => $this->did,
            'inter_call' => $this->interCall,
            'inter_limit' => $this->interLimit,
            'failover' => $this->failover,
            'tn2forward' => $this->tn2forward,
            'concurrent_max' => $this->concurrentMax,
            'allow_e164_rewrite' => $this->allowE164Rewrite,
            'allow_rtp_proxy' => $this->allowRtpProxy,
            ],
            fn($value) => $value !== null
        );
    }
}
