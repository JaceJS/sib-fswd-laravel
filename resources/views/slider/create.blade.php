@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h2 class="my-4">Create Slider</h2>

            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-12">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="caption" class="form-label">Caption</label>
                            <input type="text" class="form-control @error('caption') is-invalid @enderror" id="caption" name="caption" value="{{ old('caption') }}">
                            @error('caption')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="image" class="form-label">Slider Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="image" accept=".jpg, .jpeg, .png., .webp">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-12 mt-4 d-flex justify-content-between">
                            <button class="btn btn-success" type="submit" value="Simpan">Create</button>
                            <a href="{{ route('slider.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection