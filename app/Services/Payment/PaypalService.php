<?php

namespace App\Services\Payment;

use App\contracts\PaymentInterface;

class PaypalService implements PaymentInterface
{

    public function pay($data)
    {
        dd('paypal service executed');
        return 'paypal';
    }
}
