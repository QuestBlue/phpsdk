<?php
require_once('./Connect.php');

/*
 * Class to test API connection
 */

class Test extends Connect {
    
    
    /*
     * Returns API client IP address
     * 
     * @return ip_address  
     */
    function myip(){
        return $this->query('myip');
    }
    
    
    /*
     * Returns  API client IP address
     * 
     * @return ip_address  
     */
    function myauth(){
        return $this->query('myauth');
    }
    
}


// Call thr class' methods 
$api = new Test;

// Returns  API client IP address. No authorization is required
$response = $api->myip(); 

// Returns  API client IP address, valid authorization required
# $response = $api->myauth(); 

echo '<pre>'; 
print_r($response);