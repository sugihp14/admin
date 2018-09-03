
  <?php
 session_start();

 error_reporting(0);

include 'koneksi.php';

 if (!isset($_SESSION['admin']))
 {
  echo "<script>alert('Anda harus login');</script>";
  echo "<script>location='loginadmin.php';</script>";
  header('location:loginadmin.php');
  exit();
}
$id_admin = $_SESSION['admin'];
?>

<!DOCTYPE html>
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
  <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="indexadmin.php" style="font-size: 18px">ORANGE RENT CAR</a>
      </div>
      <div style="color: white;
      padding: 15px 50px 5px 50px;
      float: right;
      font-size: 16px;"> <?php date_default_timezone_set("Asia/Jakarta"); echo date('d F Y H:i', time()); ?> &nbsp; <a href="?page=logout" class="btn btn-danger square-btn-adjust" name="logout">Logout</a> </div>
    </nav>
    <!-- /. NAV TOP  -->


    <nav class="navbar-default navbar-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
          <li class="text-center">
            <br>
            <img src="img/logo.jpg" class="user-image img-responsive"/>
          </li>


          <li>
            <a  href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>

          <li>
            <a  href="?page=booking"><i class="glyphicon glyphicon-edit"></i>Booking </a>
          </li>


          <li>
            <a  href="?page=barang"><i class="glyphicon glyphicon-edit"></i> Data Fotografer</a>
          </li>

          <li>
            <a  href="?page=kategori"><i class="glyphicon glyphicon-edit"></i> Data Kategori</a>
           <ul id="submenu-2" class="nav panel-collapse collapse panel-switch" role="menu">
              <li >
                <a  href="?page=kategori"><i class="glyphicon glyphicon-edit"></i> Data Kategori</a>
              </li>
            </ul>

          </li>

          <li>
            <a  href="?page=Extras"><i class="glyphicon glyphicon-edit"></i> Data Extras</a>
          </li>

          <li>
            <a  href="?page=Package"><i class="glyphicon glyphicon-edit"></i> Data Package</a>
          </li>



          <li>
            <a  href="?page=user"><i class="glyphicon glyphicon-user"></i> Data Customer</a>
          </li>

          <li>
            <a  href="?page=payment"><i class="glyphicon glyphicon-edit"></i> Data Pembayaran</a>
          </li>

        </ul>
      </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
      <div id="page-inner">
        <div class="row">
          <div class="col-md-12">

           <?php

           $page = $_GET['page'];
           $aksi = $_GET['aksi'];
           $page1 = $_GET['assets'];

           //memanggil page barang
           if ($page == "barang") {
             if ($aksi == "") {
               include "page/barang/barang.php";
             }elseif ($aksi =="ubah") {
             include "page/barang/ubah.php";
           }elseif ($aksi == "hapus") {
             include "page/barang/hapus.php";
           }elseif ($aksi == "tambah") {
             include "page/barang/tambah.php";
         }
       }

       //memanggil page Kategori
          elseif ($page == "kategori") {
             if ($aksi == "") {
               include "page/kategori/kategori.php";
             }elseif ($aksi == "ubah") {
               include "page/kategori/ubah.php";
             }elseif ($aksi == "tambah") {
               include "page/kategori/tambah.php";
             }elseif($aksi =="hapus"){
               include 'page/kategori/hapus.php';
             }
           }


       //memanggil page user
          elseif ($page == "user") {
             if ($aksi == "") {
               include "page/user/user.php";
             }elseif ($aksi == "detail") {
               include "page/user/detail.php";
             }elseif ($aksi == "tambah") {
               include "page/user/tambah.php";
             }
           }

           //memanggil page booking
           elseif ($page == "booking") {
             if ($aksi == "") {
               include "page/booking/booking_view.php";
             }elseif ($aksi == "tambah") {
               include "page/booking/tambah.php";
             }elseif ($aksi =="hapus") {
               include "page/booking/hapus.php" ;
             }
           }

           elseif ($page == "detail_raw_material") {
             if ($aksi == "") {
               include "page/detail_raw_material/detail_raw_material.php";
             }
           }


           elseif ($page == "logout") {
             if ($aksi == "") {
               include "page/logout/logout.php";
             }
           }
           else
           {
            include "dashboardadmin.php";
          }

          ?>

        </div>
      </div>
      <!-- /. ROW  -->
      <hr />

    </div>
    <!-- /. PAGE INNER  -->
  </div>
  <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
