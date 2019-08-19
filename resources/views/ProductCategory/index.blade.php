@extends('layouts.admin')
@section('content-admin')
    <section>

        <div class="row my-2">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
        <div class="card">
            <div class="card-header bg-white">
                <a href="{{ route('category.create') }}" class="btn btn-outline-success float-right">Add Product Category</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="blue-grey lighten-4">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Icon </th>
                        <th>Header Image </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($cat_s) > 0)
                    @foreach($cat_s as $cat)
                    <tr>
                        <th scope="row">{{ $cat->id }}</th>
                        <td>{{ $cat->category_name }}</td>
                        <td>{{ $cat->category_des }}</td>
                        <td><img src="{{ url('images/').'/category/cat_icon/'.$cat->cat_image }}" alt="" style="height: 150px; width: 150px;"> </td>
                        <td><img src="{{ url('images/').'/category/cat_header_image/'.$cat->cat_header_image }}" alt="" style="height: 150px; width: 150px;">
                        </td>
                        <td class="d-flex">

                            <a href="{{ route('category.edit', $cat->id) }}"><i class="far fa-edit  text-success"></i></a>
                            <form action="{{ route('category.destroy', $cat->id) }}" method="post">
                                <button  type="submit" value="Delete" style="background: transparent; border: none;"><i class="fas fa-trash-alt  text-danger"></i></button>
                                @method('delete')
                                @csrf
                            </form>
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
            </div>
        </div>
        <div class="d-flex justify-content center">
            {{ $cat_s->links() }}
        </div>
    </section>
@endsection
