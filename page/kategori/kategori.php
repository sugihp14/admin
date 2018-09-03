<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Hazel Photo House</title>
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
	</form>
	<div class="row">
		<div class="col-md-12">
			<!-- Advanced Tables -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					Data Kategori
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<a href="?page=kategori&aksi=tambah" class="btn btn-success" style="margin-bottom: 7px; "><i class="fa fa-plus"></i>Tambah Data</a>
						<table class="table table-striped table-bordered table-hover" id="dataTables-example">
							<thead>
								<tr>
									<th>No</th>
									<th>Id Paket</th>
									<th>Nama Paket</th>
									<th>Harga</th>
								  <th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$No = 1;
								$sql = $koneksi->query("select * from tbl_paket order by id_paket limit 5");
								while ($data=Mysqli_fetch_array($sql)) {
									?>
									<tr>
										<td align="center"><div style="margin-top: 20px;"><?php echo $No++;?></div></td>
										<td><div style="margin-top: 20px;"><?php echo $data['id_paket'];?></div></td>
										<td><div style="margin-top: 20px;"><?php echo $data['name_paket'];?></div></td>
										<td><div style="margin-top: 20px;"><?php echo $data['price'];?></div></td>
										<td align="center">
											<a href="?page=kategori&aksi=ubah&id_paket=<?php echo $data['id_paket']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>Ubah</a>
											<a href="?page=kategori&aksi=hapus&id_paket=<?php echo $data['id_paket']; ?>" class="btn btn-danger" id="alertHapus"><i class="fa fa-trash"></i>Hapus</a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						
						<a href="./laporan/laporan_user_pdf.php" target="blank" class="btn btn-default" style="margin-top: 8px;"><i class="fa fa-print"></i>ExportToPdf</a>

					</div>
					<div class="panel-footer">
						<i><center>Hazel Photo House
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
			<!-- BOOTBOX -->
			<script src="assets/js/bootbox.min.js"></script>
			<script>
				$(document).on("click", "#alertHapus", function(e) {
					e.preventDefault();
					var link = $(this).attr("href");
					bootbox.confirm("Anda Yakin Ingin Menghapus Data Ini ?" ,function(confirmed){
						if (confirmed) {
							window.location.href = link;
						};
					});
				});
			</script>
		</body>
		</html>
