<?php

namespace App\Http\Patterns\ChainOfReponsablities;

use App\Services\Messages;

class CheckPaymentHandler extends OrderReponsablitiesManager
{
    public function handle($data)
    {
        dump('Checking payment handler...');
        abort(Messages::error('payment money not enough'));
        //parent::handle($data);
    }
}
