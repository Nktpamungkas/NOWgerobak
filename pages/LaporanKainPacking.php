<?php 
// ini_set("error_reporting", 0);
$NoDemand 	= isset($_POST['nodemand']) ? $_POST['nodemand'] : '';
$ProdOrder	= isset($_POST['prodorder']) ? $_POST['prodorder'] : '';
$NoHanger	= isset($_POST['nohanger']) ? $_POST['nohanger'] : '';
$Tgl	= isset($_POST['tgl']) ? $_POST['tgl'] : '';
$Tgl2	= isset($_POST['tgl2']) ? $_POST['tgl2'] : '';


$processList = [
	"BAT2",
	"SCO1",
	"DYE1",
	"DYE2",
	"DYE3",
	"DYE4",
	"HEW1",
	"OVN1",
	"OVD",
	"PRE1",
	"SUE1",
	"SUE2",
	"SUE3",
	"SUE4",
	"RSE2",
	"RSE4",
	"RSE5",
	"TDR1",
	"CPT1",
	"FIN1",
	"SHR3",
	"SHR4",
	"FNJ1",
	"INS3",
	"PACK",
	"RLX1",
	"RDC1",
	"FNJ2",
	"CBL1",
	"OVN2",
];

sort($processList);

function convertToFloat($value) {
	// Menghapus koma dari string
	$value = str_replace(',', '', $value);
	
	// Mengonversi ke float
	return (float) $value;
}

?>
<!-- <center><h1 style="color: red;">MAINTENANCE PROGRAM</h1></center> -->
<form role="form" method="post" enctype="multipart/form-data" name="form1">
<div class="container-fluid">
  
    <div class="card card-success">
      <div class="card-header">
        <h3 class="card-title">Filter Data Gerobak Sudah Packing</h3>

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
              <input name="tgl2" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $Tgl2; ?>" autocomplete="off" />
            </div>
          </div>
        </div>  
        <div class="form-group row">
          <label for="nodemand" class="col-sm-1 control-label">No Demand</label>
          <div class="col-sm-3">
            <input name="nodemand" type="text" class="form-control pull-right" id="nodemand" placeholder="No Demand" value="<?php echo $NoDemand;  ?>" autocomplete="off" />
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
		<div class="form-group row">
          <label for="No Hanger" class="col-sm-1 control-label">No Hanger</label>
          <div class="col-sm-3">
            <input name="nohanger" type="text" class="form-control pull-right" id="nohanger" placeholder="No Hanger" value="<?php echo $NoHanger;  ?>" autocomplete="off" />
          </div>
          <!-- /.input group -->
        </div>   
        <button class="btn btn-info" type="submit">Cari Data</button>
      </div>
    </div>
</div>

<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Detail Data Gerobak Sudah Packing</h3>
	  
  </div>
  	
  <!-- /.card-header -->
  <div class="card-body">  	  
  <table id="example4" class="table table-sm table-bordered table-striped nowrap" style="font-size: 11px; text-align: center; width: 100%;">
    <thead>
      <tr>
        <th rowspan="2" valign="middle" style="text-align: center">Pelanggan</th>
        <th rowspan="2" valign="middle" style="text-align: center">Warna</th>
        <th rowspan="2" valign="middle" style="text-align: center">No Hanger</th>
        <th rowspan="2" valign="middle" style="text-align: center">Roll Bagi Kain</th>
        <th rowspan="2" valign="middle" style="text-align: center">Bagi Kain</th>
        <th rowspan="2" valign="middle" style="text-align: center">Lot</th>
        <th rowspan="2" valign="middle" style="text-align: center">Prod. Demand</th>
        <th rowspan="2" valign="middle" style="text-align: center">Prod. Order</th>

		<!-- POTONG KAIN GROUP HEAD -->
        <th colspan="<?=count($processList)?>" valign="middle" style="text-align: center">POTONG KAIN (KG)</th>

        <th rowspan="2" valign="middle" style="text-align: center">TOTAL</th>
        <th rowspan="2" valign="middle" style="text-align: center">ROLL</th>
        <th rowspan="2" valign="middle" style="text-align: center">PACKING</th>
        <th rowspan="2" valign="middle" style="text-align: center">LOSS %</th>
        <th rowspan="2" valign="middle" style="text-align: center">Original PD</th>
        <th rowspan="2" valign="middle" style="text-align: center">Ket Salinan</th>
      </tr>

	  <!-- POTONG KAIN GROUP -->
      	<tr>
		<?php foreach($processList as $process): ?>
        	<th valign="middle" style="text-align: center"><?= $process ?></th>
		<?php endforeach; ?>
		</tr>
    </thead>
    <tbody>
	<?php 
	if($NoDemand!=""){
	$where2 = " AND trim(nodemand)='$NoDemand' ";	
	}else{
	$where2 = " ";	
	}

	if($ProdOrder!=""){
	$where3 = " AND trim(nokk)='$ProdOrder' ";	
	}else{
	$where3 = " ";	
	}

	if($NoHanger!=""){
	$where4 = " AND trim(no_hanger) LIKE '%$NoHanger%' ";	
	}else{
	$where4 = " ";	
	}		
	if (strlen($jamA) == 5) {
    $start_date = $Tgl . " " . $jamA;
  } else {
    $start_date = $Tgl . " 0" . $jamA;
  }
  if (strlen($jamAr) == 5) {
    $stop_date = $Tgl2 . " " . $jamAr;
  } else {
    $stop_date = $Tgl2 . " 0" . $jamAr;
  }	
if ($jamA!="" or $jamAr!=""){ 
	$Where = " DATE_FORMAT( CONCAT(tgl_update,' ',jam_update), '%Y-%m-%d %H:%i') between '$start_date' and '$stop_date' and ";
}else if ($Tgl != "" and $Tgl2 != ""){
	$start_date = $Tgl;
	$stop_date = $Tgl2;
	$Where = " DATE_FORMAT( tgl_update , '%Y-%m-%d') between '$start_date' and '$stop_date' and ";
}else{
	$Where = " ";
}	
    if ($Tgl == "" and $Tgl2 == "" and $NoDemand =="" and $ProdOrder == "" and $NoHanger =="") {
            $qry1 = mysqli_query($conq, "SELECT DISTINCT trim(nodemand) as nodemand, trim(nokk) as nokk, trim(no_hanger) as no_hanger FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update , '%Y-%m-%d') between '1990-10-10' and '1990-10-10' and `dept`='PACKING' ORDER BY id ASC");
          } else {
            $qry1 = mysqli_query($conq, "SELECT DISTINCT trim(nodemand) as nodemand, trim(nokk) as nokk, trim(no_hanger) as no_hanger FROM tbl_lap_inspeksi WHERE $Where `dept`='PACKING' $where2 $where3 $where4 ORDER BY id ASC");
          }
          while ($row1 = mysqli_fetch_array($qry1)) { 

	$queryMutasi = "
		select
			nodemand,
			sum(jml_mutasi) as roll,
			sum(mutasi) as mutasi
		from
			tbl_lap_inspeksi
		where
			trim(nodemand) = '".trim($row1['nodemand'])."'
			and dept = 'PACKING'
		group by
			trim(nodemand)
	";

	$resultMutasi = mysqli_query($conq, $queryMutasi);
	$rowMutasi	  = mysqli_fetch_assoc($resultMutasi);

	$query = "SELECT
		pelanggan, warna, no_hanger, rol_bagi, bagi_kain, lot,
		no_step, proses, no_demand, prod_order,
		SUM(jml_rol) AS rol_tot,
		SUM(berat) AS berat_tot,
		SUM(berat_kosong) AS berat_kosong_tot,
		DATE_FORMAT(tgl_update, '%Y-%m-%d') AS tgl_timbang,
		GROUP_CONCAT(DISTINCT userid, ', ') AS user_gabung
	FROM
		kain_proses
	WHERE
		(ket = 'before' OR ket = 'after')
		and trim(no_demand)='".trim($row1['nodemand'])."'
		and trim(prod_order)='".trim($row1['nokk'])."'
		and trim(no_hanger)='".trim($row1['no_hanger'])."'
	GROUP BY
		proses, ket, prod_order, no_demand, no_step
	ORDER BY
		prod_order, no_step ASC
	";
	
	$result = mysqli_query($conr, $query);
	
	// Data berat kain
	$data = [];
	while ($rx = mysqli_fetch_assoc($result)) {
		$rx['x_berat_kain'] = number_format(round($rx['berat_tot'] - $rx['berat_kosong_tot'], 2), 2);
		$data[] = $rx;
	}
	
	// Inisialisasi array untuk hasil
	$hasil = [];
	
	// Loop untuk menghitung selisih berat
	for ($i = 0; $i < count($data) - 1; $i++) {
		$selisih = convertToFloat($data[$i]['x_berat_kain']) - convertToFloat($data[$i + 1]['x_berat_kain']);
		
		// Build the result based on proses
		$proses = $data[$i + 1]['proses'];
		if (!isset($hasil[$proses])) {
			$hasil[$proses] = [
				"no_demand" => $data[$i + 1]['no_demand'],
				"prod_order" => $data[$i + 1]['prod_order'],
				"pelanggan" => $data[$i + 1]['pelanggan'],
				"warna" => $data[$i + 1]['warna'],
				"no_hanger" => $data[$i + 1]['no_hanger'],
				"rol_bagi" => $data[$i + 1]['rol_bagi'],
				"bagi_kain" => $data[$i + 1]['bagi_kain'],
				"lot" => $data[$i + 1]['lot'],
				"selisih" => []
			];
		}
		
		$hasil[$proses]['selisih'][] = round($selisih, 2);
	}
	
	// Output hasil
	$header = ["no_demand", "prod_order", "pelanggan", "warna", "no_hanger", "rol_bagi", "bagi_kain", "lot"];
	$prosesKeys = array_keys($hasil);
	$headerProcess = [];
	foreach ($prosesKeys as $proses) {
		$header[] = $proses;
		$headerProcess[] = $proses;
	}
	
	// Prepare output row using keys
	$outputRow = [];
	$outputRow['no_demand'] = $hasil[$prosesKeys[0]]['no_demand'];
	$outputRow['prod_order'] = $hasil[$prosesKeys[0]]['prod_order'];
	$outputRow['pelanggan'] = $hasil[$prosesKeys[0]]['pelanggan'];
	$outputRow['warna'] = $hasil[$prosesKeys[0]]['warna'];
	$outputRow['no_hanger'] = $hasil[$prosesKeys[0]]['no_hanger'];
	$outputRow['rol_bagi'] = $hasil[$prosesKeys[0]]['rol_bagi'];
	$outputRow['bagi_kain'] = $hasil[$prosesKeys[0]]['bagi_kain'];
	$outputRow['lot'] = $hasil[$prosesKeys[0]]['lot'];
	
	// Create an array for the selisih values
	foreach ($prosesKeys as $proses) {
		// Join selisih values for the same process
		// $selisihList = implode(',', $hasil[$proses]['selisih']);
		// $outputRow[$proses] = $selisihList;

		// Jumlahkan nilai selisih untuk proses yang sama
		$selisihSum = array_sum($hasil[$proses]['selisih']);
		$outputRow[$proses] = $selisihSum;
	}

	// baris terakhir untuk langkah terakhir
	$lastRow 	 = $data[count($data) - 1];
	$selisihPack = convertToFloat($lastRow['x_berat_kain']) - convertToFloat($rowMutasi['mutasi']);  
	$outputRow['PACK'] = round($selisihPack, 2);
	
	$header[] = "PACK";
	$headerProcess[] = "PACK";
			  
			  
			  
$sqlto = " SELECT 
COUNT(e.ELEMENTCODE) AS TOTAL_ROLL,
SUM(e.WEIGHTGROSS) AS TOTAL_KG,
SUM(e.LENGTHGROSS) AS TOTAL_YARD
FROM (SELECT
    PRODUCTIONORDERCODE,
    PRODUCTIONDEMANDCODE
FROM
    PRODUCTIONDEMANDSTEP
GROUP BY
    PRODUCTIONORDERCODE,
    PRODUCTIONDEMANDCODE) a 
LEFT OUTER JOIN ELEMENTSINSPECTION e ON a.PRODUCTIONDEMANDCODE =e.DEMANDCODE AND e.INSPECTIONSTATION='Inspect Pa'
WHERE a.PRODUCTIONORDERCODE ='".trim($outputRow['prod_order'])."'";			
$stmt2 = db2_exec($conn1, $sqlto, array('cursor' => DB2_SCROLLABLE));
$rowto = db2_fetch_assoc($stmt2);

$sqlto1 = " SELECT
	p.CODE,
	a.VALUESTRING AS ORIGINALPDCODE,
	a2.VALUESTRING AS SALINAN_GANTIKAIN,
	u.LONGDESCRIPTION
FROM
	PRODUCTIONDEMAND p
LEFT OUTER JOIN ADSTORAGE a ON
	a.UNIQUEID = p.ABSUNIQUEID
	AND a.FIELDNAME = 'OriginalPDCode'
LEFT OUTER JOIN ADSTORAGE a2 ON
	a2.UNIQUEID = p.ABSUNIQUEID
	AND a2.FIELDNAME = 'DefectTypeCode'
LEFT OUTER JOIN USERGENERICGROUP u ON
	u.CODE = a2.VALUESTRING
WHERE
	p.CODE = '".trim($outputRow['no_demand'])."'";			
$stmt2S = db2_exec($conn1, $sqlto1, array('cursor' => DB2_SCROLLABLE));
$rowto1 = db2_fetch_assoc($stmt2S);

$sqlDB21  = " SELECT DISTINCT 
			x.INITIALUSERPRIMARYQUANTITY AS KG_BAGIKAIN 
			FROM DB2ADMIN.ITXVIEW_RESERVATION x 
		WHERE x.PRODUCTIONORDERCODE='".trim($outputRow['prod_order'])."'";
$stmt1   = db2_exec($conn1, $sqlDB21, array('cursor' => DB2_SCROLLABLE));	
$rowdb21 = db2_fetch_assoc($stmt1);

			  
$sqlDB21S  = " SELECT 
					x.USEDUSERPRIMARYQUANTITY AS KG_BAGIKAIN,
					x.USERPRIMARYQUANTITY AS KG_BAGIKAIN1  FROM DB2ADMIN.PRODUCTIONRESERVATION x
				WHERE x.ORDERCODE = '".trim($outputRow['no_demand'])."' ";
$stmt1S   = db2_exec($conn1, $sqlDB21S, array('cursor' => DB2_SCROLLABLE));	
$rowdb21S = db2_fetch_assoc($stmt1S);	
// var_dump($sqlDB21S);
if($rowdb21['KG_BAGIKAIN']>0){
	$KGBAGI=$rowdb21['KG_BAGIKAIN'];
}else if($rowdb21S['KG_BAGIKAIN1']>0){
	$KGBAGI=$rowdb21S['KG_BAGIKAIN1'];
}	
if($rowMutasi['mutasi']>0 and $KGBAGI>0){
	$loss=round((round($KGBAGI,2)-$rowMutasi['mutasi'])/round($KGBAGI,2),4)*100;
}else {
	$loss="0";
}			 
			  
	?>		  
      <tr>
        <td align="left"><?php if($outputRow['pelanggan']!=""){echo $outputRow['pelanggan'];}else{echo $row1['pelanggan'];} ?></td>
        <td align="left"><?php if($outputRow['warna']!=""){echo $outputRow['warna'];}else{echo $row1['warna'];} ?></td>
        <td><?php if($outputRow['no_hanger']!=""){echo $outputRow['no_hanger'];}else{echo $row1['no_hanger'];} ?></td>
        <td><?php echo $rowdb21['ROL_BAGI']; //$outputRow['rol_bagi']; ?></td>
        <td align="right"><?php echo round($KGBAGI,2); ?></td>
        <td><?php if($outputRow['lot']!=""){echo $outputRow['lot'];}else{echo $row1['lot_lgcy'];} ?></td>
        <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?php echo $row1['nodemand']; ?>&prod_order=<?php echo trim($row1['nokk']); ?>">`<?php echo $row1['nodemand']; ?></a></td>
        <td><a href="#" class="show_detail" id="<?php echo trim($row1['nokk']).", "; ?>"><?php echo trim($row1['nokk']); ?></a></td>
        
		<?php
			foreach ($processList as $process) {
				?>
			<td align="center">
				<span class="" id="span" data-toggle="tooltip" data-html="true">
					<?php echo in_array($process, $headerProcess) ? $outputRow[$process] : 0 ?>
				</span>
			</td>
		<?php } ?>

        <td align="center"><?php if($outputRow['bagi_kain']>0 and $rowto['TOTAL_KG']>0) {echo (round($outputRow['bagi_kain'],2)-$rowto['TOTAL_KG']);}else{echo "0";} ?></td>
        <td align="center"><?php if($rowMutasi['roll']>0){echo $rowMutasi['roll'];}else{echo "0";} ?></td>
        <td align="center"><?php if($rowMutasi['mutasi']>0){echo $rowMutasi['mutasi'];}else{echo "0";} ?></td>
        <td align="center"><?php echo $loss;//if($rowMutasi['mutasi']>0){echo round((round($KGBAGI,2)-$rowMutasi['mutasi'])/round($KGBAGI,2),4)*100;}else {echo "0";} ?></td>
        <td align="left"><?php echo $rowto1['ORIGINALPDCODE']; ?></td>
        <td align="left"><?php echo $rowto1['LONGDESCRIPTION']; ?></td>
      </tr>
      <?php } ?>		
    </tbody>
  </table>
  </div>
  <!-- /.card-body -->
</div>
</form>
</div><!-- /.container-fluid -->
<!-- /.content -->
<div id="DetailShow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
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