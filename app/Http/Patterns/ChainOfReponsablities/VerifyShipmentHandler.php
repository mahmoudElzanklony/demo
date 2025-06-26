<?php

namespace App\Http\Patterns\ChainOfReponsablities;

class VerifyShipmentHandler extends OrderReponsablitiesManager
{
    public function handle($data)
    {
        dump('Verify Shipment Handler');
        parent::handle($data);
    }
}
