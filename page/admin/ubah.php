<?php
$id_admin = $_GET['id_admin'];

$sql = $koneksi->query("select * from admin where id_admin='$id_admin'");

$tampil = $sql->fetch_assoc();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Rumah Musik</title>
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
	<script type="text/javascript">
		function validasi(form){
			if (form.username.value=="") {
				form.username.focus();
				swal("", "Username Tidak Boleh Kosong");
				return(false);
			}if (form.pass.value=="") {
				form.pass.focus();
				swal("", "Password Tidak Boleh Kosong");
				return(false);
			}
			return(true);
		}
	</script>
	<div class="panel panel-primary">
		<div class="panel-heading">
			Ubah Data
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<form method="POST" onSubmit="return validasi(this)" enctype="multipart/form-data">
						<div class="form-group">
							<label>Id Admin</label>
							<input class="form-control" name="id_admin" id="id_admin" value="<?php echo $tampil['id_admin']; ?>" disabled />
						</div>

						<div class="form-group">
							<label>Username</label>
							<input class="form-control" name="username" id="username" value="<?php echo $tampil['username']; ?>"/>
						</div>

						<div class="form-group">
							<label>Password</label>
							<input class="form-control" type="password" name="password" id="pass" value="<?php echo $tampil['password']; ?>"/>
						</div>

						<div>
							<input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
	if (isset($_POST['ubah']))
	{
		$namafoto=$_FILES['foto']['name'];
		$lokasifoto = $_FILES['foto']['tmp_name'];
	//jika foto diubah
		if (!empty($lokasifoto))
		{
			move_uploaded_file($lokasifoto, "./foto/$namafoto");

			$koneksi->query("UPDATE admin SET username='$_POST[username]', password='$_POST[password]' WHERE id_admin='$_GET[id_admin]'");
			
		}else
		{
			$koneksi->query("UPDATE admin SET username='$_POST[username]', password='$_POST[password]' WHERE id_admin='$_GET[id_admin]'");
		}
		$_SESSION['ubah'] = '';
		echo "<meta http-equiv='refresh' content='1;url=./indexadmin.php'>";
	}
	?>

	<?php
	if (isset($_SESSION['ubah'])) {
		?>
		<body onload='swal({title: "Sukses!",
			text: "Data Berhasil Diubah",
			timer: 50000,
			type: "success",
			showConfirmButton: false });'>
		<?php
		unset($_SESSION['ubah']);
	}
	?>


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
