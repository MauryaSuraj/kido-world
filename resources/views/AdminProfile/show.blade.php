@extends('layouts.admin')
@section('content-admin')
    <!-- Section: Team v.2 -->
    <section class="team-section text-center my-1">
        <div class="row text-center">
            <!-- Grid column -->
            <div class="col-md-4 mb-md-0 mb-5">
                <div class="avatar mx-auto">
                    <img src="@if($profile->profile_image) {{ url('images/').'/profile/'.$profile->profile_image }}  @else {{  url('images/').'/'.'noimage.jpg'  }} @endif" class="rounded z-depth-1-half">
                </div>
                <h4 class="font-weight-bold dark-grey-text my-4">{{ $profile->user_name }}</h4>
                <h6 class="text-uppercase grey-text mb-3"><strong>Admin</strong></h6>
            </div>

            <div class="col-md-8 text-left p-5 mb-md-0 mb-5 card">
                <div>
                    <a class="float-right" href="{{ route('Profile.edit', $profile->id) }}">Edit Profile</a>
                </div>
                <p>
                    Phone : {{ $profile->phone }}
                </p>
                <p>
                    Email : {{ $profile->email }}
                </p>
                <p>
                    Gender : {{ $profile->gender }}
                </p>
                <p>
                    Date Of Birth : {{ $profile->date_of_birth }}
                </p>
                <p>
                    Account Status : @if($profile->account_status == 1) Active @else UnActive  @endif
                </p>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
    </section>
    <!-- Section: Team v.2 -->
@endsection
