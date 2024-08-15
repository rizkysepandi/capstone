<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery-3.7.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<title>Login Operator</title>
</head>
<body>

<div class="container mt-3">
  <h2>Login Operator</h2>
  <form action="cek_login.php" method="post">
    <div class="mb-3 mt-3">
      <label>Email:</label>
      <input type="email" class="form-control" placeholder="Enter Username" name="mail">
    </div>
    <div class="mb-3">
      <label>Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="pass">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Login</button>
    <a href="tampilancust.php" class="btn btn-danger">Back</a>
  </form>
</div>

<script type="text/javascript">
  alert("Halo selamat datang, harap hubungi admin operator! \nTerima kasih. ");
</script>

</body>
</html>