<?php

namespace questbluesdk;

use questbluesdk\CurlWrapper\CurlRequest;

class Connect
{
    private $login;
    private $password;
    private $key;
    
    public function init($login, $password, $key)
    {
        $this->login = $login; // Your account username or API username
        $this->password = $password; // Your account password or API password
        $this->key = $key; // Your API private key
    }

    function query($request, $params = [], $method = 'GET') 
    {
        $headers = [
            'Content-Type: application/json',
            "Security-Key: {$this->key}"
        ];

        if(is_array($params) && count($params) > 0) {
            $params = json_encode($params);
        } 

        $request = (new CurlRequest("https://api2.questblue.com/$request"))
            ->setHeaders($headers)
            ->setOption(CURLOPT_CUSTOMREQUEST, $method)
            ->setOption(CURLOPT_HEADER, 0) // Set 1 to debug
            ->setOption(CURLOPT_RETURNTRANSFER, 1)
            ->setOption(CURLOPT_USERAGENT, 'QuestBlue API v.2')
            ->setOption(CURLOPT_SSL_VERIFYPEER, 0)
            ->setOption(CURLOPT_CONNECTTIMEOUT, 45)
            ->setOption(CURLOPT_TIMEOUT, 45)
            ->setOption(CURLOPT_POSTFIELDS, $params)
            ->setOption(CURLOPT_USERPWD, "{$this->login}:{$this->password}");

        $response = $request->execute();

        return $response === false ? 'API2 request error' : $response;
    }
}