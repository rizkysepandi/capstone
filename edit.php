<?php

include 'koneksi.php';

// Menyimpan data kedalam variabel
$id_pesanan = $_POST['id_pesanan'];
$nama_pemesan = $_POST['nama_pemesan'];
$nomor_hp = $_POST['nomor_hp'];
$tanggal_mulai_wisata = $_POST['tanggal_mulai_wisata'];
$tanggal_pesanan = $_POST['tanggal_pesanan'];
$durasi_wisata = $_POST['durasi_wisata'];
$id_paket_wisata = $_POST['id_paket_wisata'];
$layanan_penginapan = $_POST['layanan_penginapan'];
$layanan_transportasi = $_POST['layanan_transportasi'];
$layanan_makanan = $_POST['layanan_makanan'];
$jumlah_peserta = $_POST['jumlah_peserta'];
$harga_paket = $_POST['harga_paket'];
$jumlah_tagihan = $_POST['jumlah_tagihan'];

// Query sql untuk insert data
$query="UPDATE pesanan SET nama_pemesan='$nama_pemesan', nomor_hp='$nomor_hp', tanggal_mulai_wisata='$tanggal_mulai_wisata', tanggal_pesanan='$tanggal_pesanan', durasi_wisata='$durasi_wisata', id_paket_wisata='$id_paket_wisata', layanan_penginapan='$layanan_penginapan', layanan_transportasi='$layanan_transportasi', layanan_makanan='$layanan_makanan', jumlah_peserta='$jumlah_peserta', harga_paket='$harga_paket', jumlah_tagihan='$jumlah_tagihan' where id_pesanan='$id_pesanan'";
mysqli_query($koneksi, $query);

// Mengalihkan ke halaman index.php
header("location:daftar_pesanan_operator.php");
?>