<?php

namespace questbluesdk;


/*
 * SIP Trunk management
 */
class Siptrunks extends Connect {
    
    
    /*
     * Create new SIP Trunk
     */
    function createTrunk($trunk, $password, $ip_address = null, $domain = null, $did = null, $inter_call= null, $inter_limit= null, $failover = null, $concurrent_max = null){
        
        $params = [
            'trunk'          => $trunk,
            'password'       => $password,
            'ip_address'     => $ip_address,
            'did'            => $did,
            'inter_call'     => $inter_call,
            'inter_limit'    => $inter_call,
            'failover'       => $failover,
            'concurrent_max' => $concurrent_max,
          //'testmode'       => 'error', //Values:  success, warning, error
        ]; 
        
        return $this->query('siptrunk', $params, 'POST');
    }
    
    
    /*
     * List Registered SIP Trunks
     */
    function listTrunks($trunk = null)
    {
        $params = [
            'trunk'   => $trunk,
            //'per_page' => 10, // range from 5 to 200
            //'page' => 1
  
        ]; 
   
        return $this->query('siptrunk', $params);
    }
    
    
    /*
     Update SIP Trunk properties
     Depeciated  $dynamic_host
     */
    function updateTrunk($trunk, $password = null, $status = null, $ip_address = null, $inter_call= null, $inter_limit= null, $failover = null, $concurrent_max = null)
    {
        $params = [
            'trunk'          => $trunk,
            'password'       => $password,
            'status'         => $status,
            'ip_address'     => $ip_address,
            'inter_call'     => $inter_call,
            'inter_limit'    => $inter_call,
            'failover'       => $failover,
            'concurrent_max' => $concurrent_max,
           // 'testmode'      => 'error', //Values:  success, warning, error
        ]; 

        return $this->query('siptrunk', $params, 'PUT');
    }
    
    
    /*
     * Block SIP trunk inbound calls from a specific TN
     * @param (string OR array) $trunk - trunk(s) to block inbound calls
     * @param (int) $did - DID to block
     * @param (string) - action to perform, values: block / unblock
     */
    function blockCaller($trunk, $did, $action = 'block')
    {
        $params = [
            'trunk'   => $trunk,
            'did'     => $did,
            'action'  => $action
,        ]; 
        return $this->query('siptrunk/blockcaller', $params, 'POST');
    }
    
    
    /*
     * List existing blocked callers 
     */
    function blockedCallers($trunk = null, $did= null)
    {
        $params = [
            'trunk'   => $trunk,
            'did'     => $did,
            //'per_page' => 10,
            //'page' => 1
        ]; 
        return $this->query('siptrunk/blockedcallers', $params, 'GET');
    }
    
    
    /*
     * AIP registration status checker
     */
    function statusChecker($trunk)
    {
        $params = [
            'trunk'   => $trunk,
        ]; 
        return $this->query('siptrunk/statuschecker', $params, 'GET');
    }
    
    
    /*
     * Remove SIP Trunk
     */
    function deleteTrunk($trunk)
    {
        $params = [
            'trunk'   => $trunk,
        ]; 
        return $this->query('siptrunk', $params, 'DELETE');
    }
    
}
    
 
       

// Example
$api = new Siptrunks;


// Create new SIP trunk
/*
 $failover = [
    'failover_ip_address'   => '101.101.101.10',
    'failover_num'          => 5,
    'failover_time'         => 30   
];
  */
# $response = $api->createTrunk('testTrunk55', 'myPasswd1', '101.101.101.20'); 


// List existing trunks properties
# $response = $api->listTrunks();


// Update trunk properties
# $response = $api->updateTrunk('testTrunk55', null, null, '129.251.2.19');


// SIP registration status
# $response = $api->statusChecker('registrationName');


// Remove SIP trunk
# $response = $api->deleteTrunk('testTrunk55'); 
  
  
// Block / Unblock inbound caller
# $response = $api->blockCaller('trunk111', 8888899999, 'block');
# $response = $api->blockCaller(['trunk111', 'hello113'], 8888899999, 'block');
# $response = $api->blockCaller(['ifaxpro', 'ifaxenterprise'], 7777777777, 'unblock');


// List blocked callers 
# $response = $api->blockedCallers('trunk111');
# $response = $api->blockedCallers(null, 'helloworld');

  
  




echo '<pre>'; 
print_r($response);