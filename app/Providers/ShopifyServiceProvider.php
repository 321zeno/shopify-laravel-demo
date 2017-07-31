<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ShopifyServiceProvider extends ServiceProvider
{
    public function register()
    {
        \App::bind('shopify', function ($app) {
            return new \App\Services\Shopify\Shopify;
        });
    }
}
