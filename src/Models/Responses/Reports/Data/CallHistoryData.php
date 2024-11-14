<?php

namespace questbluesdk\Models\Responses\Reports\Data;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class CallHistoryData
{
    #[Type(name: "string")]
    #[SerializedName("call_type")]
    protected string $callType;

    #[Type(name: "int")]
    #[SerializedName("call_number")]
    protected int $callNumber;

    #[Type(name: "string")]
    #[SerializedName("total_duration_min")]
    protected string $totalDurationMin;

    #[Type(name: "string")]
    #[SerializedName("cost")]
    protected string $cost;

    public function getCallType(): string
    {
        return $this->callType;
    }

    public function getCallNumber(): int
    {
        return $this->callNumber;
    }

    public function getTotalDurationMin(): string
    {
        return $this->totalDurationMin;
    }

    public function getCost(): string
    {
        return $this->cost;
    }
}
