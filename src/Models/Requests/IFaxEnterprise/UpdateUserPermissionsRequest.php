<?php

namespace questbluesdk\Models\Requests\IFaxEnterprise;

use questbluesdk\Models\Requests\BaseRequest;

class UpdateUserPermissionsRequest extends BaseRequest
{
    protected string $faxLogin;

    protected string $did;

    protected bool $allowSend;

    protected bool $allowDelete;

    protected bool $allowListIn;

    protected bool $allowListOut;


    public function __construct(
        string $faxLogin = '',
        string $did = '',
        bool $allowSend = false,
        bool $allowDelete = false,
        bool $allowListIn = false,
        bool $allowListOut = false
    ) {
        $this->faxLogin     = $faxLogin;
        $this->did          = $did;
        $this->allowSend    = $allowSend;
        $this->allowDelete  = $allowDelete;
        $this->allowListIn  = $allowListIn;
        $this->allowListOut = $allowListOut;
    }//end __construct()


    public function setFaxLogin(string $faxLogin): self
    {
        $this->faxLogin = $faxLogin;
        return $this;
    }//end setFaxLogin()


    public function setDid(string $did): self
    {
        $this->did = $did;
        return $this;
    }//end setDid()


    public function setAllowSend(bool $allowSend): self
    {
        $this->allowSend = $allowSend;
        return $this;
    }//end setAllowSend()


    public function setAllowDelete(bool $allowDelete): self
    {
        $this->allowDelete = $allowDelete;
        return $this;
    }//end setAllowDelete()


    public function setAllowListIn(bool $allowListIn): self
    {
        $this->allowListIn = $allowListIn;
        return $this;
    }//end setAllowListIn()


    public function setAllowListOut(bool $allowListOut): self
    {
        $this->allowListOut = $allowListOut;
        return $this;
    }//end setAllowListOut()


    public function toArray(): array
    {
        return [
            'fax_login'      => $this->faxLogin,
            'did'            => $this->did,
            'allow_send'     => $this->allowSend ? 'yes' : 'no',
            'allow_delete'   => $this->allowDelete ? 'yes' : 'no',
            'allow_list_in'  => $this->allowListIn ? 'yes' : 'no',
            'allow_list_out' => $this->allowListOut ? 'yes' : 'no',
        ];
    }//end toArray()
}//end class
