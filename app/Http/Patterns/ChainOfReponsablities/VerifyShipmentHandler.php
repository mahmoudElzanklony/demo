<?php

namespace App\Http\Patterns\ChainOfReponsablities;

use App\Services\Messages;

class VerifyShipmentHandler extends OrderReponsablitiesManager
{
    public function handle($data)
    {
        dump('Verify Shipment Handler');
        abort(Messages::error('delivery not supported'));
        parent::handle($data);
    }
}
