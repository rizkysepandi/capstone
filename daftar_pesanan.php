<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Daftar Pesanan</title>
</head>
<body>

	<div class="container-fluid position-relative p-0 bg-warna">
		<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
			<a href="index.php" class="navbar-brand p-0">
				<h3 class="text-primary m-0"><i class="fa fa-map-marked-alt me-3"></i>Beranda</h3>
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#">
				<span class="fa fa-bars"></span>
			</button>
		</nav>	
	</div>

	<div class="container-fluid mt-4">
	<h2>Daftar Pesanan Pelanggan</h2>      
		<div class="table-responsive">        
			<table class="table table-bordered table-hover table-striped">
				<thead class="table-dark">
					<tr>
						<th>Nama Pemesan</th>
						<th>Nomor Hp</th>
						<th>Tanggal Mulai Wisata</th>
						<th>Durasi Wisata</th>
						<th>Layanan Penginapan</th>
						<th>Layanan Transportasi</th>
						<th>Layanan Makanan</th>
						<th>Jumlah Peserta</th>
						<th>Harga Paket</th>
						<th>Jumlah Tagihan</th>
					</tr>
				</thead>
				<tbody>
					<tr class="center">
						<?php 
							include 'koneksi.php';
							$pesanan = mysqli_query($koneksi, "SELECT * from pesanan");
							foreach ($pesanan as $row) {
								echo "<tr>
									<td>".$row['nama_pemesan']."</td>
									<td>".$row['nomor_hp']."</td>
									<td>".$row['tanggal_mulai_wisata']."</td>
									<td>".$row['durasi_wisata']."</td>
									<td class='layanan_penginapan'>".$row['layanan_penginapan']."</td>
									<td class='layanan_transportasi'>".$row['layanan_transportasi']."</td>
									<td class='layanan_makanan'>".$row['layanan_makanan']."</td>
									<td>".$row['jumlah_peserta']."</td>
									<td class='harga_paket'>".$row['harga_paket']."</td>
									<td class='jumlah_tagihan'>".$row['jumlah_tagihan']."</td>
								</tr>";
							}
						?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

<script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		// Mengubah value layanan dari 1/0 menjadi Ya/Tidak
		$('.layanan_penginapan, .layanan_transportasi, .layanan_makanan').each(function() {
			if ($(this).text() > '1') {
				$(this).text('Y');
			} else if ($(this).text() == '0') {
				$(this).text('T');
			}
		});

		// Fungsi untuk format IDR
        function formatIDR(value) {
            var numberValue = parseFloat(value.replace(/[\.\,]/g, ''));
            if (isNaN(numberValue)) {
                return 'Rp 0';
            }
            var formattedValue;
            if (numberValue >= 0.00) {
                formattedValue = (numberValue * 10000).toLocaleString('id-ID', {
                    minimumFractionDigits: 2,maximumFractionDigits: 2
                });
            } 
            else {
                formattedValue = numberValue.toLocaleString('id-ID', {
                    minimumFractionDigits: 2, maximumFractionDigits: 2
                });
            }

            return 'Rp' + formattedValue;
        }

        // Format harga paket dan jumlah tagihan ke IDR
        $('.harga_paket, .jumlah_tagihan').each(function() {
            var text = $(this).text().trim().replace(/\\/g, ''); // Remove backslashes
            $(this).text(formatIDR(text));
        });

	});
</script>

</body>
</html>