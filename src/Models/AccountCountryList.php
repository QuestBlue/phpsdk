<?php

namespace questbluesdk\Models;

use JMS\Serializer\Annotation\Type as Type;

class AccountCountryList
{
    #[Type(name: "array<questbluesdk\Models\AccountCountryListData>")]
    public array $data;
}

class AccountCountryListData
{
    public int $countryId;
    public string $countryName;
}
