<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Item Detail</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    @include('includes.landing.navbar')
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                @if ($product->image)
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('storage/product/' . $product->image) }}" alt="{{$product->image}}" /></div>
                @else
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('images/default-product-detail.png') }}" alt="default-image" /></div>
                @endif
                
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through">Rp.{{ number_format($product->price, 0) }}</span>
                        <span>Rp.{{ number_format($product->sale_price, 0) }}</span>
                    </div>
                    <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum ex nesciunt ducimus hic ut rerum voluptatibus at consequatur 
                        dolores molestiae itaque reprehenderit, quaerat nemo aliquid ullam molestias enim in harum!</p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">                            
                            <a href="#" class="btn btn-success">
                                <i class="bi bi-whatsapp me-2"></i>
                                Order Now
                            </a>                              
                        </div>
                        <a href="{{ route('landing') }}" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($related as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            @if ($product->image)
                                <img class="card-img-top" src="{{ asset('storage/product/' . $product->image) }}" alt="..." />
                            @else
                                <img class="card-img-top" src="{{ asset('images/default-product.png') }}" alt="..." />
                            @endif
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    <!-- Product price-->
                                    Rp.{{ number_format($product->sale_price, 0) }}
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
    </section>
    <!-- Footer-->
    @include('includes.landing.footer')
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>