@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">Product</h1>

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
                            <th>Rating</th>                            
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>                            
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->sale_price }}</td>
                            <td>{{ $product->brands }}</td>  
                            <td>{{ $product->rating }}</td>  
                            <td>
                                <form onsubmit="return confirm('Are you sure? ');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    
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
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-md">Tambah Data</a>        
                </div> 
            </div>
        </div>
    </div>
@endsection