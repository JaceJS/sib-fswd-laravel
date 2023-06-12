@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Role</h1>

        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
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
                                    <a href="{{ route('role.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>                                  
                                </form>
                            </td>       
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="container text-center">
                    <a href="{{ route('role.create') }}" class="btn btn-primary btn-md">Tambah Data</a>        
                </div> 
            </div>
        </div>
    </div>
@endsection