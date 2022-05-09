@extends('layouts.app', ['title' => 'New Category'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5 mb-5 float-start">New Category</h2>
            <a type="button" class="btn btn-secondary mt-5 float-end" href="{{ route('category.index') }}">Back</a>
        </div>
        <div class="col-md-6 offset-md-3">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" maxlength="100" class="form-control" id="name" name="name">
                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
