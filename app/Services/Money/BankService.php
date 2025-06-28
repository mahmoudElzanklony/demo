<?php

namespace App\Services\Money;

use App\contracts\IBANInterface;
use App\contracts\MoneyInterface;

class BankService implements MoneyInterface , IBANInterface
{

    public function setAmount($amount)
    {
        // TODO: Implement setAmount() method.
    }

    public function setCurrency($currency)
    {
        // TODO: Implement setCurrency() method.
    }

    public function setNumber($number)
    {
        // TODO: Implement setNumber() method.
    }

    public function setIBAN($iban)
    {
        // TODO: Implement setIBAN() method.
    }

    public function send()
    {
        // TODO: Implement send() method.
    }
}
