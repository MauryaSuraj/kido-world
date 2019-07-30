@extends('layouts.pageLayout')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Collection</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Product</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container-fluid">
            <div class="row">
                @foreach($products as $product)
                <div class="col-sm col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="#" class="img-prod"><img class="img-fluid" src="{{ url('images/').'/product/product_main_image/'.$product->product_image }}" alt="">
                            <span class="status">Best Sellers</span>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="#">{{ $product->product_name }}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>Rs. {{ $product->product_price }}</span></p>
                                </div>
                                <div class="rating">
                                    <p class="text-right">
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <p class="bottom-area d-flex">
                                <a href="#" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                                <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
            <div class="row mt-5">
                <div class="col text-center">
{{--                    <div class="block-27">--}}
{{--                        <ul>--}}
{{--                            <li><a href="#">&lt;</a></li>--}}
{{--                            <li class="active"><span>1</span></li>--}}
{{--                            <li><a href="#">2</a></li>--}}
{{--                            <li><a href="#">3</a></li>--}}
{{--                            <li><a href="#">4</a></li>--}}
{{--                            <li><a href="#">5</a></li>--}}
{{--                            <li><a href="#">&gt;</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection
