<?php

namespace questbluesdk;


/*
 * International DIDs management
 */
class Interdids extends Connect {


    /*
     * List available countries
     */
    function listCountries(){
        return $this->query('didinter/countrylist');
    }


    /*
     * List available cities in a country
     */
    public function listCities($country_code)
    {
        $params = [
            'country_code'  => $country_code,
        ];

        return $this->query('didinter/citylist', $params);
    }
    
    
    
    /*
     * Order international DID
     */
    public function orderDid($country_code, $city, $route2trunk = null)
    {
        $params = [
            'country_code' => $country_code,
            'city'         => $city,
            'route2trunk'   => $route2trunk,
          //'testmode'    => 'success' //Values:  success, warning, error
        ];

        $result = $this->query('didinter', $params, 'POST');
        if($result === false) {
            return 'DID ordering error';
        }

        return isset($result->error) ? $result->error : true;
    }
    
    
    /*
     * List orderred International DIDss
     */
    public function listDids($did = null)
    {
        $params = [
            'did'      => $did,
          //'per_page' => 10,   // Range 5 - 200
         // 'page'     => 1
        ];

        return $this->query('didinter', $params);
    }
    

    /*
     * Update International DID
     * Note: $forward2did is depeciated, read the manual for more
     */
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
    
    

    
    /*
     * Delete INternational DID
     */
    public function deleteDid($did)
    {
        $params = [
            'did'           => $did,
            //'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('didinter', $params, 'DELETE');
    }
    
}




// Examples
$api = new Interdids;

// List available countries
 $response = $api->listCountries();


// List available cities
//$response = $api->listCities('AG');


// Order International DID
# $response = $api->orderDid('AG', 'SANTA FE', 'helloWorld');
# $response = $api->orderDid('AG', 'SANTA FE');

// List ordered International DIDs
//$response = $api->listDids();


// Manage DID forwarding
# $response = $api->updateDid(23232323237, 'helloWorld');
# $response = $api->updateDid(8888877777, '');
 
 
 //$response = $api->updateDid(380445433509, 'helloWorld'); // Depeciated


// Remove International DID
# $response = $api->deleteDid(380445433509);


echo '<pre>';
var_dump($response);