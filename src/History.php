<?php
require_once('./Connect.php');
date_default_timezone_set('EST');

/*
 * Account management
 */
class History extends Connect {

    /*
     * Retrieve country list to select $country_id
     */
    public function countryList()
    {
        return $this->query('account/countrylist');
    }
    
    
    /*
     * Retrieve Zone 2 country list to select $country_id
     */
    public function countryList2()
    {     
        return $this->query('account/ratezone2', ['country_list_only' => 'on']);
    }
     
    
    /*
     * Get account ballance
     */
    public function voiceCallHistory($trunk=null,  $period=null,  $did=null, $type=null, $country_id=null, $success_call_only=null, $summary_only=null,  $page=1, $per_page=5)
    {
        $params = [
            'trunk'             => $trunk,
            'period'            => $period,
            'did'               => $did, 
            'type'              => $type,
            'country_id'        => $country_id,
            'success_call_only' => $success_call_only, // Zone 2 Call country ID
            'summary_only'      => $summary_only,
            'page'              => 20,
            'per_page'          => $per_page   // 5 - 500
        ];
            
        return $this->query('callhistory', $params);
    }

    
 
    
}



// Call the class methods
$api = new History;

// $response = $api->countryList();
// $response = $api->countryList2();

// $response = $api->voiceCallHistory();
// $response = $api->voiceCallHistory(null, 'yesterday');  
//  $response = $api->voiceCallHistory(null, [  strtotime('2022-05-20') ,  strtotime('2022-05-22') ], null, null, 2928, null);
 

print_r( $response);


      


