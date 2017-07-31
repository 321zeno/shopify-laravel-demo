@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1>Products</h1>

            <hr>

            <div class="panel panel-default">
                <table class="table products">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><strong>{{ $product['title'] }}</strong></td>
                                <td>&pound;{{ array_get($product, 'variants.0.price')}}</td>
                                <td>
                                    @if(array_get($product, 'images.0.src'))
                                        <div class="thumbnail">
                                            <img src="{{ array_get($product, 'images.0.src') }}" alt="{{ $product['title'] }}" >
                                        </div>
                                    @else
                                        &mdash;
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <a href="{{ route('product.create') }}" class="btn btn-default btn-primary">Add a New Product</a>

        </div>
    </div>
</div>
@endsection