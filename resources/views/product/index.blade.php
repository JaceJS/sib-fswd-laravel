@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">Product</h1>

        <div class="card mb-4">
            <div class="card-body">
                <div class="pb-3">
                    <a href="{{ route('product.create') }}" class="btn btn-primary btn-md">Tambah Data</a>        
                </div> 
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr class="table-dark">
                            <th>#</th>
                            <th>Categories</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Image</th>
                            <th>Status</th>                            
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>                            
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>Rp. {{ number_format($product->price, 0, 2) }}</td>
                            <td>Rp. {{ number_format($product->sale_price, 0, 2) }}</td>
                            <td>
                                @if ($product->image == null)
                                    <small><em>No Image</em></span>
                                @else
                                    <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 50px">
                                @endif
                            </td>  
                            <td>{{ $product->rating }}</td>  
                            <td>
                                <form onsubmit="return confirm('Are you sure? ');" action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>                                  
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