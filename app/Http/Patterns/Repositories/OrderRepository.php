<?php

namespace App\Http\Patterns\Repositories;

use App\contracts\OrderInterface;
use App\Events\OrderEvent;
use App\Http\Patterns\ChainOfReponsablities\CheckPaymentHandler;
use App\Http\Patterns\ChainOfReponsablities\CheckQuantityHandler;
use App\Http\Patterns\ChainOfReponsablities\VerifyShipmentHandler;
use App\Models\orders;
use App\Models\products;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderInterface
{

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function create(array $data)
    {
       // event(new OrderEvent($data));
        $checkQuantity = new CheckQuantityHandler();
        $checkPayment = new CheckPaymentHandler();
        $checkShipment = new VerifyShipmentHandler();
        $checkQuantity->setNext($checkShipment);
        $checkShipment->setNext($checkPayment);
        $checkQuantity->handle($data); // execute first handler
        $order = orders::query()->create([
            'user_id' => Auth::id(),
            'product_id'=>products::query()->first()->id
        ]);
        return $order;

    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }
}
