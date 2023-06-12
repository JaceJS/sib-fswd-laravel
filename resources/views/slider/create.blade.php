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
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="col-md-12">
                            <label for="caption" class="form-label">Caption</label>
                            <input type="text" class="form-control" id="caption" name="caption" required>
                        </div>

                        <div class="col-md-12">
                            <label for="image" class="form-label">Slider Image</label>
                            <input class="form-control" type="file" name="image" id="image" accept=".jpg, .jpeg, .png., .webp" required>
                        </div>

                        <div class="col-12 mt-4 d-flex justify-content-between">
                            <button class="btn btn-primary" type="submit" value="Simpan">Simpan</button>
                            <a href="{{ route('slider.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection