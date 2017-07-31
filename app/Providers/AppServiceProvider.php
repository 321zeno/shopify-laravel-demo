<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\ProductRepository',
            'App\Repositories\ShopifyProductRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\CachedImageRepository',
            'App\Repositories\DropzoneImageRepository'
        );
    }
}
