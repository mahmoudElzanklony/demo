<?php

namespace App\Services\Payment;

use App\contracts\PaymentInterface;

class WalletService implements PaymentInterface
{

    public function pay($data)
    {
        return 'wallet';
    }
}
