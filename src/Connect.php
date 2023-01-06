<?php

namespace questbluesdk;

class Connect
{
    private $login;
    private $password;
    private $key;
    private $type;
    private $my_ip;
    
    public function __construct()
    {
        $this->login = 'ACCOUNT_LOGIN'; // Your account username or API username
        $this->password = 'ACCOUNT_PASSWORD'; // Your account password or API password
        $this->key = 'ACCOUNT_PRIVATE_KEY'; // Your API private key
        $this->type = 'json'; // API type, available values: json, xml
    }
    

    function query($request, $params = [], $method = 'GET') 
    {
        $ch = curl_init();

        if($this->type == 'xml') {
           curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/xml', 'Security-Key:' . $this->key) );  
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Security-Key:' . $this->key) );
            if(is_array($params) && count($params) > 0) {
                $params = json_encode($params);
            } 
        }
        
        curl_setopt($ch, CURLOPT_URL, 'https://api2.questblue.com/' . $request ); // Production
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HEADER, 0); // Set 1 to debug
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'QuestBlue API v.2');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 45);
        curl_setopt($ch, CURLOPT_TIMEOUT, 45);
        curl_setopt($ch, CURLOPT_USERPWD,  $this->login . ':' . $this->password);

        $response = curl_exec($ch);
        $resp_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Debug
        //echo '<br/>Server resp: <br><pre>'; var_dump($response); echo '</pre>response code: ' . $resp_code. '<br><br>';

        return $response === false ? 'API2 request error' : $response;
    }
    

}