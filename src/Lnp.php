<?php

namespace questbluesdk;

use questbluesdk\Models\Responses\ErrorResponse;

/**
 * Class Lnp
 * Handles Local Number Portability (LNP) operations, including checking portability, creating LNP requests,
 * listing, updating, and deleting LNP entries.
 */
class Lnp extends Connect
{
    /**
     * Check if a number is portable.
     *
     * @param string $number2port The number to check for portability.
     * @return string|ErrorResponse
     */
    public function checkPortability(string $number2port): string|ErrorResponse
    {
        return $this->query('lnp/check', ['number2port' => $number2port]);
    }

    /**
     * Create a new LNP request.
     *
     * @param array $params Parameters for the LNP request.
     * @param string $path Path to the file (e.g., phone bill) to be included in the request.
     * @return string|ErrorResponse
     */
    public function createLnp(array $params, string $path): string|ErrorResponse
    {
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

        foreach ($params as $key => $value) {
            $data[$key] = $value;
        }

        return $this->query('lnp', $data, 'POST');
    }

    /**
     * List LNP requests with optional filters.
     *
     * @param array $params Filtering parameters for listing LNP entries.
     * @return string|ErrorResponse
     */
    public function listLnp(array $params): string|ErrorResponse
    {
        $data = [
            'number2port' => null,
            'id'          => null,
            'per_page'    => 10,
            'page'        => 1
        ];

        foreach ($params as $key => $value) {
            $data[$key] = $value;
        }

        return $this->query('lnp', $data);
    }

    /**
     * Update an existing LNP request.
     *
     * @param array $params Parameters for updating the LNP request.
     * @param string $path Optional path to a new file (e.g., updated phone bill) to include in the request.
     * @return string|ErrorResponse
     */
    public function updateLnp(array $params, string $path = ''): string|ErrorResponse
    {
        $data = $params;

        if ($path !== '') {
            $data['bill_file'] = base64_encode(file_get_contents($path));
            $data['bill_filename'] = base64_encode(basename($path));
        }

        return $this->query('lnp', $data, 'PUT');
    }

    /**
     * Delete an LNP request.
     *
     * @param array $params Parameters to specify which LNP request to delete.
     * @return string|ErrorResponse
     */
    public function deleteLnp(array $params): string|ErrorResponse
    {
        $data = [
            'id' => null,
        ];

        foreach ($params as $key => $value) {
            $data[$key] = $value;
        }

        return $this->query('lnp', $data, 'DELETE');
    }
}
