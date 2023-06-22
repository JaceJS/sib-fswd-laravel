@extends('layouts.landing-main')

@section('content')
<div class="min-vh-100">
    <!-- Carousels-->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($sliders as $slider)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->iteration - 1 }}" class="{{ $loop->first ? 'active' : '' }}"
                    aria-current="{{ $loop->first ? 'true' : '' }}" aria-label="Slide 1"></button>
            @endforeach
        </div>
        <div class="carousel-inner">                
            @foreach ($sliders as $slider)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="3000">
                    <img src="{{ asset('storage/slider/' . $slider->image) }}" class="d-block w-100" alt="{{ $slider->image }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5 class="text-light">{{ $slider->title }}</h5>
                        <p class="text-light">{{ $slider->caption }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Products Section-->
    <div class="container px-4 px-lg-5 mt-2">
        <form action="{{ route('landing') }}" method="GET">
            @csrf                    
            <div class="row g-3 my-5">
                <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="Min Price" name="min" value="{{ Session::get('old_min') }}">
                </div>
                <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="Max Price" name="max" value="{{ Session::get('old_max') }}">
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn text-white" style="background-color: #742317;">Search</button>
                </div>
            </div>
        </form>
        
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach ($products as $product)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ asset('storage/product/' . $product->image) }}" alt="{{ $product->image }}" />
                        <!-- Product details-->
                        <div class="card-body p-4">                                    
                            <div class="text-center">
                                <!-- Product name-->
                                <div style="text-decoration: none" class="text-dark">
                                    <small class="text-strong">{{ $product->category->name }}</small>
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                </div>
                                
                                <!-- Product price-->                                                        
                                <span>Rp.{{ number_format($product->sale_price, 0, 2) }}</span>                                                                                                                
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <a class="btn btn-outline-dark mt-auto mb-2 w-100" href="{{ route('product.show', ['id' => $product->id]) }}">
                                <i class="bi bi-info-circle me-2"></i>
                                Detail
                            </a>
                            <a href="#" class="btn btn-outline-success w-100">
                                <i class="bi bi-whatsapp me-2"></i>
                                Order Now
                            </a>                                       
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection