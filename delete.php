 <?php
include 'koneksi.php';

// Menyimpan data id kedalam variabel
$id_pesanan = $_GET['id_pesanan'];

// Query untuk insert data
$query="DELETE from pesanan where id_pesanan='$id_pesanan'";
mysqli_query($koneksi, $query);

// Mengalihkan ke halaman index.php
header("location:daftar_pesanan_operator.php");
?>