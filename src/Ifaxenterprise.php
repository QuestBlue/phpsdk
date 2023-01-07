<?php

namespace questbluesdk;

use questbluesdk\Ifaxpro;

/*
 * iFax Enperprise DID and iFax Pro account management
 */

class Ifaxenterprise extends Ifaxpro {

    /*
     * Order Local or Toll Free Fax DID, Create iFax Enterprise account
     */
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


    /*
     * List Ordered DIDs
     */
    public function listDids($did = '')
    {
        $params = [
            'did'      => $did,
          //'per_page' => 10,   // Range 5 - 200
         // 'page'     => 1
        ];

        return $this->query('fax2', $params);
    }


    /*
     * Update iFax Pro account
     */
    public function updateDid($did, $sname = null, $note = null, $pin = null)
    {
        $params = [
            'did'          => $did,
            'sname'        => $sname,
            'note'         => $note,
            'pin'          => $pin,
          //'testmode'     => 'success' //Values:  success, warning, error
        ];
        return $this->query('fax2', $params, 'PUT');
    }



    /*
     * Delete DID and iFax Pro account
     */
    public function deleteDid($did)
    {
        $params = [
            'did'           => $did,
            //'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax2', $params, 'DELETE');
    }
    
    
    /*
     * Create iFax Enterprise Group
     */
    public function createGroup($sname, $name)
    {
        $params = [
            'sname'        => $sname,
            'name'         => $name,
          //'testmode'     => 'success' //Values:  success, warning, error
        ];
        return $this->query('fax2/group', $params, 'POST');
    }
    

    /*
     * List iFax Enterprise Groups
     */
    public function listGroups($sname = null)
    {
        $params = [
            'sname'  => $sname,
        ];
        return $this->query('fax2/group', $params, 'GET');
    }
    
    
    /*
     * Update iFax Enterprose Group Name
     */
    public function updateGroup($sname, $snameNew, $nameNew)
    {
        $params = [
            'sname'     => $sname,
            'sname_new' => $snameNew,
            'name_new'  => $nameNew,
        ];
        return $this->query('fax2/group', $params, 'PUT');
    } 
    

    /*
     * Remove iFax Enterprose Group
     */
    public function deleteGroup($sname)
    {
        $params = [
            'sname' => $sname,
        ];
        return $this->query('fax2/group', $params, 'DELETE');
    } 

    
    /*
     * Create iFax Enterprise User
     */
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
    
   /*
     * List iFax Enterprise Users
     */
    public function listUsers($faxLogin = null, $sname = null)
    {
        $params = [
            'fax_login'         => $faxLogin,
            'sname'             => $sname,
     
        ];
        return $this->query('fax2/user', $params, 'GET');
    }
    


    /*
     * Update iFax Enterprose User Properties
     */
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
    
    
    /*
     * Delete iFax Enterprose User
     */
    public function deleteUser($faxLogin)
    {
        $params = [ 
            'fax_login'         => $faxLogin,
          //'testmode'     => 'success' //Values:  success, warning, error
        ];
        return $this->query('fax2/user', $params, 'DELETE');
    } 
    
    
    
    /*
     * Update iFax Enterprose User Permissions
     */
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
    
    
    /*
     * Update iFax Enterprose User Permissions
     */
    public function listUserPermissions($faxLogin = null, $did = null)
    {
        $params = [ 
            'fax_login'      => $faxLogin,
            'did'            => $did,
        ];
        return $this->query('fax2/permit', $params, 'GET');
    }

    
    /*
     * Update iFax Enterprose User Permissions
     */
    public function deleteUserPermissions($faxLogin , $did = null)
    {
        $params = [ 
            'fax_login'      => $faxLogin,
            'did'            => $did,
        ];
        return $this->query('fax2/permit', $params, 'DELETE');
    }
    
    
    
    /*
     * Update iFax Enterprose Email Permissions
     */
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
    
    /*
     * List iFax Enterprose Email Permissions
     */
    public function listEmailPermissions($did, $email)
    {
        $params = [ 
            'did'            => $did,
            'email'          => $email,
        ];
        return $this->query('fax2/email', $params, 'GET');
    } 
    
    
     /*
     * Delete iFax Enterprose Email Permissions
     */
    public function deleteEmailPermissions($did, $email)
    {
        $params = [ 
            'did'            => $did,
            'email'          => $email,
        ];
        return $this->query('fax2/email', $params, 'DELETE');
    } 
    
    
    /*
     * iFax Enterprise File Upload 
     */
    public function uploadFile($fpath)
    {
        $params = [
             'file'     => base64_encode( file_get_contents($fpath)),
             'filename' => base64_encode(basename($fpath)),
            //'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax2/upload', $params, 'POST');
    } 
    

    
    /*
     * iFax Enterprise Fax Send 
     */
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
    
    
    
    /*
     * Retrieve Fax history
     */
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
    

    /*
     * Download fax file
     */
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