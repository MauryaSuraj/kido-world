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
                        <a href="{{ route('shop.show', $product->slug) }}" class="img-prod"><img class="img-fluid" src="{{ url('images/').'/product/product_main_image/'.$product->product_image }}" alt="">
                            <span class="status">Best Sellers</span>
                        </a>
                        <div class="text py-3 px-3">
                            <h3><a href="{{ route('shop.show', $product->slug) }}">{{ $product->product_name }}</a></h3>
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
                            <div>
                                <form method="POST" action="{{ route('addToCart') }}">
                                    @csrf
                                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" id="product_quantity" name="product_quantity" value="1">
                                    <input type="hidden" id="product_price" name="product_price" value="{{ $product->product_price }}">
                                    <button type="submit" class="add-to-cart" style="background: transparent; border: none;">
                                        <span>Add to cart <i class="ion-ios-add ml-1"></i></span>
                                    </button>
                                </form>
                            </div>
                            <div>

                                @if(\App\Wishlist::checkWishList($product->id) == 0)
                                <form method="POST" action="{{ route('wishlist') }}">
                                    @csrf
                                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="add-to-cart" style="background: transparent; border: none;">
                                        <span><i class="ion-ios-heart-empty"></i></span>
                                    </button>
                                </form>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 64 64"><path d="M46.1 2C39.8 2 34.5 5.6 32 10.8 29.5 5.6 24.2 2 17.9 2 9.2 2 2 9.4 2 17.9 2 32.4 32 62 32 62s30-29.6 30-44.1C62 9.4 54.8 2 46.1 2z" fill="#ff5a79"/></svg>
                                @endif
                            </div>
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
