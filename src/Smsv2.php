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