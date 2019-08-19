@extends('layouts.pageLayout')
@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url('images/contact-us.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-0 bread">Contact Us</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Contact</span></p>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row my-2">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
            <div class="row block-9">
            
                <div class="col-md-6 order-md-last d-flex">
                    

                     <form action="{{ route('contact_form') }}" method="POST" class="p-5 contact-form" style="background: linear-gradient(to right, #ff512f, #dd2476);">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Subject" name="subject" id="subject">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message" ></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>

                </div>

                <div class="col-md-6 d-flex">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14008.142942320597!2d77.29337672361805!3d28.628691053130847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce4b2f79b09d5%3A0x158880a7f1a9f5c4!2sI.P.Extension%2C+Patparganj%2C+Delhi!5e0!3m2!1sen!2sin!4v1565178727235!5m2!1sen!2sin" width="600" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <div style="background-image: linear-gradient(to right,  #000000b3, #000000b3), url('{{ url('images/').'/contactpage.jpg' }}'); padding-top: 1rem;
        padding-bottom: 1rem;">
        <div class="container">
            <div class="row d-flex mt-5 contact-info">
                <div class="w-100"></div>
                <div class="col-md-3 d-flex text-center">
                    <div class="info  py-3 px-5" style="background: white;">
                        <p style="color: black;"><span style="color: black;"> <img src="https://image.flaticon.com/icons/svg/1076/1076323.svg" alt="" style="height: 30px;"> </span><br><br> <strong>Kid-O-World I P Extn Delhi 110092</strong>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 d-flex text-center">
                    <div class="info   py-3 px-5" style="background: white;">
                        <p style="color: black;"><span style="color: black;"> <img src="https://image.flaticon.com/icons/svg/254/254080.svg" alt="" style="height: 30px;"> </span> <a href="tel://1234567920" style="color: black;"><br><br><strong>+91 - 9873306090</strong>
                            </a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex text-center">
                    <div class="info   py-3 px-4" style="background: white;">
                        <p style="color: black;"><span style="color: black;"><img src="https://image.flaticon.com/icons/svg/1040/1040218.svg" alt="" style="height: 30px;"></span> <a href="mailto:kyra.enterprises1@gmail.com" style="color: black;"><br><br><strong>kyra.enterprises1@gmail.com</strong></a></p>
                    </div>
                </div>
                <div class="col-md-3 d-flex text-center">
                    <div class="info  py-3 px-5" style="background: white;">
                        <p style="color: black;"><span style="color: black;"><img src="https://image.flaticon.com/icons/svg/1055/1055687.svg" alt="" style="height: 30px;"></span> <a href="http://kidoworldstore.in" style="color: black;"><br><br><strong>kidoworldstore.in</strong></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
