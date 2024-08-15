-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2024 pada 16.28
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_umkm_pariwisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` bigint(20) NOT NULL,
  `nama_pemesan` varchar(125) NOT NULL,
  `nomor_hp` varchar(12) NOT NULL,
  `tanggal_mulai_wisata` date NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `durasi_wisata` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `layanan_penginapan` tinyint(1) NOT NULL,
  `layanan_transportasi` tinyint(1) NOT NULL,
  `layanan_makanan` tinyint(1) NOT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `harga_paket` decimal(10,2) NOT NULL,
  `jumlah_tagihan` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_pemesan`, `nomor_hp`, `tanggal_mulai_wisata`, `tanggal_pesanan`, `durasi_wisata`, `id_paket_wisata`, `layanan_penginapan`, `layanan_transportasi`, `layanan_makanan`, `jumlah_peserta`, `harga_paket`, `jumlah_tagihan`) VALUES
(1, 'Aceng', '081234567890', '2024-08-15', '0000-00-00 00:00:00', 2, 0, 0, 127, 0, 1, '2.40', '2.40'),
(3, 'paris', '081234567812', '2024-08-15', '0000-00-00 00:00:00', 2, 0, 127, 127, 127, 2, '5.40', '10.80');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_operator`
--

CREATE TABLE `tb_operator` (
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_operator`
--

INSERT INTO `tb_operator` (`email`, `password`) VALUES
('admin@contoh.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
