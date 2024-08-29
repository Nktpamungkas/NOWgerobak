<?php
ini_set("error_reporting", 1);
session_start();

if($_SESSION['userPRD']==""){
	echo "<script> window.location='login';</script>";
}
?>
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Posisi Gerobak</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  <table id="example1" class="table table-sm table-bordered table-striped" style="font-size: 13px; text-align: center;">
    <thead>
      <tr>
        <th valign="middle" style="text-align: center">No Gerobak</th>
        <th valign="middle" style="text-align: center">Kartu Gerobak</th>
        <th valign="middle" style="text-align: center">Posisi Terakhir</th>
        <th valign="middle" style="text-align: center">Tanggal Update</th>
        </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;

        $sql = mysqli_query($conr," SELECT 
			t1.no_gerobak, 
			t1.prod_demand,
			t1.kode_area, 
			t1.userid, 
			t1.tgl_update
		FROM 
			dbnow_gerobak.posisi_gerobak AS t1
		INNER JOIN (
			SELECT 
				no_gerobak, 
				MAX(tgl_update) AS max_update
			FROM 
				dbnow_gerobak.posisi_gerobak
			GROUP BY 
				no_gerobak
		) AS t2 
		ON 
			t1.no_gerobak = t2.no_gerobak 
			AND t1.tgl_update = t2.max_update    
		ORDER BY 
			t1.no_gerobak ");
          
        while ($row = mysqli_fetch_array($sql)) {
			
			if(substr($row['kode_area'],0,3)=="DYE"){
				$warna="badge bg-purple";
			}else if(substr($row['kode_area'],0,3)=="FIN"){
				$warna="badge bg-blue";
			}else if(substr($row['kode_area'],0,3)=="QCF"){
				$warna="badge bg-pink";
			}else if(substr($row['kode_area'],0,3)=="BRS"){
				$warna="badge bg-orange";
			}
			
			
      ?>
      <tr>
        <td style="text-align: center"><?php echo $row['no_gerobak']; ?></td>
        <td style="text-align: center"><?php echo $row['prod_demand']; ?></td>
        <td style="text-align: center"><small class="<?php echo $warna; ?>"><?php echo $row['kode_area']; ?></small></td>
        <td style="text-align: center"><?php echo $row['tgl_update']; ?></td>
        </tr>
      <?php $no++; } ?>
    </tbody>
  </table>
  </div>
  <!-- /.card-body -->
</div>
</div><!-- /.container-fluid -->
<!-- /.content -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(function() {
    //Datepicker
    $('#datepicker').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#datepicker1').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#datepicker2').datetimepicker({
      format: 'YYYY-MM-DD'
    });

  });
</script>
<script type="text/javascript">
  function checkAll(form1) {
    for (var i = 0; i < document.forms['form1'].elements.length; i++) {
      var e = document.forms['form1'].elements[i];
      if ((e.name != 'allbox') && (e.type == 'checkbox')) {
        e.checked = document.forms['form1'].allbox.checked;

      }
    }
  }
</script>
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>