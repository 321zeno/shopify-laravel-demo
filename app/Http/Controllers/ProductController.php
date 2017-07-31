<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductImageRequest;
use App\Repositories\Contracts\ProductRepository;
use App\Repositories\Contracts\CachedImageRepository;

class ProductController extends Controller
{
    public function __construct(ProductRepository $products, CachedImageRepository $images)
    {
        $this->middleware('auth');
        $this->products = $products;
        $this->images = $images;
    }

    public function index()
    {
        $products = $this->products->get();
        return view('products.index')->with(compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function uploadImage(ProductImageRequest $request)
    {
        return $this->images->save($request);
    }

    public function removeImage(Request $request)
    {
        return $this->images->remove($request);
    }

    public function store(ProductRequest $request)
    {
        try {
            $product = $request->except('_token');
            $product['images'] = $this->images->get();
            $product = $this->products->save($product);
        } catch (Exception $e) {
            session()->flash('alert-error', 'Product could not be created, $e->getMessage()');
            return redirect()->back();
        }
        session()->flash('alert-success', 'Product was successful created.');
        return redirect(route('product.index'));
    }
}
