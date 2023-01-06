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
            'per_page' => 2
        ];
        return $this->query('sms', $params);
    }


    /*
     * Update SMS configuration
     */
    public function updateSmsConfig($did, $smsMode = null, $forward2email = null, $xmppName = null, $xmppPasswd = null, $post2url = null, $post2urlmethod = null, $chatEmail = null, $chatPasswd = null)
    {
        $params = [
            'did'            => $did,
            'sms_mode'       => $smsMode,
            'forward2email'  => $forward2email,
            'xmpp_name'      => $xmppName,
            'xmpp_passwd'    => $xmppPasswd,
            'post2url'       => $post2url != null ? urlencode($post2url) : null,
            'post2urlmethod' => $post2urlmethod, // form, json, xml, only if post2url !+ null
            'chat_email'     => $chatEmail, 
            'chat_passwd'    => $chatPasswd
          //'testmode'      => 'success' //Values:  success, warning, 
        ];
        
        return $this->query('sms', $params, 'PUT');
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

        return $this->query('sms', $params, 'POST');
    }
    
    
    /*
     * Manage Offnet SMS service 
     */
    public function manageOffnetSmsService($did, $action)
    {
        $params = [
            'did'    => $did,
            'offnetaction' => $action, // add, remove
          //'testmode'=> 'success' //Values:  success, warning, 
        ];
        
        return $this->query('sms/offnetorder', $params, 'POST');
    }
    
     
    /*
     * Offnet DID SMS service order status
     */
    public function statusOffnetSmsService($did)
    {
        $params = [
            'did' => $did,
        ];
        return $this->query('sms/offnetstatus', $params, 'GET');
    }
    
    
    /*
     * SMS Historys
     */
    public function getSmsHistory()
    {
       $params = [
           'period'      => [ strtotime('2020-08-25 00:00:31'), strtotime('2020-08-25 00:00:00')],
           'direction'   => 'in', // in , out or empry
           'msg_type'    => 'sms', // sms, mms
           //'per_page'    => 25, // records per page
           //'page'        => 1
        ];
                
        return $this->query('sms/history', $params, 'GET');
    }


}