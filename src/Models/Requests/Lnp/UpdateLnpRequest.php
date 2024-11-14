<?php

namespace questbluesdk\Models\Requests\Lnp;

use questbluesdk\Models\Requests\BaseRequest;

/**
 * Class UpdateLnpRequest
 * Represents a request model for updating an existing LNP entry.
 */
class UpdateLnpRequest extends BaseRequest
{
    protected array $data = [];


    public function __construct(array $data = [], string $path = '')
    {
        if ($path !== '') {
            $data['bill_file']     = base64_encode(file_get_contents($path));
            $data['bill_filename'] = base64_encode(basename($path));
        }

        $this->data = $data;
    }//end __construct()


    public function setNumber2Port(array $numbers): self
    {
        $this->data['number2port'] = $numbers;
        return $this;
    }//end setNumber2Port()


    public function setFocDate(string $date): self
    {
        $this->data['foc_date'] = $date;
        return $this;
    }//end setFocDate()


    public function setActivateTime(string $time): self
    {
        $this->data['activate_time'] = $time;
        return $this;
    }//end setActivateTime()


    public function setDidMode(string $mode): self
    {
        $this->data['did_mode'] = $mode;
        return $this;
    }//end setDidMode()


    public function setTrunk(string $trunk): self
    {
        $this->data['trunk'] = $trunk;
        return $this;
    }//end setTrunk()


    public function setPartialPort(string $partialPort): self
    {
        $this->data['partial_port'] = $partialPort;
        return $this;
    }//end setPartialPort()


    public function setExtraServices(string $services): self
    {
        $this->data['extra_services'] = $services;
        return $this;
    }//end setExtraServices()


    public function setLocation(string $location): self
    {
        $this->data['location'] = $location;
        return $this;
    }//end setLocation()


    public function setCompany(string $company): self
    {
        $this->data['company'] = $company;
        return $this;
    }//end setCompany()


    public function setWirelessNo(string $wirelessNo): self
    {
        $this->data['wireless_no'] = $wirelessNo;
        return $this;
    }//end setWirelessNo()


    public function setPinCode(string $pincode): self
    {
        $this->data['pincode'] = $pincode;
        return $this;
    }//end setPinCode()


    public function setSsn(string $ssn): self
    {
        $this->data['ssn'] = $ssn;
        return $this;
    }//end setSsn()


    public function setLidbList(string $lidbList): self
    {
        $this->data['lidb_list'] = $lidbList;
        return $this;
    }//end setLidbList()


    public function setProviderName(string $providerName): self
    {
        $this->data['provider_name'] = $providerName;
        return $this;
    }//end setProviderName()


    public function setAccountNo(string $accountNo): self
    {
        $this->data['account_no'] = $accountNo;
        return $this;
    }//end setAccountNo()


    public function setAuthorizeContact(string $contact): self
    {
        $this->data['authorize_contact'] = $contact;
        return $this;
    }//end setAuthorizeContact()


    public function setContactTitle(string $title): self
    {
        $this->data['contact_title'] = $title;
        return $this;
    }//end setContactTitle()


    public function setStreetNo(string $streetNo): self
    {
        $this->data['street_no'] = $streetNo;
        return $this;
    }//end setStreetNo()


    public function setDirPrefix(string $prefix): self
    {
        $this->data['dir_prefix'] = $prefix;
        return $this;
    }//end setDirPrefix()


    public function setStreetName(string $streetName): self
    {
        $this->data['street_name'] = $streetName;
        return $this;
    }//end setStreetName()


    public function setDirSuffix(string $suffix): self
    {
        $this->data['dir_suffix'] = $suffix;
        return $this;
    }//end setDirSuffix()


    public function setServiceUnit(string $unit): self
    {
        $this->data['service_unit'] = $unit;
        return $this;
    }//end setServiceUnit()


    public function setCity(string $city): self
    {
        $this->data['city'] = $city;
        return $this;
    }//end setCity()


    public function setState(string $state): self
    {
        $this->data['state'] = $state;
        return $this;
    }//end setState()


    public function setZipcode(string $zipcode): self
    {
        $this->data['zipcode'] = $zipcode;
        return $this;
    }//end setZipcode()


    public function setBillingTelephoneNo(string $phone): self
    {
        $this->data['billing_telephone_no'] = $phone;
        return $this;
    }//end setBillingTelephoneNo()


    public function setPortOutPin(string $pin): self
    {
        $this->data['port_out_pin'] = $pin;
        return $this;
    }//end setPortOutPin()


    /**
     * Convert the request to an array, ready for the API call.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->data;
    }//end toArray()
}//end class
