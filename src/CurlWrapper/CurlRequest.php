<?php

namespace questbluesdk\CurlWrapper;

class CurlRequest{
    private $handle = null;

    public function __construct($url){
        $this->handle = curl_init($url);
    }

    public function setOption($name, $value)
    {
        curl_setopt($this->handle, $name, $value);
        
        return $this;
    }

    public function setHeaders(array $headers){
        $this->setOption(CURLOPT_HTTPHEADER, $headers);

        return $this;
    }

    public function execute(){
        $result = curl_exec($this->handle);

        $this->close();

        return $result;
    }

    public function getInfo($name){
        return curl_getinfo($this->handle, $name);
    }

    public function close(){
        curl_close($this->handle);
    }
}