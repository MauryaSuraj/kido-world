@extends('layouts.UserPanel')
@section('content')
    <div style="background: white; padding: 1rem;">
        <div class="container">
            <div class="row">
                <h4>
                    Item On Your Cart
                </h4>
            </div>
        </div>
    </div>
    <div style="background: white; padding: 1rem;" class="mt-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($cart_item)>0)
                                @foreach($cart_item as $cart)
                                    <tr class="text-center">
                                        <td class="product-remove">
                                            <a href="{{ route('removeItem', $cart->cart_id) }}"><span class="ion-ios-close"></span></a>
                                        </td>
                                        <td class="image-prod"><div class="img" style="background-image:url({{ url('images/').'/product/product_main_image/'.$cart->product_image }});"></div></td>
                                        <td class="product-name">
                                            <h3>{{ $cart->product_name }}</h3>
                                            <p>{{ \Illuminate\Support\Str::limit($cart->product_description,50,'...') }}</p>
                                        </td>
                                        <td class="price">Rs. {{ $cart->product_price }}</td>
                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <input type="number" name="quantity" class="quantity form-control input-number" value="{{ $cart->cart_quantity }}" min="{{ $cart->min_order_limit }}" max="{{ $cart->max_order_limit }}">
                                            </div>
                                        </td>
                                        <td class="total">Rs. {{ $cart->product_price*$cart->cart_quantity }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr class="text-center">
                                    <td>
                                        <p> No Product Found In Cart </p>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
