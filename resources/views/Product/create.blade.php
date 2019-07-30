@extends('layouts.admin')
@section('content-admin')
    <!-- Section: Inputs -->
    <section class="section card mb-5">

        <div class="card-body">
            <div class="row my-2">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <h5 class="pb-5">Add Product</h5>
            <div class="row justify-content-center">
                <div class="col-md-8">
                            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Type') }}</label>
                                    <div class="col-md-6">
                                        <select name="product_type" id="product_type"  class="form-control d-block">
                                            <option value="simple">Simple</option>
                                            <option value="variable">Variable</option>
                                            <option value="External">External</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>
                                    <div class="col-md-6">
                                        <select id="category_id" type="text" class="d-block form-control @error('category_id') is-invalid @enderror" name="category_id" value="{{ old('category_id') }}" required autocomplete="category_id" autofocus>
                                            <option value="0" disabled >Select an Option</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Manufacturer Name') }}</label>
                                    <div class="col-md-6">
                                        <select name="manufacturer_id" id="manufacturer_id" class="form-control d-block">
                                            @foreach($manu as $fec)
                                            <option value="{{ $fec->id }}">{{ $fec->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="flash_sale" class="col-md-4 col-form-label text-md-right">{{ __('Flash Sale') }}</label>
                                    <div class="col-md-6">
                                        <select name="flash_sale" id="flash_sale" class="form-control d-block">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="special" class="col-md-4 col-form-label text-md-right">{{ __('Special') }}</label>
                                    <div class="col-md-6">
                                        <select name="special" id="special" class="form-control d-block">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product_name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="product_name" type="text" class="form-control @error('product_name') is-invalid @enderror" name="product_name" required autocomplete="product_name">
                                        @error('product_name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Product Description') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="left_banner" class="col-md-4 col-form-label text-md-right">{{ __('Left Banner') }}</label>
                                    <div class="col-md-6">
                                        <input id="left_banner" type="file" class="form-control @error('left_banner') is-invalid @enderror" name="left_banner" required autocomplete="left_banner">
                                        @error('left_banner')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label for="right_banner" class="col-md-4 col-form-label text-md-right">{{ __('Right Banner') }}</label>
                                    <div class="col-md-6">
                                        <input id="right_banner" type="file" class="form-control @error('right_banner') is-invalid @enderror" name="right_banner" required autocomplete="right_banner">
                                        @error('right_banner')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Product Price') }}</label>
                                    <div class="col-md-6">
                                        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" required autocomplete="price">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="min_order_limit" class="col-md-4 col-form-label text-md-right">{{ __('Min Order Limit') }}</label>
                                    <div class="col-md-6">
                                        <input id="min_order_limit" type="number" class="form-control @error('min_order_limit') is-invalid @enderror" name="min_order_limit" required autocomplete="min_order_limit">
                                        @error('min_order_limit')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
                                    <div class="col-md-6">
                                        <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity" required autocomplete="quantity">
                                        @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="max_order_limit" class="col-md-4 col-form-label text-md-right">{{ __('Max Order Limit') }}</label>
                                    <div class="col-md-6">
                                        <input id="max_order_limit" type="number" class="form-control @error('max_order_limit') is-invalid @enderror" name="max_order_limit" required autocomplete="max_order_limit">
                                        @error('max_order_limit')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product_main_image" class="col-md-4 col-form-label text-md-right">{{ __('Product Main Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="product_main_image" type="file" class="form-control" name="product_main_image" required autocomplete="product_main_image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product_weight" class="col-md-4 col-form-label text-md-right">{{ __('Product Weight') }}</label>

                                    <div class="col-md-6">
                                        <input id="product_weight" type="text" class="form-control" name="product_weight" required autocomplete="product_weight">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="product_weight" class="col-md-4 col-form-label text-md-right">{{ __('IS Featured') }}</label>
                                    <div class="col-md-6">
                                        <select name="isFeatured" class="form-control d-block" id="isFeatured">
                                            <option value="yes">yes</option>
                                            <option value="no">no</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="product_status" class="col-md-4 col-form-label text-md-right">{{ __('Product status') }}</label>
                                    <div class="col-md-6">
                                        <select name="product_status" class="form-control d-block" id="product_status">
                                            <option value="active">active</option>
                                            <option value="inactive">inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="meta_title" class="col-md-4 col-form-label text-md-right">{{ __('Meta title') }}</label>

                                    <div class="col-md-6">
                                        <input id="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" required autocomplete="meta_title">
                                        @error('meta_title')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="meta_keyword" class="col-md-4 col-form-label text-md-right">{{ __('Meta Keywords') }}</label>

                                    <div class="col-md-6">
                                        <input id="meta_keyword" type="text" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" required autocomplete="meta_keyword">
                                        @error('meta_keyword')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="meta_description" class="col-md-4 col-form-label text-md-right">{{ __('Meta Description') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value="{{ old('meta_description') }}" required autocomplete="meta_description"></textarea>
                                        @error('meta_description')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add Product') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </section>
@endsection
