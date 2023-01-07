<?php

namespace questbluesdk;

/*
 * Class to test API connection
 */

class Test extends Connect
{
    
    /**
     * Returns API client IP address
     * 
     * @return ip_address  
     */
    function myip()
    {
        return $this->query('myip');
    }
    
    
    /**
     * Returns  API client IP address
     * 
     * @return ip_address  
     */
    function myauth()
    {
        return $this->query('myauth');
    }
    
}