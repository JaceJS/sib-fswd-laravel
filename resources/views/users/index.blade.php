@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table" id="datatablesSimple">
                    <thead>
                        <tr class="table-primary">
                        <th scope="col">#</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Role</th>
                        </tr>
                    </thead>
                    <tbody>      
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <a href="#" class="btn btn-info btn-sm">Detail</a>
                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                            <td><img src="https://placehold.co/40x40" alt="avatar"></td>
                            <td>name</td>
                            <td>name@example.com</td>
                            <td>08123</td>
                            <td>admin/staff</td>            
                        </tr>            
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection