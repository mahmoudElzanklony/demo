<?php

namespace App\Listeners;

use App\Events\OrderEvent;
use App\Models\User;
use App\Notifications\TestNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PaymentListener
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
        //

        $user = User::query()->first();
        $user->notify(new TestNotification('aaaaaaaaaaaaaaaaaaa hhh'));
    }
}
