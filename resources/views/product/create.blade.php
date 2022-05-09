@extends('layouts.app', ['title' => 'New Product'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-5 mb-5 float-start">New Product</h2>
            <a type="button" class="btn btn-secondary mt-5 float-end" href="{{ route('product.index') }}">Back</a>
        </div>
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" maxlength="100" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" name="category_id" id="category_id" required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Price</label>
                            <input type="number" min="0" step=".01" class="form-control" id="price" name="price" value="{{ old('price') }}">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Tax Rate</label>
                            <input type="number" min="0" class="form-control" id="tax_rate" name="tax_rate" value="{{ old('tax_rate') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Cost</label>
                            <input type="number" min="0" step=".01" class="form-control" id="cost" name="cost" value="{{ old('cost') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Preparation Time (min)</label>
                            <input type="number" min="0" step=".01" class="form-control" id="prepare_time" name="prepare_time" value="{{ old('prepare_time') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Calories</label>
                            <input type="number" min="0" class="form-control" id="calories" name="calories" value="{{ old('calories') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-check-label">Stock Product</label>
                            <input type="checkbox" class="form-check-input" id="is_stock" value="1" name="is_stock">
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
