<?php

namespace App\Services\Shopify;

use Illuminate\Support\Facades\Facade;
use App;
use GuzzleHttp\Client as HttpClient;

class Shopify extends Facade
{
    public function __construct()
    {
        $this->apiKey = env('SHOPIFY_API_KEY');
        $this->password = env('SHOPIFY_PASSWORD');
        $this->secret = env('SHOPIFY_API_SECRET');
        $this->hostname = env('SHOPIFY_SHOP_DOMAIN');
    }

    /**
     * Get specific product from Shopify
     *
     * @param string $endpoint API endpoint
     * @return string Full URL to make Shopify Request
     */
    private function getShopifyUrl($endpoint)
    {
        return 'https://' . $this->apiKey . ':' . $this->password . '@' . $this->hostname . '/' . $endpoint;
    }

    public function getProducts()
    {
        $url = $this->getShopifyUrl('admin/products.json');
        try {
            $client = new HttpClient();
            $response = $client->get($url);
            $body = (string) $response->getBody();
            $items = json_decode($body, true);
            return $items['products'];
        } catch (\Exception $e) {
            throw new ShopifyException('Failed to retrieve Shopify products: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }

    public function createProduct($product = [])
    {
        $product = [
            'product' => $product
        ];

        $url = $this->getShopifyUrl('admin/products.json');
        try {
            $client = new HttpClient();
            $response = $client->post($url, ['json' => $product]);
            $body = (string) $response->getBody();
            $items = json_decode($body, true);
            return $items['product'];
        } catch (\Exception $e) {
            throw new ShopifyException('Failed to create Shopify product: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }
}
