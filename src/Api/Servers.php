<?php

namespace questbluesdk\Api;

use questbluesdk\ApiRequestExecutor;
use questbluesdk\Models\Requests\Server\BackupManagementRequest;
use questbluesdk\Models\Requests\Server\OrderServerRequest;
use questbluesdk\Models\Requests\Server\RemoveBackupRequest;
use questbluesdk\Models\Requests\Server\RestoreBackupRequest;
use questbluesdk\Models\Requests\Server\UpgradeServerRequest;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\Server\RemoveBackupResponse;
use questbluesdk\Models\Responses\Server\RestoreBackupResponse;
use questbluesdk\Models\Responses\Server\ServerInventoryResponse;
use questbluesdk\Models\Responses\Server\OrderServerResponse;
use questbluesdk\Models\Responses\Server\DeleteServerResponse;
use questbluesdk\Models\Responses\Server\AddIpAddressResponse;
use questbluesdk\Models\Responses\Server\DeleteIpAddressResponse;
use questbluesdk\Models\Responses\Server\UpgradeServerResponse;

/**
 * Class Servers
 * Handles operations related to server management, including ordering, listing, upgrading, deleting servers,
 * and managing backups.
 */
class Servers extends ApiRequestExecutor
{


    public function orderServer(OrderServerRequest $request): OrderServerResponse|ErrorResponse
    {
        $response = $this->post('server', $request->toArray());
        return $this->parseResponse($response, OrderServerResponse::class);

    }//end orderServer()


    public function listServers(?string $serverId=null): ServerInventoryResponse|ErrorResponse
    {
        $response = $this->get('server', ['server_id' => $serverId]);
        return $this->parseResponse($response, ServerInventoryResponse::class);

    }//end listServers()


    public function upgradeServer(UpgradeServerRequest $request): UpgradeServerResponse|ErrorResponse
    {
        $response = $this->post('server/upgrade', $request->toArray());
        return $this->parseResponse($response, UpgradeServerResponse::class);

    }//end upgradeServer()


    public function deleteServer(string $serverId): DeleteServerResponse|ErrorResponse
    {
        $response = $this->delete('server', ['server_id' => $serverId]);
        return $this->parseResponse($response, DeleteServerResponse::class);

    }//end deleteServer()


    public function manageBackupSchedule(BackupManagementRequest $request): bool|ErrorResponse
    {
        $response = $this->post('server/managebackupschedule', $request->toArray());
        return $this->parseResponse($response);

    }//end manageBackupSchedule()


    public function listBackups(string $serverId): ServerInventoryResponse|ErrorResponse
    {
        $response = $this->get('server/listbackups', ['server_id' => $serverId]);
        return $this->parseResponse($response, ServerInventoryResponse::class);

    }//end listBackups()


    public function restoreBackup(RestoreBackupRequest $request): RestoreBackupResponse|ErrorResponse
    {
        $response = $this->post('server/restorebackup', $request->toArray());
        return $this->parseResponse($response, RestoreBackupResponse::class);

    }//end restoreBackup()


    public function removeBackup(RemoveBackupRequest $request): RemoveBackupResponse|ErrorResponse
    {
        $response = $this->delete('server/removebackup', $request->toArray());
        return $this->parseResponse($response, RemoveBackupResponse::class);

    }//end removeBackup()


}//end class
