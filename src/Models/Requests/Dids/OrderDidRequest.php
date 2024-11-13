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
        ?string $note=null,
        ?string $pin=null,
        ?string $isFull=null,
        ?string $reportAtt=null
    ) {
        $this->did         = $did;
        $this->faxName     = $faxName;
        $this->faxEmail    = $faxEmail;
        $this->faxLogin    = $faxLogin;
        $this->faxPassword = $faxPassword;
        $this->note        = $note;
        $this->pin         = $pin;
        $this->isFull      = $isFull;
        $this->reportAtt   = $reportAtt;

    }//end __construct()


    public function setNote(?string $note): self
    {
        $this->note = $note;
        return $this;

    }//end setNote()


    public function setPin(?string $pin): self
    {
        $this->pin = $pin;
        return $this;

    }//end setPin()


    public function setIsFull(?string $isFull): self
    {
        $this->isFull = $isFull;
        return $this;

    }//end setIsFull()


    public function setReportAtt(?string $reportAtt): self
    {
        $this->reportAtt = $reportAtt;
        return $this;

    }//end setReportAtt()


    public function setDid(string $did): OrderDidRequest
    {
        $this->did = $did;
        return $this;

    }//end setDid()


    public function setFaxName(string $faxName): OrderDidRequest
    {
        $this->faxName = $faxName;
        return $this;

    }//end setFaxName()


    public function setFaxEmail(string $faxEmail): OrderDidRequest
    {
        $this->faxEmail = $faxEmail;
        return $this;

    }//end setFaxEmail()


    public function setFaxLogin(string $faxLogin): OrderDidRequest
    {
        $this->faxLogin = $faxLogin;
        return $this;

    }//end setFaxLogin()


    public function setFaxPassword(string $faxPassword): OrderDidRequest
    {
        $this->faxPassword = $faxPassword;
        return $this;

    }//end setFaxPassword()


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

    }//end toArray()


}//end class
