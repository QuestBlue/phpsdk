<?php

namespace questbluesdk\Models\Responses\IFaxEnterprise\Data;

use JMS\Serializer\Annotation\Type;

class EmailPermissionData
{
    #[Type('string')]
    private string $sname;

    #[Type('string')]
    private string $did;

    #[Type('string')]
    private string $email;

    #[Type('string')]
    private string $allowSend;

    #[Type('string')]
    private string $allowReceive;

    public function getSname(): string
    {
        return $this->sname;
    }

    public function getDid(): string
    {
        return $this->did;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getAllowSend(): string
    {
        return $this->allowSend;
    }

    public function getAllowReceive(): string
    {
        return $this->allowReceive;
    }
}
