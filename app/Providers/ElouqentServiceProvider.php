<?php

namespace App\Providers;

use App\Services\Messages;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class ElouqentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Builder::macro('findOrFailWithErr', function (string $err) {
            $obj = $this->first();
            if(is_null($obj)) {
                abort(Messages::error($err));
            }
            return $obj;
        });
    }
}
