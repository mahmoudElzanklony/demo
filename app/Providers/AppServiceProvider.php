<?php

namespace App\Providers;

use App\contracts\AppointmentInterface;
use App\contracts\CategoriesInterface;
use App\contracts\MoneyInterface;
use App\contracts\OrderInterface;
use App\contracts\PaymentInterface;
use App\contracts\ProductInterface;
use App\Facades\PaymentManagerFacade;
use App\Http\Patterns\Factory\PaymentFactory;
use App\Http\Patterns\Repositories\AppointmentRepository;
use App\Http\Patterns\Repositories\CategoriesRepository;
use App\Http\Patterns\Repositories\CategoriesRepositoryV2;
use App\Http\Patterns\Repositories\OrderRepository;
use App\Http\Patterns\Repositories\ProductRepository;
use App\Services\CacheService;
use App\Services\Money\BankService;
use App\Services\Money\PaypalService;
use App\Services\Money\WalletService;
use App\Services\PaymentManagerService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        /*if(request()->filled('type') && request()->type == 'normal'){
            $this->app->bind(CategoriesInterface::class, CategoriesRepositoryV2::class);
        }else {
            $this->app->bind(CategoriesInterface::class, CategoriesRepository::class);
        }*/
        $this->app->bind(CategoriesInterface::class, CategoriesRepository::class);

        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(OrderInterface::class, OrderRepository::class);

        $this->app->bind(AppointmentInterface::class,AppointmentRepository::class);

        $this->app->bind(MoneyInterface::class, function (){
            $payment = request('payment');
            return match ($payment) {
                'paypal' => new PaypalService(),
                'wallet' => new WalletService(),
                default => new BankService(),
            };
        });

        $this->app->singleton('PaymentManager', function ($app) {
           $obj = new PaymentManagerService($app);
           $obj->registerPayment('paypal', new PaypalService());
           $obj->registerPayment('cache', new CacheService());
           return $obj;
        });


        $this->app->bind(PaymentInterface::class, function (){
            $payment = request('payment');
            $paymentFactory = new PaymentFactory();
            return $paymentFactory->getPayment($payment);
            //return app('\App\Services\Payment\\'.ucfirst($payment).'Service');
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
