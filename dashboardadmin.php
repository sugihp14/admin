<!-- /. ROW  -->
<?php
session_start();

$koneksi = new mysqli("localhost","root","","db_rentcar");

$id_admin = $_SESSION['admin'];

?>
<!DOCTYPE html>
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
	<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
	<div>
		<a class="navbar-brand" href="" style="color: #ed6d12; font-size: 23px">Dashboard</a>
	</div>
	<div class="collapse navbar-collapse">
		<div class="nav navbar-nav navbar-right">
			<a href="?page=admin&id_admin=<?php echo $id_admin['id_admin']; ?>" style="color: #cccccc;">
				<p>
					<i class="fa fa-user" style="font-size: 18px; color: #cccccc;"></i> Hallo,
					<?php  echo $id_admin['name_admin'];  ?>
				</p>
			</a>
		</div>
	</div>
	<hr />

	<div class="row">
		<div class="col-md-4 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-green set-icon">
					<i class="fa fa-check"></i>
				</span>
				<div class="text-box" >
					<p class="main-text"><?php
						$sql = $koneksi->query("select id_car from car");
						echo mysqli_num_rows($sql). '&nbspData';
						?></p>
						<p class="text-muted">Data Barang</p>

					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 col-xs-6">
				<div class="panel panel-back noti-box">
					<span class="icon-box bg-color-brown set-icon">
						<i class="fa fa-bars"></i>
					</span>
					<div class="text-box" >
						<p class="main-text"><?php
							$sql = $koneksi->query("select id_booking from booking");
							echo mysqli_num_rows($sql). '&nbspData';
							?></p>
							<p class="text-muted">Orderan</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div class="panel panel-back noti-box">
						<span class="icon-box bg-color-red set-icon">
							<i class="fa fa-user"></i>
						</span>
						<div class="text-box" >
							<p class="main-text"><?php
								$sql = $koneksi->query("select id_user from users");
								echo mysqli_num_rows($sql). '&nbspData';
								?></p>
								<p class="text-muted">Costumer</p>
							</div>
						</div>
					</div>
				</div>



				<!-- /. ROW  -->

				<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
				<!-- JQUERY SCRIPTS -->
				<script src="assets/js/jquery-1.10.2.js"></script>
				<!-- BOOTSTRAP SCRIPTS -->
				<script src="assets/js/bootstrap.min.js"></script>
				<!-- METISMENU SCRIPTS -->
				<script src="assets/js/jquery.metisMenu.js"></script>
				<!-- DATA TABLE SCRIPTS -->
				<script src="assets/js/dataTables/jquery.dataTables.js"></script>
				<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
				<script>
					$(document).ready(function () {
						$('#dataTables-example').dataTable();
					});
				</script>
				<!-- CUSTOM SCRIPTS -->
				<script src="assets/js/custom.js"></script>
			</body>
			</html>
