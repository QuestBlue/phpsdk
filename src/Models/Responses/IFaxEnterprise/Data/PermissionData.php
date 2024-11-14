<?php

namespace questbluesdk\Models\Responses\IFaxEnterprise\Data;

use JMS\Serializer\Annotation\Type;

class PermissionData
{
    #[Type('string')]
    private string $createDate;

    #[Type('string')]
    private string $faxLogin;

    #[Type('string')]
    private string $did;

    #[Type('string')]
    private string $allowSend;

    #[Type('string')]
    private string $allowDelete;

    #[Type('string')]
    private string $allowListIn;

    #[Type('string')]
    private string $allowListOut;

    public function getCreateDate(): string
    {
        return $this->createDate;
    }

    public function getFaxLogin(): string
    {
        return $this->faxLogin;
    }

    public function getDid(): string
    {
        return $this->did;
    }

    public function getAllowSend(): string
    {
        return $this->allowSend;
    }

    public function getAllowDelete(): string
    {
        return $this->allowDelete;
    }

    public function getAllowListIn(): string
    {
        return $this->allowListIn;
    }

    public function getAllowListOut(): string
    {
        return $this->allowListOut;
    }
}
