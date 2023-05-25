@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Category</h1>

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
                        @foreach($data as $category)
                        <tr>                            
                            <td>{{ $loop->iteration }}</td>                            
                            <td>{{ $category['name'] }}</td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">Detail</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection