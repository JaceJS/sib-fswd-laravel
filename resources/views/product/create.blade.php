@extends('layouts.main')

@section('content')     
    <div class="container-fluid px-4">
        <h2>Create Product</h2>
        <form action={{ route("product.store") }} method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
            @csrf

            {{-- inputan category --}}
            <div class="col-md-6">
                <label for="category" class="form-label">Category</label>
                <select class="form-select @error('category') is-invalid @enderror" aria-label="category" id="category" name="category">
                    <option selected disabled>- Choose Category -</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
                {{-- menampilkan tulisan error --}}
                @error('category')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- inputan nama --}}
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('category') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                {{-- menampilkan tulisan error --}}
                @error('category')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>            

            {{-- inputan price --}}
            <div class="col-md-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error('category') is-invalid @enderror" id="price" name="price" min="0" step="1000" value="{{ old('price') }}">
                {{-- menampilkan tulisan error --}}
                @error('category')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- inputan sale price --}}
            <div class="col-md-6">
                <label for="sale_price" class="form-label">Sale Price</label>
                <input type="number" class="form-control @error('category') is-invalid @enderror" id="sale_price" name="sale_price" min="0" step="1000" value="{{ old('sale_price') }}">
                {{-- menampilkan tulisan error --}}
                @error('category')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- inputan brand --}}
            <div class="col-md-12">
                <label for="brand" class="form-label">Brand</label>
                <select class="form-select @error('category') is-invalid @enderror" aria-label="brand" id="brand" name="brand">
                    <option selected disabled>- Choose Brand -</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                {{-- menampilkan tulisan error --}}
                @error('category')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- inputan gambar --}}
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" accept=".jpg, .jpeg, .png., .webp">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            
            <div class="col-12 mt-4 d-flex justify-content-between">
                <button class="btn btn-success" type="submit" value="Simpan">Create</button>
                <a href="{{ route('product.index') }}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>
@endsection
