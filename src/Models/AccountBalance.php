<?php

namespace questbluesdk\Models;

class AccountBalance
{
    public AccountBalanceData $data;
}

class AccountBalanceData
{
    public float $balance;
    public float $allowedCredit;
}
