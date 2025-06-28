<?php

namespace App\contracts;

interface MoneyInterface
{
    public function setAmount($amount);
    public function setCurrency($currency);

    public function send();
}
