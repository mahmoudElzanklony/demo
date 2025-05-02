<?php

namespace App\Providers;

use App\contracts\CategoriesInterface;
use App\contracts\ProductInterface;
use App\Facades\PaymentManagerFacade;
use App\Http\Patterns\Repositories\CategoriesRepository;
use App\Http\Patterns\Repositories\CategoriesRepositoryV2;
use App\Http\Patterns\Repositories\ProductRepository;
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
        if(request()->filled('type') && request()->type == 'normal'){
            $this->app->bind(CategoriesInterface::class, CategoriesRepositoryV2::class);
        }else {
            $this->app->bind(CategoriesInterface::class, CategoriesRepository::class);
        }

        $this->app->bind(ProductInterface::class, ProductRepository::class);

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
