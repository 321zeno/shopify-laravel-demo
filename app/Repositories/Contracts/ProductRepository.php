<?php

namespace App\Repositories\Contracts;

interface ProductRepository
{
    public function get();
    public function save($productData);
}
