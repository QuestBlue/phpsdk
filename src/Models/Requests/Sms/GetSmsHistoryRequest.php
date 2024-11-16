<?php

namespace questbluesdk\Models\Requests\Sms;

use questbluesdk\Models\Requests\BaseRequest;

class GetSmsHistoryRequest extends BaseRequest
{
    protected ?int $perPage = 5;
    protected ?int $page = 1;
    protected ?string $period = null;
    protected ?string $direction = null;
    protected ?string $order = null;
    protected ?string $msgType = null;

    public function __construct(
        ?int $perPage = 25,
        ?int $page = 1,
        ?string $period = 'today',
        ?string $direction = 'in',
        ?string $order = 'asc',
        ?string $msgType = 'sms'
    ) {
        $this->perPage = $perPage;
        $this->page = $page;
        $this->period = $period;
        $this->direction = $direction;
        $this->order = $order;
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

    public function setPeriod(string $period): self
    {
        $this->period = $period;
        return $this;
    }

    public function setDirection(string $direction): self
    {
        $this->direction = $direction;
        return $this;
    }

    public function setOrder(string $order): self
    {
        $this->order = $order;
        return $this;
    }

    public function setMsgType(string $msgType): self
    {
        $this->msgType = $msgType;
        return $this;
    }


    public function toArray(): array
    {
        return [
            'period' => $this->period,
            'direction' => $this->direction,
            'order' => $this->order,
            'msg_type' => $this->msgType,
            'per_page' => $this->perPage,
            'page' => $this->page,
        ];
    }
}
