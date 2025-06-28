<?php

namespace App\Http\Patterns\ChainOfReponsablities;

use App\contracts\PaymentInterface;
use App\Services\Messages;

class CheckPaymentHandler extends OrderReponsablitiesManager
{


    public function handle($data)
    {
        app(PaymentInterface::class)->pay($data);
        dump('Checking payment handler...');
        abort(Messages::error('payment money not enough'));
        //parent::handle($data);
    }
}
