<?php

namespace questbluesdk;

use questbluesdk\Account\Models\DidModel;

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

    public function listAvailableDids(DidModel $didModel)
    {
        $params = [
            'type'        => $didModel->type,
            'tier'        => $didModel->tier,
            'state'       => $didModel->location->state,
            'ratecenter'  => $didModel->location->ratecenter,
            'npa'         => $didModel->location->npa,
            'zip'         => $didModel->location->zip,
            'code'        => $didModel->code
        ];

        return $this->query('did/available', $params);
    }

    public function orderDid(DidModel $didModel)
    {
        $params = [
            'tier'         => $didModel->tier,
            'did'          => $didModel->did,
            'note'         => $didModel->note,
            'route2trunk'  => $didModel->route2trunk,
            'pin'          => $didModel->pin,
            'lidb'         => $didModel->lidb,
            'cnam'         => $didModel->cnam,
            'e911'         => $didModel->e911,
            'dlda'         => $didModel->dlda,
         // 'testmode'    => 'success' //Values:  success, warning, error
        ];

        $result = $this->query('did', $params, 'POST');
        if($result === false) {
            return 'DID ordering error';
        }

        return isset($result->error) ? $result->error : true;
    }

    public function listDids($did = '', $perPage = 10, $page = 1)
    {
        $params = [
            'did'      => $did,
            'per_page' => $perPage,   // Range 5 - 200
            'page'     => $page
        ];

        return $this->query('did', $params);
    }

    public function updateDid(DidModel $didModel)
    {
        $params = [
            'did'             => $didModel->did,
            'note'            => $didModel->note,
            'pin'             => $didModel->pin,
            'route2trunk'     => $didModel->route2trunk,
            'forw2did'        => $didModel->forward2did,
            'failover'        => $didModel->failover,
            'lidb'            => $didModel->lidb,
            'cnam'            => $didModel->cnam,
            'e911'            => $didModel->e911,
            'dlda'            => $didModel->dlda,
            'e911_call_alert' => $didModel->e911CallAlert
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