@extends('layouts.admin')
@section('content-admin')
    <section>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead class="blue-grey lighten-4">
                    <tr>
                        <th>#</th>
                        <th>Customer Name</th>
                        <th>Customer Phone </th>
                        <th>Customer Email</th>
                        <th>product Name</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Order Created At</th>
                        <th>
                            Status
                        </th>
                        <th>
                            Uploaded
                        </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    {{ \App\Order::order_details() }}
                    @if(count(\App\Order::order_details()) > 0)
                        @foreach(\App\Order::order_details() as $product)
                            <tr>
                                <th scope="row">{{ $product->id }} </th>
                                <td>{{ $product->customer_id }} </td>
                                <td>{{ $product->product_id }} </td>
                                <td>{{ $product->payment_status }} </td>
                                <td>{{ $product->order_status }}</td>
                                <td> {{ $product->created_at }} </td>
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
