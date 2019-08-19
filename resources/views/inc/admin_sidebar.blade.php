<style>
    .bg-light{
        background: white !important;
    }
</style>
<div class="bg-light bg-white border-right" id="sidebar-wrapper">
    <div class="list-group bg-white list-group-flush">
        <a href="{{ route('home') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-tachometer-alt mx-2 "></i> Dashboard</a>
        <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-project-diagram mx-2"></i> Category</a>
        <a href="{{ route('product.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fab fa-product-hunt mx-2"></i> Product</a>
        <a href="{{ route('order') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-clipboard-list mx-2"></i> Orders</a>
        <a href="{{ route('discount.index') }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-percentage mx-2"></i> Discount Coupon</a>
        <a href="{{ route('Profile.show', auth()->user()->id ) }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-user-circle mx-2"></i> Profile</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt mx-2"></i>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
    </div>
</div>

