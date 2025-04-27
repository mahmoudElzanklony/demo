<?php

namespace App\Observers;

use App\Models\products;

class ProductObserver
{
    /**
     * Handle the products "created" event.
     */
    public function created(products $products): void
    {
        //
    }

    /**
     * Handle the products "updated" event.
     */
    public function updated(products $products): void
    {
        //
    }

    /**
     * Handle the products "deleted" event.
     */
    public function deleted(products $products): void
    {
        //
    }

    /**
     * Handle the products "restored" event.
     */
    public function restored(products $products): void
    {
        //
    }

    /**
     * Handle the products "force deleted" event.
     */
    public function forceDeleted(products $products): void
    {
        //
    }
}
