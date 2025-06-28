<?php

namespace App\contracts;

interface PaymentInterface
{
    public function pay($data);
}
