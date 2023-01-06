<?php

namespace questbluesdk;


/*
 * Local and Toll Free DIDs management
 *
 */
class Dids extends Connect {


    /*
     * List available states
     */
    function listStates(){
        return $this->query('did/states');
    }

    
    /*
     * List available Rate Centers
     */
    public function listRateCenters($tier, $state)
    {
        $params = [
            'tier'  => $tier,
            'state' => $state
        ];

        return $this->query('did/ratecenters', $params);
    }


    /*
     * List available Local or Toll Free DIDs
     */
    public function listAvailableDids($type, $tier, $state = null, $ratecenter = null, $npa = null, $zip = null, $code = null)
    {
        $params = [
            'type'        => $type,
            'tier'        => $tier,
            'state'       => $state,
            'ratecenter'  => $ratecenter,
            'npa'         => $npa,
            'zip'         => $zip,
            'code'        => $code
        ];
        return $this->query('did/available', $params);
    }


    /*
     * Order Local or Toll Free DID
     */
    public function orderDid($tier, $did, $note = null, $route2trunk = null, $pin = null, $lidb = null, $cnam = null, $e911 = null, $dlda = null)
    {
        $params = [
            'tier'         => $tier,
            'did'          => $did,
            'note'         => $note,
            'route2trunk'  => $route2trunk,
            'pin'          => $pin,
            'lidb'         => $lidb,
            'cnam'         => $cnam,
            'e911'         => $e911,
            'dlda'         => $dlda,
         // 'testmode'    => 'success' //Values:  success, warning, error
        ];

        $result = $this->query('did', $params, 'POST');
        if($result === false) {
            return 'DID ordering error';
        }

        return isset($result->error) ? $result->error : true;
    }


    /*
     * List Ordered DIDs
     */
    public function listDids($did = '')
    {
        $params = [
            'did'      => $did,
         // 'per_page' => 10,   // Range 5 - 200
         // 'page'     => 1
        ];

        return $this->query('did', $params);
    }



    
    
    /*
     * Update DID
     */
    public function updateDid($did, $note = null, $pin = null, $route2trunk = null, $forw2did = null, $failover = null, $lidb = null, $cnam = null, $e911 = null, $dlda = null, $e911_call_alert = null)
    {
        $params = [
            'did'             => $did,
            'note'            => $note,
            'pin'             => $pin,
            'route2trunk'     => $route2trunk,
            'forw2did'        => $forw2did,
            'failover'        => $failover,
            'lidb'            => $lidb,
            'cnam'            => $cnam,
            'e911'            => $e911,
            'dlda'            => $dlda,
            'e911_call_alert' => $e911_call_alert
         // 'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('did', $params, 'PUT');
    }

    
    /*
     * Move Voice DID to Fax inventory
     */
    public function move2fax($did)
    {
        $params = [
            'did'           => $did,
         // 'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('did/move2fax', $params, 'PUT');
    }
    
    
    /*
     * Delete DID
     */
    public function deleteDid($did)
    {
        $params = [
            'did'           => $did,
         // 'testmode'      => 'success' //Values:  success, warning, error
        ];

        return $this->query('did', $params, 'DELETE');
    }

}


// Call the class methods

$api = new Dids;

// List available states
# $response = $api->listStates(); 


// List rate centers
# $response = $api->listRateCenters('2', 'LA');
 

// List available DIDs
 # $response = $api->listAvailableDids('local', '2', 'NC', 'DURHAM');


// Order DID
 
// Uncomment to set E911 
/*
$e911 = [
    'e911_name'       => 'John Doe',
    'e911_city'       => 'Cary',
    'e911_state'      => 'NC',
    'e911_zip'        =>  27713,
    'e911_address'    => '1949 Evans Rd',
    'e911_unittype'   => 'flat',
    'e911_unitnumber' => ''
];
*/

// Uncomment to set DLDA
/*
$dlda = [
    'dlda_type'        => 'residential', // business, residential
    'dlda_name'        => 'John', // Person name for 'residential' dlda_type or Company name for 'business' dlda_type
    'dlda_lastname'    => 'Doe',
    'dlda_streetnum'   => '1947',
    'dlda_streetname'  => 'Evans Rd',
    'dlda_city'        => 'Cary',
    'dlda_state'       => 'NC',
    'dlda_zip'         => '27713',
    'dlda_email'       => 'john.doe@email.com',
    'dlda_phone'       => '9192515877'
];
*/

 # $response = $api->orderDid('1b', 9802835030, 'My Note');
 # $response = $api->orderDid('1b', [9802835030, 9802835031, 'My Note', null, null, null, null, $e911);


// Ordered DIDs inventory and properties
# $response = $api->listDids('984*');
# $response = $api->listDids(9802835030);


// Update DID properties
/*
$failover = [
    'failover_did'   => '9194078471', // US based number to set failover. Value: Ten digit only // Set failover_did OR failover_email
 // 'failover_email' => 'john.doe@email.com', // Set failover_email OR failover_did 
    'failover_num'   => 100, // Inbound offline calls number (received within offline time). Value: from 1 to 100
    'failover_time'  => 30  // Time range (in minutes) to receive failover_num offline calls. Possible values: 2, 3, 5, 7, 10, 15, 20, 30,
];
 //$failover = ''; // Unset failover
 */

// Uncomment to set E911 
/*   
$e911 = [
    'e911_name'       => 'John Doe',
    'e911_city'       => 'Cary',
    'e911_state'      => 'NC',
    'e911_zip'        => 27713,
    'e911_address'    => '1949 Evans Rd',
    'e911_unittype'   => 'flat',
    'e911_unitnumber' => ''
];
*/

   
// Uncomment to set 911 call notification
$e911_call_alert = 'no';
/*$e911_call_alert = [
    'email' => 'someEmail@ukr.net' 
   //'sms' => 1231231231
];*/


# $response = $api->updateDid(9802835030, '', '1234'); // Manage SIP trunk  5876007773
# $response = $api->updateDid(9802835030, '', '', null, null); // Failoved
# $response = $api->updateDid(9802835030, 'note2', null, null, null, null, 'nLid'); // Set E911
# $response = $api->updateDid(9802835030, 'note3', null, null, null, null, null, null, null, null, $e911_call_alert); // Unset E911 call notification


// Move DID to iFax inventory
# $response = $api->move2fax(9802835030);


// Completely remove DID from the system
# $response = $api->deleteDid(9802835030);



echo '<pre>';
print_r($response);

