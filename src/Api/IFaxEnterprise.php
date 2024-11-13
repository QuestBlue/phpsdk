<?php

namespace questbluesdk\Api;

use questbluesdk\ApiRequestExecutor;
use questbluesdk\Models\Requests\Dids\OrderDidRequest;
use questbluesdk\Models\Requests\Dids\UpdateDidRequest;
use questbluesdk\Models\Requests\IFaxEnterprise\IFaxHistoryRequest;
use questbluesdk\Models\Requests\IFaxEnterprise\CreateUserRequest;
use questbluesdk\Models\Requests\IFaxEnterprise\UpdateUserPermissionsRequest;
use questbluesdk\Models\Responses\Error\ErrorResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterpriseDIDPropertiesResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterpriseEmailPermissionsResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterpriseGroupsResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterpriseHistoryResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterprisePermissionsResponse;
use questbluesdk\Models\Responses\IFaxEnterprise\IFaxEnterpriseUsersResponse;

/**
 * Class IFaxEnterprise
 * Manages operations for iFax Enterprise services, including email permissions, DID properties, user and group management.
 */
class IFaxEnterprise extends ApiRequestExecutor
{
    public function orderDid(OrderDidRequest $request): bool|ErrorResponse
    {
        $result = $this->post('fax2', $request->toArray());
        return $result === false ? 'DID ordering error' : ($result->error ?? true);
    }//end orderDid()


    public function listDids(array $params = []): IFaxEnterpriseDIDPropertiesResponse|ErrorResponse
    {
        $data     = array_merge(['did' => '', 'per_page' => 10, 'page' => 1], $params);
        $response = $this->get('fax2', $data);
        return $this->parseResponse($response, IFaxEnterpriseDIDPropertiesResponse::class);
    }//end listDids()


    public function updateDid(UpdateDidRequest $request): bool|ErrorResponse
    {
        return $this->put('fax2', $request->toArray());
    }//end updateDid()


    public function pauseFaxAcc(string $did, string $action): bool|ErrorResponse
    {
        return $this->put('fax2/pause', ['did' => $did, 'action' => $action]);
    }//end pauseFaxAcc()


    public function deleteDid(string $did): bool|ErrorResponse
    {
        return $this->delete('fax2', ['did' => $did]);
    }//end deleteDid()


    public function createGroup(string $sname, string $name): bool|ErrorResponse
    {
        $response = $this->post('fax2/group', ['sname' => $sname, 'name' => $name]);
        return $this->parseResponse($response);
    }//end createGroup()


    public function listGroups(?string $sname = null): IFaxEnterpriseGroupsResponse|ErrorResponse
    {
        $response = $this->get('fax2/group', ['sname' => $sname]);
        return $this->parseResponse($response, IFaxEnterpriseGroupsResponse::class);
    }//end listGroups()


    public function updateGroup(string $sname, string $snameNew, string $nameNew): bool|ErrorResponse
    {
        $response = $this->put(
            'fax2/group',
            [
                'sname'     => $sname,
                'sname_new' => $snameNew,
                'name_new'  => $nameNew,
            ]
        );
        return $this->parseResponse($response);
    }//end updateGroup()


    public function deleteGroup(string $sname): bool|ErrorResponse
    {
        $response = $this->delete('fax2/group', ['sname' => $sname]);
        return $this->parseResponse($response);
    }//end deleteGroup()


    public function createUser(CreateUserRequest $request): bool|ErrorResponse
    {
        $response = $this->post('fax2/user', $request->toArray());
        return $this->parseResponse($response);
    }//end createUser()


    public function listUsers(?string $sname = null, ?string $faxLogin = null): IFaxEnterpriseUsersResponse|ErrorResponse
    {
        $response = $this->get('fax2/user', ['sname' => $sname, 'fax_login' => $faxLogin]);
        return $this->parseResponse($response, IFaxEnterpriseUsersResponse::class);
    }//end listUsers()


    public function updateUser(array $params): bool|ErrorResponse
    {
        $response = $this->put('fax2/user', $params);
        return $this->parseResponse($response);
    }//end updateUser()


    public function deleteUser(string $faxLogin): bool|ErrorResponse
    {
        $response = $this->delete('fax2/user', ['fax_login' => $faxLogin]);
        return $this->parseResponse($response);
    }//end deleteUser()


    public function updateUserPermissions(UpdateUserPermissionsRequest $request): bool|ErrorResponse
    {
        $response = $this->post('fax2/permit', $request->toArray());
        return $this->parseResponse($response);
    }//end updateUserPermissions()


    public function listUserPermissions(?string $faxLogin = null, ?string $did = null): IFaxEnterprisePermissionsResponse|ErrorResponse
    {
        $response = $this->get('fax2/permit', ['fax_login' => $faxLogin, 'did' => $did]);
        return $this->parseResponse($response, IFaxEnterprisePermissionsResponse::class);
    }//end listUserPermissions()


    public function deleteUserPermissions(string $faxLogin, ?string $did = null): bool|ErrorResponse
    {
        $response = $this->delete('fax2/permit', ['fax_login' => $faxLogin, 'did' => $did]);
        return $this->parseResponse($response);
    }//end deleteUserPermissions()


    public function updateEmailPermissions(string $did, string $email, bool $allowSend, bool $allowReceive): bool|ErrorResponse
    {
        $response = $this->post(
            'fax2/email',
            [
                'did' => $did,
                'email' => $email,
                'allow_send' => $allowSend,
                'allow_receive' => $allowReceive,
            ]
        );
        return $this->parseResponse($response);
    }//end updateEmailPermissions()


    public function listEmailPermissions(string $did, string $email): IFaxEnterpriseEmailPermissionsResponse|ErrorResponse
    {
        $response = $this->get('fax2/email', ['did' => $did, 'email' => $email]);
        return $this->parseResponse($response, IFaxEnterpriseEmailPermissionsResponse::class);
    }//end listEmailPermissions()


    public function deleteEmailPermissions(string $did, string $email): bool|ErrorResponse
    {
        $response = $this->delete('fax2/email', ['did' => $did, 'email' => $email]);
        return $this->parseResponse($response);
    }//end deleteEmailPermissions()


    public function uploadFile(string $fpath): bool|ErrorResponse
    {
        $response = $this->post(
            'fax2/upload',
            [
                'file'     => base64_encode(file_get_contents($fpath)),
                'filename' => base64_encode(basename($fpath)),
            ]
        );
        return $this->parseResponse($response);
    }//end uploadFile()


    public function sendFax(array $params): bool|ErrorResponse
    {
        $response = $this->post('fax2/send', $params);
        return $this->parseResponse($response);
    }//end sendFax()


    public function faxHistory(IFaxHistoryRequest $request): IFaxEnterpriseHistoryResponse|ErrorResponse
    {
        $response = $this->get('faxhistory', $request->toArray());
        return $this->parseResponse($response, IFaxEnterpriseHistoryResponse::class);
    }//end faxHistory()


    public function faxDownload(string $faxId, string $period): bool|ErrorResponse
    {
        $response = $this->get('faxdownload', ['fax_id' => $faxId, 'period' => $period]);
        return $this->parseResponse($response);
    }//end faxDownload()
}//end class
