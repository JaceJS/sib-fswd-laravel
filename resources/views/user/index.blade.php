@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">User</h1>
        <div class="card mb-4">
            <div class="card-body">
                <div class="pb-3">
                    <a href="{{ route('user.create') }}" class="btn text-white btn-md" style="background-color: #742317;">Create New</a>        
                </div> 
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">#</th>                                                    
                            <th scope="col">Role</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>      
                        @foreach($users as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>                                                        
                            <td>{{ $data->role->name }}</td>   
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>                                
                                <form onsubmit="return confirm('Are you sure? ');" action="{{ route('user.destroy', $data->id) }}" method="POST">
                                    <a href="{{ route('user.edit', $data->id) }}" class="btn btn-sm btn-warning">
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