<?php

namespace questbluesdk;

class Api extends Connect {

    public function addIP($ipAddress)
    {
        $params = [
            'ip' => $ipAddress,
        ];
        return $this->query('api/ip',  $params, 'POST');
    }

    public function viewIP()
    {
        return $this->query('api/ip');
    }
    
    public function deleteIP($ipAddress)
    {
        $params = [
            'ip' => $ipAddress,
        ];
        return $this->query('api/ip',  $params, 'DELETE');
    }
    
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
    
    public function listUser($username = null)
    {
        $params = [
            'username' => $username,
        ]; 
               return $this->query('api/user',  $params);
    }
    
    public function deleteUser($username)
    {
        $params = [
            'username' => $username,
        ]; 
        return $this->query('api/user',  $params, 'DELETE');
    }
 
}