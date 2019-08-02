@extends('layouts.UserPanel')
@section('content')
    <div style="background: white; padding: 1rem;">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="@if(\App\BuyerProfile::user_details()->profile_image) {{ url('images/').'/profile/'.\App\BuyerProfile::user_details()->profile_image }}  @else https://image.flaticon.com/icons/svg/64/64096.svg @endif" class="img-fluid my-auto" alt="" style="height: 200px; width: 200px; border-radius: 50%;">
                </div>
                <div class="col-md-9">
                    <a href="{{ route('buyer_profile_edit',auth()->user()->id) }}" class="float-right btn btn-outline-primary">Edit Profile</a>
                    <div class="mt-5">
                        <p>Name : {{ \App\BuyerProfile::user_details()->user_name }}</p>
                        <p>Mail Id : {{ \App\BuyerProfile::user_details()->email }}</p>
                        <p>Phone No: {{ \App\BuyerProfile::user_details()->phone }}</p>
                        <p>Gender: {{ \App\BuyerProfile::user_details()->gender }}</p>
                        <p>Date Of Birth : {{ \App\BuyerProfile::user_details()->date_of_birth }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
