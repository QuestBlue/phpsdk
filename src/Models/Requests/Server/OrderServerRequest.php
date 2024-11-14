<?php

namespace questbluesdk\Models\Requests\Server;

use questbluesdk\Models\Requests\BaseRequest;

class OrderServerRequest extends BaseRequest
{
    protected string $serverType;

    protected array $params;

    protected ?string $note = null;


    public function __construct(
        string $serverType,
        array $params,
        ?string $note = null
    ) {
        $this->serverType = $serverType;
        $this->params     = $params;
        $this->note       = $note;
    }//end __construct()


    public function setServerType(string $serverType): self
    {
        $this->serverType = $serverType;
        return $this;
    }//end setServerType()


    public function setParams(array $params): self
    {
        $this->params = $params;
        return $this;
    }//end setParams()


    public function setNote(?string $note): self
    {
        $this->note = $note;
        return $this;
    }//end setNote()


    public function toArray(): array
    {
        return array_filter(
            [
                'server_type' => $this->serverType,
                'params'      => $this->params,
                'note'        => $this->note,
            ],
            fn($value) => $value !== null
        );
    }//end toArray()
}//end class
