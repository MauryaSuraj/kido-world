@extends('layouts.admin')
@section('content-admin')
    <section>
        <div class="card my-2">
            <div class="card-body">
                <h3>Orders</h3>
            </div>
        </div>
    </section>
    <section>
        <a class="btn btn-warning" href="{{ route('order_export') }}">Export  Order</a>
        <div class="card">
            <div class="card-body">
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
                            No Data Entered
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
