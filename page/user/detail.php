<?php
$Id_member = $_GET['Id_member'];

$sql = $koneksi->query("select * from member where Id_member='$Id_member'");

$tampil = $sql->fetch_assoc();

?>
<div class="panel panel-primary">
	<div class="panel-heading">
		Detail
	</div>
	<div class="panel-body">
		<div>
			<div class="col-md-4">
				<form>
					<table class="table table-striped table-bordered table-hover">
						<tbody>
							
							<tr>
								<th width="500px">ID Customer</th>
								<th>:</th>
								<td><?php echo $tampil['Id_member'];?></td>
							</tr>
							<tr>
								<th width="500px">Nama</th>
								<th>:</th>
								<td><?php echo $tampil['username'];?></td>
							</tr>
							<tr>
								<th width="500px">No Telp</th>
								<th>:</th>
								<td><?php echo $tampil['No_telp_member'];?></td>
							</tr>

						</tbody>
					</table>
				</form>
			</div>
			<div style="margin-left: 650px;">
			<img src="assets/img/logo.png" class="img-responsive" width="80%" />
			</div>
			</div>
		</div>
		<div class="panel-footer">
			<i><center>Rumah Musik
			</div>
		</div>
	</div>
</div>
