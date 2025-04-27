<?php

namespace App\Facades;

use App\Services\PaymentManagerService;
use Illuminate\Support\Facades\Facade;

class PaymentManagerFacade extends Facade
{

    public static function getFacadeAccessor(){
        return 'PaymentManager';
    }
    /*public static function __callStatic($method, $parameters){
        return app()->make('PaymentManager')->$method(...$parameters);
    }*/
}
