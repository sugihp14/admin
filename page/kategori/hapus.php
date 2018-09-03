<?php
	$id_paket = $_GET['id_paket'];

	$koneksi->query("delete from tbl_paket where id_paket = '$id_paket'");


?>
<script type="text/javascript">
	window.location.href="?page=kategori";
</script>
