<?php

namespace App\Http\Patterns\Repositories;

use App\contracts\OrderInterface;
use App\Events\OrderEvent;

class OrderRepository implements OrderInterface
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function create(array $data)
    {
        event(new OrderEvent($data));
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }
}
