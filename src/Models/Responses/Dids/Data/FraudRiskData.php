<?php

namespace questbluesdk\Models\Responses\Dids\Data;

use JMS\Serializer\Annotation\Type;

class FraudRiskData
{
    #[Type(name: "string")]
    private string $number;

    #[Type(name: "string")]
    private string $riskLevel;

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getRiskLevel(): string
    {
        return $this->riskLevel;
    }
}
