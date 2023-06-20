@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Slider</h1>

            <div class="card mb-4">
                <div class="card-body">
                    <div class="pb-3">
                        <a href="{{ route('slider.create') }}" class="btn text-white btn-md" style="background-color: #742317;">Create New</a>        
                    </div> 
                    <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr class="table-dark">
                                <th>#</th>
                                <th>Title</th>
                                <th>Caption</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Slider Action</th>
                                @if (Auth::user()->role->name == 'Admin')                                                        
                                    <th>Status Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->caption }}</td>
                                    <td>
                                        <img src="{{ asset('storage/slider/' . $slider->image) }}" class="img-fluid" style="max-width: 100px;"
                                            alt="{{ $slider->image }}">
                                    </td>
                                    <td>
                                        @if ($slider->approve)
                                            <small class="text-success">Approved</small>
                                        @elseif($slider->approve === NULL)
                                            <small class="text-warning">Pending</small>
                                        @else
                                            <small class="text-danger">Rejected</small>
                                        @endif
                                    </td>
                                    <td>
                                        <form class="text-center" onsubmit="return confirm('Are you sure? ');" action="{{ route('slider.destroy', $slider->id) }}" method="POST">
                                            <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                    @if (Auth::user()->role->name == 'Admin')     
                                        <td>
                                            <div class="d-flex">
                                                <form class="me-1" onsubmit="return confirm('Approve slider? ');" action="{{ route('slider.approve', $slider->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-success btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                            <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                                <form onsubmit="return confirm('Reject slider? ');" action="{{ route('slider.reject', $slider->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>                                                   
                                    @endif  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection