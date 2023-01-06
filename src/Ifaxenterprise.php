<?php
require_once('./Connect.php');

/*
 * iFax Enperprise DID and iFax Pro account management
 */

class Ifaxenterprise extends Connect {


    /*
     * List available states
     */
    function listStates(){
        return $this->query('fax/states');
    }


    /*
     * List available Rate Centers
     */
    public function listRateCenters($state)
    {
        $params = [
            'state' => $state
        ];

        return $this->query('fax/ratecenters', $params);
    }


    /*
     * List available Local or Toll Free DIDs
     */
    public function listAvailableDids($type, $state = null, $ratecenter = null, $npa = null, $zip = null, $code = null)
    {
        $params = [
            'type'        => $type,
            'state'       => $state,
            'ratecenter'  => $ratecenter,
            'npa'         => $npa,
            'zip'         => $zip,
            'code'        => $code
        ];
        return $this->query('fax/available', $params);
    }


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
    public function updateGroup($sname, $sname_new, $name_new)
    {
        $params = [
            'sname'     => $sname,
            'sname_new' => $sname_new,
            'name_new'  => $name_new,
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
    public function createUser($fax_login, $fax_password,  $sname, $fax_name, $fax_lname = null, $fax_email = null, $is_admin = 'off')
    {
        $params = [
            
            'fax_login'         => $fax_login,
            'fax_password'      => $fax_password,
            'sname'             => $sname,
            'fax_name'          => $fax_name,
            'fax_lname'         => $fax_lname,
            'fax_email'         => $fax_email,
            'is_admin'          => $is_admin,
          //'testmode'     => 'success' //Values:  success, warning, error
        ];
        return $this->query('fax2/user', $params, 'POST');
    }
    
   /*
     * List iFax Enterprise Users
     */
    public function listUsers($fax_login = null, $sname = null)
    {
        $params = [
            'fax_login'         => $fax_login,
            'sname'             => $sname,
     
        ];
        return $this->query('fax2/user', $params, 'GET');
    }
    


    /*
     * Update iFax Enterprose User Properties
     */
    public function updateUser($fax_login, $fax_password = null, $fax_name = null, $fax_lname = null, $fax_email = null, $is_admin = null)
    {
        $params = [ 
            'fax_login'         => $fax_login,
            'fax_password'      => $fax_password,
            'fax_name'          => $fax_name,
            'fax_lname'         => $fax_lname,
            'fax_email'         => $fax_email,
            'is_admin'          => $is_admin,
          //'testmode'     => 'success' //Values:  success, warning, error
        ];
        return $this->query('fax2/user', $params, 'PUT');
    } 
    
    
    /*
     * Delete iFax Enterprose User
     */
    public function deleteUser($fax_login)
    {
        $params = [ 
            'fax_login'         => $fax_login,
          //'testmode'     => 'success' //Values:  success, warning, error
        ];
        return $this->query('fax2/user', $params, 'DELETE');
    } 
    
    
    
    /*
     * Update iFax Enterprose User Permissions
     */
    public function updateUserPermissions($fax_login, $did, $allow_send, $allow_delete, $allow_list_in, $allow_list_out)
    {
        $params = [ 
            'fax_login'      => $fax_login,
            'did'            => $did,
            'allow_send'     => $allow_send,
            'allow_delete'   => $allow_delete,
            'allow_list_in'  => $allow_list_in, 
            'allow_list_out' => $allow_list_out
          // 'testmode'     => 'error' //Values:  success, warning, error
        ];
        return $this->query('fax2/permit', $params, 'POST');
    }
    
    
    /*
     * Update iFax Enterprose User Permissions
     */
    public function listUserPermissions($fax_login = null, $did = null)
    {
        $params = [ 
            'fax_login'      => $fax_login,
            'did'            => $did,
        ];
        return $this->query('fax2/permit', $params, 'GET');
    }

    
    /*
     * Update iFax Enterprose User Permissions
     */
    public function deleteUserPermissions($fax_login , $did = null)
    {
        $params = [ 
            'fax_login'      => $fax_login,
            'did'            => $did,
        ];
        return $this->query('fax2/permit', $params, 'DELETE');
    }
    
    
    
    /*
     * Update iFax Enterprose Email Permissions
     */
    public function updateEmailPermissions($did, $email, $allow_send, $allow_receive)
    {
        $params = [ 
            'did'            => $did,
            'email'          => $email,
            'allow_send'     => $allow_send,
            'allow_receive'  => $allow_receive,
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
    public function sendFax($did_from, $did_to, $file_id)
    {
        $params = [
            'did_from' => $did_from,
            'did_to'   => $did_to,
            'file_id'  => $file_id
            //'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax2/send', $params, 'POST');
    } 
    
    
    
    /*
     * Retrieve Fax history
     */
    public function faxHistory($did = null, $service = null, $type = null, $fax_id = null, $period = null)
    {
        $params = [
            'did'      => $did,
            'service'  => $service,
            'type'     => $type,
            'fax_id'   => $fax_id, 
            'period'   => $period,
            //'per_page' => 10,   // 10 - 200
            // 'page' => 1
        ];

        return $this->query('faxhistory', $params, 'GET');
    } 
    

    /*
     * Download fax file
     */
    public function faxDownload($fax_id)
    {
        $params = [
            'fax_id'   => $fax_id, 
            'period'   => $period,
            //'per_page' => 10,   // 10 - 200
            // 'page' => 1
        ];

        return $this->query('faxdownload', $params, 'GET');
    } 
    
    
    
}


// Call the class methods examples
$api = new Ifaxenterprise;


// List available Fax states
 $response = $api->listStates();


// List rate centers
# $response = $api->listRateCenters('NC');


// List available DIDs
                  //listAvailableDids($type, $tier, $state, $ratecenter, $npa, $zip, $code)
// $response = $api->listAvailableDids('local', 'NC', 'DURHAM');
# $response = $api->listAvailableDids('local',  null, null, 505);
# $response = $api->listAvailableDids('local',  null, null, null, 27513);
# $response = $api->listAvailableDids('TF', null, null, null, null, 83);


// Order iFax Enterprise DID
#  $response = $api->orderDid(1231231231, 'test1', 'My Note', 1111);


// Ordered DIDs inventory
# $response = $api->listDids('587*');
# $response = $api->listDids();


// Update Fax DID, iFax Pro Account properties
# $response = $api->updateDid(1231231231, null, null, 1122); // Unset account


// Completely remove Fax Enterprise DID 
# $response = $api->deleteDid(1231231231);

//---------

 // Create new iFax Enterprise Group
 # $response = $api->createGroup('testGroup2', 'Test Grou 2 Long Name');
   

 // List iFax Enterprose Groups
 # $response = $api->listGroups('test');
 

 // Update iFax Enterprise Group Name
 # $response = $api->updateGroup('testGroup22', 'testGroup33', 'Group Long Name   33');

 
// Delete iFax Enterprise Group
 # $response = $api->deleteGroup('testGroup33');

//---------

//$response = $api->createUser('myLogin8', 'myPassword3', 'testGroup2', 'John', null, null, null);

# $response = $api->listUsers('myLogin8', 'testGroup2');
# $response = $api->listUsers('myLogin8');
# $response = $api->listUsers();


# $response = $api->updateUser('myLogin8', 'myPassword8', 'John', 'Doe8=', 'someemail8@address.com', 'on');
# $response = $api->updateUser('myLogin8', null, 'John', 'Doe', null, 'off');


// Delete  iFax Enterprise user
#  $response = $api->deleteUser('user222');

//---------

// Update fax user permissions
# $response = $api->updateUserPermissions('user103', 1231231231, 'on', 'off', 'on', 'off');

// List fax user permissions
# $response = $api->listUserPermissions('user111', 1231231231);
# $response = $api->listUserPermissions();


// Delete fax user permissions
# $response = $api->deleteUserPermissions('user111', 1231231231);

//---------

// Update fax Email permissions
# $response = $api->updateEmailPermissions('1231231231', '755@ukr.net', 'on', 'on');


// List fax Email permissions
# $response = $api->listEmailPermissions('1231231231', '755@ukr.net');


// Delete fax Email permissions
# $response = $api->deleteEmailPermissions('1231231231', '755@ukr.net');


// Upload Fax File 
 # $response = $api->uploadFile('D:/home/apitest2.com/public_html/test.txt');
 
// Send Fax
# $response = $api->sendFax(9706612170, 9706612170, ['cb1f971e-c4d7-4bae-9fc0-d589697ca44c', 'e428820b-c2c3-424c-8829-4de2a4e51154']);
 
 
// Fax History
# $response = $api->faxHistory();
 
 
// Download fax file
# $response = $api->faxDownload(779118);
 
echo '<pre>';
print_r($response);
