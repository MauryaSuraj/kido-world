<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5d4287f37d27204601c8b316/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<style>
    .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
        color: #ffffff;
        background-color: #f1b8c4;
        /* border-color: #dee2e6 #dee2e6 #fff; */
    }
    
     @media only screen and (max-width: 600px) {
         footer .row{
         padding : 50px;
         }
    }
    .modal .form-control{
        height: 40px !important;
    }
</style>
<div class="modal fade" id="login">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 100%;">
                    <li class="nav-item" style="width: 50%;">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" style="width: 50%;">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
                    </li>
                </ul>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

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
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone No.') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
                                        <div class="col-md-6 offset-md-3">
                                            {!! captcha_image_html('ContactCaptcha') !!}
                                            <input class="form-control" type="text" id="CaptchaCode" name="CaptchaCode" style="margin-top:5px;">
                                            @if ($errors->has('CaptchaCode'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('CaptchaCode') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
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
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                Login To Add In WishList
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="subscribe" tabindex="-1" role="dialog" aria-labelledby="subscribeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
               You will get Notification about our latest product 
            </div>
        </div>
    </div>
</div>

<footer class="ftco-footer " style=" padding: 0px !important; padding-top: 1.5rem !important; background-image: linear-gradient(to right, #bc4e9c, #f80759e0), url('https://images.pexels.com/photos/998067/pexels-photo-998067.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940')">
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="ftco-footer-widget mb-1 ml-md-5">
                    <h2 class="ftco-heading-2" style="color: white !important; -webkit-text-fill-color: white;">Menu</h2>
                   <hr style="border-top: 1px solid var(--white);">
                    <ul class="list-unstyled">
                        <li ><a href="{{ route('shop.index') }}" class="py-2 d-block" style="color: white !important;"><img src="{{ url('images/').'/right-arrow.svg' }}" style="height: 13px;" />  Shop</a></li>
                        <li ><a href="{{ route('about') }}" class="py-2 d-block" style="color: white !important;"><img src="{{ url('images/').'/right-arrow.svg' }}" style="height: 13px;" />  About</a></li>
                        <li><a href="{{ route('contact') }}" class="py-2 d-block" style="color: white !important;"><img src="{{ url('images/').'/right-arrow.svg' }}" style="height: 13px;" />  Contact Us</a></li>
                        <li ><a href="{{ route('terms') }}" class="py-2 d-block" style="color: white !important;"><img src="{{ url('images/').'/right-arrow.svg' }}" style="height: 13px;" /> Terms &amp; Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-1">
                    <h2 class="ftco-heading-2" style="color: white !important; -webkit-text-fill-color: white;">Help</h2>
                    <hr style="border-top: 1px solid var(--white);">
                    <div class="d-flex"> 
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li ><a href="{{ route('shippingpolicy') }}" class="py-2 d-block" style="color: white !important;"><img src="{{ url('images/').'/right-arrow.svg' }}" style="height: 13px;" />  Shipping Policy</a></li>
                            <li ><a href="{{ route('refundpolicy') }}" class="py-2 d-block" style="color: white !important;"><img src="{{ url('images/').'/right-arrow.svg' }}" style="height: 13px;" />  Refund Policy</a></li>
                            <li ><a href="{{ route('returnpolicy') }}" class="py-2 d-block" style="color: white !important;"><img src="{{ url('images/').'/right-arrow.svg' }}" style="height: 13px;" />  Returns &amp; Exchange</a></li>

                            <li ><a href="{{ route('privacy') }}" class="py-2 d-block" style="color: white !important;"><img src="{{ url('images/').'/right-arrow.svg' }}" style="height: 13px;" />  Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-1">
                    <h2 class="ftco-heading-2" style="  color: white !important; -webkit-text-fill-color: white;">Connect With Us</h2>
                 <hr style="border-top: 1px solid var(--white);">
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate" ><a href="https://mydigitech.in"><span style="color: white !important;" class="icon-twitter"></span></a></li>
                        <li class="ftco-animate" ><a href="https://www.facebook.com/Kidoworldstore-328133931150741"><span style="color: white !important;" class="icon-facebook"></span></a></li>
                        <li class="ftco-animate" style="list-style-type: disc; color: white"><a href="https://www.instagram.com/kidoworld.store/"><span style="color: white !important;" class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-1">
                    <h2 class="ftco-heading-2" style="color: white !important; -webkit-text-fill-color: white;">Have a Questions?</h2>
                    <hr style="border-top: 1px solid var(--white);">
                    <div class="block-23 mb-3">
                        <ul>
                            <li ><span class="icon icon-map-marker" style="color: white !important;"></span><span class="text" style="color: white !important;">Kid-O-World I. P. Extn Delhi 110092</span></li>
                            <li><a href="#"><span class="icon icon-phone" style="color: white !important;"></span><span class="text" style="color: white !important;">+91 - 9873306090</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope" style="color: white !important;"></span><span class="text" style="color: white !important;">kyra.enterprises1@gmail.com</span></a></li>
                            <li><form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control" required placeholder="Enter email address">
                                        <input type="submit" value="Subscribe" class="submit px-3" data-toggle="modal" data-target="#subscribe">
                                    </div>
                                </form></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">
                <p style="color: white !important;">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="http://kidoworldstore.in/" target="_blank">Kidoworld</a>
                </p>
            </div>
            <div class="col-md-6 text-center">
                <p style="color: white !important;">
                     Proudly Powered By |   <a href="http://mydigitech.in" target="_blank">Digitech Services</a>
                </p>
            </div>
        </div>
    </div>
</footer>
