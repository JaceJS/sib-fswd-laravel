@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Role</h1>

        <div class="card mb-4">
            <div class="card-body">
                <div class="pb-3">
                    <a href="{{ route('role.create') }}" class="btn text-white btn-md" style="background-color: #742317;">Create New</a>        
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
                        @foreach($roles as $data)
                        <tr>                            
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>
                                <form onsubmit="return confirm('Are you sure? ');" action="{{ route('role.destroy', $data->id) }}" method="POST">
                                    <a href="{{ route('role.edit', $data->id) }}" class="btn btn-warning btn-sm">
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
@endsection