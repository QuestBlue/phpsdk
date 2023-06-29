<?php

namespace questbluesdk;

class Sms extends Connect {

    private $did;
    private $smsMode;
    private $forward2email;
    private $xmppName;
    private $xmppPasswd;
    private $post2url;
    private $post2urlmethod;
    private $chatEmail;
    private $chatPasswd;
    private $smsV2Value;

    private $version = 2;

    private $perPage = 10;

    private $page = 1;

    public function setDid($did){
        $this->did = $did;

        return $this;
    }

    public function setSmsMode($mode){
        $this->smsMode = $mode;

        return $this;
    }

    public function setForward2email($forward2email){
        $this->forward2email = $forward2email;

        return $this;
    }

    public function setXmppName($xmppName){
        $this->xmppName = $xmppName;

        return $this;
    }

    public function setXmppPasswd($xmppPasswd){
        $this->xmppPasswd = $xmppPasswd;

        return $this;
    }

    public function setPost2url($post2url){
        $this->post2url = $post2url;

        return $this;
    }

    public function setPost2urlmethod($post2urlmethod){
        $this->post2urlmethod = $post2urlmethod;

        return $this;
    }

    public function setChatEmail($chatEmail){
        $this->chatEmail = $chatEmail;

        return $this;
    }

    public function setChatPasswd($chatPasswd){
        $this->chatPasswd = $chatPasswd;

        return $this;
    }

    public function setSmsV2Value($smsV2Value){
        $this->smsV2Value = $smsV2Value;

        return $this;
    }

    public function setSmsVersion($version){
        $this->version = $version;

        return $this;
    }

    public function setPerPage($perPage){
        $this->perPage = $perPage;

        return $this;
    }

    public function setPage($page){
        $this->page = $page;

        return $this;
    }

    function listAvailableDids(){
        $params = [
            'did'  => $this->did,
            'per_page' => $this->perPage
        ];

        return $this->query('sms', $params);
    }

    public function updateSmsConfig(){
        if($this->version === 2){
            return $this->updateSmsConfigV2();
        }

        return $this->updateSmsConfigV1();
    }

    private function updateSmsConfigV1(){
        $params = [
            'did'            => $this->did,
            'sms_mode'       => $this->smsMode,
            'forward2email'  => $this->forward2email,
            'xmpp_name'      => $this->xmppName,
            'xmpp_passwd'    => $this->xmppPasswd,
            'post2url'       => $this->post2url != null ? urlencode($this->post2url) : null,
            'post2urlmethod' => $this->post2urlmethod, // form, json, xml, only if post2url !+ null
            'chat_email'     => $this->chatEmail, 
            'chat_passwd'    => $this->chatPasswd
          //'testmode'      => 'success' //Values:  success, warning, 
        ];

        return $this->query('sms', $params, 'PUT');
    }

    private function updateSmsConfigV2(){
        $params = [
            'did'      => $this->did,
            'sms_mode' => $this->smsMode,
            'value'    => $this->smsV2Value,

          //'testmode'      => 'success' //Values:  success, warning, 
        ];
        
        return $this->query('smsv2', $params, 'PUT');
    }

    public function deliveryStatus($msgId){
        $params = [
            'msg_id' => $msgId
        ]; 

        return $this->query('smsv2/deliverystatus', $params, 'GET');
    }

    public function sendMsg($didFrom, $didTo, $msg, $fpath = null)
    {
        $params = [
            'did'      => $didFrom,
            'did_to'   => $didTo,
            'msg'      => $msg,
          //'testmode'      => 'success' //Values:  success, warning, 
        ];

        if($this->version === 2){
            $params['file_url'] = $fpath;
            return $this->query('smsv2', $params, 'POST');
        }else{
            if(isset($fpath) && is_file($fpath)) {
                $params += [
                    'file'     => base64_encode( file_get_contents($fpath)),
                    'fname'    => base64_encode(pathinfo($fpath)['basename']),
                ]; 
            }
        }

        return $this->query('sms', $params, 'POST');
    }
    
    public function manageOffnetSmsService($action)
    {
        $params = [
            'did'    => $this->did,
            'offnetaction' => $action, // add, remove
          //'testmode'=> 'success' //Values:  success, warning, 
        ];
        
        return $this->query('sms/offnetorder', $params, 'POST');
    }
    
    public function statusOffnetSmsService()
    {
        $params = [
            'did' => $this->did,
        ];
        return $this->query('sms/offnetstatus', $params, 'GET');
    }
    
    public function getSmsHistory()
    {
       $params = [
           'period'      => [ strtotime('2020-08-25 00:00:31'), strtotime('2020-08-25 00:00:00')],
           'direction'   => 'in', // in , out or empry
           'msg_type'    => 'sms', // sms, mms
           'per_page'    => $this->perPage, // records per page
           'page'        => $this->page
        ];

        if($this->version === 2){
            return $this->query('smsv2/history', $params, 'GET');
        }
                
        return $this->query('sms/history', $params, 'GET');
    }

}
