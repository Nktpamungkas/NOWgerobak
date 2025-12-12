<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$modal_id = $_GET['id'];
$dt = explode(",",$modal_id);



?>
<div class="modal-dialog modal-xl">
	<div class="modal-content">
		<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action=""
			enctype="multipart/form-data">
			<div class="modal-header">
				<h5 class="modal-title">Detail No Gerobak ( Prod. Order : <?php echo $dt[0]; ?> ) (No Step : <?php echo $dt[3]; ?>)</h5>				
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table id="lookup1" class="table table-sm table-bordered table-hover table-striped" width="100%"
					style="font-size: 14px;">
					<thead>
						<tr>
							<th>#</th>
							<th>
								<div align="center">No Gerobak</div>
							</th>
							<th><div align="center">Proses</div></th>
							<th><div align="center">Ket</div></th>
							<th><div align="center">Jml Rol</div></th>
							<th>
								<div align="center">Berat</div>
							</th>
							<th>
								<div align="center">Berat Kosong</div>
							</th>
							<th>
								<div align="center">Berat Kain</div>
							</th>
							<th><div align="center">Alasan</div></th>
							<th><div align="center">Catatan SPV</div></th>
							<th><div align="center">UserID</div></th>
							<th>
								<div align="center">Tgl Update</div>
							</th>
						</tr>						
					</thead>
					<tbody>
						<?php
						$no = 1;
						if($dt[0]!="" and $dt[1]!="" and $dt[2]!="" and $dt[3]!=""){
						$query = "
						SELECT * FROM kain_proses WHERE (ket='before' or ket='after') and prod_order='".$dt[0]."' and proses='".trim($dt[1])."' and ket='".trim($dt[2])."' and no_step='".trim($dt[3])."' ORDER BY no_step ASC
							";	
						}else{
						$query = "
						SELECT * FROM kain_proses WHERE (ket='before' or ket='after') and prod_order='".$dt[0]."' ORDER BY no_step ASC
							";	
						}
						
						$sql = mysqli_query($conr,$query);
						while ($r=mysqli_fetch_array($sql)){
							$kain=$r['berat']-$r['berat_kosong'];
							echo "<tr'>
									<td align=center>$no</td>
									<td align=center>$r[no_gerobak]</td>
									<td align=center>$r[proses]</td>
									<td align=center>$r[ket]</td>
									<td align=center>$r[jml_rol]</td>
									<td align=center>$r[berat]</td>
									<td align=center>$r[berat_kosong]</td>
									<td align=center>$kain</td>
									<td align=center>$r[alasan]</td>
									<td align=center>$r[catatan_spv]</td>
									<td align=center>$r[userid]</td>
									<td align=center>$r[tgl_update]</td>
								</tr>";
							$no++;
							$tot+=$kain;
						}



						?>
					</tbody>
					<tfoot>
					<tr>
						  <th>&nbsp;</th>
						  <th>&nbsp;</th>
						  <th>&nbsp;</th>
						  <th>&nbsp;</th>
						  <th>&nbsp;</th>
						  <th>&nbsp;</th>
						  <th><div align="center">Total</div></th>
						  <th><div align="center"><?php echo $tot; ?></div></th>
						  <th>&nbsp;</th>
						  <th>&nbsp;</th>
						  <th>&nbsp;</th>
						  <th>&nbsp;</th>
						  </tr>
					</tfoot>
				</table>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>

			</div>
		</form>
	</div>
	<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->

<script>
  $(function () {
    $('#lookup1').DataTable({
      "searching": true,
      "info": true,
      "responsive": true,
	  "buttons": ["copy", "excel", "pdf"]	
    }).buttons().container().appendTo('#lookup1_wrapper .col-md-6:eq(0)');	 	 
  
  });
</script>
<script>
	$(function () {
		$('.select2sts').select2({
			placeholder: "Select a status",
			allowClear: true
		});
	});
</script>