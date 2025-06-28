<?php

namespace App\Http\Patterns\Factory;

class PaymentFactory
{
    public function getPayment($payment)
    {
        return match ($payment) {
            'paypal' => new \App\Services\Payment\PaypalService(),
            'wallet' => new \App\Services\Payment\WalletService(),
            'bank'=> new \App\Services\Payment\BankService()
        };
    }
}
