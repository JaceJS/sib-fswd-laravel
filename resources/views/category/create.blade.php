@extends('layouts.main')

@section('content')    
    <div class="container-fluid px-4">
        <h2 class="my-4">Create Category</h2>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                    @csrf

                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-12 mt-4 d-flex justify-content-between">
                        <button class="btn btn-primary" type="submit" value="Simpan">Simpan</button>
                        <a href="{{ route('category.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection