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
			}if (form.kodeMobil.value=="") {
				form.kodeMobil.focus();
				swal("", "Kode Mobil Tidak Boleh Kosong!");
				return(false);
			}if (form.namaMobil.value=="") {
				form.namaMobil.focus();
				swal("", "Nama Mobil Tidak Boleh Kosong");
				return(false);
			}if (form.hargaSewa.value=="") {
				form.hargaSewag.focus();
				swal("", "Harga Sewa Tidak Boleh Kosong");
				return(false);
			}if (form.foto.value=="") {
				form.foto.focus();
				swal("", "Foto Tidak Boleh Kosong");
				return(false);
			}if (form.capacity.value=="") {
				form.capacity.focus();
				swal("", "Kapasitas Tidak Boleh Kosong");
				return(false);
			}

			return(true);
		}
	</script>
	<div class="panel panel-primary">
		<div class="panel-heading">
			Tambah Data Mobil
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
							<label>Kode Mobil</label>
							<input class="form-control" name="kodeMobil" id="kodeMobil"/>
						</div>

						<div class="form-group">
							<label>Nama Mobil</label>
							<input class="form-control" name="namaMobil" id="namaMobil"/>
						</div>

						<div class="form-group">
							<label>Harga Sewa</label>
							<input class="form-control" name="hargaSewa" id="hargaSewa"/>
						</div>


						<div class="form-group">
							<label>Foto</label>
							<input type="file" class="form-control" id="foto" name="foto">
						</div>

						<div class="form-group">
							<label>Kapasitas</label>
							<input class="form-control" name="capacity" id="capacity"/>
						</div>
						<div class="form-group">
							<label>Tahun</label>
							<input class="form-control" name="year" id="year"/>
						</div>
						<div class="form-group">
							<label>Bahan Bakar</label>
							<input class="form-control" name="fuel" id="fuel"/>
						</div>
						<div class="form-group">
							<label>Tas</label>
							<input class="form-control" name="bag" id="bag"/>
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
		$type = explode('.', $_FILES['foto']['name']);
		$type = $type[count($type) - 1];
		$url = 'img/' . uniqid(rand()) . '.' . $type;
		move_uploaded_file($_FILES['foto']['tmp_name'], $url);
		  $sql = $pdo->prepare("INSERT INTO car(id_admin,id_car,name_car,price,image,capacity,years,fuel,bag)
			VALUES('$_POST[idAdmin]','$_POST[kodeMobil]','$_POST[namaMobil]','$_POST[hargaSewa]','$url','$_POST[capacity]','$_POST[year]','$_POST[fuel]','$_POST[bag]')");
    $sql->execute(); //
		$_SESSION['tambah'] = '';
echo "<meta http-equiv='refresh' content='1;url=?page=barang'>";
	}
	?>

	<?php

	if (isset($_SESSION['tambah'])) {
		?>
		<body onload='swal({title: "Sukses!",
			text: "Data User Berhasil Ditambahkan",
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
