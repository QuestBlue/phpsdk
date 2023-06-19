<?php

namespace questbluesdk;

class Siptrunks extends Connect {
    
    private $trunk;
    private $trunkRegion;
    private $password;
    private $ipAddress;
    private $domain;
    private $did;
    private $interCall;
    private $interLimit;
    private $failover;
    private $tn2forward;
    private $concurrentMax;
    private $trunkStatus;
    private $allowE164Rewrite;
    private $allowRtpProxy;

    private $itemsPerPage = 10;
    private $page = 1;

    public function setTrunk($trunk)
    {
        $this->trunk = $trunk;

        return $this;
    }

    public function setTrunkRegion($region){
        $this->trunkRegion = $region;

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

    public function setTn2forward($tn)
    {
        $this->tn2forward = $tn;

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
    
    public function setAllowE164Rewrite(bool $allow){
        $this->allowE164Rewrite = ($allow) ? 'yes' : 'no';
        
        return $this;
    }
    
    public function setAllowRtpProxy(bool $allow){
        $this->allowRtpProxy = ($allow) ? 'yes' : 'no';
        
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

    function createTrunk(){
        
        $params = [
            'trunk'             => $this->trunk,
            'region'            => $this->trunkRegion,
            'password'          => $this->password,
            'ip_address'        => $this->ipAddress,
            'did'               => $this->did,
            'inter_call'        => $this->interCall,
            'inter_limit'       => $this->interLimit,
            'failover'          => $this->failover,
            'tn2forward'        => $this->tn2forward,
            'concurrent_max'    => $this->concurrentMax,
            'allow_e164_rewrite'=> $this->allowE164Rewrite,
            'allow_rtp_proxy'   => $this->allowRtpProxy,
          //'testmode'       => 'error', //Values:  success, warning, error
        ]; 
        
        return $this->query('siptrunk', $params, 'POST');
    }
    
    function listTrunks()
    {
        $params = [
            'trunk'   => $this->trunk,
            'per_page' => $this->itemsPerPage, // range from 5 to 200
            'page' => $this->page
  
        ]; 
   
        return $this->query('siptrunk', $params);
    }
    
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
            'tn2forward'        => $this->tn2forward,
            'concurrent_max' => $this->concurrentMax,
            'allow_e164_rewrite'=> $this->allowE164Rewrite,
            'allow_rtp_proxy'   => $this->allowRtpProxy,
           // 'testmode'      => 'error', //Values:  success, warning, error
        ]; 

        return $this->query('siptrunk', $params, 'PUT');
    }
    
    function blockCaller($did, $action = 'block')
    {
        $params = [
            'trunk'   => $this->trunk,
            'did'     => $did,
            'action'  => $action
        ]; 
        return $this->query('siptrunk/blockcaller', $params, 'POST');
    }
    
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
    
    function statusChecker()
    {
        $params = [
            'trunk'   => $this->trunk,
        ]; 
        return $this->query('siptrunk/statuschecker', $params, 'GET');
    }
    
    function deleteTrunk()
    {
        $params = [
            'trunk'   => $this->trunk,
        ]; 
        return $this->query('siptrunk', $params, 'DELETE');
    }
    
}
