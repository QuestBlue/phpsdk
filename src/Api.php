<?php

namespace questbluesdk;


/*
 * API allowed IP addresses and subuser management
 *
 */
class Api extends Connect {


    /*
     * Add allowed IP address
     */
    public function addIP($ipAddress)
    {
        $params = [
            'ip' => $ipAddress,
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
    public function deleteIP($ipAddress)
    {
        $params = [
            'ip' => $ipAddress,
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