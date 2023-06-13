<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>JaceInstrumental</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset("favicon.ico") }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset("css/landing.css") }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">
                    <img src="{{ asset('storage/logo.png') }}" alt="Logo" style="max-width: 100px">                    
                </a> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item" href="#!">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <a href="#" class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </a>
                        <a href="{{ route('login.index') }}" class="btn btn-outline-dark ms-2" type="submit">
                            <i class="bi-person-fill me-1"></i>
                            Dashboard                            
                        </a>
                    </form>
                </div>
            </div>
        </nav>
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
                            <h5 class="text-dark">{{ $slider->title }}</h5>
                            <p class="text-dark">{{ $slider->caption }}</p>
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
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
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
                                        <h5 class="fw-bolder">{{ $product->name }}</h5>

                                        <!-- Product price-->
                                        Rp. {{ number_format($product->price, 0, 2) }}
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; JaceInstrumental 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
