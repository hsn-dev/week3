@extends('layouts.app', ['title' => 'Product List'])

@section('content')
    <div class="row">
        <div class="col-md-12">

            <h2 class="mt-5 mb-5 float-start">Product List</h2>
            <a type="button" class="btn btn-success mt-5 float-end" href="{{ route('product.create') }}">New Product +</a>

            <table class="table table-light table-responsive text-uppercase text-center text-secondary">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>category</th>
                    <th>price</th>
                    <th>cost</th>
                    <th>tax rate</th>
                    <th>preparation time</th>
                    <th>calories</th>
                    <th>stock product</th>
                    <th>actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->cost}}</td>
                        <td>{{$product->tax_rate}}</td>
                        <td>{{$product->prepare_time}}</td>
                        <td>{{$product->calories}}</td>
                        <td>{{$product->stock_product ? 'Yes' : 'No'}}</td>
                        <td>
                            <form class="d-inline" method="POST" action="{{ route('product.destroy', $product->id) }}">
                                @csrf @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                            <a type="button" class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>
                        </td>
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

