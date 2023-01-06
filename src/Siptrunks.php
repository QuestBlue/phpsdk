<?php

namespace questbluesdk;


/*
 * SIP Trunk management
 */
class Siptrunks extends Connect {
    
    
    /*
     * Create new SIP Trunk
     */
    function createTrunk($trunk, $password, $ipAddress = null, $domain = null, $did = null, $interCall= null, $interLimit= null, $failover = null, $concurrentMax = null){
        
        $params = [
            'trunk'          => $trunk,
            'password'       => $password,
            'ip_address'     => $ipAddress,
            'did'            => $did,
            'inter_call'     => $interCall,
            'inter_limit'    => $interCall,
            'failover'       => $failover,
            'concurrent_max' => $concurrentMax,
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
    function updateTrunk($trunk, $password = null, $status = null, $ipAddress = null, $interCall= null, $interLimit= null, $failover = null, $concurrentMax = null)
    {
        $params = [
            'trunk'          => $trunk,
            'password'       => $password,
            'status'         => $status,
            'ip_address'     => $ipAddress,
            'inter_call'     => $interCall,
            'inter_limit'    => $interCall,
            'failover'       => $failover,
            'concurrent_max' => $concurrentMax,
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