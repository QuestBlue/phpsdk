<?php

namespace questbluesdk\Models\Responses\IFaxEnterprise\Data;

use JMS\Serializer\Annotation\Type;

class GroupData
{
    #[Type('string')]
    private string $sname;

    #[Type('string')]
    private string $name;

    public function getSname(): string
    {
        return $this->sname;
    }

    public function getName(): string
    {
        return $this->name;
    }

}
