@extends('layouts.admin')
@section('content-admin')
        <section class="my-1">
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-12">
                    <!-- Card -->
                    <div class="card card-cascade wider reverse">
                        <!-- Card image -->
                        <div class="view view-cascade overlay">
                            <img class="card-img-top" src="{{ url('images/').'/product/product_main_image/'.$product->product_image }}" alt="{{ $product->product_name }}">
                            <a href="#!">
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">
                            <h2 class="font-weight-bold"><a>{{ $product->product_name }}</a></h2>
                            <p> Current Status <span class="p-1 bg-danger text-white">{{ $product->status }}</span>  , Uploaded at {{ $product->created_at }}</p>
                        </div>
                    </div>
                    <div class="mt-5">
                        <p>{{ $product->product_description }}</p>
                    </div>
                    <div class="card card-body card-body-cascade">
                        <div class="row">
                            <div class="col-md">
                                <h4>
                                    Category
                                </h4>
                                <hr>
                                <p>
                                    {{ $product->category_name }}
                                </p>
                                <h4> Left Banner Image </h4>
                                <img class="img-fluid" src="{{ url('images/').'/product/left_banner/'.$product->left_banner_image }}" alt="{{ $product->product_name }}">
                            </div>
                            <div class="col-md">
                                <h4> Manufacturer </h4>
                                <hr>
                                <p>
                                    {{ $product->name}}
                                    {{ $product->details }}
                                </p>
                                <h4> Left Banner Image </h4>
                                <img class="img-fluid" src="{{ url('images/').'/product/right_banner/'.$product->right_banner_image }}" alt="{{ $product->product_name }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
