<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title>Daftar Pesanan Operator</title>
</head>
<body>

<div class="container-fluid mt-3">
	<div class="mb-3 mt-3">
		<button class="btn btn-danger" onclick="confirm_logout()">Logout</button>
	</div>
	<h2>Daftar Pesanan Operator</h2>      
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
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr class="center">
						<?php 
							include 'koneksi.php';
							$pesanan = mysqli_query($koneksi, "SELECT * from pesanan");
							foreach ($pesanan as $row) {
								$url_edit = 'form-edit.php?id_pesanan=' . $row['id_pesanan'];
    							$url_delete = 'delete.php?id_pesanan=' . $row['id_pesanan'];
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
									<td>
										<button class='btn btn-primary' onclick=\"confirm_edit('$url_edit')\">Edit</button>
										<button class='btn btn-danger' onclick=\"confirm_delete('$url_delete')\">Delete</button>
									</td>
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

	function confirm_logout() {
        if (confirm("Anda yakin ingin logout?")) {
            window.location.replace("index.php"); // Contoh: redirect ke halaman logout
        } 
        else {
            //Membatalkan logout
        }
    }

    function confirm_edit(url) {
        if (confirm("Anda yakin ingin ubah?")) {
            window.location.href = url; // Redirect ke URL yang ditentukan jika konfirmasi diterima
        }
        else{
        	// Jika tidak, membatalkan edit dibatalkan
        }
    }

    function confirm_delete(url) {
        if (confirm("Anda yakin ingin delete?")) {
            alert("Data berhasil dihapus!"); // Alert muncul sebelum halaman diarahkan
        	setTimeout(function() {
            window.location.href = url; // Redirect ke URL yang ditentukan setelah delay
        }, 1000); // Delay 1 detik
        }
        else{
        // Jika tidak, membatalkan delete dibatalkan
        }
    }

</script>

</body>
</html>