@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">User</h1>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table" id="datatablesSimple">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">#</th>                        
                            <th scope="col">Avatar</th>
                            <th scope="col">Role</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>      
                        @foreach($users as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>                            
                            <td><img src="https://placehold.co/40x40" alt="avatar"></td>
                            <td>{{ $data->role->name }}</td>   
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>                                
                                <form onsubmit="return confirm('Are you sure? ');" action="{{ route('user.destroy', $data->id) }}" method="POST">
                                    <a href="{{ route('user.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>         
                        </tr>         
                        @endforeach   
                    </tbody>
                </table>
                <div class="container text-center">
                        <a href="{{ route('user.create') }}" class="btn btn-primary btn-md">Tambah Data</a>        
                    </div> 
            </div>
        </div>
    </div>
@endsection