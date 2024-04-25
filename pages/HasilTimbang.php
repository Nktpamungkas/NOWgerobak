<?php 
ini_set("error_reporting", 0);
$Gerobak 	= isset($_POST['gerobak']) ? $_POST['gerobak'] : '';
$Tgl  		= isset($_POST['tgl']) ? $_POST['tgl'] : '';
$ProdOrder	= isset($_POST['prodorder']) ? $_POST['prodorder'] : '';

?>
<!-- <center><h1 style="color: red;">MAINTENANCE PROGRAM</h1></center> -->
<form role="form" method="post" enctype="multipart/form-data" name="form1">
<div class="container-fluid">
  
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Filter Data Gerobak</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <div class="form-group row">
          <label for="tgl" class="col-sm-1 control-label">Tanggal Awal</label>
          <div class="col-sm-2">
            <div class="input-group date">
              <input name="tgl" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $Tgl; ?>" autocomplete="off" />
            </div>
          </div>
          <label for="tgl" class="col-sm-1 control-label">Tanggal Akhir</label>
          <div class="col-sm-2">
            <div class="input-group date">
              <input name="tgl2" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $_POST['tgl2']; ?>" autocomplete="off" />
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="gerobak" class="col-sm-1 control-label">No Gerobak</label>
          <div class="col-sm-3">
            <input name="gerobak" type="text" class="form-control pull-right" id="gerobak" placeholder="No Gerobak" value="<?php echo $Gerobak;  ?>" autocomplete="off" />
          </div>
          <!-- /.input group -->
        </div>
		<div class="form-group row">
          <label for="prodorder" class="col-sm-1 control-label">Prod. Order</label>
          <div class="col-sm-3">
            <input name="prodorder" type="text" class="form-control pull-right" id="prodorder" placeholder="Prod. Order" value="<?php echo $ProdOrder;  ?>" autocomplete="off" />
          </div>
          <!-- /.input group -->
        </div>  
        <button class="btn btn-info" type="submit">Cari Data</button>
      </div>
    </div>
</div>

<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Detail Data Gerobak</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  <table id="cekGerobakTable" class="table table-sm table-bordered table-striped" style="font-size: 13px; text-align: center;">
    <thead>
      <tr>
        <th valign="middle" style="text-align: center">Prod. Order</th>
        <th valign="middle" style="text-align: center">Prod. Demand</th>
        <th valign="middle" style="text-align: center">Proses</th>
        <th valign="middle" style="text-align: center">Ket.</th>
        <th valign="middle" style="text-align: center">No Gerobak</th>
        <th valign="middle" style="text-align: center">Berat </th>
        <th valign="middle" style="text-align: center">Berat Kosong</th>
        <th valign="middle" style="text-align: center">Berat Kain</th>
        <th valign="middle" style="text-align: center">Tgl Update</th>
        <th valign="middle" style="text-align: center">UserID</th>
        </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        $c = 0;
        $tgl2 = date('Y-m-d', strtotime($_POST['tgl2']));
		$Tgl =date('Y-m-d', strtotime($_POST['tgl']));
		
		if($_POST['tgl']!=""){
		$where1 = " AND tgl_update between '$Tgl' AND '$tgl2' ";	
		}else{
		$where1 = " ";	
		}
		 
		if($Gerobak!=""){
		$where2 = " AND no_gerobak='$Gerobak' ";	
		}else{
		$where2 = " ";	
		}
		
		if($ProdOrder!=""){
		$where3 = " AND prod_order='$ProdOrder' ";	
		}else{
		$where3 = " ";	
		}
		$query = " SELECT * FROM kain_proses WHERE (ket='before' or ket='after') $where1 $where2 $where3 ";
		$sql = mysqli_query($conr,$query);
		while ($r=mysqli_fetch_array($sql)){          
      ?>
      <tr>
        <td ><?php echo $r['prod_order']; ?></td>
        <td ><?php echo $r['no_demand']; ?></td>
        <td ><?php echo $r['proses']; ?></td>
        <td ><?php echo $r['ket']; ?></td>
        <td ><?php echo $r['no_gerobak']; ?></td>
        <td align="right" ><?php echo $r['berat']; ?></td>
        <td align="right" ><?php echo $r['berat_kosong']; ?></td>
        <td align="right"><?php echo number_format(round($r['berat']-$r['berat_kosong'],2),2); ?></td>
        <td ><?php echo $r['tgl_update']; ?></td>
        <td align="left"><?php echo $r['userid']; ?></td>
        </tr>
      <?php 
		$no++; } 
	  ?>
    </tbody>
  </table>
  </div>
  <!-- /.card-body -->
</div>
</form>
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