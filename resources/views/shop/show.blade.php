@extends('layouts.pageLayout')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ url('images/').'/shop.png' }}');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <!--<h1 class="mb-0 bread">{{ $products->product_name }}</h1>-->
                    <!--<p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span class="mr-2"><a href="/product">Product</a></span> <span>{{ $products->product_name }}</span></p>-->
                    <br><br><br>

                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-5 ftco-animate">
                    <a href="{{ url('images/').'/product/product_main_image/'.$products->product_image }}" class="image-popup"><img src="{{ url('images/').'/product/product_main_image/'.$products->product_image }}" class="img-fluid" alt="{{ $products->product_name }}"></a>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md"><img src="{{ url('images/').'/product/product_main_image/'.$products->product_image }}" class="img-fluid" alt="{{ $products->product_name }}"></div>
                        <div class="col-md"><img src="{{ url('images/').'/product/product_main_image/'.$products->product_image }}" class="img-fluid" alt="{{ $products->product_name }}"></div>
                        <div class="col-md"><img src="{{ url('images/').'/product/product_main_image/'.$products->product_image }}" class="img-fluid" alt="{{ $products->product_name }}"></div>
                    </div>
                </div>
                <div class="col-md-6 product-details pl-md-5 ftco-animate">
                    <p> Rating & Reviews :
                        {{ \App\Reviews::reviews_count($products->id) }}
                    </p>
                    <h3> <strong>{{ $products->product_name }}</strong> </h3>
                    <p class="price"><span>Rs. {{ $products->product_price }} /-</span></p>
                    <div class="row">
                        <div class="col-md"><img src="{{ url('images/').'/pay_icon/'.'1.png' }}" class="img-fluid" style="height: 37px; width: 37px;"></div>
                        <div class="col-md"><img src="{{ url('images/').'/pay_icon/'.'2.png' }}" class="img-fluid" style="height: 37px; width: 37px;"></div>
                        <div class="col-md"><img src="{{ url('images/').'/pay_icon/'.'3.png' }}" class="img-fluid" style="height: 37px; width: 37px;"></div>
                        <div class="col-md"><img src="{{ url('images/').'/pay_icon/'.'4.png' }}" class="img-fluid" style="height: 37px; width: 37px;"></div>
                        <div class="col-md"><img src="{{ url('images/').'/pay_icon/'.'5.png' }}" class="img-fluid" style="height: 37px; width: 37px;"></div>
                        <div class="col-md"><img src="{{ url('images/').'/pay_icon/'.'6.png' }}" class="img-fluid" style="height: 37px; width: 37px;"></div>
                        <div class="col-md"><img src="{{ url('images/').'/pay_icon/'.'7.png' }}" class="img-fluid" style="height: 37px; width: 37px;"></div>
                        <div class="col-md"><img src="{{ url('images/').'/pay_icon/'.'8.png' }}" class="img-fluid" style="height: 37px; width: 37px;"></div>

                    </div>
                    <p style="color: #000;">
                        {!! $products->product_description !!}
                    </p>
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                           <p style="color: #000;">Color Available : {{ $products->color }} </p>
                           <p style="color: #03a84e;">
                                @if($products->quantity)  <strong>InStock</strong> @else <strong>Out Of Stock</strong> @endif
                            </p>
                        
                        </div>
                    </div>
                    <div class="row mt-4" style="box-shadow: 0 0 5px 0 #ec226cad;">
                        <div class="col-md-6">
                            <div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon" style="margin-top:16px;"><span class="ion-ios-arrow-down"></span></div>
                                    <label for="">Size Available</label><select name="" id="" class="form-control">
                                        <option value=""> {{ $products->size }} </option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 mt-3">
                            <p class="d-flex">
                            <div class="d-flex">
                                <form method="POST" class="" action="{{ route('addToCart') }}">
                                    @csrf

                                    <div class="d-flex">
                                        <input type="hidden" id="product_id" name="product_id" value="{{ $products->id }}">
                                        <div class="input-group col-md-6 d-flex mb-3">
                                            <input type="number" id="product_quantity" name="product_quantity" class="form-control input-number" placeholder="1" value="1" min="1" max="100" style="margin-left: -15px; !important;">
                                        </div>
                                        <input type="hidden" id="product_price" name="product_price" value="{{ $products->product_price }}">
                                        <button type="submit" class="add-to-cart " style="background: transparent; border:none !important;" >
                                            <span> <img src="https://image.flaticon.com/icons/svg/145/145423.svg" style="width:30px;" /> </span>
                                        </button>
                                    </div>
                                </form>
                                @if(\Illuminate\Support\Facades\Auth::check())
                                    @if(\App\Wishlist::checkWishList($products->id) == 0)
                                        <form method="POST" action="{{ route('wishlist') }}">
                                            @csrf
                                            <input type="hidden" id="product_id" name="product_id" value="{{ $products->id }}">
                                            <button type="submit"  style="background: transparent; border: none !important;">
                                                <span><img src="https://image.flaticon.com/icons/svg/149/149217.svg" style="width:30px;" /></span>
                                            </button>
                                        </form>
                                    @else
                                        <img src="https://image.flaticon.com/icons/svg/148/148836.svg" style="width:30px;" />
                                    @endif
                                @else
                                    <button type="button" style="background:transparent; border:none !important;" data-toggle="modal" data-target="#exampleModal">
                                        <img src="https://image.flaticon.com/icons/svg/149/149217.svg" style="width:30px;" />
                                    </button>
                                @endif
                            </div>
                            </p>
                        </div>
                        <div class="w-100"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <ul class="mt-5">
                        <li> Usually Delivers within 3-5 days*</li>
                        <li>Below Rs.1000 Product Rs.100
                        <br>
                        Free shipping on orders above INR 999</li>
                        <li>7 Day Return Policy</li>
                    </ul>
                    <div class="mt-5">
                       <a href="{{ route('cart') }}" class="nav-link"> <img src="https://image.flaticon.com/icons/svg/1162/1162499.svg" style="width: 50px;" alt="">
                             <br>  <strong>Go TO Cart</strong>
                       </a>
                    </div>
{{--                    <div class="mt-5" >--}}
{{--                            <form onsubmit="return PINCODE()">--}}
{{--                                <label> <strong>Pincode</strong> </label>--}}
{{--                                <div class="d-flex" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.08);">--}}
{{--                                    <input type="text" name="pincode" id="pincode">--}}
{{--                                    <button class="btn" type="submit"  style="border-radius: 0px !important;">--}}
{{--                                        Submit Pincode--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section  ftco-animate">
                    <h2 class="my-2"> Reviews </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    @if(session()->has('review'))
                        <div class="alert alert-success">
                            {{ session()->get('review') }}
                        </div>
                    @endif
                </div>
            </div>
            @foreach(\App\Reviews::reviews_product($products->id) as $reviews)
                <div class="row">
                    <div class="col-md-6 my-1" style="box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.08);">
                        <div class="p-1">
                            <p>
                               <span><strong>Review By :  {{ \App\Reviews::user_details($reviews->user_id) }} </strong> <br><span>Review at {{ $reviews->created_at }}</span></span>
                            </p>
                            <p>
                                {{ $reviews->reviews }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            <div class="row my-3">
                <div class="col-md-6 p-2" style="box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.08);">
                    @if(\Illuminate\Support\Facades\Auth::check())
                            <form method="POST" action="{{ route('review') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="hidden" id="product_id" name="product_id" value="{{ $products->id }}">
                                        <textarea id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" required autocomplete="message"></textarea>
                                        @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add Reviews') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                    <p>
                        Please Login To Add Review
                    </p>
                        <a href="/login" class="btn btn-outline-primary">Login</a>
                        @endif
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Similar Products</h3>
                    <div class="product-slider owl-carousel ftco-animate">
                        @foreach(\App\FrontModel::productBasedOnCategory($products->category_id) as $product)
                            <div class="item">
                                <div class="product">
                                    <a href="{{ route('shop.show', $product->slug) }}" class="img-prod"><img src="{{ url('images/').'/product/product_main_image/'.$product->product_image }}" alt="{{ $product->product_name }}"></a>
                                    <div class="text pt-3 px-3">
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
                                    </div>
                                    <p class="bottom-area d-flex">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md">
                                                <form method="POST" action="{{ route('addToCart') }}">
                                                    @csrf
                                                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" id="product_quantity" name="product_quantity" value="1">
                                                    <input type="hidden" id="product_price" name="product_price" value="{{ $product->product_price }}">
                                                    <button type="submit" class="add-to-cart btn btn-outline-primary" >
                                                        <span>Add to cart <i class="ion-ios-add ml-1"></i></span>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-md">
                                                @if(\Illuminate\Support\Facades\Auth::check())
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
                                                @else
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                        Add to Wishlist
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
