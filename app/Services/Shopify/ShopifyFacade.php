<?php

namespace App\Services\Shopify;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class ShopifyFacade extends IlluminateFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'shopify';
    }
}
