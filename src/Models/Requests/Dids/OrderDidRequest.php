<?php

namespace questbluesdk\Models\Requests\Dids;

use questbluesdk\Models\Requests\BaseRequest;

class OrderDidRequest extends BaseRequest
{
    protected string $did;
    protected ?string $note = null;
    protected ?string $pin = null;
    protected string $faxName;
    protected string $faxEmail;
    protected string $faxLogin;
    protected string $faxPassword;
    protected ?string $isFull = null;
    protected ?string $reportAtt = null;

    public function __construct(
        string $did,
        string $faxName,
        string $faxEmail,
        string $faxLogin,
        string $faxPassword,
        ?string $note = null,
        ?string $pin = null,
        ?string $isFull = null,
        ?string $reportAtt = null
    ) {
        $this->did = $did;
        $this->faxName = $faxName;
        $this->faxEmail = $faxEmail;
        $this->faxLogin = $faxLogin;
        $this->faxPassword = $faxPassword;
        $this->note = $note;
        $this->pin = $pin;
        $this->isFull = $isFull;
        $this->reportAtt = $reportAtt;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;
        return $this;
    }

    public function setPin(?string $pin): self
    {
        $this->pin = $pin;
        return $this;
    }

    public function setIsFull(?string $isFull): self
    {
        $this->isFull = $isFull;
        return $this;
    }

    public function setReportAtt(?string $reportAtt): self
    {
        $this->reportAtt = $reportAtt;
        return $this;
    }


    public function setDid(string $did): OrderDidRequest
    {
        $this->did = $did;
        return $this;
    }

    public function setFaxName(string $faxName): OrderDidRequest
    {
        $this->faxName = $faxName;
        return $this;
    }

    public function setFaxEmail(string $faxEmail): OrderDidRequest
    {
        $this->faxEmail = $faxEmail;
        return $this;
    }

    public function setFaxLogin(string $faxLogin): OrderDidRequest
    {
        $this->faxLogin = $faxLogin;
        return $this;
    }

    public function setFaxPassword(string $faxPassword): OrderDidRequest
    {
        $this->faxPassword = $faxPassword;
        return $this;
    }

    public function toArray(): array
    {
        return array_filter(
            [
            'did'          => $this->did,
            'note'         => $this->note,
            'pin'          => $this->pin,
            'fax_name'     => $this->faxName,
            'fax_email'    => $this->faxEmail,
            'fax_login'    => $this->faxLogin,
            'fax_password' => $this->faxPassword,
            'is_full'      => $this->isFull,
            'report_att'   => $this->reportAtt,
            ],
            fn($value) => $value !== null
        );
    }
}
