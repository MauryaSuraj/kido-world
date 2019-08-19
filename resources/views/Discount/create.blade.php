@extends('layouts.admin')
@section('content-admin')
    <!-- Section: Inputs -->
    <section class="section card mb-5">
        <div class="card-body">
            <div class="row my-2">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <h5 class="pb-5">Discount Coupon </h5>
            <div class="row justify-content-center">
                <div class="col-md-8">
                            <form method="POST" action="{{ route('discount.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __( 'Coupon Code ') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="discount" class="col-md-4 col-form-label text-md-right">{{ __('Discount Amount') }}</label>
                                    <div class="col-md-6">
                                        <input id="discount" type="number" class="form-control" max="200" name="discount" required autocomplete="discount">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="discount_start_date" class="col-md-4 col-form-label text-md-right">{{ __('Discount Start') }}</label>

                                    <div class="col-md-6">
                                        <input id="discount_start_date" type="date" class="form-control" name="discount_start_date" required autocomplete="discount">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="discount_end_date" class="col-md-4 col-form-label text-md-right">{{ __('Discount End') }}</label>
                                    <div class="col-md-6">
                                        <input id="discount_end_date" type="date" class="form-control" name="discount_end_date" required autocomplete="discount">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="discount_cart_total_min" class="col-md-4 col-form-label text-md-right">{{ __('Cart total Min') }}</label>

                                    <div class="col-md-6">
                                        <input id="discount_cart_total_min" type="text" class="form-control" name="discount_cart_total_min" required autocomplete="discount">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="discount_cart_total_max" class="col-md-4 col-form-label text-md-right">{{ __('Cart total Max') }}</label>

                                    <div class="col-md-6">
                                        <input id="discount_cart_total_max" type="text" class="form-control" name="discount_cart_total_max" required autocomplete="discount">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add Discount') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>

        </div>
    </section>
@endsection
