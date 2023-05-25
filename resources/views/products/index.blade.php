@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Product</h1>

        <div class="card mb-4">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Categories</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Brand</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $product)
                        <tr>                            
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product['category'] }}</td>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['sale_price'] }}</td>
                            <td>{{ $product['brands'] }}</td>  
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