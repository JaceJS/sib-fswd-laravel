@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="my-4">Category</h1>

        <div class="card mb-4">
            <div class="card-body">
                <div class="pb-3">
                    <a href="{{ route('category.create') }}" class="btn text-white btn-md" style="background-color: #742317;">Create New</a>        
                </div>  
                <table id="dataTable" class="table table-striped">
                    <thead>
                        <tr class="table-dark">
                            <th>#</th>
                            <th>Name</th>
                            <th>Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>                                    
                                <form onsubmit="return confirm('Are you sure? ');" action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">
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