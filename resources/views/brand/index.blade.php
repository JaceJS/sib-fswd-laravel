@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Brand</h1>            

            <div class="card mb-4">
                <div class="card-body">
                    <div class="pb-3">
                        <a href="{{ route('brand.create') }}" class="btn text-white btn-md" style="background-color: #742317;">Create New</a>        
                    </div> 
                    <table id="dataTable" class="table table-striped">
                        <thead>
                            <tr class="table-dark">
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Are you sure? ');" action="{{ route('brand.destroy', $data->id) }}" method="POST">
                                            <a href="{{ route('brand.edit', $data->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>                    
                </div>
            </div>
        </div>
    </main>
@endsection