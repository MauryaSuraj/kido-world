@extends('layouts.admin')
@section('content-admin')
    <section>
        <div class="row">
                <div class="col-md-6">
                    <form method="post" action="{{ route('search_admin') }}">
                        @csrf
                        <div class="">
                            <div class="d-flex">
                                <input type="text" class="form-control col-md-6" required name="search" id="search"  placeholder=" Search for Product , brand and many more " style="margin-top: 10px;">
                                <button class="btn btn-primary col-md-6" type="submit" style="">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        <div class="row my-2">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-header bg-white">
                <a href="/admin/product/create" class="btn btn-outline-success float-right">Add Product </a>
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import Product </button>
                    <a class="btn btn-warning" href="{{ route('export') }}">Export  Product</a>
                </form>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="blue-grey lighten-4">
                    <tr>
                        <th>#</th>
                        <th>product Name</th>
                        <th>Category</th>
                        <th>Product Image</th>
                        <th>Product Quantity</th>
                        <th>
                            Status
                        </th>
                        <th>
                            SKU CODE
                        </th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($product_lists) > 0)
                    @foreach($product_lists as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->category_name }}</td>
                        <td><img src="{{ url('images/').'/product/product_main_image/'.$product->product_image }}" alt="" style="height: 150px; width: 150px;"> </td>
                        <td>{{ $product->quantity }}</td>
                        <td> {{ $product->status }} </td>
                        <td> {{ $product->SKU_CODE }} </td>
                        <td>
                            <a href="{{ route('product.edit', $product->id) }}"><i class="far fa-edit fa-1x text-success"></i></a>

                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                <button  type="submit" value="Delete" style="background: transparent; border: none;"><i class="fas fa-trash-alt fa-1x text-danger"></i></button>
                                @method('delete')
                                @csrf
                            </form>
                            <a href="{{ route('product.show', $product->id) }}"><i class="fas fa-eye fa-1x text-primary"></i></a>
                        </td>
                    </tr>
                    @endforeach
                        @else
                    <tr>
                        No Data Entered
                    </tr>
                        @endif
                    </tbody>
                </table>
              
                 @if( url()->current() == "http://kidoworldstore.in/search_admin")
        
    @else
      {{ $product_lists->links() }}
     @endif
            </div>
        </div>
    </section>
@endsection
