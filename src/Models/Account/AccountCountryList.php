<?php

namespace questbluesdk\Models\Account;

use JMS\Serializer\Annotation\Type;

/**
 * Class AccountCountryList
 * Represents a country list object, containing a detailed list of each country by id and country name.
 */
class AccountCountryList
{
    /**
     * @var AccountCountryListData[] $data List of country data objects.
     */
    #[Type(name: "array<questbluesdk\Models\Account\AccountCountryListData>")]
    public array $data;
}
/**
 * Class AccountCountryListData
 * Holds specific data about each country.
 */
class AccountCountryListData
{
    /**
     * @var int $countryId The unique identifier for the country.
     */
    #[Type(name: "int")]
    public int $countryId;

    /**
     * @var string $countryName The name of the country.
     */
    #[Type(name: "string")]
    public string $countryName;
}
