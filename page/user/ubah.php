<?php
$nik = $_GET['nik'];

$sql = $koneksi->query("select * from user where nik='$nik'");

$tampil = $sql->fetch_assoc();

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Dirgantara Indonesia</title>
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
			if (form.nama.value=="") {
				form.nama.focus();
				swal("", "Nama Lengkap Tidak Boleh Kosong!");
				return(false);
			}if (form.jabatan.value=="") {
				form.jabatan.focus();
				swal("", "Jabatan Tidak Boleh Kosong");
				return(false);
			}if (form.email.value=="") {
				form.email.focus();
				swal("", "E-mail Tidak Boleh Kosong");
				return(false);
			}if (form.telephon.value=="") {
				form.telephon.focus();
				swal("", "Telphon Number Tidak Boleh Kosong");
				return(false);
			}if (form.username.value=="") {
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
					<form method="POST" onsubmit="return validasi(this)" enctype="multipart/form-data">
						<div class="form-group">
							<label>NIK</label>
							<input class="form-control" name="nik" id="nik" value="<?php echo $tampil['nik']; ?>" disabled />
						</div>

						<div class="form-group">
							<label>Nama Lengkap</label>
							<input class="form-control" name="nama" id="nama" value="<?php echo $tampil['nama_lengkap']; ?>" />
						</div>

						<div class="form-group">
							<label>Jabatan</label>
							<input class="form-control" name="jabatan" id="jabatan" value="<?php echo $tampil['jabatan']; ?>" />
						</div>

						<div class="form-group">
							<label>E-mail</label>
							<input class="form-control" name="email" id="email" value="<?php echo $tampil['email']; ?>" />
						</div>

						<div class="form-group">
							<label>Telephon</label>
							<input class="form-control" name="telephon" id="telephon" value="<?php echo $tampil['telephon']; ?>" />
						</div>

						<div class="form-group">
							<img src="./foto/<?php echo $tampil['foto_user']; ?>" class="user-image">
						</div>

						<div class="form-group">
							<label>Ganti Foto</label>
							<input class="form-control" name="foto" type="file" />
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

			$koneksi->query("UPDATE user SET nama_lengkap='$_POST[nama]', jabatan='$_POST[jabatan]', email='$_POST[email]', telephon='$_POST[telephon]', foto_user='$namafoto', username='$_POST[username]', password='$_POST[password]' WHERE nik='$_GET[nik]'");
			
		}else
		{
			$koneksi->query("UPDATE user SET nama_lengkap='$_POST[nama]', jabatan='$_POST[jabatan]', email='$_POST[email]', telephon='$_POST[telephon]', username='$_POST[username]', password='$_POST[password]' WHERE nik='$_GET[nik]'");
		}
		$_SESSION['ubah'] = '';
		echo "<meta http-equiv='refresh' content='1;url=./index.php'>";
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
