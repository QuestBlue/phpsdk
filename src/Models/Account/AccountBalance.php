<?php

namespace questbluesdk\Account\Models;

class AccountBalance
{
    public AccountBalanceData $data;
}

class AccountBalanceData
{
    public float $balance;
    public float $allowedCredit;
}
