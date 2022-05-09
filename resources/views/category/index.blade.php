@extends('layouts.app', ['title' => 'Category List'])

@section('content')
    <div class="row">
        <div class="col-md-12">

            <h2 class="mt-5 mb-5 float-start">Category List</h2>
            <a type="button" class="btn btn-success mt-5 float-end" href="{{ route('category.create') }}">New Category +</a>

            <table class="table table-light table-responsive text-uppercase text-center text-secondary">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>category name</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td><a type="button" class="btn btn-danger" href="{{ route('category.destroy', $category->id) }}">Delete</a></td>
                        </tr>
                    @empty
                        <tr>
                            <th colspan="3">No Products Available</th>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
