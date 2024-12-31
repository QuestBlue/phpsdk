<?php

namespace questbluesdk\Models\Requests\Lnp;

use questbluesdk\Models\Requests\BaseRequest;

class CreateLnpRequest extends BaseRequest
{
    protected ?array $number2Port = null;
    protected ?string $focDate = null;
    protected ?string $activateTime = null;
    protected ?string $didMode = null;
    protected ?string $trunk = null;
    protected ?string $partialPort = null;
    protected ?string $extraServices = null;
    protected ?string $location = null;
    protected ?string $company = null;
    protected ?string $wirelessNo = null;
    protected ?string $pinCode = null;
    protected ?string $ssn = null;
    protected ?string $lidbList = null;
    protected ?string $providerName = null;
    protected ?string $accountNo = null;
    protected ?string $authorizeContact = null;
    protected ?string $contactTitle = null;
    protected ?string $streetNo = null;
    protected ?string $dirPrefix = null;
    protected ?string $streetName = null;
    protected ?string $dirSuffix = null;
    protected ?string $serviceUnit = null;
    protected ?string $city = null;
    protected ?string $state = null;
    protected ?string $zipcode = null;
    protected ?string $billingTelephoneNo = null;
    protected ?string $portOutPin = null;
    protected string $billFile;
    protected string $billFilename;

    public function __construct(string $path)
    {
        $this->billFile = base64_encode(file_get_contents($path));
        $this->billFilename = base64_encode(pathinfo($path, PATHINFO_BASENAME));
    }

    public function setNumber2Port(array $numbers): self
    {
        $this->number2Port = $numbers;
        return $this;
    }

    public function setFocDate(string $date): self
    {
        $this->focDate = $date;
        return $this;
    }

    public function setActivateTime(string $time): self
    {
        $this->activateTime = $time;
        return $this;
    }

    public function setDidMode(string $mode): self
    {
        $this->didMode = $mode;
        return $this;
    }

    public function setTrunk(string $trunk): self
    {
        $this->trunk = $trunk;
        return $this;
    }

    public function setPartialPort(string $partialPort): self
    {
        $this->partialPort = $partialPort;
        return $this;
    }

    public function setExtraServices(string $services): self
    {
        $this->extraServices = $services;
        return $this;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;
        return $this;
    }

    public function setWirelessNo(string $wirelessNo): self
    {
        $this->wirelessNo = $wirelessNo;
        return $this;
    }

    public function setPinCode(string $pinCode): self
    {
        $this->pinCode = $pinCode;
        return $this;
    }

    public function setSsn(string $ssn): self
    {
        $this->ssn = $ssn;
        return $this;
    }

    public function setLidbList(string $lidbList): self
    {
        $this->lidbList = $lidbList;
        return $this;
    }

    public function setProviderName(string $providerName): self
    {
        $this->providerName = $providerName;
        return $this;
    }

    public function setAccountNo(string $accountNo): self
    {
        $this->accountNo = $accountNo;
        return $this;
    }

    public function setAuthorizeContact(string $contact): self
    {
        $this->authorizeContact = $contact;
        return $this;
    }

    public function setContactTitle(string $title): self
    {
        $this->contactTitle = $title;
        return $this;
    }

    public function setStreetNo(string $streetNo): self
    {
        $this->streetNo = $streetNo;
        return $this;
    }

    public function setDirPrefix(string $prefix): self
    {
        $this->dirPrefix = $prefix;
        return $this;
    }

    public function setStreetName(string $streetName): self
    {
        $this->streetName = $streetName;
        return $this;
    }

    public function setDirSuffix(string $suffix): self
    {
        $this->dirSuffix = $suffix;
        return $this;
    }

    public function setServiceUnit(string $unit): self
    {
        $this->serviceUnit = $unit;
        return $this;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;
        return $this;
    }

    public function setState(string $state): self
    {
        $this->state = $state;
        return $this;
    }

    public function setZipCode(string $zipcode): self
    {
        $this->zipcode = $zipcode;
        return $this;
    }

    public function setBillingTelephoneNo(string $phone): self
    {
        $this->billingTelephoneNo = $phone;
        return $this;
    }

    public function setPortOutPin(string $pin): self
    {
        $this->portOutPin = $pin;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'number2port' => $this->number2Port,
            'foc_date' => $this->focDate,
            'activate_time' => $this->activateTime,
            'did_mode' => $this->didMode,
            'trunk' => $this->trunk,
            'partial_port' => $this->partialPort,
            'extra_services' => $this->extraServices,
            'location' => $this->location,
            'company' => $this->company,
            'wireless_no' => $this->wirelessNo,
            'pincode' => $this->pinCode,
            'ssn' => $this->ssn,
            'lidb_list' => $this->lidbList,
            'provider_name' => $this->providerName,
            'account_no' => $this->accountNo,
            'authorize_contact' => $this->authorizeContact,
            'contact_title' => $this->contactTitle,
            'street_no' => $this->streetNo,
            'dir_prefix' => $this->dirPrefix,
            'street_name' => $this->streetName,
            'dir_suffix' => $this->dirSuffix,
            'service_unit' => $this->serviceUnit,
            'city' => $this->city,
            'state' => $this->state,
            'zipcode' => $this->zipcode,
            'billing_telephone_no' => $this->billingTelephoneNo,
            'port_out_pin' => $this->portOutPin,
            'bill_file' => $this->billFile,
            'bill_filename' => $this->billFilename,
        ];
    }
}
