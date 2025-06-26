<?php

namespace App\Http\Patterns\ChainOfReponsablities;

class CheckQuantityHandler extends OrderReponsablitiesManager
{
    public function handle($data)
    {
        dump('Check quantity handler');
       parent::handle($data);
    }


}
