<?php

namespace questbluesdk\Models\Requests\IFaxPro;

use questbluesdk\Models\Requests\BaseRequest;

class GetAvailableDIDsRequest extends BaseRequest
{
    protected string $type;

    protected ?string $state = null;

    protected ?string $ratecenter = null;

    protected ?string $npa = null;

    protected ?string $zip = null;

    protected ?string $code = null;

    public function __construct(
        string $type,
        ?string $state = null,
        ?string $ratecenter = null,
        ?string $npa = null,
        ?string $zip = null,
        ?string $code = null
    ) {
        $this->type = $type;
        $this->state = $state;
        $this->ratecenter = $ratecenter;
        $this->npa = $npa;
        $this->zip = $zip;
        $this->code = $code;
    }

    public function setType(string $type): GetAvailableDIDsRequest
    {
        $this->type = $type;
        return $this;
    }

    public function setState(?string $state): GetAvailableDIDsRequest
    {
        $this->state = $state;
        return $this;
    }

    public function setRatecenter(?string $ratecenter): GetAvailableDIDsRequest
    {
        $this->ratecenter = $ratecenter;
        return $this;
    }

    public function setNpa(?string $npa): GetAvailableDIDsRequest
    {
        $this->npa = $npa;
        return $this;
    }

    public function setZip(?string $zip): GetAvailableDIDsRequest
    {
        $this->zip = $zip;
        return $this;
    }

    public function setCode(?string $code): GetAvailableDIDsRequest
    {
        $this->code = $code;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type'       => $this->type,
            'state'      => $this->state,
            'ratecenter' => $this->ratecenter,
            'npa'        => $this->npa,
            'zip'        => $this->zip,
            'code'       => $this->code,
        ];
    }
}
