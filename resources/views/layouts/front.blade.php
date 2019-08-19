<!DOCTYPE html>
<html lang="en">
<head>
    <title> Kid-O-World - Buy Products Online at Best Price in India - All Categories | kidoworldstore.in. </title>
        <meta name="keywords" content="Buy Products Online at Best Price in India."/>        
        <meta name="description" content="Kid-O-World try to provide its customers a maximum discount on its products by purchasing our products from the wholesale dealers so that customers can have more fashion purchase options at one time. Also customers can shop online on Kid-O-World with the ease of payment as we give multiple options like net banking, credit/debit card pay and cash on delivery.Also , in case of any complaint regarding the product , we try to resolve the same as soon as possible till the customer&#039;s satisfaction ."/>   
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="http://kidoworldstore.in/images/logo.png"/>
    <link rel="icon" href="http://kidoworldstore.in/images/favicon-150x150.png" sizes="32x32" />
    <link rel="icon" href="http://kidoworldstore.in/images/favicon-270x270.png" sizes="192x192" />
    <link rel="apple-touch-icon" href="http://kidoworldstore.in/images/favicon-180x180.png?v=asdf" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <style>
        .owl-carousel .off {
    display: none;
}
.icon-bar {
  position: fixed;
  z-index: 999;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}

/* Style the icon bar links */
.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

/* Style the social media icons with color, if you want */
.icon-bar a:hover {
  background-color: #fff;
}

.facebook {
  background: #3B5998;
  color: white;
}
.facebook:hover {
 color : #3B5998;
   background: white;
}

.twitter {
  background: #5851DB;
  color: white;
}
.twitter:hover {
   color: #5851DB;
  background : white;
}


    </style>
</head>
<body>
    <div class="icon-bar">
  <a href="https://www.facebook.com/Kidoworldstore-328133931150741" class="facebook"><i class="fa fa-facebook"></i></a> 
  <a href="https://www.instagram.com/kidoworld.store/" class="twitter"><i class="fa fa-instagram" aria-hidden="true"></i></a> 
</div>
@include('inc.navbar')
@yield('content')
@include('inc.footer')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/aos.js') }}"></script>
<script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/scrollax.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
    <script>
    $(document).ready(function(){

        var quantitiy=0;
        $('.quantity-right-plus').click(function(e){

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);


            // Increment

        });

        $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if(quantity>0){
                $('#quantity').val(quantity - 1);
            }
        });

    });
</script>
<script>
    $(document).ready(function() {
  if ( $(window).width() < 854 ) {
    startCarousel();
  } else {
    $('.owl-carousel').addClass('off');
  }
});

$(window).resize(function() {
    if ( $(window).width() < 854 ) {
      startCarousel();
    } else {
      stopCarousel();
    }
});

function stopCarousel() {
  var owl = $('.owl-carousel');
  owl.trigger('destroy.owl.carousel');
  owl.addClass('off');
}
</script>
@guest()
    <script type="text/javascript">
        $(window).load(function(){
            $('#login').modal('show');
        });
    </script>
@endguest
</body>
</html>
