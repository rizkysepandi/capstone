<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Form Pemesanan</title>
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

	<div class="container mt-3">
		<form method="post" action="simpan.php" id="my_form">
		    <h1>Form Pemesanan Paket Wisata</h1>
		    <div class="mb-3 mt-3">
			    <label><b>Nama Pemesan: </b></label>
			    <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama_pemesan" required>
			</div>
			<div class="mb-3">
				<label><b>Nomor Hp/Telepon: </b></label>
			    <input type="tel" class="form-control" placeholder="Masukkan Nomor Hp/Telepon" name="nomor_hp" required>
			</div>
			<div class="mb-3">
				<label><b>Tanggal Mulai Wisata: </b></label>
				<input type="date" class="form-control" id="datetime" name="tanggal_mulai_wisata">
			</div>
			<div class="mb-3">
				<label class="form-label"><b>Pilih Durasi Wisata: </b></label>
				<select class="form-select" id="durasi" name="durasi_wisata">
					<option value="0">-- Pilih Durasi Wisata --</option>
					<option value="2">Wisata 2 hari</option>
					<option value="7" selected>Wisata 7 hari  (--Anda memilih paket 7 hari--)</option>
					<option value="14">Wisata 14 hari</option>
					<option value="30">Wisata 1 bulan</option>
				</select>
			</div>
			<div class="mb-3">
				<p hidden id="result"></p>
				<p hidden><input type="text" id="total" readonly><br></p>
			</div>
			<div class="mb-3">
				<p><b>Pelayanan Paket Perjalanan</b></p>
				<input type="checkbox" class="form-check-input layanan" value="1000000" name="layanan_penginapan">
				<label class="form-check-label"> Penginapan (Rp1.000.000)</label><br>
				<input type="checkbox" class="form-check-input layanan" value="1200000" name="layanan_transportasi">
				<label class="form-check-label"> Transportasi (Rp1.200.000)</label><br>
				<input type="checkbox" class="form-check-input layanan" value="500000" name="layanan_makanan">
				<label class="form-check-label"> Servis/Makan (Rp500.000)</label><br>
		    </div>
			<div class="mb-3">
				<label><b>Harga Paket Perjalanan: </b></label>
				<input type="text" class="form-control" id="tampilsubtotal" name="harga_paket" readonly>
			</div>
			<div class="mb-3">
				<label><b>Jumlah Peserta </b></label><br>
				<input type="number" id="jumlahpeserta" value="0" min="0" step="1" name="jumlah_peserta">
			</div>
			<div class="mb-3">
		    	<button type="button" class="btn btn-primary" id="hitungtotal">Hitung</button>
		    </div>
			<div class="mb-3">
				<label><b>Jumlah Tagihan: </b></label>
				<input type="text" class="form-control" id="tampiltagihan" name="jumlah_tagihan" readonly>
			</div>

			<div class="mb-3">
			    <button type="submit" id="tombol_simpan" class="btn btn-primary" value="simpan" onclick="confirm_simpan()">Simpan</button>
			    <button type="button" id="resetbtn" class="btn btn-danger">Reset</button>
			    <a href="index.php" class="btn btn-primary">Kembali</a> 
			</div> 
		</form>
	</div>

	<script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script>

		$(document).ready(function(){

			// Mendapatkan tanggal dan waktu lokal saat ini dari desktop
            function tglwaktulocal(){
                var sekarang = new Date();
                var tahun = sekarang.getFullYear();
                var bulan = ("0" + (sekarang.getMonth() + 1)).slice(-2); // Bulan dimulai dari 0
                var hari = ("0" + sekarang.getDate()).slice(-2);
                
                // Mengembalikan dalam format yyyy-mm-dd
                return `${tahun}-${bulan}-${hari}`;
            }
            // Set tanggal dan waktu saat ini ke elemen input
            document.getElementById('datetime').value = tglwaktulocal();

            /*------------------------------------------------*/
            //Cek input berdasarkan kondisi form field untuk disabled fitur

	        var nilaiAwalSubtotal;
	        var nilaiAwalpeserta;
	        var nilaiAwaltotal;
			var tombol_submit = $('#tombol_simpan');

			function cekinput() {
		        var dropdown = $("#durasi").val();
		        var checkboxes = $(".layanan");
		        var hargapkt = $("#tampilsubtotal").val();
		        var jumlahps = $("#jumlahpeserta");
		        var tombol_hitung = $('#hitungtotal');
		        var sumtagihan = $('#tampiltagihan').val();

		        var nilaiSubtotal = $.trim(hargapkt);
		        var nilaipeserta = $.trim(jumlahps);
	            var nilai_total = $.trim(sumtagihan);

		        // Log nilai subtotal ke konsol
	            //console.log("Nilai subtotal:", nilaiSubtotal);
	            //console.log("Nilai peserta:", nilaipeserta);
	            //console.log("Nilai total:", nilai_total);

		         // Matikan tombol simpan jika nilai berubah dari nilai awal
	            if (nilaiSubtotal !== nilaiAwalSubtotal || nilaipeserta !== nilaiAwalpeserta || nilai_total !== nilaiAwaltotal){
	                tombol_submit.prop('disabled', true);
	                //console.log("Tombol simpan dimatikan.");
	            } 
	            else {
	                tombol_submit.prop('disabled', false);
	                //console.log("Tombol simpan diaktifkan.");
	            }

		        if (dropdown === "0") {
		            // Nonaktifkan semua fitur jika dropdown belum dipilih
		            checkboxes.prop('disabled', true).prop('checked', false);
		            $('#tampilsubtotal').prop('disabled', true);
		            $('#jumlahpeserta').prop('disabled', true);
		            tombol_hitung.prop('disabled', true);
		            $('#tampiltagihan').prop('disabled', true);
		        } else {
		            // Aktifkan semua fitur jika dropdown memilih nilai lain
		            checkboxes.prop('disabled', false);
		            $('#tampilsubtotal').prop('disabled', false);
		            $('#jumlahpeserta').prop('disabled', false);
		            tombol_hitung.prop('disabled', false);
		           $('#tampiltagihan').prop('disabled', true);
		        }

		    }

		    // Pasang event listener pada setiap input
		    $("#durasi, #jumlahpeserta, #tampiltagihan, .layanan").on('change input', cekinput);

			/*------------------------------------------------*/

			function hitungdropcheck() {
		        // Mengambil nilai dari dropdown
		        var droppilih = $('#durasi').val();
		        // Menampilkan pesan berbeda berdasarkan nilai yang dipilih
		        var hasil;
		        switch (droppilih) {
		            case '2':
		                hasil = 'Anda memilih angka= ' + 2;
		                break;
		            case '7':
		                hasil = 'Anda memilih angka= ' + 7;
		                break;
		            case '14':
		                hasil = 'Anda memilih angka= ' + 14;
		                break;
		            case '30':
		                hasil = 'Anda memilih angka= ' + 30;
		                break;
		            default:
		                hasil = 'Pilih angka pada dropdown!';
		        }
		        // Menampilkan hasil yang dipilih dropdown untuk dikalikan di dalam elemen <p> dengan id hidden result
		        $('#result').text(hasil);

		        // Menghitung total dari checkbox yang dipilih
		        var jumlah = 0;
		        var harga;
		        // Menggunakan querySelectorAll untuk memilih semua checkbox yang dicentang
				var centang = document.querySelectorAll('input.layanan:checked');
				centang.forEach(function(checkbox) {
				    var harga = parseInt(checkbox.value) || 0;
				    jumlah += harga;
				});
		        // Menampilkan total harga di dalam elemen dengan id total
		        document.getElementById('total').value=IDR(jumlah);

		        // Menghitung subtotal berdasarkan id durasi dan id total subtotal
		        var angka1 = parseFloat($('#durasi').val()) || 0;
		        var angka2 = parseFloat($('#total').val().replace(/\./g, '')) || 0;
		        var hasilsub = angka1 * angka2;

		        // Menampilkan subtotal di dalam elemen dengan id tampilsubtotal
		        $('#tampilsubtotal').val(IDR(hasilsub));

		        // Panggil cekinput untuk memastikan tombol simpan aktif/nonaktif
		        cekinput();
		    }

		    // Mengaktifkan event listener pada dropdown dan checkbox
		    $('#durasi, #total').on('input', hitungdropcheck);
		    document.querySelectorAll('input[type="checkbox"]').forEach(function(menu){
		        menu.addEventListener('change', hitungdropcheck);
		    });

		    $('#hitungtotal').on('click', function(){
		        tombol_submit.prop('disabled', false);
		        console.log('Tombol hitung diklik, tombol submit diaktifkan.');
		    });

		    /*------------------------------------------------*/

		    //Konversi format mata uang rupiah
		    function IDR(konversi) {
		        // Menggunakan Intl.NumberFormat untuk format IDR
		        return new Intl.NumberFormat('id-ID', {
		        	minimumFractionDigits: 2, // Jumlah minimum angka desimal
                	maximumFractionDigits: 2  // Jumlah maksimum angka desimal	
		        }).format(konversi);
		    }

			/*------------------------------------------------*/

			$('#hitungtotal').click(function (){
				var jumlah1 = parseFloat($('#tampilsubtotal').val().replace(/\./g, '')) || 0;
				var jumlah2 = parseFloat($('#jumlahpeserta').val()) || 0;
				var hasiljum = jumlah1 * jumlah2;

				$('#tampiltagihan').val(IDR(hasiljum));

			});

			// Simpan nilai awal dari #tampilsubtotal dan #jumlahpeserta saat halaman dimuat
		    nilaiAwalSubtotal = $.trim($('#tampilsubtotal').val());
		    nilaiAwalpeserta = $.trim($('#jumlahpeserta').val());
		    nilaiAwaltotal = $.trim($('#tampiltagihan').val());

			// Panggil fungsi cekinput saat halaman dimuat pertama kali
		    cekinput();

			/*------------------------------------------------*/

	    	document.getElementById('resetbtn').addEventListener('click', function(){
                var form = document.getElementById('my_form');
                var hargapkt = $("#tampilsubtotal");
                var jumlahps = $("#jumlahpeserta");
                var tombol_hitung = $('#hitungtotal');
                var sumtagihan = $('#tampiltagihan');
                var tombol_submit = $('#tombol_simpan');
                form.reset(); // Reset nilai values form

                // Disable checkbox dan uncheck
                var checkboxes = document.querySelectorAll('.layanan');
                checkboxes.forEach(function (checkbox) {
                    checkbox.disabled = true;
                    checkbox.checked = false;
                });

                // set dropdown kenilai default
                $("input[name='nama_pemesan']").val(''); //Hapus kolom nama
			    $("input[name='nomor_hp']").val(''); //Hapus kolom nomor hp
			    $("#datetime").val(''); //Hapus kolom tanggal
			    $("#durasi").val('0'); // Placeholder untuk kolom durasi
			    $("#tampilsubtotal").val(''); //Hapus kolom subtotal
			    $("input[name='jumlah_tagihan']").val(''); //Hapus kolom jumlah tagihan

                //Input jumlah peserta disabled
                jumlahps.prop('disabled', true);

                //Input harga paket disabled
                hargapkt.prop('disabled', true);

                //Tombol hitung disabled
                tombol_hitung.prop('disabled', true);

                //Input tampilan tagihan disabled
                sumtagihan.prop('disabled', true);

                //Tombol submit disabled
                tombol_submit.prop('disabled', true);
            });
            
		});

	function confirm_simpan() {
        if (confirm("Anda yakin ingin simpan?")) {
            window.location.replace("index.php"); // Contoh: redirect ke halaman logout
            alert("Data berhasil disimpan!"); // Alert setelah konfirmasi
        } 
        else {
            //Membatalkan simpan
        }
    }

	</script>

</body>
</html>
