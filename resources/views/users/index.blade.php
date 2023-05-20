<?php
    // // memulai session
    // session_start();

    // // mengecek session
    // if(!isset($_SESSION['login'])){
    //     header ("refresh:0;login");
    //     exit();
    // }

    // require_once 'koneksi.php';

    // // Query untuk menampilkan data
    // $query = "SELECT id, avatar, name, email, phone, role
    //             FROM users;";
    
    // // Eksekusi query
    // $result = mysqli_query($conn, $query);  
?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Data Pengguna</span>
            <span>
                <a href="logout" class="btn btn-danger btn-md" name="logout">Logout</a>
            </span>            
        </div>
        
    </nav>    
    <div class="container-fluid">
    <table class="table">
        <thead>
            <tr class="table-primary">
            <th scope="col">#</th>
            <th scope="col">Aksi</th>
            <th scope="col">Avatar</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>      
            <?php 
                // $i = 1;
                // // Mengambil nilai dari variabel result
                // while ($row = mysqli_fetch_assoc($result)) :
            ?>
            <tr>
                <th scope="row">
                    
                </th>
                <td>
                    <button type="button" class="btn btn-info btn-sm">Detail</button>
                    <a href="edit_pengguna" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete" class="btn btn-danger btn-sm">Hapus</a>
                </td>
                <td><img src="assets/img/" alt="avatar" width="50" height="30"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>            
            </tr>            
            <?php 
                // $i++;
                // endwhile; 
            ?>
        </tbody>
    </table>
    </div>
    
    <div class="container mt-5 text-center">
        <a href="create" class="btn btn-primary btn-lg">Tambah Data</a>        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>