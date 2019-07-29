@extends('layouts.admin')
@section('content-admin')
    <!-- Section: Inputs -->
    <section class="section card mb-5">
        <div class="card-body">
            <div class="row my-2">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>
            <h5 class="pb-5">Add category</h5>
            <div class="row justify-content-center">
                <div class="col-md-8">
                            <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

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
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Category Description') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cat_icon" class="col-md-4 col-form-label text-md-right">{{ __('Category Icon ') }}</label>

                                    <div class="col-md-6">
                                        <input id="cat_icon" type="file" class="form-control @error('cat_icon') is-invalid @enderror" name="cat_icon" required autocomplete="cat_icon">

                                        @error('cat_icon')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cat_header_image" class="col-md-4 col-form-label text-md-right">{{ __('Category Header Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="cat_header_image" type="file" class="form-control" name="cat_header_image" required autocomplete="cat_header_image">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add Category') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>

        </div>
    </section>
@endsection
