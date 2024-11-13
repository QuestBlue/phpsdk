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
        ?string $state=null,
        ?string $ratecenter=null,
        ?string $npa=null,
        ?string $zip=null,
        ?string $code=null
    ) {
        $this->type       = $type;
        $this->state      = $state;
        $this->ratecenter = $ratecenter;
        $this->npa        = $npa;
        $this->zip        = $zip;
        $this->code       = $code;

    }//end __construct()


    public function setType(string $type): GetAvailableDIDsRequest
    {
        $this->type = $type;
        return $this;

    }//end setType()


    public function setState(?string $state): GetAvailableDIDsRequest
    {
        $this->state = $state;
        return $this;

    }//end setState()


    public function setRatecenter(?string $ratecenter): GetAvailableDIDsRequest
    {
        $this->ratecenter = $ratecenter;
        return $this;

    }//end setRatecenter()


    public function setNpa(?string $npa): GetAvailableDIDsRequest
    {
        $this->npa = $npa;
        return $this;

    }//end setNpa()


    public function setZip(?string $zip): GetAvailableDIDsRequest
    {
        $this->zip = $zip;
        return $this;

    }//end setZip()


    public function setCode(?string $code): GetAvailableDIDsRequest
    {
        $this->code = $code;
        return $this;

    }//end setCode()


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

    }//end toArray()


}//end class
