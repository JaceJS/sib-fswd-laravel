<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>

  <body>
    <div class="container vh-100 d-flex flex-column align-items-center justify-content-center">
      <div class="col-md-6">
        @if(session()->has('success'))        
            {{ session('success') }}        
        @endif

        {{-- Tampilan jika data yang dimasukkan salah --}}
        @if(session()->has('loginError'))
          <div class="alert alert-danger d-flex align-items-center mx-auto" style="max-width: 28rem" role="alert">          
              {{ session('loginError') }}          
          </div>
        @endif

        <div class="card shadow p-3 mb-5 mx-auto bg-body-tertiary rounded" style="max-width: 28rem">
          <h3 class="text-center">Login</h3>
          <div class="card-body">
            <form action='{{ route('login.auth') }}' method="POST">
              @csrf

              <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" 
                name="email" placeholder="name@example.com" autofocus value="{{ old('email') }}">
                <label for="email">Email</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
              </div>
              
              <div class="col-12 mt-3 d-flex justify-content-center">
                <input class="btn btn-primary mt-3" type="submit" value="Login" name="login"></input>
              </div>

            </form>
            <small class="d-block mt-3">Dont have an account? <a href="{{ route('register.index') }}">Register</a></small>
          </div>
        </div>        
      </div>
      
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>