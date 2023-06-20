@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mb-4">
                        <div class="card-body">
                            <h4>Products</h4>
                        </div>                        
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning mb-4">
                        <div class="card-body">
                            <h4>Categories</h4>
                        </div>                        
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success mb-4">
                        <div class="card-body">
                            <h4>Brands</h4>
                        </div>                        
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger mb-4">
                        <div class="card-body">
                            <h4>Sliders</h4>
                        </div>                        
                    </div>
                </div>
            </div>        
        </div>
    </main>
@endsection