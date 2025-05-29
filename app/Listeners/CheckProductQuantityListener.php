<?php

namespace App\Listeners;

use App\Models\products;
use App\Services\Messages;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\OrderEvent;

class CheckProductQuantityListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(OrderEvent $event): void
    {
        $ids = collect($event->order['data'])->map(fn($item) => $item['product_id']); // [2,3]
        $all_products = products::query()->whereIn('id',$ids)->get(); // [ {id:2,quantity:2} , {id:3,quantity:5}  ]

        foreach ($event->order['data'] as $product) {
            $product_item = $all_products->where('id',$product['product_id'])->first();
            if($product_item->quantity < $product['quantity']){
                abort(Messages::error('product '.$product_item->name.' quantity not exists'));
            }
        }
    }
}
