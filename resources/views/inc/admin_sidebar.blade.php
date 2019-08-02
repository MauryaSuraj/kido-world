<style>
    .bg-light{
        background: white !important;
    }
</style>
<div class="bg-light bg-white border-right" id="sidebar-wrapper">
    <div class="list-group bg-white list-group-flush">
        <a href="/home" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-tachometer-alt mx-2 "></i> Dashboard</a>
        <a href="/admin/product/category" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-project-diagram mx-2"></i> Category</a>
        <a href="/admin/manufacturer" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-industry mx-2"></i> Manufacturer</a>
        <a href="/admin/product" class="list-group-item list-group-item-action bg-light"> <i class="fab fa-product-hunt mx-2"></i> Product</a>
        <a href="/admin/Profile/{{ auth()->user()->id }}" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-user-circle mx-2"></i> Profile</a>
        <a href="#" class="list-group-item list-group-item-action bg-light"> <i class="fas fa-sign-out-alt mx-2"></i>Logout</a>
    </div>
</div>

