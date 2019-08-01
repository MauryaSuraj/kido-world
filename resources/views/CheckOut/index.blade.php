@extends('layouts.pageLayout')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('https://images.pexels.com/photos/259200/pexels-photo-259200.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Checkout</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Checkout</span></p>
                </div>
            </div>
        </div>
    </div>
    <section class="mb-3">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 ftco-animate mt-4">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\CheckOut::cart_details() as $cart_items)
                                <tr class="text-center">
                                    <td class="image-prod"><div class="img" style="background-image:url({{ url('images/').'/product/product_main_image/'.$cart_items->product_image }});"></div></td>
                                    <td class="product-name">
                                        <h3>{{ $cart_items->product_name }}</h3>
                                    </td>
                                    <td class="price">Rs. {{ $cart_items->product_price }}</td>
                                    <td class="quantity">
                                            <p>{{ $cart_items->cart_quantity }}</p>
                                    </td>
                                    <td class="total">Rs {{ $cart_items->cart_quantity*$cart_items->product_price }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 ftco-animate">
                    <div class="row mt-5 pt-3 d-flex">
                        <div class="col-md-4 d-flex">
                            <div class="cart-detail cart-total bg-light p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Shipping Details </h3>
                                <p class="d-flex">
                                    <span>Full Name</span>
                                    <span>  {{ $shipping_details->first_name }}  {{ $shipping_details->last_name }}</span>
                                </p>
                                <p class="d-flex">
                                    <span>Address</span>
                                    <span>{{ $shipping_details->state }} {{ $shipping_details->street_address }} {{ $shipping_details->apartment }}
                                        {{ $shipping_details->pincode }}
                                    </span>
                                </p>
                                <hr>
                                <p class="">
                                    <span>Contact Details</span>
                                     <span style="width: 100% !important;">Phone :  {{ $shipping_details->phone }}</span>
                                    <span style="width: 100% !important;">Email : {{ $shipping_details->email }}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex">
                            <div class="cart-detail cart-total bg-light p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Cart Total</h3>
                                <p class="d-flex">
                                    <span>Subtotal</span>
                                    <span>Rs. {{ \App\ShoppingCart::subTotal() }} </span>
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
                        <div class="col-md-4">
                            <div class="cart-detail bg-light p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Payment Method</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" checked name="optradio" class="mr-2"> Insta Mojo </label>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Opps!</strong> Something went wrong<br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ url('pay') }}" method="POST" name="laravel_instamojo">
                                    {{ csrf_field() }}
                                    <input type="text" name="purpose" value="{{ \App\CheckOut::product_name_in_cart() }}"  hidden>
                                    <input type="text" name="name" value="{{ $shipping_details->first_name }}  {{ $shipping_details->last_name }}" hidden >
                                    <input type="text" name="mobile_number" value="{{ $shipping_details->phone }}"  hidden>
                                    <input type="text" name="email"  value="{{ $shipping_details->email }}" hidden>
                                    <input type="text" name="amount" value="{{ \App\ShoppingCart::grandTotal() }}" hidden>
                                    <button type="submit" class="btn btn-primary py-3 px-4">Place an order</button>
                                </form>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
