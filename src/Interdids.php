<?php

namespace questbluesdk;

class Interdids extends Connect
{

    function listCountries(){
        return $this->query('didinter/countrylist');
    }

    public function listCities($countryCode)
    {
        $params = [
            'country_code'  => $countryCode,
        ];

        return $this->query('didinter/citylist', $params);
    }
    
    public function orderDid($countryCode, $city, $route2trunk = null)
    {
        $params = [
            'country_code' => $countryCode,
            'city'         => $city,
            'route2trunk'   => $route2trunk,
          //'testmode'    => 'success' //Values:  success, warning, error
        ];

        $result = $this->query('didinter', $params, 'POST');
        if ($result === false) {
            return 'DID ordering error';
        }

        return isset($result->error) ? $result->error : true;
    }
    
    public function listDids($did = null)
    {
        $params = [
            'did'      => $did,
          //'per_page' => 10,   // Range 5 - 200
         // 'page'     => 1
        ];

        return $this->query('didinter', $params);
    }
    
    public function updateDid($did, $route2trunk = null, $forward2did = null)
    {
        $params = [
            'did'           => $did,
            'route2trunk'   => $route2trunk,
            'forward2did'   => $forward2did,
          //'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('didinter', $params, 'PUT');
    }
    
    public function deleteDid($did)
    {
        $params = [
            'did'           => $did,
            //'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('didinter', $params, 'DELETE');
    }
    
}