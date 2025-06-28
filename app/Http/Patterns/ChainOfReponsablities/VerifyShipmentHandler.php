<?php

namespace App\Http\Patterns\ChainOfReponsablities;

use App\Services\Messages;

class VerifyShipmentHandler extends OrderReponsablitiesManager
{
    public function handle($data)
    {

        parent::handle($data);
    }
}
