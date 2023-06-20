@extends('layouts.main')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4 pb-4">Dashboard</h1>
            <div class="row" style="color: #fff3e8;">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary mb-4">
                        <div class="card-header">
                            <h3>Products</h3>
                        </div>    
                        <div class="card-body">                                                    
                            <p class="card-text fs-2">{{ $productCount }}</p>
                            <p class="card-subtitle">Total products available</p>
                        </div>                        
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning mb-4">
                        <div class="card-header">
                            <h3>Categories</h3>
                        </div>
                        <div class="card-body">                            
                            <p class="card-text fs-2">{{ $categoryCount }}</p>
                            <p class="card-subtitle">Total categories</p>
                        </div>                        
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success mb-4">
                        <div class="card-header">
                            <h3>Brands</h3>
                        </div>
                        <div class="card-body">                            
                            <p class="card-text fs-2">{{ $brandCount }}</p>
                            <p class="card-subtitle">Total brands</p>
                        </div>                        
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger mb-4">
                        <div class="card-header">
                            <h3>Sliders</h3>
                        </div>
                        <div class="card-body">                            
                            <p class="card-text fs-2">{{ $sliderCount }}</p>
                            <p class="card-subtitle">Total sliders</p>
                        </div>                        
                    </div>
                </div>
            </div>        
        </div>
    </main>
@endsection