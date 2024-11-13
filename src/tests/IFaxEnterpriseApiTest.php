<?php

namespace questbluesdk\tests;

use PHPUnit\Framework\TestCase;
use questbluesdk\Api\IFaxEnterprise;
use questbluesdk\Models\Requests\Dids\OrderDidRequest;
use questbluesdk\Models\Requests\Dids\UpdateDidRequest;
use questbluesdk\Models\Requests\IFaxEnterprise\CreateUserRequest;
use questbluesdk\Models\Requests\IFaxEnterprise\UpdateUserPermissionsRequest;
use questbluesdk\Models\Requests\IFaxEnterprise\IFaxHistoryRequest;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterpriseDIDPropertiesResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterpriseEmailPermissionsResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterpriseGroupsResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterpriseHistoryResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterprisePermissionsResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterpriseUsersResponse;

class IFaxEnterpriseApiTest extends TestCase
{
    public function testOrderDid()
    {
        $request = new OrderDidRequest('1234567890', 'Test Fax', 'test@example.com', 'fax_login', 'fax_password');
        $response = (new IFaxEnterprise())->orderDid($request);
        $this->assertNotNull($response);
        $this->assertTrue($response);
        var_dump($response);
    }

    public function testListDids()
    {
        $response = (new IFaxEnterprise())->listDids();
        $this->assertNotNull($response);
        $this->assertInstanceOf(IFaxEnterpriseDIDPropertiesResponse::class, $response);
        var_dump($response);
    }

    public function testUpdateDid()
    {
        $request = new UpdateDidRequest();
        $response = (new IFaxEnterprise())->updateDid($request);
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testPauseFaxAcc()
    {
        $response = (new IFaxEnterprise())->pauseFaxAcc('1234567890', 'pause');
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testDeleteDid()
    {
        $response = (new IFaxEnterprise())->deleteDid('1234567890');
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testCreateGroup()
    {
        $response = (new IFaxEnterprise())->createGroup('sname', 'group_name');
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testListGroups()
    {
        $response = (new IFaxEnterprise())->listGroups('sname');
        $this->assertNotNull($response);
        $this->assertInstanceOf(IFaxEnterpriseGroupsResponse::class, $response);
        var_dump($response);
    }

    public function testUpdateGroup()
    {
        $response = (new IFaxEnterprise())->updateGroup('sname', 'new_sname', 'new_name');
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testDeleteGroup()
    {
        $response = (new IFaxEnterprise())->deleteGroup('sname');
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testCreateUser()
    {
        $request = new CreateUserRequest('sname', 'fax_login', 'user@example.com');
        $response = (new IFaxEnterprise())->createUser($request);
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testListUsers()
    {
        $response = (new IFaxEnterprise())->listUsers('sname');
        $this->assertNotNull($response);
        $this->assertInstanceOf(IFaxEnterpriseUsersResponse::class, $response);
        var_dump($response);
    }

    public function testUpdateUser()
    {
        $response = (new IFaxEnterprise())->updateUser(['fax_login' => 'fax_login', 'new_param' => 'new_value']);
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testDeleteUser()
    {
        $response = (new IFaxEnterprise())->deleteUser('fax_login');
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testUpdateUserPermissions()
    {
        $request = new UpdateUserPermissionsRequest('fax_login', '1234567890', true, true);
        $response = (new IFaxEnterprise())->updateUserPermissions($request);
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testListUserPermissions()
    {
        $response = (new IFaxEnterprise())->listUserPermissions('fax_login', '1234567890');
        $this->assertNotNull($response);
        $this->assertInstanceOf(IFaxEnterprisePermissionsResponse::class, $response);
    }

    public function testDeleteUserPermissions()
    {
        $response = (new IFaxEnterprise())->deleteUserPermissions('fax_login', '1234567890');
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testUpdateEmailPermissions()
    {
        $response = (new IFaxEnterprise())->updateEmailPermissions('1234567890', 'user@example.com', true, false);
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testListEmailPermissions()
    {
        $response = (new IFaxEnterprise())->listEmailPermissions('1234567890', 'user@example.com');
        $this->assertNotNull($response);
        $this->assertInstanceOf(IFaxEnterpriseEmailPermissionsResponse::class, $response);
    }

    public function testDeleteEmailPermissions()
    {
        $response = (new IFaxEnterprise())->deleteEmailPermissions('1234567890', 'user@example.com');
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testUploadFile()
    {
        $response = (new IFaxEnterprise())->uploadFile('path/to/file.pdf');
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testSendFax()
    {
        $response = (new IFaxEnterprise())->sendFax(['did' => '1234567890', 'file' => 'file_content']);
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }

    public function testFaxHistory()
    {
        $request = new IFaxHistoryRequest();
        $response = (new IFaxEnterprise())->faxHistory($request);
        $this->assertNotNull($response);
        $this->assertInstanceOf(IFaxEnterpriseHistoryResponse::class, $response);
    }

    public function testFaxDownload()
    {
        $response = (new IFaxEnterprise())->faxDownload('fax_id', 'today');
        $this->assertNotNull($response);
        $this->assertIsBool($response);
    }
}
