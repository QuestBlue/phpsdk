<?php

namespace questbluesdk\Models\Requests\Server;

use questbluesdk\Models\Requests\BaseRequest;

/**
 * Class RestoreBackupRequest
 * Represents the request object for restoring a backup of a server.
 */
class RestoreBackupRequest extends BaseRequest
{
    protected string $serverId;
    protected string $backupId;

    public function __construct(string $serverId, string $backupId)
    {
        $this->serverId = $serverId;
        $this->backupId = $backupId;
    }

    public function setServerId(string $serverId): self
    {
        $this->serverId = $serverId;
        return $this;
    }

    public function setBackupId(string $backupId): self
    {
        $this->backupId = $backupId;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'server_id' => $this->serverId,
            'backup_id' => $this->backupId,
        ];
    }
}