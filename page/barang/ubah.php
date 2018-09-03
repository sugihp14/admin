<?php
	$idBarang = $_GET['idBarang'];

	$sql = $koneksi->query("select* from barang where idBarang = '$idBarang'");
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
			if (form.idAdmin.value=="") {
				form.idAdmin.focus();
				swal("", "Id Admin Tidak Boleh Kosong!");
				return(false);
			}if (form.kodeBarang.value=="") {
				form.kodeBarang.focus();
				swal("", "kodeBarang Tidak Boleh Kosong!");
				return(false);
			}if (form.namaBarang.value=="") {
				form.namaBarang.focus();
				swal("", "Nama Barang Tidak Boleh Kosong");
				return(false);
			}if (form.hargaBarang.value=="") {
				form.hargaBarang.focus();
				swal("", "Harga Barang Tidak Boleh Kosong");
				return(false);
			}if (form.kategoriBarang.value=="") {
				form.kategoriBarang.focus();
				swal("", "Kategori Barang Tidak Boleh Kosong");
				return(false);
			}if (form.stokBarang.value=="") {
				form.stokBarang.focus();
				swal("", "stokBarang Tidak Boleh Kosong");
				return(false);
			}

			return(true);
		}
	</script>
	<div class="panel panel-primary">
		<div class="panel-heading">
			Ubah Data Barang
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<form method="POST" onsubmit="return validasi(this)" >
						<div class="form-group">
							<label>id Admin</label>
							<input class="form-control" name="idAdmin" id="idAdmin" value="<?php echo $tampil['Id_admin']; ?>" disabled/>
						</div>

						<div class="form-group">
							<label>Kode Barang </label>
							<input class="form-control" name="kodeBarang" id="kodeBarang" value="<?php echo $tampil['idBarang']; ?>"/>
						</div>

						<div class="form-group">
							<label>Nama Barang</label>
							<input class="form-control" name="namaBarang" id="namaBarang" value="<?php echo $tampil['namaBarang']; ?>"/>
						</div>

						<div class="form-group">
							<label>Harga Barang</label>
							<input class="form-control" name="hargaBarang" id="hargaBarang" value="<?php echo $tampil['hargaBarang']; ?>"/>
						</div>

						<div class="form-group">
              <label>Kategori Barang</label>
              <select id="kategoriBarang" name="kategoriBarang" class="form-control">
                  <option value="">Kategori</option>
                <?php
                // Include / load file koneksi.php
                include "koneksi1.php";


                $sql = $pdo->prepare("SELECT * FROM kategori order by Id_kategori Asc");
                $sql->execute(); // Eksekusi querynya
                $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
                ?>
                  <option value="<?php echo $data['Id_kategori'];?>"><?php echo $data['Nm_Kategori']; ?></option>
                <?php
                  $no++; // Tambah 1 setiap kali looping
                }
                ?>
              </select>
            </div>



						<div class="form-group">
							<label>StokBarang</label>
							<input class="form-control" name="stokBarang" id="stokBarang"value="<?php echo $tampil['Stok']; ?>"/>
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

					$koneksi->query("UPDATE barang SET namaBarang='$_POST[namaBarang]',hargaBarang='$_POST[hargaBarang]',Stok='$_POST[stokBarang]' WHERE idBarang='$_POST[kodeBarang]'");

						$_SESSION['ubah'] = '';
	echo "<meta http-equiv='refresh' content='1;url=?page=barang'>";
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
