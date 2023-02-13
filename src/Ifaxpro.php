<?php

namespace questbluesdk;

class Ifaxpro extends Connect {

    function listStates(){
        return $this->query('fax/states');
    }

    public function listRateCenters($state)
    {
        $params = [
            'state' => $state
        ];

        return $this->query('fax/ratecenters', $params);
    }

    public function listAvailableDids($type, $state = null, $ratecenter = null, $npa = null, $zip = null, $code = null)
    {
        $params = [
            'type'        => $type,
            'state'       => $state,
            'ratecenter'  => $ratecenter,
            'npa'         => $npa,
            'zip'         => $zip,
            'code'        => $code
        ];
        return $this->query('fax/available', $params);
    }

    public function orderDid($did, $note = null, $pin = null, $faxName, $faxEmail, $faxLogin, $faxPassword, $isFull= null, $reportAtt= null)
    {
        $params = [
            'did'          => $did,
            'note'         => $note,
            'pin'          => $pin,
            'fax_name'     => $faxName,
            'fax_email'    => $faxEmail,
            'fax_login'    => $faxLogin,
            'fax_password' => $faxPassword,
            'is_full'      => $isFull,
            'report_att'   => $reportAtt,
         // 'testmode'     => 'success' //Values:  success, warning, error
        ];

        $result = $this->query('fax', $params, 'POST');
        if ($result === false) {
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

        return $this->query('fax', $params);
    }

    public function updateDid($params)
    {
        $data = [
            'did'          => null,
            'note'         => null,
            'pin'          => null,
            'unset_acc'    => null,
            'fax_name'     => null,
            'fax_email'    => null,
            'fax_login'    => null,
            'fax_password' => null,
            'is_full'      => null,
            'report_att'   => null,
         // 'testmode'     => 'success' //Values:  success, warning, error
        ];
        
        foreach($params as $key=>$value)
            $data[$key] = $value;

        return $this->query('fax', $data, 'PUT');
    }

    public function deleteDid($did)
    {
        $params = [
            'did'           => $did,
            //'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax', $params, 'DELETE');
    }
    
    public function sendFax($didFrom, $didTo, $fpath)
    {
        $params = [
            'did_from'  => $didFrom,
            'did_to'   => $didTo,
            'file'     => base64_encode( file_get_contents($fpath)),
            'filename' => base64_encode(pathinfo($fpath)['basename']),
         // 'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax/send', $params, 'POST');
    }
    
    public function move2voice($did)
    {
        $params = [
            'did'           => $did,
         // 'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax/move2voice', $params, 'PUT');
    }
}
