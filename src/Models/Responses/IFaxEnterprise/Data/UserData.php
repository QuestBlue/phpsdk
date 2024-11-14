<?php

namespace questbluesdk\Models\Responses\IFaxEnterprise\Data;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class UserData
{
    #[Type('string')]
    #[SerializedName('sname')]
    private string $sname;

    #[Type('string')]
    #[SerializedName('fax_name')]
    private string $faxName;

    #[Type('string')]
    #[SerializedName('fax_lname')]
    private string $faxLname;

    #[Type('string')]
    private string $login;

    #[Type('string')]
    private string $password;

    #[Type('string')]
    #[SerializedName('is_admin')]
    private string $isAdmin;

    public function getSname(): string
    {
        return $this->sname;
    }

    public function getFaxName(): string
    {
        return $this->faxName;
    }

    public function getFaxLname(): string
    {
        return $this->faxLname;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getIsAdmin(): string
    {
        return $this->isAdmin;
    }
}
