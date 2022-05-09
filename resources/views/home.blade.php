@extends('layouts.app', ['title' => 'Home'])

@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4 mt-5">

            <a type="button" class="btn btn-secondary" href="{{ route('category.index') }}">List Categories</a>
            <a type="button" class="btn btn-secondary" href="{{ route('product.index') }}">List Products</a>

        </div>
    </div>
@endsection
