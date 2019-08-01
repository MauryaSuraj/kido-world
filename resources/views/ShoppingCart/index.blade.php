@extends('layouts.pageLayout')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">My Cart</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Cart</span></p>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-cart">
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
    </section>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col  col-md-4 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>Rs. {{ \App\ShoppingCart::subTotal() }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>Rs. {{ \App\ShoppingCart::deliveryCharge() }}</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>Rs. {{ \App\ShoppingCart::grandTotal() }}</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-8 ftco-animate mb-4">
                    <form action="{{ route('shipping') }}" method="POST" class="billing-form bg-light p-3 p-md-5">
                        @csrf
                        <h3 class="mb-4 billing-heading">Shipping  Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Firt Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" class="form-control" placeholder="" name="last_name" id="last_name" >
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="country">State / Country</label>
                                    <div class="select-wrap">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <input type="text" class="form-control" placeholder="" name="state" id="state" >
                                    </div>
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="streetaddress">Street Address</label>
                                    <input type="text" name="streetaddress" id="streetaddress" class="form-control" placeholder="House number and street name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" id="nearby" name="nearby" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="towncity">Town / City</label>
                                    <input type="text" name="city" id="city" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcodezip">Postcode / ZIP *</label>
                                    <input type="text" class="form-control" name="pincode" id="pincode" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" placeholder="" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="emailaddress">Email Address</label>
                                    <input type="text" class="form-control" placeholder="" name="email" id="email">
                                </div>
                            </div>
                            <p><button  type="submit" class="btn btn-primary py-3 px-4">CheckOut Here</button></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
