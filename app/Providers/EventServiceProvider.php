<?php

namespace App\Providers;

use App\Events\OrderEvent;
use App\Listeners\CheckPaymentListener;
use App\Listeners\CheckProductQuantityListener;
use App\Listeners\PaymentListener;
use App\Listeners\SaveOrderListener;
use App\Listeners\ShipmentListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        OrderEvent::class => [
            CheckProductQuantityListener::class,
            CheckPaymentListener::class,
            SaveOrderListener::class,
            ShipmentListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
