<?php

namespace questbluesdk\Models\Requests\Reports;

use questbluesdk\Models\Requests\BaseRequest;

class VoiceCallHistoryRequest extends BaseRequest
{
    protected ?string $trunk = null;

    protected ?string $period = null;

    protected ?string $did = null;

    protected ?string $type = null;

    protected ?int $countryId = null;

    protected ?bool $successCallOnly = null;

    protected ?bool $summaryOnly = null;

    protected int $page = 1;

    protected int $perPage = 5;

    protected ?string $timezone = null;


    public function setTrunk(string $trunk): self
    {
        $this->trunk = $trunk;
        return $this;
    }//end setTrunk()


    public function setPeriod(string $period): self
    {
        $this->period = $period;
        return $this;
    }//end setPeriod()


    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }//end setDid()


    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }//end setType()


    public function setCountryId(int $countryId): self
    {
        $this->countryId = $countryId;
        return $this;
    }//end setCountryId()


    public function setSuccessCallOnly(bool $successCallOnly): self
    {
        $this->successCallOnly = $successCallOnly;
        return $this;
    }//end setSuccessCallOnly()


    public function setSummaryOnly(bool $summaryOnly): self
    {
        $this->summaryOnly = $summaryOnly;
        return $this;
    }//end setSummaryOnly()


    public function setPage(int $page): self
    {
        $this->page = $page;
        return $this;
    }//end setPage()


    public function setPerPage(int $perPage): self
    {
        $this->perPage = $perPage;
        return $this;
    }//end setPerPage()


    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;
        return $this;
    }//end setTimezone()


    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn($value) => $value !== null);
    }//end toArray()
}//end class
