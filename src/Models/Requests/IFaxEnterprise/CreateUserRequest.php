<?php

namespace questbluesdk\Models\Requests\IFaxEnterprise;

use questbluesdk\Models\Requests\BaseRequest;

class CreateUserRequest extends BaseRequest
{
    protected string $faxLogin;

    protected string $faxPassword;

    protected string $sname;

    protected string $faxName;

    protected ?string $faxLname = null;

    protected ?string $faxEmail = null;

    protected string $isAdmin = 'off';


    public function __construct(
        string $faxLogin = '',
        string $faxPassword = '',
        string $sname = '',
        string $faxName = '',
        ?string $faxLname = null,
        ?string $faxEmail = null,
        string $isAdmin = 'off'
    ) {
        $this->faxLogin    = $faxLogin;
        $this->faxPassword = $faxPassword;
        $this->sname       = $sname;
        $this->faxName     = $faxName;
        $this->faxLname    = $faxLname;
        $this->faxEmail    = $faxEmail;
        $this->isAdmin     = $isAdmin;
    }//end __construct()


    public function setFaxLogin(string $faxLogin): self
    {
        $this->faxLogin = $faxLogin;
        return $this;
    }//end setFaxLogin()


    public function setFaxPassword(string $faxPassword): self
    {
        $this->faxPassword = $faxPassword;
        return $this;
    }//end setFaxPassword()


    public function setSname(string $sname): self
    {
        $this->sname = $sname;
        return $this;
    }//end setSname()


    public function setFaxName(string $faxName): self
    {
        $this->faxName = $faxName;
        return $this;
    }//end setFaxName()


    public function setFaxLname(?string $faxLname): self
    {
        $this->faxLname = $faxLname;
        return $this;
    }//end setFaxLname()


    public function setFaxEmail(?string $faxEmail): self
    {
        $this->faxEmail = $faxEmail;
        return $this;
    }//end setFaxEmail()


    public function setIsAdmin(string $isAdmin): self
    {
        $this->isAdmin = $isAdmin;
        return $this;
    }//end setIsAdmin()


    public function toArray(): array
    {
        return array_filter(
            [
                'fax_login'    => $this->faxLogin,
                'fax_password' => $this->faxPassword,
                'sname'        => $this->sname,
                'fax_name'     => $this->faxName,
                'fax_lname'    => $this->faxLname,
                'fax_email'    => $this->faxEmail,
                'is_admin'     => $this->isAdmin,
            ],
            fn($value) => $value !== null
        );
    }//end toArray()
}//end class
