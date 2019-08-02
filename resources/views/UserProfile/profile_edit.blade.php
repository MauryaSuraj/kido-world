@extends('layouts.UserPanel')
@section('content')
    <div style="background: white; padding: 1rem;">
        <div class="container">
            <div class="row my-2">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('Profile.update', \App\BuyerProfile::user_details()->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ \App\BuyerProfile::user_details()->user_name }}" readonly required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ \App\BuyerProfile::user_details()->phone }}"  required autocomplete="phone" autofocus>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                    <div class="col-md-6">
                                        <select name="gender" id="gender" class="form-control d-block">
                                            <option selected value="{{ \App\BuyerProfile::user_details()->gender }}">{{ \App\BuyerProfile::user_details()->gender }}</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="date_of_birth" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                                    <div class="col-md-6">
                                        <input  type="date" value="{{ \App\BuyerProfile::user_details()->date_of_birth }}" id="date_of_birth" name="date_of_birth" class="form-control datepicker">
                                        {{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $profile->user_name }}" readonly required autocomplete="name" autofocus>--}}
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="profile_image" class="col-md-4 col-form-label text-md-right">{{ __(' Profile Image') }}</label>
                                    <div class="col-md-6">
                                        <input id="profile_image" type="file" class="form-control" name="profile_image" required autocomplete="profile_image">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update Profile') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
