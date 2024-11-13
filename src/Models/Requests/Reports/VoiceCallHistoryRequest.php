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
    }

    public function setPeriod(string $period): self
    {
        $this->period = $period;
        return $this;
    }

    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function setCountryId(int $countryId): self
    {
        $this->countryId = $countryId;
        return $this;
    }

    public function setSuccessCallOnly(bool $successCallOnly): self
    {
        $this->successCallOnly = $successCallOnly;
        return $this;
    }

    public function setSummaryOnly(bool $summaryOnly): self
    {
        $this->summaryOnly = $summaryOnly;
        return $this;
    }

    public function setPage(int $page): self
    {
        $this->page = $page;
        return $this;
    }

    public function setPerPage(int $perPage): self
    {
        $this->perPage = $perPage;
        return $this;
    }

    public function setTimezone(string $timezone): self
    {
        $this->timezone = $timezone;
        return $this;
    }

    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn($value) => $value !== null);
    }
}
