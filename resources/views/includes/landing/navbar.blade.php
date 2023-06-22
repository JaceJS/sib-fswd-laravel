<nav class="navbar sticky-top navbar-expand-lg shadow-sm bg-body-tertiary" style="background-color: #fff3e8;">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('landing') }}">
            <img src="{{ asset('storage/logo.png') }}" alt="Logo" style="max-width: 120px">
        </a> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('landing') }}">Home</a>
                </li>                        
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('show', $category->id) }}">{{ $category->name }}</a></li>                                    
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login.index') }}" class="btn login-btn text-white ms-2" style="background-color: #742317;">
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        @if(Auth::user())
                            Dashboard
                        @else 
                            Login                                         
                        @endif
                    </a>
                </li>
            </ul>                    
        </div>
    </div>
</nav>