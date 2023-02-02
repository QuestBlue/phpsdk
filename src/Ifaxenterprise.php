<?php

namespace questbluesdk;

class Ifaxenterprise extends Connect
{

    public function orderDid($did, $sname, $note = null, $pin = null )
    {
        $params = [
            'did'          => $did,
            'sname'        => $sname,
            'note'         => $note,
            'pin'          => $pin,
          //'testmode'     => 'success' //Values:  success, warning, error
        ];

        $result = $this->query('fax2', $params, 'POST');
        if($result === false) {
            return 'DID ordering error';
        }

        return isset($result->error) ? $result->error : true;
    }

    public function listDids($params = [])
    {
        $data = [
            'did'      => '',
            'per_page' => 10,   // Range 5 - 200
            'page'     => 1
        ];

        foreach($params as $key=>$value)
            $data[$key] = $value;

        return $this->query('fax2', $data);
    }

    public function updateDid($params)
    {
        $data = [
            'did'          => null,
            'sname'        => null,
            'note'         => null,
            'pin'          => null,
          //'testmode'     => 'success' //Values:  success, warning, error
        ];
        
        foreach($params as $key=>$value)
            $data[$key] = $value;
        
        return $this->query('fax2', $data, 'PUT');
    }

    public function deleteDid($did)
    {
        $params = [
            'did'           => $did,
            //'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax2', $params, 'DELETE');
    }

    public function createGroup($sname, $name)
    {
        $params = [
            'sname'        => $sname,
            'name'         => $name,
          //'testmode'     => 'success' //Values:  success, warning, error
        ];
        return $this->query('fax2/group', $params, 'POST');
    }
    
    public function listGroups($sname = null)
    {
        $params = [
            'sname'  => $sname,
        ];
        return $this->query('fax2/group', $params, 'GET');
    }
    
    public function updateGroup($sname, $snameNew, $nameNew)
    {
        $params = [
            'sname'     => $sname,
            'sname_new' => $snameNew,
            'name_new'  => $nameNew,
        ];
        return $this->query('fax2/group', $params, 'PUT');
    }
    
    public function deleteGroup($sname)
    {
        $params = [
            'sname' => $sname,
        ];
        return $this->query('fax2/group', $params, 'DELETE');
    }

    public function createUser($faxLogin, $faxPassword,  $sname, $faxName, $faxLname = null, $faxEmail = null, $isAdmin = 'off')
    {
        $params = [
            'fax_login'         => $faxLogin,
            'fax_password'      => $faxPassword,
            'sname'             => $sname,
            'fax_name'          => $faxName,
            'fax_lname'         => $faxLname,
            'fax_email'         => $faxEmail,
            'is_admin'          => $isAdmin,
          //'testmode'     => 'success' //Values:  success, warning, error
        ];
        return $this->query('fax2/user', $params, 'POST');
    }

    public function listUsers($faxLogin = null, $sname = null)
    {
        $params = [
            'fax_login'         => $faxLogin,
            'sname'             => $sname,
     
        ];
        return $this->query('fax2/user', $params, 'GET');
    }
    
    public function updateUser($faxLogin, $faxPassword = null, $faxName = null, $faxLname = null, $faxEmail = null, $isAdmin = null)
    {
        $params = [ 
            'fax_login'         => $faxLogin,
            'fax_password'      => $faxPassword,
            'fax_name'          => $faxName,
            'fax_lname'         => $faxLname,
            'fax_email'         => $faxEmail,
            'is_admin'          => $isAdmin,
          //'testmode'     => 'success' //Values:  success, warning, error
        ];
        return $this->query('fax2/user', $params, 'PUT');
    }
    
    public function deleteUser($faxLogin)
    {
        $params = [ 
            'fax_login'         => $faxLogin,
          //'testmode'     => 'success' //Values:  success, warning, error
        ];
        return $this->query('fax2/user', $params, 'DELETE');
    }
    
    public function updateUserPermissions($faxLogin, $did, $allowSend, $allowDelete, $allowListIn, $allowListOut)
    {
        $params = [ 
            'fax_login'      => $faxLogin,
            'did'            => $did,
            'allow_send'     => $allowSend,
            'allow_delete'   => $allowDelete,
            'allow_list_in'  => $allowListIn, 
            'allow_list_out' => $allowListOut
          // 'testmode'     => 'error' //Values:  success, warning, error
        ];
        return $this->query('fax2/permit', $params, 'POST');
    }
    
    public function listUserPermissions($faxLogin = null, $did = null)
    {
        $params = [ 
            'fax_login'      => $faxLogin,
            'did'            => $did,
        ];
        return $this->query('fax2/permit', $params, 'GET');
    }

    public function deleteUserPermissions($faxLogin , $did = null)
    {
        $params = [ 
            'fax_login'      => $faxLogin,
            'did'            => $did,
        ];
        return $this->query('fax2/permit', $params, 'DELETE');
    }
    
    public function updateEmailPermissions($did, $email, $allowSend, $allowReceive)
    {
        $params = [ 
            'did'            => $did,
            'email'          => $email,
            'allow_send'     => $allowSend,
            'allow_receive'  => $allowReceive,
          // 'testmode'      => 'error' //Values:  success, warning, error
        ];
        return $this->query('fax2/email', $params, 'POST');
    }
    
    public function listEmailPermissions($did, $email)
    {
        $params = [ 
            'did'            => $did,
            'email'          => $email,
        ];
        return $this->query('fax2/email', $params, 'GET');
    }
    
    public function deleteEmailPermissions($did, $email)
    {
        $params = [ 
            'did'            => $did,
            'email'          => $email,
        ];
        return $this->query('fax2/email', $params, 'DELETE');
    }
    
    public function uploadFile($fpath)
    {
        $params = [
             'file'     => base64_encode( file_get_contents($fpath)),
             'filename' => base64_encode(basename($fpath)),
            //'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax2/upload', $params, 'POST');
    }
    
    public function sendFax($didFrom, $didTo, $fileId)
    {
        $params = [
            'did_from' => $didFrom,
            'did_to'   => $didTo,
            'file_id'  => $fileId
            //'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax2/send', $params, 'POST');
    }
    
    public function faxHistory($did = null, $service = null, $type = null, $faxId = null, $period = null)
    {
        $params = [
            'did'      => $did,
            'service'  => $service,
            'type'     => $type,
            'fax_id'   => $faxId, 
            'period'   => $period,
            //'per_page' => 10,   // 10 - 200
            // 'page' => 1
        ];

        return $this->query('faxhistory', $params, 'GET');
    }
    
    public function faxDownload($faxId, $period)
    {
        $params = [
            'fax_id'   => $faxId, 
            'period'   => $period,
            //'per_page' => 10,   // 10 - 200
            // 'page' => 1
        ];

        return $this->query('faxdownload', $params, 'GET');
    }

}
