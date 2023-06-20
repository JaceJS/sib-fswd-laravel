@extends('layouts.main')

@section('content')    
    <div class="container-fluid px-4">
        <h2 class="my-4">Create Roles</h2>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                    @csrf

                    <div class="col-md-12">                        
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-12 mt-4 d-flex justify-content-between">
                        <button class="btn btn-success" type="submit" value="Simpan">Create</button>
                        <a href="{{ route('role.index') }}" class="btn btn-danger">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection