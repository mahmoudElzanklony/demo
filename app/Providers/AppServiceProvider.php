<?php

namespace App\Providers;

use App\Facades\PaymentManagerFacade;
use App\Services\CacheService;
use App\Services\PaymentManagerService;
use App\Services\PaypalService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('PaymentManager', function ($app) {
           $obj = new PaymentManagerService($app);
           $obj->registerPayment('paypal', new PaypalService());
           $obj->registerPayment('cache', new CacheService());
           return $obj;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
