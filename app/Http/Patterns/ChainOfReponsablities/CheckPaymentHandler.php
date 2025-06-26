<?php

namespace App\Http\Patterns\ChainOfReponsablities;

class CheckPaymentHandler extends OrderReponsablitiesManager
{
    public function handle($data)
    {
        dump('Checking payment handler...');
        //parent::handle($data);
    }
}
