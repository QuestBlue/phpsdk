<?php

namespace questbluesdk;


/*
 * SIP Trunk management
 */
class Siptrunks extends Connect {
    
    private $trunk;
    private $password;
    private $ipAddress;
    private $domain;
    private $did;
    private $interCall;
    private $interLimit;
    private $failover;
    private $concurrentMax;
    private $trunkStatus;

    private $itemsPerPage = 10;
    private $page = 1;

    public function setTrunk($trunk)
    {
        $this->trunk = $trunk;

        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    public function setdid($did)
    {
        $this->did = $did;

        return $this;
    }

    public function setInterCall($interCall)
    {
        $this->interCall = $interCall;

        return $this;
    }

    public function setInterLimit($interLimit)
    {
        $this->interLimit = $interLimit;

        return $this;
    }

    public function setFailover($failover)
    {
        $this->failover = $failover;

        return $this;
    }

    public function setConcurrentMax($concurrentMax)
    {
        $this->concurrentMax = $concurrentMax;

        return $this;
    }

    public function setTrunkStatus($status)
    {
        $this->trunkStatus = $status;

        return $this;
    }

    public function setItemsPerPage($itemsPerPage)
    {
        $this->itemsPerPage = $itemsPerPage;

        return $this;
    }

    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }


    
    /*
     * Create new SIP Trunk
     */
    function createTrunk(){
        
        $params = [
            'trunk'          => $this->trunk,
            'password'       => $this->password,
            'ip_address'     => $this->ipAddress,
            'did'            => $this->did,
            'inter_call'     => $this->interCall,
            'inter_limit'    => $this->interLimit,
            'failover'       => $this->failover,
            'concurrent_max' => $this->concurrentMax,
          //'testmode'       => 'error', //Values:  success, warning, error
        ]; 
        
        return $this->query('siptrunk', $params, 'POST');
    }
    
    
    /*
     * List Registered SIP Trunks
     */
    function listTrunks()
    {
        $params = [
            'trunk'   => $this->trunk,
            'per_page' => $this->itemsPerPage, // range from 5 to 200
            'page' => $this->page
  
        ]; 
   
        return $this->query('siptrunk', $params);
    }
    
    
    /*
     Update SIP Trunk properties
     Depeciated  $dynamic_host
     */
    function updateTrunk()
    {
        $params = [
            'trunk'          => $this->trunk,
            'password'       => $this->password,
            'status'         => $this->trunkStatus,
            'ip_address'     => $this->ipAddress,
            'inter_call'     => $this->interCall,
            'inter_limit'    => $this->interLimit,
            'failover'       => $this->failover,
            'concurrent_max' => $this->concurrentMax,
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
    function blockCaller($did, $action = 'block')
    {
        $params = [
            'trunk'   => $this->trunk,
            'did'     => $did,
            'action'  => $action
        ]; 
        return $this->query('siptrunk/blockcaller', $params, 'POST');
    }
    
    
    /*
     * List existing blocked callers 
     */
    function blockedCallers($did= null)
    {
        $params = [
            'trunk'   => $this->trunk,
            'did'     => $did,
            'per_page' => $this->itemsPerPage,
            'page' => $this->page
        ]; 
        return $this->query('siptrunk/blockedcallers', $params, 'GET');
    }
    
    
    /*
     * AIP registration status checker
     */
    function statusChecker()
    {
        $params = [
            'trunk'   => $this->trunk,
        ]; 
        return $this->query('siptrunk/statuschecker', $params, 'GET');
    }
    
    
    /*
     * Remove SIP Trunk
     */
    function deleteTrunk()
    {
        $params = [
            'trunk'   => $this->trunk,
        ]; 
        return $this->query('siptrunk', $params, 'DELETE');
    }
    
}