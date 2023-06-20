@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Edit Slider</h1>

            <div class="card mb-4">
                <div class="card-body">

                    <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" value="{{ $slider->title }}" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="caption" class="form-label">Caption</label>
                            <input type="text" class="form-control" id="caption" value="{{ $slider->caption }}" name="caption" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Slider Image</label>
                            <input class="form-control" type="file" name="image" id="image" accept=".jpg, .jpeg, .png., .webp">
                        </div>
                        
                        <div class="col-12 mt-4 d-flex justify-content-between">
                            <button class="btn btn-success" type="submit" value="Simpan">Save</button>
                            <a href="{{ route('slider.index') }}" class="btn btn-danger">Back</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection