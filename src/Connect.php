<?php

namespace questbluesdk;

use GuzzleHttp\Client;

class Connect
{
    private $login;
    private $password;
    private $key;
    private $debug;
    private $client;

    public function __construct($debug = false){
        $this->debug = $debug;
        $this->client = new Client([
            'base_uri' => $this->debug ? 'https://api2dev.questblue.com/' : 'https://api.questblue.com/',
            'timeout' => 45,
            'verify' => false
        ]);
    }
    
    public function init($login, $password, $key)
    {
        $this->login = $login; // Your account username or API username
        $this->password = $password; // Your account password or API password
        $this->key = $key; // Your API private key
    }

    function query($request, $params = [], $method = 'GET') 
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Security-Key' => $this->key
        ];

        $options = [
            'headers' => $headers,
            'auth' => [
                $this->login,
                $this->password
            ],
        ];

        if (!empty($params)) {
            $options['json'] = $params;
        }

        if(is_array($params) && count($params) > 0) {
            $params = json_encode($params);
        }

        try {
            $response = $this->client->request($method, $request, $options);
            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            return 'API request error: ' . $e->getMessage();
        }
    }
}
