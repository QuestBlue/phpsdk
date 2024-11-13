<?php

namespace questbluesdk\Models\Requests\Lnp;

use questbluesdk\Models\Requests\BaseRequest;

class CreateLnpRequest extends BaseRequest
{

    protected ?array $number2port = null;

    protected ?string $foc_date = null;

    protected ?string $activate_time = null;

    protected ?string $did_mode = null;

    protected ?string $trunk = null;

    protected ?string $partial_port = null;

    protected ?string $extra_services = null;

    protected ?string $location = null;

    protected ?string $company = null;

    protected ?string $wireless_no = null;

    protected ?string $pincode = null;

    protected ?string $ssn = null;

    protected ?string $lidb_list = null;

    protected ?string $provider_name = null;

    protected ?string $account_no = null;

    protected ?string $authorize_contact = null;

    protected ?string $contact_title = null;

    protected ?string $street_no = null;

    protected ?string $dir_prefix = null;

    protected ?string $street_name = null;

    protected ?string $dir_suffix = null;

    protected ?string $service_unit = null;

    protected ?string $city = null;

    protected ?string $state = null;

    protected ?string $zipcode = null;

    protected ?string $billing_telephone_no = null;

    protected ?string $port_out_pin = null;

    protected string $bill_file;

    protected string $bill_filename;


    public function __construct(string $path)
    {
        $this->bill_file     = base64_encode(file_get_contents($path));
        $this->bill_filename = base64_encode(pathinfo($path, PATHINFO_BASENAME));

    }//end __construct()


    public function setNumber2Port(array $numbers): self
    {
        $this->number2port = $numbers;
        return $this;

    }//end setNumber2Port()


    public function setFocDate(string $date): self
    {
        $this->foc_date = $date;
        return $this;

    }//end setFocDate()


    public function setActivateTime(string $time): self
    {
        $this->activate_time = $time;
        return $this;

    }//end setActivateTime()


    public function setDidMode(string $mode): self
    {
        $this->did_mode = $mode;
        return $this;

    }//end setDidMode()


    public function setTrunk(string $trunk): self
    {
        $this->trunk = $trunk;
        return $this;

    }//end setTrunk()


    public function setPartialPort(string $partialPort): self
    {
        $this->partial_port = $partialPort;
        return $this;

    }//end setPartialPort()


    public function setExtraServices(string $services): self
    {
        $this->extra_services = $services;
        return $this;

    }//end setExtraServices()


    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;

    }//end setLocation()


    public function setCompany(string $company): self
    {
        $this->company = $company;
        return $this;

    }//end setCompany()


    public function setWirelessNo(string $wirelessNo): self
    {
        $this->wireless_no = $wirelessNo;
        return $this;

    }//end setWirelessNo()


    public function setPinCode(string $pincode): self
    {
        $this->pincode = $pincode;
        return $this;

    }//end setPinCode()


    public function setSsn(string $ssn): self
    {
        $this->ssn = $ssn;
        return $this;

    }//end setSsn()


    public function setLidbList(string $lidbList): self
    {
        $this->lidb_list = $lidbList;
        return $this;

    }//end setLidbList()


    public function setProviderName(string $providerName): self
    {
        $this->provider_name = $providerName;
        return $this;

    }//end setProviderName()


    public function setAccountNo(string $accountNo): self
    {
        $this->account_no = $accountNo;
        return $this;

    }//end setAccountNo()


    public function setAuthorizeContact(string $contact): self
    {
        $this->authorize_contact = $contact;
        return $this;

    }//end setAuthorizeContact()


    public function setContactTitle(string $title): self
    {
        $this->contact_title = $title;
        return $this;

    }//end setContactTitle()


    public function setStreetNo(string $streetNo): self
    {
        $this->street_no = $streetNo;
        return $this;

    }//end setStreetNo()


    public function setDirPrefix(string $prefix): self
    {
        $this->dir_prefix = $prefix;
        return $this;

    }//end setDirPrefix()


    public function setStreetName(string $streetName): self
    {
        $this->street_name = $streetName;
        return $this;

    }//end setStreetName()


    public function setDirSuffix(string $suffix): self
    {
        $this->dir_suffix = $suffix;
        return $this;

    }//end setDirSuffix()


    public function setServiceUnit(string $unit): self
    {
        $this->service_unit = $unit;
        return $this;

    }//end setServiceUnit()


    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;

    }//end setCity()


    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;

    }//end setState()


    public function setZipcode(string $zipcode): self
    {
        $this->zipcode = $zipcode;
        return $this;

    }//end setZipcode()


    public function setBillingTelephoneNo(string $phone): self
    {
        $this->billing_telephone_no = $phone;
        return $this;

    }//end setBillingTelephoneNo()


    public function setPortOutPin(string $pin): self
    {
        $this->port_out_pin = $pin;
        return $this;

    }//end setPortOutPin()


    public function toArray(): array
    {
        return array_filter(get_object_vars($this), fn($value) => $value !== null);

    }//end toArray()


}//end class
