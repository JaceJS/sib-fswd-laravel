<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>      
      .container{        
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;        
      }

      .card{
        width: 28rem;
        max-width: 28rem;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
      <h3 class="text-center">Login</h3>
        <div class="card-body">
          <form method="POST">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
              <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
              <label for="floatingPassword">Password</label>
            <div class="col-12 mt-3 d-flex justify-content-center">
              <input class="btn btn-primary mt-3" type="submit" value="Login" name="login"></input>
            </div>
          </form>
          <small class="d-block mt-3">Dont have an account? <a href="{{ route('register.index') }}">Register</a></small>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>