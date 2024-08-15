<?php

	include "koneksi.php";
	if(isset($_POST['submit'])){
		$email =$_POST['mail'];
		$password = $_POST['pass'];

		$sql = "select * from tb_operator where email = '$email' and password = '$password'";
		$result = mysqli_query($koneksi, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		if($count == 1){
			header("Location:daftar_pesanan_operator.php");
		}
		else{
			echo '<script>
				window.location.href = "login_operator.php";
				alert("Login failed. invalid username or password !!!")
				</script>';
		}
	}

?>