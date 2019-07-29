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
                <a href="{{ route('manufacturer.create') }}" class="btn btn-outline-success float-right">Add Manufacturer</a>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="blue-grey lighten-4">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($manu_s) > 0)
                    @foreach($manu_s as $cat)
                    <tr>
                        <th scope="row">{{ $cat->id }}</th>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->details }}</td>
                        <td><img src="{{ url('images/').'/manufacturer_image/'.$cat->image }}" alt="" style="height: 150px; width: 150px;"> </td>
                        <td>
                            <a href="{{ route('manufacturer.edit', $cat->id) }}"><i class="far fa-edit fa-2x text-success"></i></a>
                            <a href="{{ route('manufacturer.destroy', $cat->id) }}"><i class="fas fa-trash-alt fa-2x text-danger"></i></a>
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
    </section>
@endsection
