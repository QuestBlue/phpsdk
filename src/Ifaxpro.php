<?php
require_once('./Connect.php');


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
    public function orderDid($did, $note = null, $pin = null, $fax_name, $fax_email, $fax_login, $fax_password, $is_full= null, $report_att= null)
    {
        $params = [
            'did'          => $did,
            'note'         => $note,
            'pin'          => $pin,
            'fax_name'     => $fax_name,
            'fax_email'    => $fax_email,
            'fax_login'    => $fax_login,
            'fax_password' => $fax_password,
            'is_full'      => $is_full,
            'report_att'   => $report_att,
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
    public function updateDid($did, $note = null, $pin = null, $unset_acc = null, $fax_name, $fax_email, $fax_login, $fax_password, $is_full= null, $report_att= null)
    {
        $params = [
            'did'          => $did,
            'note'         => $note,
            'pin'          => $pin,
            'unset_acc'    => $unset_acc,
            'fax_name'     => $fax_name,
            'fax_email'    => $fax_email,
            'fax_login'    => $fax_login,
            'fax_password' => $fax_password,
            'is_full'      => $is_full,
            'report_att'   => $report_att,
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
    public function sendFax($did_from, $did_to, $fpath)
    {
        $params = [
            'did_from'  => $did_from,
            'did_to'   => $did_to,
            'file'     => base64_encode( file_get_contents($fpath)),
            'filename' => base64_encode(basename($fpath)),
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


// Call the class methods examples
$api = new Ifaxpro;

// List available Fax states
 $response = $api->listStates();


// List rate centers
# $response = $api->listRateCenters('NC');


// List available DIDs
                  //listAvailableDids($type, $tier, $state, $ratecenter, $npa, $zip, $code)
# $response = $api->listAvailableDids('local', 'NC', 'DURHAM');
# $response = $api->listAvailableDids('local',  null, null, 505);
# $response = $api->listAvailableDids('local',  null, null, null, 27513);
# $response = $api->listAvailableDids('TF', null, null, null, null, 83);


// Order DID, create Fax Pro account
                //orderDid($did, $note = null, $pin = null, $fax_name, $fax_email, $fax_login, $fax_password, $is_full, $report_att)
# $response = $api->orderDid(9842430340, 'My Note', null, 'My name', 'some@email.com', 'fax_login3', 'fax_password3', 'yes', 'yes');


// Ordered DIDs inventory
# $response = $api->listDids('302*');
# $response = $api->listDids();


// Update Fax DID, iFax Pro Account properties
                    // updateDid($did, $note, $pin, $unset_acc, $fax_name, $fax_email, $fax_login, $fax_password, $is_full, $report_att)
 # $response = $api->updateDid(3029665062, 'my note', null, null, null, null, 'testLogin', 'testPassword', 'yes','no');
 # $response = $api->updateDid(3029665062, 'my note', null, null, 'Igor', 'some@email.com', 'hello2222', 'mypassword2222', 'yes','yes');
 # $response = $api->updateDid(3029665062, 'my note', null, null, 'Igor', null, '', '', 'yes','yes');
 # $response = $api->updateDid(3029665062, 'my note', null, 'on', null, null, '', '');

 
// Completely remove Fax DID and Fax Pro Account from the system
# $response = $api->deleteDid(9842430330);

 
 // Send Fax
 # $fpath = 'D:/home/apitest2.com/public_html/test.png';
 # $response = $api->sendFax(5879074120, 4632191090, $fpath); //



// Move Fax DID to Voice inventory
# $response = $api->move2voice(5876007262);


print_r($response);