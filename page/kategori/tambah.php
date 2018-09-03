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
	<script type="text/javascript">
		function validasi(form){
			if (form.idAdmin.value=="") {
				form.idAdmin.focus();
				swal("", "Id Admin Tidak Boleh Kosong!");
				return(false);
			}if (form.kodePaket.value=="") {
				form.kodePaket.focus();
				swal("", "Kode Paket Tidak Boleh Kosong!");
				return(false);
			}if (form.namaPaket.value=="") {
				form.namaPaket.focus();
				swal("", "Nama Paket Tidak Boleh Kosong");
				return(false);
			}if (form.hargaPaket.value=="") {
				form.hargaPaket.focus();
				swal("", "Harga Paket Tidak Boleh Kosong");
				return(false);
			}
			return(true);
		}
	</script>
	<div class="panel panel-primary">
		<div class="panel-heading">
			Tambah Data Paket
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<form method="POST" onsubmit="return validasi(this)" enctype="multipart/form-data">
						<div class="form-group">
							<label>id Admin</label>
							<input class="form-control" name="idAdmin" id="idAdmin" value="<?php echo $id_admin['id_admin']; ?>"  />
						</div>

						<div class="form-group">
							<label>Kode Paket</label>
							<input class="form-control" name="kodePaket" id="kodePaket"/>
						</div>

						<div class="form-group">
							<label>Nama Paket</label>
							<input class="form-control" name="namaPaket" id="namaPaket"/>
						</div>

						<div class="form-group">
							<label>Harga Paket</label>
							<input class="form-control" name="hargaPaket" id="hargaPaket"/>
						</div>

						<div>
							<input type="submit" name="tambah" value="Tambah" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
	include "koneksi1.php";



	if (isset($_POST['tambah']))
	{

		  $sql = $pdo->prepare("INSERT INTO tbl_paket(id_paket,name_paket,price)
			VALUES('$_POST[kodePaket]','$_POST[namaPaket]','$_POST[hargaPaket]')");
    $sql->execute(); //
		$_SESSION['tambah'] = '';
echo "<meta http-equiv='refresh' content='1;url=?page=kategori'>";
	}
	?>

	<?php

	if (isset($_SESSION['tambah'])) {
		?>
		<body onload='swal({title: "Sukses!",
			text: "Data Berhasil Ditambahkan",
			timer: 50000,
			type: "success",
			showConfirmButton: false });'>
		<?php
		unset($_SESSION['tambah']);
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
