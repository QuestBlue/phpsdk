<?php

namespace questbluesdk;


/*
 * iFax Pro DID and iFax Pro account management
 *
 */
class Ifaxpro extends Connect {


    /*
     * List available states
     */
    function listStates(){
        return $this->query('fax/states');
    }


    /*
     * List available Rate Centers
     */
    public function listRateCenters($state)
    {
        $params = [
            'state' => $state
        ];

        return $this->query('fax/ratecenters', $params);
    }


    /*
     * List available Local or Toll Free DIDs
     */
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


    /*
     * Order Local or Toll Free Fax DID, Create iFax Pro account
     */
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
        if($result === false) {
            return 'DID ordering error';
        }

        return isset($result->error) ? $result->error : true;
    }


    /*
     * List Ordered DIDs
     */
    public function listDids($did = '')
    {
        $params = [
            'did'      => $did,
         // 'per_page' => 10,   // Range 5 - 200
         // 'page'     => 1
        ];

        return $this->query('fax', $params);
    }


    /*
     * Update iFax Pro account
     */
    public function updateDid($did, $note = null, $pin = null, $unsetAcc = null, $faxName, $faxEmail, $faxLogin, $faxPassword, $isFull= null, $reportAtt= null)
    {
        $params = [
            'did'          => $did,
            'note'         => $note,
            'pin'          => $pin,
            'unset_acc'    => $unsetAcc,
            'fax_name'     => $faxName,
            'fax_email'    => $faxEmail,
            'fax_login'    => $faxLogin,
            'fax_password' => $faxPassword,
            'is_full'      => $isFull,
            'report_att'   => $reportAtt,
         // 'testmode'     => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax', $params, 'PUT');
    }



    /*
     * Delete DID and iFax Pro account
     */
    public function deleteDid($did)
    {
        $params = [
            'did'           => $did,
            //'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax', $params, 'DELETE');
    }
    
    
    /*
     * Send Fax
     */
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
    
    
    /*
     * Move DID to Voice inventory
     */
    public function move2voice($did)
    {
        $params = [
            'did'           => $did,
         // 'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('fax/move2voice', $params, 'PUT');
    }
}