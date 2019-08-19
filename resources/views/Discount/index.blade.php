@extends('layouts.admin')
@section('content-admin')
    <section>
        <div class="row my-2">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-header bg-white">
                <a href="{{ route('discount.create') }}" class="btn btn-outline-success float-right">Add Discount coupon </a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="blue-grey lighten-4">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Discount Amount</th>
                        <th>Discount Start Date</th>
                        <th>Discount End Date </th>
                        <th>Cart Total Min  </th>
                        <th>Cart Total Max </th>
                        <th>
                            Status
                        </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($coupons) > 0)
                    @foreach($coupons as $cat)
                    <tr>
                        <th scope="row">{{ $cat->id }}</th>
                        <td>{{ $cat->discount_name }}</td>
                        <td>Rs. {{ $cat->discount_price }}</td>
                        <td>{{ $cat->discount_start_date }}</td>
                        <td>{{ $cat->discount_end_date }}</td>
                        <td>Rs. {{ $cat->discount_cart_total_min }}</td>
                        <td>Rs. {{ $cat->discount_cart_total_max }}</td>
                        <td>
                            @if($cat->status == 0)
                               <p>DeActive</p>
                                @else
                                <p>Active</p>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('discount.destroy', $cat->id) }}" method="post">
                                <button  type="submit" value="Delete" style="background: transparent; border: none;">
                                    <i class="fas fa-trash-alt fa-1x text-danger"></i>
                                </button>
                                @method('delete')
                                @csrf
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
