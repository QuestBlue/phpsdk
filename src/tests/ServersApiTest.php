<?php

namespace questbluesdk\tests;

use PHPUnit\Framework\TestCase;
use questbluesdk\Api\Servers;
use questbluesdk\Models\Requests\Server\BackupManagementRequest;
use questbluesdk\Models\Requests\Server\OrderServerRequest;
use questbluesdk\Models\Requests\Server\RemoveBackupRequest;
use questbluesdk\Models\Requests\Server\RestoreBackupRequest;
use questbluesdk\Models\Requests\Server\UpgradeServerRequest;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\Server\OrderServerResponse;
use questbluesdk\Models\Responses\Server\ServerInventoryResponse;
use questbluesdk\Models\Responses\Server\UpgradeServerResponse;
use questbluesdk\Models\Responses\Server\DeleteServerResponse;
use questbluesdk\Models\Responses\Server\RestoreBackupResponse;
use questbluesdk\Models\Responses\Server\RemoveBackupResponse;

class ServersApiTest extends TestCase
{
    private Servers $servers;


    protected function setUp(): void
    {
        $this->servers = new Servers();
    }//end setUp()


    public function testOrderServer()
    {
        $request  = new OrderServerRequest('server_type', ['params' => 'value'], '');
        $response = $this->servers->orderServer($request);
        $this->assertNotNull($response);

        if ($response instanceof OrderServerResponse) {
            $this->assertInstanceOf(OrderServerResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }

        var_dump($response);
    }//end testOrderServer()


    public function testListServers()
    {
        $response = $this->servers->listServers();
        $this->assertNotNull($response);

        if ($response instanceof ServerInventoryResponse) {
            $this->assertInstanceOf(ServerInventoryResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }

        var_dump($response);
    }//end testListServers()


    public function testUpgradeServer()
    {
        $request  = new UpgradeServerRequest('server_id', 'server_type');
        $response = $this->servers->upgradeServer($request);
        $this->assertNotNull($response);

        if ($response instanceof UpgradeServerResponse) {
            $this->assertInstanceOf(UpgradeServerResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }

        var_dump($response);
    }//end testUpgradeServer()


    public function testDeleteServer()
    {
        $response = $this->servers->deleteServer('1234567890');
        $this->assertNotNull($response);

        if ($response instanceof DeleteServerResponse) {
            $this->assertInstanceOf(DeleteServerResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }
    }//end testDeleteServer()


    public function testManageBackupSchedule()
    {
        $request  = new BackupManagementRequest('server_id', 'schedule');
        $response = $this->servers->manageBackupSchedule($request);
        $this->assertNotNull($response);

        if ($response === true) {
            $this->assertTrue($response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }
    }//end testManageBackupSchedule()


    public function testListBackups()
    {
        $response = $this->servers->listBackups('1234567890');
        $this->assertNotNull($response);

        if ($response instanceof ServerInventoryResponse) {
            $this->assertInstanceOf(ServerInventoryResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }

        var_dump($response);
    }//end testListBackups()


    public function testRestoreBackup()
    {
        $request  = new RestoreBackupRequest('server_id', 'backup_id');
        $response = $this->servers->restoreBackup($request);
        $this->assertNotNull($response);

        if ($response instanceof RestoreBackupResponse) {
            $this->assertInstanceOf(RestoreBackupResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }

        var_dump($response);
    }//end testRestoreBackup()


    public function testRemoveBackup()
    {
        $request  = new RemoveBackupRequest('server_id', 'backup_id');
        $response = $this->servers->removeBackup($request);
        $this->assertNotNull($response);

        if ($response instanceof RemoveBackupResponse) {
            $this->assertInstanceOf(RemoveBackupResponse::class, $response);
        } elseif ($response instanceof ErrorResponse) {
            $this->fail('Error response received: ' . $response->getMessage());
        }

        var_dump($response);
    }//end testRemoveBackup()
}//end class
