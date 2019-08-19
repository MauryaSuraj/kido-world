@extends('layouts.admin')

@section('content-admin')
<section class="mt-md-4 pt-md-2 mb-5 pb-4">

<div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('search_admin') }}">
                        @csrf
                        <div class="">
                            <div class="d-flex">
                                <input type="text" class="form-control col-md-6" required name="search" id="search"  placeholder=" Search for Product , brand and many more " style="margin-top: 10px;">
                                <button class="btn btn-primary col-md-6" type="submit" style="">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    <!-- Grid row -->
    <div class="row">
        <!-- Grid column -->
        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

                <!-- Card Data -->
                <div class="admin-up">
                    <i class="far fa-money-bill-alt primary-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase">Products <br> In Cart </p>
                        <h4 class="font-weight-bold dark-grey-text">{{ \App\ShoppingCart::count() }}</h4>
                    </div>
                </div>
            </div>
            <!-- Card -->

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

                <!-- Card Data -->
                <div class="admin-up">
                    <i class="fas fa-chart-line warning-color mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase">Users </p>
                        <h4 class="font-weight-bold dark-grey-text">{{ \App\User::count() }}</h4>
                    </div>
                </div>
            </div>
            <!-- Card -->
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-xl-3 col-md-6 mb-md-0 mb-4">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

                <!-- Card Data -->
                <div class="admin-up">
                    <i class="fas fa-chart-pie light-blue lighten-1 mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase">Products </p>
                        <h4 class="font-weight-bold dark-grey-text">{{ \App\Product::count() }}</h4>
                    </div>
                </div>
            </div>
            <!-- Card -->

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-xl-3 col-md-6 mb-0">

            <!-- Card -->
            <div class="card card-cascade cascading-admin-card">

                <!-- Card Data -->
                <div class="admin-up">
                    <i class="fas fa-chart-bar red accent-2 mr-3 z-depth-2"></i>
                    <div class="data">
                        <p class="text-uppercase">Category </p>
                        <h4 class="font-weight-bold dark-grey-text">{{ \App\ProductCategory::count() }}</h4>
                    </div>
                </div>
            </div>
            <!-- Card -->

        </div>
        <!-- Grid column -->

    </div>
    <!-- Grid row -->

</section>
<!-- Section: Intro -->

<!-- Section: Main panel -->
<section class="mb-5">

    <!-- Card -->
    <div class="card card-cascade narrower">
        <!-- Section: Table -->
        <section>
            <div class="card card-cascade narrower z-depth-0 mt-5">
                <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">
                    <a href="#" class="white-text mx-3">Orders </a>
                </div>

                <div class="px-4">

                    <div class="table-responsive">

                        <table class="table">
                            <thead class="blue-grey lighten-4">
                            <tr>
                                <th>Customer Name</th>
                                <th>Customer Phone </th>
                                <th>Customer Email</th>
                                <th>product Name</th>
                                <th>Payment Status</th>
                                <th>Order Created At</th>
                                <th>Order Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count(\App\Order::order_details()) > 0)
                                @foreach(\App\Order::order_details() as $product)
                                    <tr>
                                        @foreach(\App\Order::customer_details($product->customer_id) as $customer_details)
                                            <td>
                                                {{ $customer_details->user_name }}
                                            </td>
                                            <td>  @if($customer_details->phone) {{ $customer_details->phone }} @else Not Provided @endif </td>
                                            <td>{{ $customer_details->email }}</td>
                                        @endforeach

                                        <td>
                                            @foreach(\App\Order::product_id($product->product_id) as $product_name)
                                                {{ \App\Order::product_name($product_name) }}
                                            @endforeach
                                        </td>
                                        <td>{{ $product->payment_status }} </td>
                                        <td>{{ $product->created_at }} </td>
                                        <td>
                                            <form action="{{ route('order_status') }}" method="POST">
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}" name="id" id="id">
                                                <select name="order_status" id="order_status" class="form-control d-block" onchange="this.form.submit()">
                                                    <option value="{{ $product->order_status }}" selected>{{ $product->order_status }}</option>
                                                    <option value="Accepted"> Accepted </option>
                                                    <option value="InProgress"> In Progress </option>
                                                    <option value="Shipped">Shipped</option>
                                                    <option value="Delivered">Delivered</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                   0 Order Placed
                                </tr>
                            @endif
                            </tbody>
                        </table>

                    </div>

                    <hr class="my-0">
                </div>

            </div>

        </section>
        <!--Section: Table-->
    </div>
    <!-- Card -->
</section>
<!-- Section: Main panel -->
@endsection
