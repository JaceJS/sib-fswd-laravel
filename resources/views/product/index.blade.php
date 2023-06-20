@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">Product</h1>

        <div class="card mb-4">
            <div class="card-body">
                @if (Auth::user()->role->name == 'Admin' || Auth::user()->role->name == 'Staff')                            
                    <div class="pb-3">
                        <a href="{{ route('product.create') }}" class="btn text-white btn-md" style="background-color: #742317;">Create New</a>        
                    </div> 
                @endif
                <table id="dataTable" class="table table-striped table-hover">
                    <thead>
                        <tr class="table-dark">
                            <th>#</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Sale Price</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>Status</th>
                            @if (Auth::user()->role->name == 'Admin' || Auth::user()->role->name == 'Staff')                            
                                <th>Product Action</th>
                            @endif
                            @if (Auth::user()->role->name == 'Admin')                                                        
                                <th>Status Action</th>
                            @endif
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
                            <td>{{ $product->brands }}</td>
                            <td>
                                @if ($product->image == null)
                                    <small><em>No Image</em></span>
                                @else
                                    <img src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 50px">
                                @endif
                            </td>  
                            <td>
                                @if ($product->approve)
                                    <small class="text-success">Approved</small>
                                @elseif($product->approve === NULL)
                                    <small class="text-warning">Pending</small>
                                @else
                                    <small class="text-danger">Rejected</small>
                                @endif
                            </td>  
                            @if (Auth::user()->role->name == 'Admin' || Auth::user()->role->name == 'Staff')
                                <td>                                
                                    <form class="text-center" onsubmit="return confirm('Are you sure? ');" action="{{ route('product.destroy', $product->id) }}" method="POST">
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>    
                                        </button>                                  
                                    </form>                                                                    
                                </td>   
                            @endif
                            @if (Auth::user()->role->name == 'Admin')     
                                <td>
                                    <div class="d-flex">
                                        <form class="me-1" onsubmit="return confirm('Approve product? ');" action="{{ route('product.approve', $product->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                                </svg>
                                            </button>
                                        </form>
                                        <form onsubmit="return confirm('Reject product? ');" action="{{ route('product.reject', $product->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>                                                   
                            @endif                       
                        </tr>
                        @endforeach
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
@endsection