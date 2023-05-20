<?php
    // memulai session
    session_start();

    // mengecek session
    if(!isset($_SESSION['login'])){
        header ("refresh:0;login");
        exit();
    } else {
        // menghapus semua variabel pada session
        session_unset();
        // menghapus semua variabel pada session dan menghapus session itu sendiri
        session_destroy();
        header ("refresh:0;login");
        exit();
    }