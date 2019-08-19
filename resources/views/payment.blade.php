
<meta http-equiv="refresh" content="3;url=https://mydigitech.in/kidoworld/public/shop" />
@extends('layouts.pageLayout')
@section('content')
        <div class="container">
            <div class="row">
                <div class="col-md my-5">
                    <h1 class="h1 text-center"> @if(Session::has('error')) {{ Session::get('error')}} @endif  </h1>
                    <p>
                        Check Your Email
                    </p>
                </div>
            </div>
        </div>
@endsection
