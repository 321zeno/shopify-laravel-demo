<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface CachedImageRepository
{
    public function get();
    public function save(Request $request);
    public function remove(Request $request);
    public function clear();
}
