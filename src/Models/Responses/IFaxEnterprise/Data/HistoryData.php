<?php

namespace questbluesdk\Models\Responses\IFaxEnterprise\Data;

use JMS\Serializer\Annotation\SerializedName;
use JMS\Serializer\Annotation\Type;

class HistoryData
{
    #[Type('string')]
    private string $faxId;

    #[Type('string')]
    private string $sendTime;

    #[Type('string')]
    private string $didFrom;

    #[Type('string')]
    private string $didTo;

    #[Type('string')]
    private string $type;

    #[Type('string')]
    private string $service;

    #[Type('string')]
    private string $status;

    public function getFaxId(): string
    {
        return $this->faxId;
    }

    public function getSendTime(): string
    {
        return $this->sendTime;
    }

    public function getDidFrom(): string
    {
        return $this->didFrom;
    }

    public function getDidTo(): string
    {
        return $this->didTo;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getService(): string
    {
        return $this->service;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

}
