@extends('layouts.main')

@section('content')     
    <div class="container-fluid px-4">
        <h2>Create Product</h2>
        <form action={{ route("products.store") }} method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
            @csrf

            <div class="col-md-6">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" aria-label="category" id="category" name="category" required>
                    <option selected disabled>- Choose Category -</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>            
            <div class="col-md-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" min="0" step="1000" required>
            </div>
            <div class="col-md-6">
                <label for="sale_price" class="form-label">Sale Price</label>
                <input type="number" class="form-control" id="sale_price" name="sale_price" min="0" step="1000" required>
            </div>
            <div class="col-md-6">
                <label for="brand" class="form-label">Brand</label>
                <select class="form-select" aria-label="brand" id="brand" name="brand">
                    <option selected disabled>- Choose Brand -</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" class="form-control" id="rating" name="rating" min="0" max="5" required>
            </div>

            <div class="col-12 mt-4 d-flex justify-content-between">
                <button class="btn btn-primary" type="submit" value="Simpan">Simpan</button>
                <a href="{{ route('products.index') }}" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
@endsection
