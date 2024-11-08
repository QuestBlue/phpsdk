<?php

namespace questbluesdk;

use questbluesdk\Models\Responses\ErrorResponse;

/**
 * Class Servers
 * Handles operations related to server management, including ordering, listing, upgrading, deleting servers,
 * and managing backups.
 */
class Servers extends Connect
{
    /**
     * Order a new server of the specified type.
     *
     * @param string $serverType The type of server to order.
     * @param array $params Additional parameters for the server order.
     * @param string|null $note Optional note for the order.
     * @return string|ErrorResponse
     */
    public function orderServer(string $serverType, array $params, ?string $note = null): string|ErrorResponse
    {
        $params = [
            'server_type' => $serverType,
            'params'      => $params,
            'note'        => $note
        ];
        return $this->query('server', $params, 'POST');
    }

    /**
     * List servers with an optional filter for a specific server ID.
     *
     * @param string|null $serverId Optional server ID to filter the list.
     * @return string|ErrorResponse
     */
    public function listServers(?string $serverId = null): string|ErrorResponse
    {
        $params = [
            'server_id' => $serverId,
        ];
        return $this->query('server', $params);
    }

    /**
     * Upgrade an existing server to a new server type.
     *
     * @param string $serverId The ID of the server to upgrade.
     * @param string $serverType The new server type to upgrade to.
     * @return string|ErrorResponse
     */
    public function upgradeServer(string $serverId, string $serverType): string|ErrorResponse
    {
        $params = [
            'server_id'   => $serverId,
            'server_type' => $serverType
        ];
        return $this->query('server/upgrade', $params, 'POST');
    }

    /**
     * Delete a specified server by its ID.
     *
     * @param string $serverId The ID of the server to delete.
     * @return string|ErrorResponse
     */
    public function deleteServer(string $serverId): string|ErrorResponse
    {
        $params = [
            'server_id' => $serverId,
        ];
        return $this->query('server', $params, 'DELETE');
    }

    /**
     * Manage the backup schedule for a server.
     *
     * @param string $serverId The ID of the server.
     * @param string $mode The mode for the backup schedule.
     * @return string|ErrorResponse
     */
    public function manageBackupSchedule(string $serverId, string $mode): string|ErrorResponse
    {
        $params = [
            'server_id' => $serverId,
            'schedule'  => $mode,
        ];
        return $this->query('server/managebackupschedule', $params, 'POST');
    }

    /**
     * List all backups available for a specific server.
     *
     * @param string $serverId The ID of the server.
     * @return string|ErrorResponse
     */
    public function listBackups(string $serverId): string|ErrorResponse
    {
        $params = [
            'server_id' => $serverId,
        ];
        return $this->query('server/listbackups', $params);
    }

    /**
     * Restore a backup for a specific server.
     *
     * @param string $serverId The ID of the server.
     * @param string $backupId The ID of the backup to restore.
     * @return string|ErrorResponse
     */
    public function restoreBackup(string $serverId, string $backupId): string|ErrorResponse
    {
        $params = [
            'server_id' => $serverId,
            'backup_id' => $backupId,
        ];
        return $this->query('server/restorebackup', $params, 'POST');
    }

    /**
     * Remove a specific backup for a server.
     *
     * @param string $serverId The ID of the server.
     * @param string $backupId The ID of the backup to remove.
     * @return string|ErrorResponse
     */
    public function removeBackup(string $serverId, string $backupId): string|ErrorResponse
    {
        $params = [
            'server_id' => $serverId,
            'backup_id' => $backupId,
        ];
        return $this->query('server/removebackup', $params, 'DELETE');
    }
}
