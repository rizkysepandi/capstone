<?php 

// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_umkm_pariwisata";
// Perintah php untuk akses database
$koneksi = mysqli_connect($host, $username, $password, $database);
if( !$koneksi ){ //jika tidak terhubung ke database akan mencetak error
die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

 ?>