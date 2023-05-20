<?php
    require_once 'koneksi.php';

    $id = $_GET['id'];

    $query = "DELETE FROM users WHERE id='$id';";

    if (mysqli_query($conn, $query)) {
        echo "<script>
                alert('Data berhasil dihapus')
            </script>";
        header ("refresh:0;data_pengguna.php");
    } else {
        echo 'Error: ' . mysqli_error($conn);
    }
?>