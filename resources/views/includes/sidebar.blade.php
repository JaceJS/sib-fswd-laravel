<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>            
            
            @if (Auth::user()->role->name == 'Admin' || Auth::user()->role->name == 'Staff')
                <div class="sb-sidenav-menu-heading">Content</div>
                <a class="nav-link" href="{{ route('slider.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                    Sliders
                </a>
            @endif

            <div class="sb-sidenav-menu-heading">Management</div>
            @if (Auth::user()->role->name == 'Admin' || Auth::user()->role->name == 'Staff')
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Products
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('brand.index') }}">Brand</a>
                        <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                        <a class="nav-link" href="{{ route('product.index') }}">Product</a>
                    </nav>
                </div>
            @endif

            @if (Auth::user()->role->name == 'Admin')
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('role.index') }}">Role</a>
                        <a class="nav-link" href="{{ route('user.index') }}">User</a>
                    </nav>
                </div>   
            @endif  
            
            @if (Auth::user()->role->name == 'Customer')
                <a class="nav-link" href="{{ route('product.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Product
                </a>
            @endif
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        @auth
            {{ auth()-> user()-> name }}
        @endauth            
    </div>
</nav>