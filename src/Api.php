<?php
require_once('./Connect.php');


/*
 * API allowed IP addresses and subuser management
 *
 */
class Api extends Connect {


    /*
     * Add allowed IP address
     */
    public function addIP($ip)
    {
        $params = [
            'ip' => $ip,
        ];
        return $this->query('api/ip',  $params, 'POST');
    }


    /*
     * List allowed IP address
     */
    public function viewIP()
    {
        return $this->query('api/ip');
    }
    
    
    /*
     * Remove allowed IP address
     */
    public function deleteIP($ip)
    {
        $params = [
            'ip' => $ip,
        ];
        return $this->query('api/ip',  $params, 'DELETE');
    }
    
    
    /*
     * Add API user 
     */
    public function addUser($username, $password, $disallowed = null, $comment= null)
    {
        $params = [
            'username' => $username,
            'password' => $password,
            'disallowed' => $disallowed,
            'comment' => $comment

        ]; 
        
        return $this->query('api/user',  $params, 'POST');
    }
    
    
    /*
     * List API users and it properties
     */
    public function listUser($username = null)
    {
        $params = [
            'username' => $username,
        ]; 
               return $this->query('api/user',  $params);
    }
    
    
    /*
     * Delete API user 
     */
    public function deleteUser($username)
    {
        $params = [
            'username' => $username,
        ]; 
        return $this->query('api/user',  $params, 'DELETE');
    }
 
}



$api = new Api;

// Add allowed IP address
# $response = $api->addIP('99.99.99.99');


// List allowed IP address
$response = $api->viewIP();
      

// Remove allowed IP address
# $response = $api->deleteIP('99.99.99.99');


// Add API user
#$response = $api->addUser('mysubusername', 'mypassword', ['sip', 'lnp'], 'my comment');
# $response = $api->addUser('mysubusername', 'mypassword', 'sip', 'my comment');


// List API users and it properties
#$response = $api->listUser();


// Delete API user 
 #$response = $api->deleteUser('mysubusername');


echo '<pre>';
print_r($response);