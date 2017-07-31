@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <a href="{{ route('product.index') }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to Products</a>

            <h1>Create a New Product</h1>

            <div class="panel panel-default">
                <div class="panel-body">
                    {{ Form::open(['route' => 'product.store', 'method' => 'post', 'novalidate']) }}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="control-label">Title</label>
                            {{ Form::text('title', old('title'), ['id' => 'title', 'class' => 'form-control', 'required' => 'true', 'maxlength' => 255, 'placeholder' => 'Banana Guard', 'onfocus' => 'this.value = this.value']) }}

                            @if ($errors->has('title'))
                                <span class="help-block">
                                    {!! $errors->first('title') !!}
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="control-label">Price</label>
                            <div class="input-group">
                                <div class="input-group-addon">&pound;</div>
                                {{ Form::text('price', old('price'), ['id' => 'price', 'class' => 'form-control', 'required' => 'true', 'maxlength' => 255, 'placeholder' => '30', 'onfocus' => 'this.value = this.value']) }}
                            </div>

                            @if ($errors->has('price'))
                                <span class="help-block">
                                    {!! $errors->first('price') !!}
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                            <label for="sku" class="control-label">SKU</label>
                            {{ Form::text('sku', old('sku'), ['id' => 'sku', 'class' => 'form-control', 'required' => 'true', 'maxlength' => 255, 'placeholder' => '9999999', 'onfocus' => 'this.value = this.value']) }}

                            @if ($errors->has('sku'))
                                <span class="help-block">
                                    {!! $errors->first('sku') !!}
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="control-label optional">Description</label>
                            {{ Form::text('description', old('description'), ['id' => 'description', 'class' => 'form-control', 'maxlength' => 255]) }}

                            @if ($errors->has('description'))
                                <span class="help-block">
                                    {!! $errors->first('description') !!}
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="control-label optional">Image</label>
                            <div id="image" class="dropzone-upload dropzone spot" data-upload="{{ route('product.image.upload') }}" data-remove="{{ route('product.image.remove') }}">
                            </div>

                            @if ($errors->has('image'))
                                <span class="help-block">
                                    {!! $errors->first('image') !!}
                                </span>
                            @endif
                        </div>

                        <button class="btn btn-primary btn-lg">Create</button>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

