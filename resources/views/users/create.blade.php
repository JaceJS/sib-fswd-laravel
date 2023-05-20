<?php            
    // // memulai session
    // session_start();

    // // mengecek session
    // if(!isset($_SESSION['login'])){
    //     header ("refresh:0;login.php");
    //     exit();
    // }

    // require_once 'koneksi.php';

    // function insert_into_users($conn){                
    //     // Ambil data dari form
    //     $name = $_POST['name'];
    //     $email = $_POST['email'];
    //     $role = $_POST['role'];
    //     $phone = $_POST['phone'];
    //     $address = $_POST['address'];
    //     $password = $_POST['password'];
        
    //     $avatar = upload_avatar();
    //     if(!$avatar){
    //         return false;
    //     }

    //     // Query untuk menampilkan data
    //     $query = "INSERT INTO users (name, email, role, avatar, phone, address, password, created_at, updated_at)
    //             VALUES ('$name', '$email', '$role', '$avatar', '$phone', '$address', '$password', CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP());";
        
    //     // Eksekusi query
    //     if (mysqli_query($conn, $query)) {
    //         echo "<script>
    //                 alert('Data berhasil ditambahkan')
    //             </script>";
    //         header ("refresh:0;data_pengguna.php");
    //     } else {
    //         echo 'Error: ' . mysqli_error($conn);
    //     }
    // }
    
    // function upload_avatar(){
    //     $namaFile = $_FILES['avatar']['name'];
    //     $ukuranFile = $_FILES['avatar']['size'];
    //     $error = $_FILES['avatar']['error'];
    //     $tmpName = $_FILES['avatar']['tmp_name'];

    //     if ($error == 4) {
    //         echo "<script>
    //                 alert('Tidak ada gambar yang diupload');
    //             </script>";
    //         return false;
    //     }

    //     // mengecek ekstensi file
    //     $ekstensiValid = ['jpg', 'jpeg', 'png'];
    //     $ekstensiGambar = explode('.', $namaFile);
    //     $ekstensiGambar = strtolower(end($ekstensiGambar));
    //     if(!in_array($ekstensiGambar, $ekstensiValid)){
    //         echo "<script>
    //                 alert('Ekstensi yang diterima (jpg, jpeg, png)');
    //             </script>";
    //         return false;
    //     }

    //     //cek ukuran file, harus kurang dari 1000000 byte (1 mb)
    //     if($ukuranFile > 1000000){
    //         echo "<script>
    //                 alert('Ukuran gambar terlalu besar');
    //             </script>";
    //         return false;
    //     }

    //     // generate nama baru buat file
    //     $namaFileBaru = uniqid();
    //     $namaFileBaru .= '.';
    //     $namaFileBaru .= $ekstensiGambar;

    //     // direktori upload gambar
    //     move_uploaded_file($tmpName, 'assets/img/'.$namaFile);

    //     return $namaFile;
    // }

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     insert_into_users($conn);                
    // }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tambah Pengguna</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
        <h2>Tambah Pengguna</h2>
        <div class="container-fluid">
            <form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                <div class="col-md-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <div class="valid-feedback">
                        Bagus.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" name="role" required>
                        <option selected disabled value="">Choose</option>
                        <option value="Admin">Admin</option>
                        <option value="Staff">Staff</option>
                    </select>
                    <div class="invalid-feedback">
                        Pilih Role.
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" aria-labelledby="passwordHelpBlock" placeholder="Password" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Name@example.com" required>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Telp</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="col-md-12">
                    <label for="address" class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
                <div class="col-md-12">
                    <label for="formFile" class="form-label">Unggah foto</label>
                    <input class="form-control" type="file" id="formFile" name="avatar" required>
                </div>
                <div class="col-12 mt-4 d-flex justify-content-between">
                    <input class="btn btn-primary" type="submit" value="Simpan"></input>
                    <a href="index" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
            })()    
        </script>
    </body>
</html>