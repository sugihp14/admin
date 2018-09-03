<?php
	$id_car = $_GET['id_car'];

	$koneksi->query("delete from car where id_car = '$id_car'");


?>
<script type="text/javascript">
	window.location.href="?page=barang";
</script>
