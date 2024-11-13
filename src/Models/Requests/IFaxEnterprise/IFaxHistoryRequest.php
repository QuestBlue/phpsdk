<?php

namespace questbluesdk\Models\Requests\IFaxEnterprise;

use questbluesdk\Models\Requests\BaseRequest;

class IFaxHistoryRequest extends BaseRequest
{
    protected ?string $did = null;
    protected ?string $service = null;
    protected ?string $type = null;
    protected ?string $faxId = null;
    protected ?string $period = null;

    public function __construct(
        ?string $did = null,
        ?string $service = null,
        ?string $type = null,
        ?string $faxId = null,
        ?string $period = null
    ) {
        $this->did = $did;
        $this->service = $service;
        $this->type = $type;
        $this->faxId = $faxId;
        $this->period = $period;
    }

    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }

    public function setService(string $service): self
    {
        $this->service = $service;
        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function setFaxId(string $faxId): self
    {
        $this->faxId = $faxId;
        return $this;
    }

    public function setPeriod(string $period): self
    {
        $this->period = $period;
        return $this;
    }

    public function toArray(): array
    {
        return array_filter(
            [
            'did'     => $this->did,
            'service' => $this->service,
            'type'    => $this->type,
            'fax_id'  => $this->faxId,
            'period'  => $this->period,
            ], fn($value) => $value !== null
        );
    }
}
