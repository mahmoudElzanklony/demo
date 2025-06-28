<?php

namespace App\Services\Payment;

use App\contracts\PaymentInterface;

class BankService implements PaymentInterface
{

    public function pay($data)
    {
        return 'bank';
    }
}
