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
    public function updateSmsConfig($did, $sms_mode = null, $forward2email = null, $xmpp_name = null, $xmpp_passwd = null, $post2url = null, $post2urlmethod = null, $chat_email = null, $chat_passwd = null)
    {
        $params = [
            'did'            => $did,
            'sms_mode'       => $sms_mode,
            'forward2email'  => $forward2email,
            'xmpp_name'      => $xmpp_name,
            'xmpp_passwd'    => $xmpp_passwd,
            'post2url'       => $post2url != null ? urlencode($post2url) : null,
            'post2urlmethod' => $post2urlmethod, // form, json, xml, only if post2url !+ null
            'chat_email'     => $chat_email, 
            'chat_passwd'    => $chat_passwd
          //'testmode'      => 'success' //Values:  success, warning, 
        ];
        
        return $this->query('sms', $params, 'PUT');
    }

    
    /*
     * Semd SMS or MMS message
     */
    public function sendMsg($did_from, $did_to, $msg, $fpath = null)
    {
        $params = [
            'did'      => $did_from,
            'did_to'   => $did_to,
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


// Call the class methods
$api = new Sms;

// List SMS available DIDs
# $response = $api->listAvailableDids();
#  $response = $api->listAvailableDids('2086566206');

// Update SMS configuration
# $response = $api->updateSmsConfig(5876007485, 'none');
# $response = $api->updateSmsConfig(5876007485, 'email', 'john2@doe.com');
# $response = $api->updateSmsConfig(5876007485, 'xmpp', null, 'myXmppName', 'myXmppPasswd');
# $response = $api->updateSmsConfig(5876007485, 'both', 'john@doe.com', 'myXmppName', 'myXmppPasswd');
 
# $response = $api->updateSmsConfig(9194078471, 'email', 'john3@doe.com');
# $response = $api->updateSmsConfig(9194078471, 'url', null, null, null, 'http://example.com', 'json');  
# $response = $api->updateSmsConfig(9194078471, 'chat', null, null, null, null,  null, 'john@doe.com', 'myPassword');
# $response = $api->updateSmsConfig(9194078471, 'none');

  
// Send SMS or MMS Message
# $response = $api->sendMsg(5876007485, 5876007502, 'my message here');
# $response = $api->sendMsg(5876007485, 9192515877, 'my message here', '/path/to/file/msg_file.png');
# $response = $api->sendMsg(5876007485, 8457898258, 'my message here', '/path/to/file/msg_file.png');
# $response = $api->sendMsg(5876007485,4072887122,"test SMS smessage");

// Manage Offnet SMS service
# $response = $api->manageOffnetSmsService(9107733101, 'add');

// Check Manage Offnet SMS service status
# $response = $api->statusOffnetSmsService(9107733101);
  
// Get SMS History
$response = $api->getSmsHistory();


echo '<pre>';
print_r($response);

 