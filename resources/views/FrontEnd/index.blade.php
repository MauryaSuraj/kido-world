@extends('layouts.front')
@section('content')
<style>
    @media only screen and (max-width: 600px) {
  .ftco-produc .col-md-2{
       width : 50% !important;
  }
  
  .bottom-area .col-md, .bottom,  .bottom-area .col-sm-6, .product-featured .col-md, .latest .col-sm, .latest .col-md-6, .latest .col-lg{
   width : 50% !important;
  }
  .hero-wrap 
  {
      height: 17vh !important;
  }
  .search{
      padding-bottom: 12rem !important;
  }
  
}
</style>
    <div class="hero-wrap " style="background-image: linear-gradient(to right, rgba(255, 0, 204, 0.47), rgba(51,51,153,0)), url('{{ url('images/').'/banner3.jpg' }}'); height: 55vh; background-size: 100% !important; ">
{{--        <div class="overlay"></div>--}}
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-6 ftco-animate text-center " style="padding-bottom: 12rem !important; ">
                    <form method="post" class="search" action="{{ route('search') }}">
                        @csrf
                        <div class="d-flex">
                            <input type="text" class="form-control" required name="search" id="search"  placeholder="               Search for Product , brand and many more " style="border-bottom-left-radius: 50px; border-top-left-radius: 50px;">
                            <button class="btn btn-primary" type="submit" style="border-radius: 0px;border-bottom-right-radius: 50px; border-top-right-radius: 50px; border: 0;">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="goto-here"></div>
    <section class="ftco-section ftco-produc my-2" style="padding: 0px !important;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center ftco-animate">
                    <h1 class="my-2">Trending</h1>
                </div>
            </div>
            
            @foreach(\App\FrontModel::categoryWiseProduct() as $category)
               <div class="d-flex justify-content-end my-2"> <span class="float-right">  
               <a class="float-right" style="font-size: 20px;" href="/product/category/{{ $category->slug }}">{{ $category->category_name }} </a> </span>
               </div>
               <hr>
                <div class="row">
                            @foreach(\App\FrontModel::productBasedOnCategory($category->id) as $product)
                                <div class="col-md-2">
                                    <div class="item">
                                        <div class="product">
                                            <a href="{{ route('shop.show', $product->slug) }}" class="img-prod"><img style="width: 100%;" src="{{ url('images/').'/product/product_main_image/'.$product->product_image }}" alt="{{ $product->product_name }}"></a>
                                            <div class="text pt-3 px-3">
                                                <h3><a href="{{ route('shop.show', $product->slug) }}" style="font-size:14px;">{{ str_limit($product->product_name, $limit = 18, $end = '...') }}</a></h3>
                                                
                                                <div class="d-flex"> 
                                                    <div class="pricing">
                                                        <p class="price"><span>Rs. {{ $product->product_price }}</span></p>
                                                    </div>
                                                    <div class="rating">
                                                    
                                                        <p class="d-flex">
                                                            <span class="ion-ios-star-outline"></span>
                                                            <span class="ion-ios-star-outline"></span>
                                                            <span class="ion-ios-star-outline"></span>
                                                            <span class="ion-ios-star-outline"></span>
                                                            <span class="ion-ios-star-outline"></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="bottom-area d-flex">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md col-sm-6 bottom">
                                                        <form method="POST" action="{{ route('addToCart') }}">
                                                            @csrf
                                                            <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                                            <input type="hidden" id="product_quantity" name="product_quantity" value="1">
                                                            <input type="hidden" id="product_price" name="product_price" value="{{ $product->product_price }}">
                                                            <button type="submit" class="add-to-cart " style="background: transparent; border:none !important;" >
                                                                <span> <img src="https://image.flaticon.com/icons/svg/145/145423.svg" style="width:30px;" /> </span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md col-sm-6 bottom">
                                                        @if(\Illuminate\Support\Facades\Auth::check())
                                                            @if(\App\Wishlist::checkWishList($product->id) == 0)
                                                                <form method="POST" action="{{ route('wishlist') }}">
                                                                    @csrf
                                                                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                                                    <button type="submit"  style="background: transparent; border: none !important;">
                                                                        <span><img src="https://image.flaticon.com/icons/svg/149/149217.svg" style="width:30px;" /></span>
                                                                    </button>
                                                                </form>
                                                            @else
                                                                
                                                                <img src="https://image.flaticon.com/icons/svg/148/148836.svg" style="width:30px;" />
                                                                
                                                            @endif
                                                        @else
                                                            <button type="button" style="background:transparent; border:none !important;" data-toggle="modal" data-target="#exampleModal">
                                                               <img src="https://image.flaticon.com/icons/svg/149/149217.svg" style="width:30px;" />
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                             <a href="/product/category/{{ $category->slug }}" style="height: 30px;  margin-right:30px;   position: absolute;    left: 0px;    margin-top: 5%;"> 
                             <img src="{{ url('images/').'/back.svg' }}" style="height:20px;" /> More 
                             </a>
                             <a href="/product/category/{{ $category->slug }}" style="height: 30px;  margin-right:30px;   position: absolute;    right: 0px;    margin-top: 5%;">  More 
                             <img src="{{ url('images/').'/arrow-point-to-right.svg' }}" style="height:20px; margin-left:-5px;" />
                             </a>
                </div>
            @endforeach
           
        </div>
    </section>
    @include('inc.about')
    <div class="container">
        <h3 class="text-center">Featured Product</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="ftco-animate row product-featured">
                        @foreach(\App\Product::isFeaturedProduct() as $product)
                            <div class="item col-md">
                                <div class="product">
                                    <a href="{{ route('shop.show', $product->slug) }}" class="img-prod"><img style="width:100%;" src="{{ url('images/').'/product/product_main_image/'.$product->product_image }}" alt="{{ $product->product_name }}"></a>
                                    <div class="text pt-3 px-3">
                                        <h3><a href="{{ route('shop.show', $product->slug) }}">{{ $product->product_name }}</a></h3>
                                        <div class="d-flex">
                                            <div class="pricing">
                                                <p class="price"><span>Rs. {{ $product->product_price }}</span></p>
                                            </div>
                                            <div class="rating">
                                                <p class="d-flex">
                                                    <span class="ion-ios-star-outline"></span>
                                                    <span class="ion-ios-star-outline"></span>
                                                    <span class="ion-ios-star-outline"></span>
                                                    <span class="ion-ios-star-outline"></span>
                                                    <span class="ion-ios-star-outline"></span>
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                      <p class="bottom-area d-flex">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md col-sm-6 bottom">
                                                        <form method="POST" action="{{ route('addToCart') }}">
                                                            @csrf
                                                            <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                                            <input type="hidden" id="product_quantity" name="product_quantity" value="1">
                                                            <input type="hidden" id="product_price" name="product_price" value="{{ $product->product_price }}">
                                                            <button type="submit" class="add-to-cart " style="background: transparent; border:none;" >
                                                                <span> <img src="https://image.flaticon.com/icons/svg/145/145423.svg" style="width:30px;" /> </span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md col-sm-6 bottom">
                                                        @if(\Illuminate\Support\Facades\Auth::check())
                                                            @if(\App\Wishlist::checkWishList($product->id) == 0)
                                                                <form method="POST" action="{{ route('wishlist') }}">
                                                                    @csrf
                                                                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                                                    <button type="submit"  style="background: transparent; border: none;">
                                                                        <span><img src="https://image.flaticon.com/icons/svg/149/149217.svg" style="width:30px;" /></span>
                                                                    </button>
                                                                </form>
                                                            @else
                                                                
                                                                <img src="https://image.flaticon.com/icons/svg/148/148836.svg" style="width:30px;" />
                                                                
                                                            @endif
                                                        @else
                                                            <button type="button" style="background:transparent; border:none;" data-toggle="modal" data-target="#exampleModal">
                                                               <img src="https://image.flaticon.com/icons/svg/149/149217.svg" style="width:30px;" />
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    <section class="ftco-section bg-light" style="padding: 0px !important;">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h2 class="my-4"> Latest Arrivals </h2>
                </div>
            </div>
        </div>
        <div class="container-fluid latest">
            <div class="row">
                @foreach($products as $product)
                <div class="col-sm col-md-6 col-lg ftco-animate">
                    <div class="product">
                        <a href="{{ route('shop.show', $product->slug) }}" class="img-prod"><img class="img-fluid" src="{{ url('images/').'/product/product_main_image/'.$product->product_image }}" alt="{{ $product->product_name }}"></a>
                        <div class="text py-3 px-3">
                            <h3><a href="{{ route('shop.show', $product->slug) }}">{{ $product->product_name }}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span>Rs. {{ $product->product_price }}</span></p>
                                </div>
                                <div class="rating">
                                    <p class="d-flex">
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                        <span class="ion-ios-star-outline"></span>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <p class="bottom-area d-flex">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md bottom col-sm-6">
                                                        <form method="POST" action="{{ route('addToCart') }}">
                                                            @csrf
                                                            <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                                            <input type="hidden" id="product_quantity" name="product_quantity" value="1">
                                                            <input type="hidden" id="product_price" name="product_price" value="{{ $product->product_price }}">
                                                            <button type="submit" class="add-to-cart " style="background: transparent; border:none;" >
                                                                <span> <img src="https://image.flaticon.com/icons/svg/145/145423.svg" style="width:30px;" /> </span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md bottom col-sm-6">
                                                        @if(\Illuminate\Support\Facades\Auth::check())
                                                            @if(\App\Wishlist::checkWishList($product->id) == 0)
                                                                <form method="POST" action="{{ route('wishlist') }}">
                                                                    @csrf
                                                                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                                                    <button type="submit"  style="background: transparent; border: none;">
                                                                        <span><img src="https://image.flaticon.com/icons/svg/149/149217.svg" style="width:30px;" /></span>
                                                                    </button>
                                                                </form>
                                                            @else
                                                                
                                                                <img src="https://image.flaticon.com/icons/svg/148/148836.svg" style="width:30px;" />
                                                                
                                                            @endif
                                                        @else
                                                            <button type="button" style="background:transparent; border:none;" data-toggle="modal" data-target="#exampleModal">
                                                               <img src="https://image.flaticon.com/icons/svg/149/149217.svg" style="width:30px;" />
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            </p>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!--<img src="{{ url('images/').'/banner1.png' }}" class="img-fluid" alt="">-->
     <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: linear-gradient(to right,  #000000b3, #000000b3), url('{{ url('images/').'/contactpage.jpg' }}'); padding-top: 1rem;
        padding-bottom: 1rem;">
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text" style="border-style: solid; border-color: white; padding: 10px; border-width: 3px; height: 135px ; width: 135px; border-radius: 50%;">
                                    <strong class="number" data-number="10000" style="color: white !important; font-size: 25px;">0</strong>
                                    <span style="color: white !important; font-size: 16px;">Happy Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text" style="border-style: solid; border-color: white; padding: 10px; border-width: 3px; height: 135px ; width: 135px; border-radius: 50%;">
                                    <strong style=" font-size: 25px; color: white !important;" class="number" data-number="100">0</strong>
                                    <span style="color: white !important; font-size: 16px;">Branches</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text" style="border-style: solid; border-color: white; padding: 10px; border-width: 3px; height: 135px ; width: 135px; border-radius: 50%;">
                                    <strong style="color: white !important; font-size: 25px;" class="number" data-number="1000">0</strong>
                                    <span style="color: white !important; font-size: 16px;">Partner</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text" style="border-style: solid; border-color: white; padding: 10px; border-width: 3px; height: 135px ; width: 135px; border-radius: 50%;">
                                    <strong style="color: white !important; font-size: 25px;" class="number" data-number="100">0</strong>
                                    <span style="color: white !important; font-size: 16px;">Awards</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light ftco-services" style="padding: 0px; ">
        <div class="container">
            <div class="row">
                <div class="col-md-3 p-3 " style="background: #faebd7;">
                <h5 class="text-center" style="margin-bottom: -5rem;  padding-top: 1rem;"> Customer Reviews </h5>
                    <div class="pt-5 mt-5">
                        <div class="carousel-testimony owl-carousel ftco-owl">
                            <div class="item">
                                <div class="testimony-wrap">
                                    <div class="text text-center">
                                        <p class="">Best products for babies. It covers full head including ear .  It is also good for baby if they fall while crawling it gives double protection due to two layered clothing. Value for money.. </p>
                                    </div>
                                    <div class="user-img " >
                                    <!--<span class="quote d-flex align-items-center justify-content-center">-->
                                    <!--  <i class="icon-quote-left"></i>-->
                                    <!--</span>-->
                                    </div>
                                    <div class="text text-center">
                                        <br>
                                        <p class="name">Partosh </p>
                                        <span class="position">Customer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap">
                                    <div class="text text-center">
                                        <p class="">Wonderful product... cotton cap....covers full ears...very comfortable....take bigger size.....will be better. </p>
                                    </div>
                                    <div class="user-img ">
                                    <!--<span class="quote d-flex align-items-center justify-content-center">-->
                                    <!--  <i class="icon-quote-left"></i>-->
                                    <!--</span>-->
                                    </div>
                                    <div class="text text-center">
                                        <br>
                                        <p class="name">Pankaj</p>
                                        <span class="position">Customer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap">
                                    <div class="text text-center">
                                        <p class="">Little small , size should be increased, other wise product is very good and all the best to manufacturers , please keep contenue the products! </p>
                                    </div>
                                    <div class="user-img " >
                                    <!--<span class="quote d-flex align-items-center justify-content-center">-->
                                    <!--  <i class="icon-quote-left"></i>-->
                                    <!--</span>-->
                                    </div>
                                    <div class="text text-center">
                                        <br>
                                        <p class="name">Kajal</p>
                                        <span class="position">Customer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap">
                                    <div class="text text-center">
                                        <p class="">Quality of caps are very good. It covers the whole head and ears and absorbs sweat too. Keeps my baby's head warm. Worth buying. Am extremely satisfied. Thumbs up!! </p>
                                    </div>
                                    <div class="user-img " >
                                    <!--<span class="quote d-flex align-items-center justify-content-center">-->
                                    <!--  <i class="icon-quote-left"></i>-->
                                    <!--</span>-->
                                    </div>
                                    <div class="text text-center">
                                        <br>
                                        <p class="name">Yusuf</p>
                                        <span class="position">Customer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row justify-content-center mb-3 pb-3">
                        <div class="col-md-12 heading-section text-center ftco-animate">
                            <h1 class="big" style="font-size: 40px !important; position: relative; top: 0 !important; -webkit-text-fill-color: #4498d1;">Services</h1>
                            <h2>We want you to express yourself</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services">
                                <div class="icon d-flex justify-content-center align-items-center mb-4">
                                    <img src="https://image.flaticon.com/icons/svg/1043/1043464.svg" style="height: 90px; width: 70px;" />
                                </div>
                                <div class="media-body">
                                    <h3 class="heading">Refund Policy</h3>
                                    <p>7 Days Returns And Refund</p>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services">
                                <div class="icon d-flex justify-content-center align-items-center mb-4">
                                    <img src="https://image.flaticon.com/icons/svg/1086/1086741.svg" style="height: 90px; width: 70px;" />
                                </div>
                                <div class="media-body">
                                    <h3 class="heading">Payment</h3>
                                    <p>100% Secured Payment.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
                            <div class="media block-6 services">
                                <div class="icon d-flex justify-content-center align-items-center mb-4">
                                    <img src="https://image.flaticon.com/icons/svg/272/272366.svg" style="height: 90px; width: 70px;" />
                                </div>
                                <div class="media-body">
                                    <h3 class="heading">Superior Quality</h3>
                                    <p>Highest Quality Guarantee.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
