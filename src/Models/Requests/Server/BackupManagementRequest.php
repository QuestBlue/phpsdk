<?php

namespace questbluesdk\Models\Requests\Server;

use questbluesdk\Models\Requests\BaseRequest;

/**
 * Class BackupManagementRequest
 * Represents the request object for managing the backup schedule of a server.
 */
class BackupManagementRequest extends BaseRequest
{
    protected string $serverId;

    protected string $schedule;


    public function __construct(string $serverId, string $schedule)
    {
        $this->serverId = $serverId;
        $this->schedule = $schedule;
    }//end __construct()


    public function setServerId(string $serverId): self
    {
        $this->serverId = $serverId;
        return $this;
    }//end setServerId()


    public function setSchedule(string $schedule): self
    {
        $this->schedule = $schedule;
        return $this;
    }//end setSchedule()


    public function toArray(): array
    {
        return [
            'server_id' => $this->serverId,
            'schedule'  => $this->schedule,
        ];
    }//end toArray()
}//end class
