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
        $this->serverId = $serverId;
        $this->serverType = $serverType;
    }

    public function setServerId(string $serverId): self
    {
        $this->serverId = $serverId;
        return $this;
    }

    public function setServerType(string $serverType): self
    {
        $this->serverType = $serverType;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'server_id'   => $this->serverId,
            'server_type' => $this->serverType,
        ];
    }
}
