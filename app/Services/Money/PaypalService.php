<?php

namespace App\Services\Money;

use App\contracts\EmailInterface;
use App\contracts\MoneyInterface;

class PaypalService implements MoneyInterface , EmailInterface
{

    private $type  = 'paypal service';

    public function getType(): string
    {
        return $this->type;
    }
    public function setAmount($amount)
    {
        // TODO: Implement setAmount() method.
    }

    public function setCurrency($currency)
    {
        // TODO: Implement setCurrency() method.
    }

    public function send()
    {
        // TODO: Implement send() method.
    }

    public function setEmail($email)
    {
        // TODO: Implement setEmail() method.
    }
}
