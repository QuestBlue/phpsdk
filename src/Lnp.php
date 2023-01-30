<?php

namespace questbluesdk;

class Lnp extends Connect {

    public function checkPortability($number2port)
    {
        return $this->query('lnp/check', ['number2port' => $number2port] );
    }

    public function createLnp($params,$path)
    {
        //$path = '/path/to/file/file.png';
        $data = [
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
            'bill_filename'  => base64_encode(pathinfo($path)['basename']),
            
            //'testmode'      => 'success', 
        ];

        foreach($params as $key=>$value)
            $data[$key] = $value;

        return $this->query('lnp', $data, 'POST');
    }

    public function listLnp($params)
    {
        $data = [
            'number2port' => null,
            'id' => null,
            'per_page'  => 10,  // 1 - 100
            'page'       => 1
        ];

        foreach($params as $key=>$value)
            $data[$key] = $value;

        return $this->query('lnp', $data);
    }
       
    public function updateLnp($params,$path = '')
    {
        $data = [
            'id' => 17740,                                   // Required
            'foc_date'             => null, //'2020-07-22',        // Request Firm Order Commitment (FOC) date. Optional
            'activate_time'        => null, //'14:00',             // Reuested FOC Activation time Eastern Standard Time (EST). Optional, from 00:00 to 23:00 Must be roud hour if set (12.00, 13.00 etc)
            'trunk'                => null, //'myTrunkName',            // String. Optional. SIP trunk name to route the DID to. For voice DIDs only.
            'partial_port'         => null, //'no',                // Values: no (default), yes
            'extra_services'       => null, //'some extra333',     // String. Required if only partial_port == yes
            'location'             => null, //'business',          // Values: business, residential. Required
            'company'              => null, //'My Company Name3',  // Company name. Required if location is set to Business
            'wireless_no'          => null, //'no',                // no(default), yes.
            'pincode'              => null, //'6666',              // Wireless account PIN code. Required if  wireless_no == 1 only
            'ssn'                  => null, //'7777',              // SSN last four digits. Required if  wireless_no == 1 only
            'lidb_list'            => null, //'no',                // Values:   no (default), yes
            'provider_name'        => null, //'AC&DC',             // Max. 255 chars. Required
            'account_no'           => null, //'111',               // Max. 100 chars. Required
            'authorize_contact'    => null, //'John Doe',          // Max. 15 chars. Required
            'contact_title'        => null, //'CEO/Owner',         // Values: Employee, President, CEO/Owner.  Required
            'street_no'            => null, //'17345',             // Max. 50 chars. Required

             'dir_prefix'          => null, //'SE',               // Max. 10 chars. Values example: None, N, NE, E, SE, S, SW, W, NW. Optional
            'street_name'          => null, //'Park Avenue',       // Max. 100 chars. Required
            'dir_suffix'           => null, //'NE',                // Max. 10 chars. Values example: None, N, NE, E, SE, S, SW, W, NW. Optional
            'service_unit'         => null, //'1666',              // Service Suit/Unit. Max. 100 chars. Optional
            'city'                 => null, //'Durham',            // Service City. Max. 100 chars. Required
            'state'                => null, //'AA',                 // Service State. Optional
            'zipcode'              => null, //'7777',              // Service ZipCode Max. 20 chars. Required
            'billing_telephone_no' => null, //'1234567890',        // Billing Telephone Number. Max. 20 chars.  Required
            'port_out_pin'         => null,//'123',                    // Previous carrier port out PIN. Optional

            // Phone bill, full path to GIF, JPG, PNG or PDF file. Size up to 2Mb
            // 'testmode'      => 'error',
        ];

        foreach($params as $key=>$value)
            $data[$key] = $value;
        if('' !== path){
            
            $data['bill_file'] = base64_encode(file_get_contents($path));
            $data['bill_filename'] = base64_encode(basename($path));
            
        }

        return $this->query('lnp', $data, 'PUT');
    }
    
    
    public function deleteLnp($params)
    {
        $data = [
             'id' => null,
            // 'testmode'      => 'error', 

        ];

        foreach($params as $key=>$value)
            $data[$key] = $value;

        return $this->query('lnp', $data, 'DELETE');
    }
    
}
