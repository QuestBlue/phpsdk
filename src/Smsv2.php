<?php

namespace questbluesdk;


/*
 * SMS sending and configuration
 *
 */
class Sms extends Connect {


    /*
     * List DIDs supported SMS Service
     */
    function listAvailableDids($did = null){
        $params = [
            'did'  => $did,
            'per_page' => 20
        ];
        return $this->query('sms', $params);
    }


    /*
     * Update SMS configuration
     */
    public function updateSmsConfig($did, $smsMode, $value='')
    {
        $params = [
            'did'      => $did,
            'sms_mode' => $smsMode,
            'value'    => $value,

          //'testmode'      => 'success' //Values:  success, warning, 
        ];
        
        return $this->query('smsv2', $params, 'PUT');
    }

    
    /*
     * Semd SMS or MMS message
     */
    public function sendMsg($didFrom, $didTo, $msg, $fpath = null)
    {
        $params = [
            'did'      => $didFrom,
            'did_to'   => $didTo,
            'msg'      => $msg,
          //'testmode'      => 'success' //Values:  success, warning, 
        ];
        if(isset($fpath) && is_file($fpath)) 
        {
            $params += [
                'file'     => base64_encode( file_get_contents($fpath)),
                'fname'    => base64_encode(basename($fpath)),
            ]; 
        }

        return $this->query('smsv2', $params, 'POST');
    }
    
    
    // Message delivery status
    public function deliveryStatus($msgId)
    {
       $params = [
           'msg_id' => $msgId
        ];   
        return $this->query('smsv2/deliverystatus', $params, 'GET');
    }
    
    


    
    /*
     * SMS Historys
     */
    public function getSmsHistory()
    {
       $params = [
           'period'      => [ strtotime('2020-10-21 00:00:00'), strtotime('2020-10-23 23:00:00')],
           
           //'period'      => 'previoushour',
           'direction'   => 'in', // in , out or empry
           //'msg_type'    => 'sms', // sms, mms
           //'per_page'    => 25, // records per page
           //'page'        => 1
        ];
                
        return $this->query('smsv2/history', $params, 'GET');
    }


}


// Call the class methods
$api = new Sms;

// List SMS available DIDs
 $response = $api->listAvailableDids();
# $response = $api->listAvailableDids('2086566206');

// Update SMS configuration
# $response = $api->updateSmsConfig(9192304830, 'none');
# $response = $api->updateSmsConfig(9192304830, 'email', 'john@doe.com');
# $response = $api->updateSmsConfig(9192304830, 'url', 'http://example.com');

// $response = $api->sendMsg(9192304830, 5876007773, "333ddd3");
# $response = $api->sendMsg("3365024246","7432239193","This is just a test message");

// Sent message delivery status
# $response = $api->deliveryStatus(17805040);
# $response = $api->deliveryStatus( 17507544 );

// Get SMS History
# $response = $api->getSmsHistory();


echo '<pre>';
print_r($response);


 