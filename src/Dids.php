<?php

namespace questbluesdk;

class Dids extends Connect {

    function listStates(){
        return $this->query('did/states');
    }
    
    public function listRateCenters($tier, $state)
    {
        $params = [
            'tier'  => $tier,
            'state' => $state
        ];

        return $this->query('did/ratecenters', $params);
    }

    public function listAvailableDids($type, $tier, $state = null, $ratecenter = null, $npa = null, $zip = null, $code = null)
    {
        $params = [
            'type'        => $type,
            'tier'        => $tier,
            'state'       => $state,
            'ratecenter'  => $ratecenter,
            'npa'         => $npa,
            'zip'         => $zip,
            'code'        => $code
        ];
        return $this->query('did/available', $params);
    }

    public function orderDid($tier, $did, $note = null, $route2trunk = null, $pin = null, $lidb = null, $cnam = null, $e911 = null, $dlda = null)
    {
        $params = [
            'tier'         => $tier,
            'did'          => $did,
            'note'         => $note,
            'route2trunk'  => $route2trunk,
            'pin'          => $pin,
            'lidb'         => $lidb,
            'cnam'         => $cnam,
            'e911'         => $e911,
            'dlda'         => $dlda,
         // 'testmode'    => 'success' //Values:  success, warning, error
        ];

        $result = $this->query('did', $params, 'POST');
        if($result === false) {
            return 'DID ordering error';
        }

        return isset($result->error) ? $result->error : true;
    }

    public function listDids($did = '')
    {
        $params = [
            'did'      => $did,
         // 'per_page' => 10,   // Range 5 - 200
         // 'page'     => 1
        ];

        return $this->query('did', $params);
    }

    public function updateDid($did, $note = null, $pin = null, $route2trunk = null, $forw2did = null, $failover = null, $lidb = null, $cnam = null, $e911 = null, $dlda = null, $e911CallAlert = null)
    {
        $params = [
            'did'             => $did,
            'note'            => $note,
            'pin'             => $pin,
            'route2trunk'     => $route2trunk,
            'forw2did'        => $forw2did,
            'failover'        => $failover,
            'lidb'            => $lidb,
            'cnam'            => $cnam,
            'e911'            => $e911,
            'dlda'            => $dlda,
            'e911_call_alert' => $e911CallAlert
         // 'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('did', $params, 'PUT');
    }

    public function move2fax($did)
    {
        $params = [
            'did'           => $did,
         // 'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('did/move2fax', $params, 'PUT');
    }
    
    public function deleteDid($did)
    {
        $params = [
            'did'           => $did,
         // 'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('did', $params, 'DELETE');
    }

}