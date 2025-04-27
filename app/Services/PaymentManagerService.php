<?php

namespace App\Services;

class PaymentManagerService
{
    public function __construct(protected $payments = [])
    {}

    public function registerPayment($name , $valueObject)
    {
        $this->payments[$name] = $valueObject;
    }


    public function getPayment($name){

        return $this->payments[$name];
    }
    public static function __callStatic($method, $parameters)
    {
        dd($method, $parameters);
    }
}
