@extends('layouts.UserPanel')
@section('content')
    <div style="background: white; padding: 1rem;">
        <h3>Products On Your wishlist </h3>
    </div>
    <div style="background: white; padding: 1rem;" class="mt-2">
        <div class="container">
            <div class="row">
                @if(count(\App\BuyerProfile::wishlist()) > 0)
                    @foreach(\App\BuyerProfile::wishlist() as $cart)
                        <div class="col-md-3">
                            <img src="{{ url('images/').'/product/product_main_image/'.$cart->product_image }}" class="img-fluid" alt="">
                            <div class="product-name">
                                <h3>{{ $cart->product_name }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit($cart->product_description,50,'...') }}</p>
                            </div>
                            <td class="price">Rs. {{ $cart->product_price }}</td>
                        </div>
                    @endforeach
                @else
                    <p class="text-center">
                        No Product Added To Your Wish List
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
