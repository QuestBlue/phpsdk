<?php
require_once('./Connect.php');


/*
 * Local Number Portability management
 *
 */
class Lnp extends Connect {


    /*
     * Check porting  Portability
     */
    public function checkPortability($number2port)
    {
        return $this->query('lnp/check', ['number2port' => $number2port] );
    }


    
    /*
     * Create new LNP request
     */
    public function createLnp()
    {
        $path = '/path/to/file/file.png'; 
        $params = array (
            //'number2port'          => ['8357898207', '8357898208'],  
            'number2port'          => ['8357898808'],  
            'foc_date'             => '2019-04-12',        // Request Firm Order Commitment (FOC) date. Optional
            'activate_time'        => '14:00',             // Reuested FOC Activation time Eastern Standard Time (EST). Optional, from 00:00 to 23:00 Must be roud hour if set (12.00, 13.00 etc)
            'did_mode'             => 'voice',             // voice, fax
            'trunk'                => '',                  // String. Optional. SIP trunk name to route the DID to. For voice DIDs only.
            'partial_port'         => 'no',                //Values: no (default), yes  
            'extra_services'       => '',                  // String. Required if only partial_port == yes
            'location'             => 'business',          // Values: business, residential. Required
            'company'              => 'My Company Name',   // Company name. Required if location is set to Business
            'wireless_no'          => 'no',                // no(default), yes. 
            'pincode'              => '4444',              // Wireless account PIN code. Required if  wireless_no == 1 only
            'ssn'                  => '5555',              // SSN last four digits. Required if  wireless_no == 1 only
            'lidb_list'            => 'no',                   // Values:   no (default), yes
            'provider_name'        => 'AT&T',              // Max. 255 chars. Required
            'account_no'           => '111',               // Max. 100 chars. Required
            'authorize_contact'    => 'John Doe',          // Max. 15 chars. Required
            'contact_title'        => 'CEO/Owner',         // Values: Employee, President, CEO/Owner.  Required
            'street_no'            => '17342',             // Max. 50 chars. Required
            'dir_prefix'           => 'None',              // Max. 10 chars. Values example: None, N, NE, E, SE, S, SW, W, NW. Optional
            'street_name'          => 'Park Avenue',       // Max. 100 chars. Required
            'dir_suffix'           => 'NE',                // Max. 10 chars. Values example: None, N, NE, E, SE, S, SW, W, NW. Optional
            'service_unit'         => '87',                // Service Suit/Unit. Max. 100 chars. Optional
            'city'                 => 'Houston',           // Service City. Max. 100 chars. Required
            'state'                => 'MA',                 // Service State. Optional
            'zipcode'              => '55346',             // Service ZipCode Max. 20 chars. Required
            'billing_telephone_no' => '3042051420',        // Billing Telephone Number. Max. 20 chars.  Required
            'port_out_pin'         => '1234',              // Previous carrier port out PIN. Optional

            // Phone bill, full path to GIF, JPG, PNG or PDF file. Size up to 2Mb
            'bill_file'      => base64_encode(file_get_contents($path)),
            'bill_filename'  => base64_encode(basename($path)),
            
            //'testmode'      => 'success', 
        );

        return $this->query('lnp', $params, 'POST');
    }

    
    /*
     * List active LNP requests
     */
    public function listLnp($number2port = null, $id = null)
    {
        $params = [
           'number2port' => $number2port,
            //'id' => $id,
           // 'per_page'  => 10,  // 1 - 100
           // 'page'       => 1
        ];
        return $this->query('lnp', $params); 
    }
       
    
    
    
    public function updateLnp()
    {
       // $path = '/path/to/file/file.png'; 

        $params = array(
            'id' => 17740,                                   // Required
            //'foc_date'             => '2020-07-22',        // Request Firm Order Commitment (FOC) date. Optional
            //'activate_time'        => '14:00',             // Reuested FOC Activation time Eastern Standard Time (EST). Optional, from 00:00 to 23:00 Must be roud hour if set (12.00, 13.00 etc)
            //'trunk'                => 'myTrunkName',            // String. Optional. SIP trunk name to route the DID to. For voice DIDs only.
            //'partial_port'         => 'no',                // Values: no (default), yes  
            //'extra_services'       => 'some extra333',     // String. Required if only partial_port == yes
            //'location'             => 'business',          // Values: business, residential. Required
            //'company'              => 'My Company Name3',  // Company name. Required if location is set to Business
            //'wireless_no'          => 'no',                // no(default), yes. 
            //'pincode'              => '6666',              // Wireless account PIN code. Required if  wireless_no == 1 only
            //'ssn'                  => '7777',              // SSN last four digits. Required if  wireless_no == 1 only
            //'lidb_list'            => 'no',                // Values:   no (default), yes
            //'provider_name'        => 'AC&DC',             // Max. 255 chars. Required
            //'account_no'           => '111',               // Max. 100 chars. Required
            //'authorize_contact'    => 'John Doe',          // Max. 15 chars. Required
            //'contact_title'        => 'CEO/Owner',         // Values: Employee, President, CEO/Owner.  Required
            //'street_no'            => '17345',             // Max. 50 chars. Required

            // 'dir_prefix'          => 'SE',               // Max. 10 chars. Values example: None, N, NE, E, SE, S, SW, W, NW. Optional
            //'street_name'          => 'Park Avenue',       // Max. 100 chars. Required
            //'dir_suffix'           => 'NE',                // Max. 10 chars. Values example: None, N, NE, E, SE, S, SW, W, NW. Optional
            //'service_unit'         => '1666',              // Service Suit/Unit. Max. 100 chars. Optional
            //'city'                 => 'Durham',            // Service City. Max. 100 chars. Required
            //'state'                => 'AA',                 // Service State. Optional
            //'zipcode'              => '7777',              // Service ZipCode Max. 20 chars. Required
            //'billing_telephone_no' => '1234567890',        // Billing Telephone Number. Max. 20 chars.  Required
            'port_out_pin'           => '123',                    // Previous carrier port out PIN. Optional

            // Phone bill, full path to GIF, JPG, PNG or PDF file. Size up to 2Mb
            //'bill_file'      => base64_encode(file_get_contents($path)),
            //'bill_filename'  => base64_encode(basename($path)) ,
            // 'testmode'      => 'error', 
        );

        return $this->query('lnp', $params, 'PUT');
    }
    
    
    public function deleteLnp()
    {
        $params = array(
             'id' => 19432,
            // 'testmode'      => 'error', 

        );

        return $this->query('lnp', $params, 'DELETE');
    }
    
    
    
}



    
    
    

// Call the class methods
$api = new Lnp;

// Check porting availability
 # $response = $api->checkPortability([6572957817, 6572957818]);
 # $response = $api->checkPortability(6572957818);

// Submit new LNP request
 # $response = $api->createLnp();


// List active LNP requests
# $response = $api->listLnp('*006814');
# $response = $api->listLnp(null, 18775);
# $response = $api->listLnp(null, [17536, 17535, 17534]);
 $response = $api->listLnp('');

 
 // Update active LNP request
 # $response = $api->updateLnp();


// Delete LNP request
# $response = $api->deleteLnp();


echo '<pre>';
print_r($response);
//var_dump($response);
