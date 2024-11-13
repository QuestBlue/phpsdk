<?php

namespace questbluesdk\Models\Responses\Lnp\Data;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class LnpResponseData
{
    #[Type("string")]
    #[SerializedName("number2port")]
    protected string $numberToPort;

    #[Type("string")]
    protected string $id;

    #[Type("DateTime<'Y-m-d\TH:i:sP'>")]
    #[SerializedName("created_by")]
    protected \DateTime $createdBy;

    #[Type("string")]
    protected string $status;

    #[Type("DateTime<'Y-m-d\TH:i:sP'>")]
    #[SerializedName("foc_date")]
    protected ?\DateTime $focDate;

    #[Type("string")]
    #[SerializedName("did_mode")]
    protected string $didMode;

    #[Type("string")]
    protected string $trunk;

    #[Type("string")]
    #[SerializedName("partial_port")]
    protected string $partialPort;

    #[Type("string")]
    protected string $location;

    #[Type("string")]
    protected string $company;

    #[Type("string")]
    #[SerializedName("wireless_no")]
    protected string $wirelessNo;

    #[Type("string")]
    #[SerializedName("lidb_list")]
    protected string $lidbList;

    #[Type("string")]
    #[SerializedName("provider_name")]
    protected string $providerName;

    #[Type("string")]
    #[SerializedName("account_no")]
    protected string $accountNo;

    #[Type("string")]
    #[SerializedName("authorize_contact")]
    protected string $authorizeContact;

    #[Type("string")]
    #[SerializedName("contact_title")]
    protected string $contactTitle;

    #[Type("string")]
    #[SerializedName("street_no")]
    protected string $streetNo;

    #[Type("string")]
    #[SerializedName("dir_prefix")]
    protected string $dirPrefix;

    #[Type("string")]
    #[SerializedName("street_name")]
    protected string $streetName;

    #[Type("string")]
    #[SerializedName("dir_suffix")]
    protected string $dirSuffix;

    #[Type("string")]
    #[SerializedName("service_unit")]
    protected string $serviceUnit;

    #[Type("string")]
    protected string $city;

    #[Type("string")]
    protected string $zipcode;

    #[Type("string")]
    #[SerializedName("billing_telephone_no")]
    protected string $billingTelephoneNo;

}
