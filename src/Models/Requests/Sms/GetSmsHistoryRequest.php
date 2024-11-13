<?php

namespace questbluesdk\Models\Requests\Sms;

use questbluesdk\Models\Requests\BaseRequest;

class GetSmsHistoryRequest extends BaseRequest
{
    protected int $perPage;
    protected int $page;
    protected string $periodStart;
    protected string $periodEnd;
    protected string $direction;
    protected string $msgType;
    protected int $version = 2;

    public function __construct(int $perPage = 10, int $page = 1, string $direction = 'in', string $msgType = 'sms')
    {
        $this->perPage = $perPage;
        $this->page = $page;
        $this->periodStart = '2020-08-25 00:00:31';
        $this->periodEnd = '2020-08-25 00:00:00';
        $this->direction = $direction;
        $this->msgType = $msgType;
    }

    public function setPerPage(int $perPage): self
    {
        $this->perPage = $perPage;
        return $this;
    }

    public function setPage(int $page): self
    {
        $this->page = $page;
        return $this;
    }

    public function setPeriodStart(string $periodStart): self
    {
        $this->periodStart = $periodStart;
        return $this;
    }

    public function setPeriodEnd(string $periodEnd): self
    {
        $this->periodEnd = $periodEnd;
        return $this;
    }

    public function setDirection(string $direction): self
    {
        $this->direction = $direction;
        return $this;
    }

    public function setMsgType(string $msgType): self
    {
        $this->msgType = $msgType;
        return $this;
    }

    public function setVersion(int $version): self
    {
        $this->version = $version;
        return $this;
    }

    public function getEndpoint(): string
    {
        return $this->version === 2 ? 'smsv2/history' : 'sms/history';
    }

    public function toArray(): array
    {
        return [
            'period' => [$this->periodStart, $this->periodEnd],
            'direction' => $this->direction,
            'msg_type' => $this->msgType,
            'per_page' => $this->perPage,
            'page' => $this->page,
        ];
    }
}
