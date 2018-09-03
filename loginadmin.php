<?php
session_start();
//skrip Koneksi
$koneksi = new mysqli("localhost","root","","db_hazel");


// Check if user is logged in using the session variable
if (isset($_SESSION['admin'])) {
header("location:index.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>ORANGE RENT CAR</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="assets/css/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<!-- SWEETALERT-->
	<link href="assets/css/sweetalert.css" rel="stylesheet" type="text/css" >
</head>
<body>
</div>
<div class="image" style="background-image: url('assets/logo1.jpg'); width: 100%; height: 100%;">
<div class="container">
	<div class="row text-center ">
		<div class="col-md-12">
			<br /><br />

			<br />
		</div>
	</div>
	<div class="row ">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1" style="margin-top: 70px;">
			<div class="panel panel-default">
				<div class="panel-heading">
					<img src="img/logo1.jpg" class="img-responsive" width="100%" height="20%" align="center"/>
					<strong> <center>  Enter Details to Login </center></strong>
				</div>
				<div class="panel-body">
					<form role="form" method="post">
						<br />
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
							<input type="text" class="form-control" name="username" placeholder="Username" id="user" />
						</div>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
							<input type="password" class="form-control" name="pass" placeholder="Password" id="pass" />
						</div>
						<div class="form-group">
							<label class="checkbox-inline">
								<input type="checkbox" name="remember" /> Remember me
							</label>
							<span class="pull-right">
								<a href="forgotpasswordadmin.php" >Forgot password ? </a>
							</span>
						</div>

						<button class="btn btn-primary" name="login">Login</button>


					</form>
					<?php
					if (isset($_POST['login']))
					{

						$ambil = $koneksi->query("SELECT * FROM tbl_admin WHERE username='$_POST[username]' AND password = '$_POST[pass]'");
						if (isset($_POST['remember'])) {
							setcookie('username', $_POST['username'], time()+60*60*7);
							setcookie('password', $_POST['pass'], time()+60*60*7);
						}
						$yangcocok = $ambil->num_rows;
						if ($yangcocok==1) {
							$_SESSION['admin']=$ambil->fetch_assoc();

							?>
							<body onload='swal({title: "Login Sukses!",
								timer: 50000,
								type: "success",
								showConfirmButton: false });'>
							<?php
							echo "<meta http-equiv='refresh' content='1;url=index.php'>";
						}
						else
						{
							?>
							<body onload='swal({title: "Login Gagal!",
								text: "Silakan coba lagi",
								timer: 3000,
								type: "error",
								showConfirmButton: false });'>
							<?php
							echo "<meta http-equiv='refresh' content='1;url=loginadmin.php'>";
						}
					}
					?>
					<?php
					if (isset($_COOKIE['username']) and isset($_COOKIE['password'])) {
						$username = $_COOKIE['username'];
						$password = $_COOKIE['password'];
						echo "<script>
						document.getElementById('user').value = '$username';
						document.getElementById('pass').value = '$password';
					</script>";
				}
				?>
			</div>

		</div>
	</div>


</div>
</div>


<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
<!-- SWEET ALERT -->
<script src="assets/js/sweetalert.min.js"></script>

</body>
</html>
