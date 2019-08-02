<nav id="sidebar">
    <img src="{{ url('images/').'/logo.png' }}" class="img-fluid px-2" alt="">
    <ul class="list-unstyled components">
        <li>
            <a href="{{ route('buyer') }}"><img src="https://image.flaticon.com/icons/svg/610/610106.svg" class="mx-2" style="height: 30px;" alt=""> DashBoard</a>
        </li>
        <li>
            <a href="{{ route('buyer_order') }}"><img src="https://image.flaticon.com/icons/svg/1559/1559861.svg" class="mx-2" style="height: 30px;" alt=""> Orders</a>
        </li>
        <li>
            <a href="{{ route('buyer_cart') }}"><img src="https://image.flaticon.com/icons/svg/189/189103.svg" class="mx-2" style="height: 30px;" alt=""> Cart</a>
        </li>
        <li>
            <a href="{{ route('buyer_wishlist') }}"><img src="https://image.flaticon.com/icons/svg/1310/1310953.svg" class="mx-2" style="height: 30px;" alt=""> Wishlist</a>
        </li>
        <li>
            <a href="{{ route('buyer_profile') }}"><img src="https://image.flaticon.com/icons/svg/138/138691.svg" class="mx-2" style="height: 30px;" alt=""> Profile</a>
        </li>
        <li>
            <a href="#"><img src="https://image.flaticon.com/icons/svg/1716/1716282.svg" class="mx-2" style="height: 30px;" alt=""> Logout</a>
        </li>
    </ul>
</nav>
