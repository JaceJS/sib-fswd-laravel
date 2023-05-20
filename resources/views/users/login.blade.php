<?php
    //   // memulai session
    //   session_start();

    //   // mengecek session
    //   if(isset($_SESSION['login'])){
    //     header ("refresh:0;index");
    //     exit();
    //   }

    // //   require_once 'koneksi.php';

    //   if(isset($_POST['masuk'])){
    //     // mengambil nilai email dan password yang diisi
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];

    //     $query = "SELECT * FROM users WHERE email = '$email';";
    //     $result = mysqli_query($conn, $query);
    //     // mengecek email
    //     if(mysqli_num_rows($result) === 1) {
    //       $row = mysqli_fetch_assoc($result);
    //       // mengecek password
    //       if($password == $row['password']){
    //         $_SESSION['login'] = true;
    //         header ("refresh:0;index");
    //         exit();
    //       } else {
    //         echo "<script>
    //                     alert('Password salah')
    //               </script>";
    //       }
    //     } else {
    //       echo "<script>
    //                     alert('Email tidak valid')
    //             </script>";
    //     }
    //   }
?>

<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
        <h3 style="text-align: center;">Login</h3>
            <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Name@example.com" required>        
                </div>
                <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="inputPassword" name="password" class="form-control" aria-labelledby="passwordHelpBlock" placeholder="Password" required>
                </div>
                <a href="index" class="btn btn-primary mt-3" type="submit" value="Masuk" name="masuk">Masuk</a>
            </form>
            </div>
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>