@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="my-4">Brand</h1>            

            <div class="card mb-4">
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Are you sure? ');" action="{{ route('brand.destroy', $data->id) }}" method="POST">
                                            <a href="{{ route('brand.edit', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
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
                        <a href="{{ route('brand.create') }}" class="btn btn-primary btn-md">Tambah Data</a>        
                    </div> 
                </div>
            </div>
        </div>
    </main>
@endsection