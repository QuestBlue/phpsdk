<?php

namespace questbluesdk\Models\Requests\Server;

use questbluesdk\Models\Requests\BaseRequest;

/**
 * Class UpgradeServerRequest
 * Represents the request object for upgrading a server.
 */
class UpgradeServerRequest extends BaseRequest
{

    protected string $serverId;

    protected string $serverType;


    public function __construct(string $serverId, string $serverType)
    {
        $this->serverId   = $serverId;
        $this->serverType = $serverType;

    }//end __construct()


    public function setServerId(string $serverId): self
    {
        $this->serverId = $serverId;
        return $this;

    }//end setServerId()


    public function setServerType(string $serverType): self
    {
        $this->serverType = $serverType;
        return $this;

    }//end setServerType()


    public function toArray(): array
    {
        return [
            'server_id'   => $this->serverId,
            'server_type' => $this->serverType,
        ];

    }//end toArray()


}//end class
