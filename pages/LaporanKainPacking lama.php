<?php 
ini_set("error_reporting", 0);
$NoDemand 	= isset($_POST['nodemand']) ? $_POST['nodemand'] : '';
$ProdOrder	= isset($_POST['prodorder']) ? $_POST['prodorder'] : '';
$NoHanger	= isset($_POST['nohanger']) ? $_POST['nohanger'] : '';
$Tgl	= isset($_POST['tgl']) ? $_POST['tgl'] : '';
$Tgl2	= isset($_POST['tgl2']) ? $_POST['tgl2'] : '';

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
  <table id="example1" class="table table-sm table-bordered table-striped" style="font-size: 11px; text-align: center;">
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
        <th colspan="21" valign="middle" style="text-align: center">POTONG KAIN (KG)</th>
        <th rowspan="2" valign="middle" style="text-align: center">TOTAL</th>
        <th rowspan="2" valign="middle" style="text-align: center">ROLL</th>
        <th rowspan="2" valign="middle" style="text-align: center">PACKING</th>
        <th rowspan="2" valign="middle" style="text-align: center">LOSS %</th>
        <th rowspan="2" valign="middle" style="text-align: center">Original PD</th>
        <th rowspan="2" valign="middle" style="text-align: center">Ket Salinan</th>
      </tr>
      <tr>
        <th valign="middle" style="text-align: center">BAT2</th>
        <th valign="middle" style="text-align: center">SCO1</th>
        <th valign="middle" style="text-align: center">DYE2</th>
        <th valign="middle" style="text-align: center">OVN1</th>
        <th valign="middle" style="text-align: center">OVD</th>
        <th valign="middle" style="text-align: center">PRE1</th>
        <th valign="middle" style="text-align: center">SUE1 </th>
        <th valign="middle" style="text-align: center">SUE2</th>
        <th valign="middle" style="text-align: center">SUE3</th>
        <th valign="middle" style="text-align: center">SUE4</th>
        <th valign="middle" style="text-align: center">RSE2</th>
        <th valign="middle" style="text-align: center">RSE4</th>
        <th valign="middle" style="text-align: center">RSE5</th>
        <th valign="middle" style="text-align: center">TDR1</th>
        <th valign="middle" style="text-align: center">CPT1</th>
        <th valign="middle" style="text-align: center">FIN1</th>
        <th valign="middle" style="text-align: center">SHR3</th>
        <th valign="middle" style="text-align: center">SHR4</th>
        <th valign="middle" style="text-align: center">FNJ1</th>
        <th valign="middle" style="text-align: center">INS3</th>
        <th valign="middle" style="text-align: center">PACK</th>
        </tr>
    </thead>
    <tbody>
	<?php 
	if($NoDemand!=""){
	$where2 = " AND nodemand='$NoDemand' ";	
	}else{
	$where2 = " ";	
	}

	if($ProdOrder!=""){
	$where3 = " AND nokk='$ProdOrder' ";	
	}else{
	$where3 = " ";	
	}

	if($NoHanger!=""){
	$where4 = " AND no_item LIKE '%$NoHanger%' ";	
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
            $qry1 = mysqli_query($conq, "SELECT DISTINCT nodemand,nokk,no_item FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update , '%Y-%m-%d') between '1990-10-10' and '1990-10-10' and `dept`='PACKING' ORDER BY id ASC");
          } else {
            $qry1 = mysqli_query($conq, "SELECT DISTINCT nodemand,nokk,no_item FROM tbl_lap_inspeksi WHERE $Where `dept`='PACKING' $where2 $where3 $where4 ORDER BY id ASC");
          }
          while ($row1 = mysqli_fetch_array($qry1)) { 
	$query = " 
		select
	kp.no_demand as demandno,
	kp.prod_order as prdorder,
	kp.pelanggan,
	kp.warna,
	kp.lot,
	kp.rol_bagi,
	kp.bagi_kain,
	kp.no_hanger,
	after1.brtkain_BAT2,
	before1.brtkain_SCO1,
	before1.brtkain_DYE2,
	before1.brtkain_OPW1,
	after1.brtkain_OVN1,
	after1.brtkain_OVD1,
	before1.brtkain_BAT1 as bBAT1,
	after1.brtkain_BAT1 as aBAT1,
	before1.brtkain_BAT2 as bBAT2,
	after1.brtkain_BAT2 as aBAT2,
	before1.brtkain_BLD2 as bBLD2,
	after1.brtkain_BLD2 as aBLD2,
	before1.brtkain_CBL1 as bCBL1,
	after1.brtkain_CBL1 as aCBL1,
	before1.brtkain_CNP1 as bCNP1,
	after1.brtkain_CNP1 as aCNP1,
	before1.brtkain_COM2 as bCOM2,
	after1.brtkain_COM2 as aCOM2,
	before1.brtkain_SCO1 as bSCO1,
	after1.brtkain_SCO1 as aSCO1,
	before1.brtkain_CPD1 as bCPD1,
	after1.brtkain_CPD1 as aCPD1,
	before1.brtkain_CPT1 as bCPT1,
	after1.brtkain_CPT1 as aCPT1,
	before1.brtkain_CUR1 as bCUR1,
	after1.brtkain_CUR1 as aCUR1,
	before1.brtkain_DYE1 as bDYE1,
	after1.brtkain_DYE1 as aDYE1,
	before1.brtkain_DYE2 as bDYE2,
	after1.brtkain_DYE2 as aDYE2,
	before1.brtkain_DYE4 as bDYE4,
	after1.brtkain_DYE4 as aDYE4,
	before1.brtkain_FEW1 as bFEW1,
	after1.brtkain_FEW1 as aFEW1,
	before1.brtkain_FIX1 as bFIX1,
	after1.brtkain_FIX1 as aFIX1,
	before1.brtkain_FNU1 as bFNU1,
	after1.brtkain_FNU1 as aFNU1,
	before1.brtkain_FNU2 as bFNU2,
	after1.brtkain_FNU2 as aFNU2,
	before1.brtkain_HEW1 as bHEW1,
	after1.brtkain_HEW1 as aHEW1,
	before1.brtkain_LVL1 as bLVL1,
	after1.brtkain_LVL1 as aLVL1,
	before1.brtkain_NCP1 as bNCP1,
	after1.brtkain_NCP1 as aNCP1,
	before1.brtkain_OPW1 as bOPW1,
	after1.brtkain_OPW1 as aOPW1,
	before1.brtkain_OVB1 as bOVB1,
	after1.brtkain_OVB1 as aOVB1,
	before1.brtkain_OVB2 as bOVB2,
	after1.brtkain_OVB2 as aOVB2,
	before1.brtkain_OVD1 as bOVD1,
	after1.brtkain_OVD1 as aOVD1,
	before1.brtkain_OVD2 as bOVD2,
	after1.brtkain_OVD2 as aOVD2,
	before1.brtkain_OVN1 as bOVN1,
	after1.brtkain_OVN1 as aOVN1,
	before1.brtkain_OVN2 as bOVN2,
	after1.brtkain_OVN2 as aOVN2,
	before1.brtkain_OVN4 as bOVN4,
	after1.brtkain_OVN4 as aOVN4,
	before1.brtkain_PAD1 as bPAD1,
	after1.brtkain_PAD1 as aPAD1,
	before1.brtkain_PAD2 as bPAD2,
	after1.brtkain_PAD2 as aPAD2,
	after1.brtkain_PRE1 as aPRE1,
	before1.brtkain_PRE1 as bPRE1,
	before1.brtkain_RDC1 as bRDC1,
	after1.brtkain_RDC1 as aRDC1,
	before1.brtkain_RLX1 as bRLX1,
	after1.brtkain_RLX1 as aRLX1,
	before1.brtkain_ROT1 as bROT1,
	after1.brtkain_ROT1 as aROT1,
	before1.brtkain_SOA1 as bSOA1,
	after1.brtkain_SOA1 as aSOA1,
	before1.brtkain_SOF1 as bSOF1,
	after1.brtkain_SOF1 as aSOF1,
	before1.brtkain_STM1 as bSTM1,
	after1.brtkain_STM1 as aSTM1,
	before1.brtkain_STR1 as bSTR1,
	after1.brtkain_STR1 as aSTR1,
	before1.brtkain_TDR1 as bTDR1,
	after1.brtkain_TDR1 as aTDR1,
	after1.brtkain_SUE1 as aSUE1,
	before1.brtkain_SUE1 as bSUE1,
	after1.brtkain_SUE2 as aSUE2,
	before1.brtkain_SUE2 as bSUE2,
	after1.brtkain_SUE3 as aSUE3,
	before1.brtkain_SUE3 as bSUE3,
	after1.brtkain_SUE4 as aSUE4,
	before1.brtkain_SUE4 as bSUE4,
	after1.brtkain_RSE2 as aRSE2,
	before1.brtkain_RSE2 as bRSE2,
	after1.brtkain_RSE4 as aRSE4,
	before1.brtkain_RSE4 as bRSE4,
	after1.brtkain_RSE5 as aRSE5,
	before1.brtkain_RSE5 as bRSE5,
	after1.brtkain_FIN1 as aFIN1,
	before1.brtkain_FIN1 as bFIN1,	
	before1.brtkain_SHR3 as bSHR3,
	after1.brtkain_SHR3 as aSHR3,
	before1.brtkain_SHR4 as bSHR4,
	after1.brtkain_SHR4 as aSHR4,
	before1.brtkain_FNJ1 as bFNJ1,
	after1.brtkain_FNJ1 as aFNJ1,
	before1.brtkain_FNJ2 as bFNJ2,
	after1.brtkain_FNJ2 as aFNJ2,
	before1.brtkain_FNJ3 as bFNJ3,
	after1.brtkain_FNJ3 as aFNJ3,
	before1.brtkain_INS2 as bINS2,
	after1.brtkain_INS2 as aINS2,
	before1.brtkain_INS3 as bINS3,
	after1.brtkain_INS3 as aINS3,
	before1.brtkain_INS7 as bINS7,
	after1.brtkain_INS7 as aINS7,
	round(after1.brtkain_BAT2-after1.brtkain_BAT2,2) as BAT2,
	if(before1.brtkain_SCO1>0,(after1.brtkain_BAT2-before1.brtkain_SCO1),0) as SCO1,
	if(before1.brtkain_DYE2>0,(after1.brtkain_BAT2-before1.brtkain_DYE2),0) as DYE2,
	if(before1.brtkain_OPW1>0,(after1.brtkain_BAT2-before1.brtkain_OPW1),0) as OPW1,
	if(after1.brtkain_OVN1>0,(before1.brtkain_SCO1-after1.brtkain_OVN1),0) as OVN1,
	if(after1.brtkain_OVD1>0,(before1.brtkain_SCO1-after1.brtkain_OVD1),0) as OVD1,	
	(before1.brtkain_PRE1-after1.brtkain_PRE1) as PRE1,
	(before1.brtkain_SUE1-after1.brtkain_SUE1) as SUE1,
	(before1.brtkain_SUE2-after1.brtkain_SUE2) as SUE2,
	(before1.brtkain_SUE3-after1.brtkain_SUE3) as SUE3,
	(before1.brtkain_SUE4-after1.brtkain_SUE4) as SUE4,	
	(before1.brtkain_RSE2-after1.brtkain_RSE2) as RSE2,
	(before1.brtkain_RSE4-after1.brtkain_RSE4) as RSE4,
	(before1.brtkain_RSE5-after1.brtkain_RSE5) as RSE5,
	(before1.brtkain_FIN1-after1.brtkain_FIN1) as FIN1,
	(before1.brtkain_SHR4-after1.brtkain_SHR4) as SHR4,
	(before1.brtkain_SHR3-after1.brtkain_SHR3) as SHR3,
	(before1.brtkain_FNJ1-after1.brtkain_FNJ1) as FNJ1,
	(before1.brtkain_INS3-after1.brtkain_INS3) as INS3
from
	kain_proses kp left join (
select
	sum(if(proses='BAT1' ,berat,0)) as berat_BAT1,
	sum(if(proses='BAT1' ,berat_kosong,0)) as berat_kosong_BAT1,
	(sum(if(proses='BAT1' ,berat,0))-sum(if(proses='BAT1' ,berat_kosong,0))) as brtkain_BAT1,
	sum(if(proses='BAT2' ,berat,0)) as berat_BAT2,
	sum(if(proses='BAT2' ,berat_kosong,0)) as berat_kosong_BAT2,
	(sum(if(proses='BAT2' ,berat,0))-sum(if(proses='BAT2' ,berat_kosong,0))) as brtkain_BAT2,
	sum(if(proses='BLD2' ,berat,0)) as berat_BLD2,
	sum(if(proses='BLD2' ,berat_kosong,0)) as berat_kosong_BLD2,
	(sum(if(proses='BLD2' ,berat,0))-sum(if(proses='BLD2' ,berat_kosong,0))) as brtkain_BLD2,
	sum(if(proses='CBL1' ,berat,0)) as berat_CBL1,
	sum(if(proses='CBL1' ,berat_kosong,0)) as berat_kosong_CBL1,
	(sum(if(proses='CBL1' ,berat,0))-sum(if(proses='CBL1' ,berat_kosong,0))) as brtkain_CBL1,
	sum(if(proses='CNP1' ,berat,0)) as berat_CNP1,
	sum(if(proses='CNP1' ,berat_kosong,0)) as berat_kosong_CNP1,
	(sum(if(proses='CNP1' ,berat,0))-sum(if(proses='CNP1' ,berat_kosong,0))) as brtkain_CNP1,
	sum(if(proses='COM2' ,berat,0)) as berat_COM2,
	sum(if(proses='COM2' ,berat_kosong,0)) as berat_kosong_COM2,
	(sum(if(proses='COM2' ,berat,0))-sum(if(proses='COM2' ,berat_kosong,0))) as brtkain_COM2,
	sum(if(proses='CPD1' ,berat,0)) as berat_CPD1,
	sum(if(proses='CPD1' ,berat_kosong,0)) as berat_kosong_CPD1,
	(sum(if(proses='CPD1' ,berat,0))-sum(if(proses='CPD1' ,berat_kosong,0))) as brtkain_CPD1,
	sum(if(proses='CPT1' ,berat,0)) as berat_CPT1,
	sum(if(proses='CPT1' ,berat_kosong,0)) as berat_kosong_CPT1,
	(sum(if(proses='CPT1' ,berat,0))-sum(if(proses='CPT1' ,berat_kosong,0))) as brtkain_CPT1,
	sum(if(proses='CUR1' ,berat,0)) as berat_CUR1,
	sum(if(proses='CUR1' ,berat_kosong,0)) as berat_kosong_CUR1,
	(sum(if(proses='CUR1' ,berat,0))-sum(if(proses='CUR1' ,berat_kosong,0))) as brtkain_CUR1,
	sum(if(proses='FEW1' ,berat,0)) as berat_FEW1,
	sum(if(proses='FEW1' ,berat_kosong,0)) as berat_kosong_FEW1,
	(sum(if(proses='FEW1' ,berat,0))-sum(if(proses='FEW1' ,berat_kosong,0))) as brtkain_FEW1,
	sum(if(proses='FIX1' ,berat,0)) as berat_FIX1,
	sum(if(proses='FIX1' ,berat_kosong,0)) as berat_kosong_FIX1,
	(sum(if(proses='FIX1' ,berat,0))-sum(if(proses='FIX1' ,berat_kosong,0))) as brtkain_FIX1,
	sum(if(proses='FNU1' ,berat,0)) as berat_FNU1,
	sum(if(proses='FNU1' ,berat_kosong,0)) as berat_kosong_FNU1,
	(sum(if(proses='FNU1' ,berat,0))-sum(if(proses='FNU1' ,berat_kosong,0))) as brtkain_FNU1,
	sum(if(proses='FNU2' ,berat,0)) as berat_FNU2,
	sum(if(proses='FNU2' ,berat_kosong,0)) as berat_kosong_FNU2,
	(sum(if(proses='FNU2' ,berat,0))-sum(if(proses='FNU2' ,berat_kosong,0))) as brtkain_FNU2,
	sum(if(proses='HEW1' ,berat,0)) as berat_HEW1,
	sum(if(proses='HEW1' ,berat_kosong,0)) as berat_kosong_HEW1,
	(sum(if(proses='HEW1' ,berat,0))-sum(if(proses='HEW1' ,berat_kosong,0))) as brtkain_HEW1,
	sum(if(proses='LVL1' ,berat,0)) as berat_LVL1,
	sum(if(proses='LVL1' ,berat_kosong,0)) as berat_kosong_LVL1,
	(sum(if(proses='LVL1' ,berat,0))-sum(if(proses='LVL1' ,berat_kosong,0))) as brtkain_LVL1,
	sum(if(proses='NCP1' ,berat,0)) as berat_NCP1,
	sum(if(proses='NCP1' ,berat_kosong,0)) as berat_kosong_NCP1,
	(sum(if(proses='NCP1' ,berat,0))-sum(if(proses='NCP1' ,berat_kosong,0))) as brtkain_NCP1,
	sum(if(proses='PAD1' ,berat,0)) as berat_PAD1,
	sum(if(proses='PAD1' ,berat_kosong,0)) as berat_kosong_PAD1,
	(sum(if(proses='PAD1' ,berat,0))-sum(if(proses='PAD1' ,berat_kosong,0))) as brtkain_PAD1,
	sum(if(proses='PAD2' ,berat,0)) as berat_PAD2,
	sum(if(proses='PAD2' ,berat_kosong,0)) as berat_kosong_PAD2,
	(sum(if(proses='PAD2' ,berat,0))-sum(if(proses='PAD2' ,berat_kosong,0))) as brtkain_PAD2,
	sum(if(proses='RDC1' ,berat,0)) as berat_RDC1,

	sum(if(proses='RDC1' ,berat_kosong,0)) as berat_kosong_RDC1,
	(sum(if(proses='RDC1' ,berat,0))-sum(if(proses='RDC1' ,berat_kosong,0))) as brtkain_RDC1,
	sum(if(proses='RLX1' ,berat,0)) as berat_RLX1,
	sum(if(proses='RLX1' ,berat_kosong,0)) as berat_kosong_RLX1,
	(sum(if(proses='RLX1' ,berat,0))-sum(if(proses='RLX1' ,berat_kosong,0))) as brtkain_RLX1,
	sum(if(proses='ROT1' ,berat,0)) as berat_ROT1,
	sum(if(proses='ROT1' ,berat_kosong,0)) as berat_kosong_ROT1,
	(sum(if(proses='ROT1' ,berat,0))-sum(if(proses='ROT1' ,berat_kosong,0))) as brtkain_ROT1,
	sum(if(proses='SOA1' ,berat,0)) as berat_SOA1,
	sum(if(proses='SOA1' ,berat_kosong,0)) as berat_kosong_SOA1,
	(sum(if(proses='SOA1' ,berat,0))-sum(if(proses='SOA1' ,berat_kosong,0))) as brtkain_SOA1,
	sum(if(proses='SOF1' ,berat,0)) as berat_SOF1,
	sum(if(proses='SOF1' ,berat_kosong,0)) as berat_kosong_SOF1,
	(sum(if(proses='SOF1' ,berat,0))-sum(if(proses='SOF1' ,berat_kosong,0))) as brtkain_SOF1,
	sum(if(proses='SCO1' ,berat,0)) as berat_SCO1,
	sum(if(proses='SCO1' ,berat_kosong,0)) as berat_kosong_SCO1,
	(sum(if(proses='SCO1' ,berat,0))-sum(if(proses='SCO1' ,berat_kosong,0))) as brtkain_SCO1,
	sum(if(proses='STM1' ,berat,0)) as berat_STM1,
	sum(if(proses='STM1' ,berat_kosong,0)) as berat_kosong_STM1,
	(sum(if(proses='STM1' ,berat,0))-sum(if(proses='STM1' ,berat_kosong,0))) as brtkain_STM1,
	sum(if(proses='STR1' ,berat,0)) as berat_STR1,
	sum(if(proses='STR1' ,berat_kosong,0)) as berat_kosong_STR1,
	(sum(if(proses='STR1' ,berat,0))-sum(if(proses='STR1' ,berat_kosong,0))) as brtkain_STR1,
	sum(if(proses='TDR1' ,berat,0)) as berat_TDR1,
	sum(if(proses='TDR1' ,berat_kosong,0)) as berat_kosong_TDR1,
	(sum(if(proses='TDR1' ,berat,0))-sum(if(proses='TDR1' ,berat_kosong,0))) as brtkain_TDR1,
	sum(if(proses='PRE1' ,berat,0)) as berat_PRE1,
	sum(if(proses='PRE1' ,berat_kosong,0)) as berat_kosong_PRE1,
	(sum(if(proses='PRE1' ,berat,0))-sum(if(proses='PRE1' ,berat_kosong,0))) as brtkain_PRE1,
	sum(if(proses='SUE1' ,berat,0)) as berat_SUE1,
	sum(if(proses='SUE1' ,berat_kosong,0)) as berat_kosong_SUE1,
	(sum(if(proses='SUE1' ,berat,0))-sum(if(proses='SUE1' ,berat_kosong,0))) as brtkain_SUE1,
	sum(if(proses='SUE2' ,berat,0)) as berat_SUE2,
	sum(if(proses='SUE2' ,berat_kosong,0)) as berat_kosong_SUE2,
	(sum(if(proses='SUE2' ,berat,0))-sum(if(proses='SUE2' ,berat_kosong,0))) as brtkain_SUE2,
	sum(if(proses='SUE3' ,berat,0)) as berat_SUE3,
	sum(if(proses='SUE3' ,berat_kosong,0)) as berat_kosong_SUE3,
	(sum(if(proses='SUE3' ,berat,0))-sum(if(proses='SUE3' ,berat_kosong,0))) as brtkain_SUE3,
	sum(if(proses='SUE4' ,berat,0)) as berat_SUE4,
	sum(if(proses='SUE4' ,berat_kosong,0)) as berat_kosong_SUE4,
	(sum(if(proses='SUE4' ,berat,0))-sum(if(proses='SUE4' ,berat_kosong,0))) as brtkain_SUE4,
	sum(if(proses='DYE1' ,berat,0)) as berat_DYE1,
	sum(if(proses='DYE1' ,berat_kosong,0)) as berat_kosong_DYE1,
	round(sum(if(proses='DYE1' ,berat,0))-sum(if(proses='DYE1' ,berat_kosong,0)),2) as brtkain_DYE1,
	sum(if(proses='DYE2' ,berat,0)) as berat_DYE2,
	sum(if(proses='DYE2' ,berat_kosong,0)) as berat_kosong_DYE2,
	round(sum(if(proses='DYE2' ,berat,0))-sum(if(proses='DYE2' ,berat_kosong,0)),2) as brtkain_DYE2,
	sum(if(proses='DYE4' ,berat,0)) as berat_DYE4,
	sum(if(proses='DYE4' ,berat_kosong,0)) as berat_kosong_DYE4,
	round(sum(if(proses='DYE4' ,berat,0))-sum(if(proses='DYE4' ,berat_kosong,0)),2) as brtkain_DYE4,
	sum(if(proses='OVN1' ,berat,0)) as berat_OVN1,
	sum(if(proses='OVN1' ,berat_kosong,0)) as berat_kosong_OVN1,
	(sum(if(proses='OVN1' ,berat,0))-sum(if(proses='OVN1' ,berat_kosong,0))) as brtkain_OVN1,
	sum(if(proses='OVN2' ,berat,0)) as berat_OVN2,
	sum(if(proses='OVN2' ,berat_kosong,0)) as berat_kosong_OVN2,
	(sum(if(proses='OVN2' ,berat,0))-sum(if(proses='OVN2' ,berat_kosong,0))) as brtkain_OVN2,
	sum(if(proses='OVN4' ,berat,0)) as berat_OVN4,
	sum(if(proses='OVN4' ,berat_kosong,0)) as berat_kosong_OVN4,
	(sum(if(proses='OVN4' ,berat,0))-sum(if(proses='OVN4' ,berat_kosong,0))) as brtkain_OVN4,
	sum(if(proses='OVD1' ,berat,0)) as berat_OVD1,
	sum(if(proses='OVD1' ,berat_kosong,0)) as berat_kosong_OVD1,
	(sum(if(proses='OVD1' ,berat,0))-sum(if(proses='OVD1' ,berat_kosong,0))) as brtkain_OVD1,
	sum(if(proses='OVD2' ,berat,0)) as berat_OVD2,
	sum(if(proses='OVD2' ,berat_kosong,0)) as berat_kosong_OVD2,
	(sum(if(proses='OVD2' ,berat,0))-sum(if(proses='OVD2' ,berat_kosong,0))) as brtkain_OVD2,
	sum(if(proses='OVB1' ,berat,0)) as berat_OVB1,
	sum(if(proses='OVB1' ,berat_kosong,0)) as berat_kosong_OVB1,
	(sum(if(proses='OVB1' ,berat,0))-sum(if(proses='OVB1' ,berat_kosong,0))) as brtkain_OVB1,
	sum(if(proses='OVB2' ,berat,0)) as berat_OVB2,
	sum(if(proses='OVB2' ,berat_kosong,0)) as berat_kosong_OVB2,
	(sum(if(proses='OVB2' ,berat,0))-sum(if(proses='OVB2' ,berat_kosong,0))) as brtkain_OVB2,
	sum(if(proses='OPW1' ,berat,0)) as berat_OPW1,
	sum(if(proses='OPW1' ,berat_kosong,0)) as berat_kosong_OPW1,
	(sum(if(proses='OPW1' ,berat,0))-sum(if(proses='OPW1' ,berat_kosong,0))) as brtkain_OPW1,
	sum(if(proses='RSE2' ,berat,0)) as berat_RSE2,
	sum(if(proses='RSE2' ,berat_kosong,0)) as berat_kosong_RSE2,
	(sum(if(proses='RSE2' ,berat,0))-sum(if(proses='RSE2' ,berat_kosong,0))) as brtkain_RSE2,
	sum(if(proses='RSE4' ,berat,0)) as berat_RSE4,
	sum(if(proses='RSE4' ,berat_kosong,0)) as berat_kosong_RSE4,
	(sum(if(proses='RSE4' ,berat,0))-sum(if(proses='RSE4' ,berat_kosong,0))) as brtkain_RSE4,
	sum(if(proses='RSE5' ,berat,0)) as berat_RSE5,
	sum(if(proses='RSE5' ,berat_kosong,0)) as berat_kosong_RSE5,
	(sum(if(proses='RSE5' ,berat,0))-sum(if(proses='RSE5' ,berat_kosong,0))) as brtkain_RSE5,
	sum(if(proses='FIN1' ,berat,0)) as berat_FIN1,
	sum(if(proses='FIN1' ,berat_kosong,0)) as berat_kosong_FIN1,
	(sum(if(proses='FIN1' ,berat,0))-sum(if(proses='FIN1' ,berat_kosong,0))) as brtkain_FIN1,
	sum(if(proses='SHR4' ,berat,0)) as berat_SHR4,
	sum(if(proses='SHR4' ,berat_kosong,0)) as berat_kosong_SHR4,
	(sum(if(proses='SHR4' ,berat,0))-sum(if(proses='SHR4' ,berat_kosong,0))) as brtkain_SHR4,
	sum(if(proses='SHR3' ,berat,0)) as berat_SHR3,
	sum(if(proses='SHR3' ,berat_kosong,0)) as berat_kosong_SHR3,
	(sum(if(proses='SHR3' ,berat,0))-sum(if(proses='SHR3' ,berat_kosong,0))) as brtkain_SHR3,
	sum(if(proses='FNJ1' ,berat,0)) as berat_FNJ1,
	sum(if(proses='FNJ1' ,berat_kosong,0)) as berat_kosong_FNJ1,
	(sum(if(proses='FNJ1' ,berat,0))-sum(if(proses='FNJ1' ,berat_kosong,0))) as brtkain_FNJ1,
	sum(if(proses='FNJ2' ,berat,0)) as berat_FNJ2,
	sum(if(proses='FNJ2' ,berat_kosong,0)) as berat_kosong_FNJ2,
	(sum(if(proses='FNJ2' ,berat,0))-sum(if(proses='FNJ2' ,berat_kosong,0))) as brtkain_FNJ2,
	sum(if(proses='FNJ3' ,berat,0)) as berat_FNJ3,
	sum(if(proses='FNJ3' ,berat_kosong,0)) as berat_kosong_FNJ3,
	(sum(if(proses='FNJ3' ,berat,0))-sum(if(proses='FNJ3' ,berat_kosong,0))) as brtkain_FNJ3,
	sum(if(proses='INS2' ,berat,0)) as berat_INS2,
	sum(if(proses='INS2' ,berat_kosong,0)) as berat_kosong_INS2,
	(sum(if(proses='INS2' ,berat,0))-sum(if(proses='INS2' ,berat_kosong,0))) as brtkain_INS2,
	sum(if(proses='INS3' ,berat,0)) as berat_INS3,
	sum(if(proses='INS3' ,berat_kosong,0)) as berat_kosong_INS3,
	(sum(if(proses='INS3' ,berat,0))-sum(if(proses='INS3' ,berat_kosong,0))) as brtkain_INS3,
	sum(if(proses='INS7' ,berat,0)) as berat_INS7,
	sum(if(proses='INS7' ,berat_kosong,0)) as berat_kosong_INS7,
	(sum(if(proses='INS7' ,berat,0))-sum(if(proses='INS7' ,berat_kosong,0))) as brtkain_INS7,
	no_demand,
	ket,
	no_hanger
from
	kain_proses kp
 where
 ket='before'
group by
	ket,
	no_demand	
	) as before1
on kp.no_demand=before1.no_demand 
left join (
select
	sum(if(proses='BAT1' ,berat,0)) as berat_BAT1,
	sum(if(proses='BAT1' ,berat_kosong,0)) as berat_kosong_BAT1,
	(sum(if(proses='BAT1' ,berat,0))-sum(if(proses='BAT1' ,berat_kosong,0))) as brtkain_BAT1,
	sum(if(proses='BAT2' ,berat,0)) as berat_BAT2,
	sum(if(proses='BAT2' ,berat_kosong,0)) as berat_kosong_BAT2,
	(sum(if(proses='BAT2' ,berat,0))-sum(if(proses='BAT2' ,berat_kosong,0))) as brtkain_BAT2,
	sum(if(proses='BLD2' ,berat,0)) as berat_BLD2,
	sum(if(proses='BLD2' ,berat_kosong,0)) as berat_kosong_BLD2,
	(sum(if(proses='BLD2' ,berat,0))-sum(if(proses='BLD2' ,berat_kosong,0))) as brtkain_BLD2,
	sum(if(proses='CBL1' ,berat,0)) as berat_CBL1,
	sum(if(proses='CBL1' ,berat_kosong,0)) as berat_kosong_CBL1,
	(sum(if(proses='CBL1' ,berat,0))-sum(if(proses='CBL1' ,berat_kosong,0))) as brtkain_CBL1,
	sum(if(proses='CNP1' ,berat,0)) as berat_CNP1,
	sum(if(proses='CNP1' ,berat_kosong,0)) as berat_kosong_CNP1,
	(sum(if(proses='CNP1' ,berat,0))-sum(if(proses='CNP1' ,berat_kosong,0))) as brtkain_CNP1,
	sum(if(proses='COM2' ,berat,0)) as berat_COM2,
	sum(if(proses='COM2' ,berat_kosong,0)) as berat_kosong_COM2,
	(sum(if(proses='COM2' ,berat,0))-sum(if(proses='COM2' ,berat_kosong,0))) as brtkain_COM2,
	sum(if(proses='CPD1' ,berat,0)) as berat_CPD1,
	sum(if(proses='CPD1' ,berat_kosong,0)) as berat_kosong_CPD1,
	(sum(if(proses='CPD1' ,berat,0))-sum(if(proses='CPD1' ,berat_kosong,0))) as brtkain_CPD1,
	sum(if(proses='CPT1' ,berat,0)) as berat_CPT1,
	sum(if(proses='CPT1' ,berat_kosong,0)) as berat_kosong_CPT1,
	(sum(if(proses='CPT1' ,berat,0))-sum(if(proses='CPT1' ,berat_kosong,0))) as brtkain_CPT1,
	sum(if(proses='CUR1' ,berat,0)) as berat_CUR1,
	sum(if(proses='CUR1' ,berat_kosong,0)) as berat_kosong_CUR1,
	(sum(if(proses='CUR1' ,berat,0))-sum(if(proses='CUR1' ,berat_kosong,0))) as brtkain_CUR1,
	sum(if(proses='FEW1' ,berat,0)) as berat_FEW1,
	sum(if(proses='FEW1' ,berat_kosong,0)) as berat_kosong_FEW1,
	(sum(if(proses='FEW1' ,berat,0))-sum(if(proses='FEW1' ,berat_kosong,0))) as brtkain_FEW1,
	sum(if(proses='FIX1' ,berat,0)) as berat_FIX1,
	sum(if(proses='FIX1' ,berat_kosong,0)) as berat_kosong_FIX1,
	(sum(if(proses='FIX1' ,berat,0))-sum(if(proses='FIX1' ,berat_kosong,0))) as brtkain_FIX1,
	sum(if(proses='FNU1' ,berat,0)) as berat_FNU1,
	sum(if(proses='FNU1' ,berat_kosong,0)) as berat_kosong_FNU1,
	(sum(if(proses='FNU1' ,berat,0))-sum(if(proses='FNU1' ,berat_kosong,0))) as brtkain_FNU1,
	sum(if(proses='FNU2' ,berat,0)) as berat_FNU2,
	sum(if(proses='FNU2' ,berat_kosong,0)) as berat_kosong_FNU2,
	(sum(if(proses='FNU2' ,berat,0))-sum(if(proses='FNU2' ,berat_kosong,0))) as brtkain_FNU2,
	sum(if(proses='HEW1' ,berat,0)) as berat_HEW1,
	sum(if(proses='HEW1' ,berat_kosong,0)) as berat_kosong_HEW1,
	(sum(if(proses='HEW1' ,berat,0))-sum(if(proses='HEW1' ,berat_kosong,0))) as brtkain_HEW1,
	sum(if(proses='LVL1' ,berat,0)) as berat_LVL1,
	sum(if(proses='LVL1' ,berat_kosong,0)) as berat_kosong_LVL1,
	(sum(if(proses='LVL1' ,berat,0))-sum(if(proses='LVL1' ,berat_kosong,0))) as brtkain_LVL1,
	sum(if(proses='NCP1' ,berat,0)) as berat_NCP1,
	sum(if(proses='NCP1' ,berat_kosong,0)) as berat_kosong_NCP1,
	(sum(if(proses='NCP1' ,berat,0))-sum(if(proses='NCP1' ,berat_kosong,0))) as brtkain_NCP1,
	sum(if(proses='PAD1' ,berat,0)) as berat_PAD1,
	sum(if(proses='PAD1' ,berat_kosong,0)) as berat_kosong_PAD1,
	(sum(if(proses='PAD1' ,berat,0))-sum(if(proses='PAD1' ,berat_kosong,0))) as brtkain_PAD1,
	sum(if(proses='PAD2' ,berat,0)) as berat_PAD2,
	sum(if(proses='PAD2' ,berat_kosong,0)) as berat_kosong_PAD2,
	(sum(if(proses='PAD2' ,berat,0))-sum(if(proses='PAD2' ,berat_kosong,0))) as brtkain_PAD2,
	sum(if(proses='RDC1' ,berat,0)) as berat_RDC1,
	sum(if(proses='RDC1' ,berat_kosong,0)) as berat_kosong_RDC1,
	(sum(if(proses='RDC1' ,berat,0))-sum(if(proses='RDC1' ,berat_kosong,0))) as brtkain_RDC1,
	sum(if(proses='RLX1' ,berat,0)) as berat_RLX1,
	sum(if(proses='RLX1' ,berat_kosong,0)) as berat_kosong_RLX1,
	(sum(if(proses='RLX1' ,berat,0))-sum(if(proses='RLX1' ,berat_kosong,0))) as brtkain_RLX1,
	sum(if(proses='ROT1' ,berat,0)) as berat_ROT1,
	sum(if(proses='ROT1' ,berat_kosong,0)) as berat_kosong_ROT1,
	(sum(if(proses='ROT1' ,berat,0))-sum(if(proses='ROT1' ,berat_kosong,0))) as brtkain_ROT1,
	sum(if(proses='SOA1' ,berat,0)) as berat_SOA1,
	sum(if(proses='SOA1' ,berat_kosong,0)) as berat_kosong_SOA1,
	(sum(if(proses='SOA1' ,berat,0))-sum(if(proses='SOA1' ,berat_kosong,0))) as brtkain_SOA1,
	sum(if(proses='SOF1' ,berat,0)) as berat_SOF1,
	sum(if(proses='SOF1' ,berat_kosong,0)) as berat_kosong_SOF1,
	(sum(if(proses='SOF1' ,berat,0))-sum(if(proses='SOF1' ,berat_kosong,0))) as brtkain_SOF1,
	sum(if(proses='SCO1' ,berat,0)) as berat_SCO1,
	sum(if(proses='SCO1' ,berat_kosong,0)) as berat_kosong_SCO1,
	(sum(if(proses='SCO1' ,berat,0))-sum(if(proses='SCO1' ,berat_kosong,0))) as brtkain_SCO1,
	sum(if(proses='STM1' ,berat,0)) as berat_STM1,
	sum(if(proses='STM1' ,berat_kosong,0)) as berat_kosong_STM1,
	(sum(if(proses='STM1' ,berat,0))-sum(if(proses='STM1' ,berat_kosong,0))) as brtkain_STM1,
	sum(if(proses='STR1' ,berat,0)) as berat_STR1,
	sum(if(proses='STR1' ,berat_kosong,0)) as berat_kosong_STR1,
	(sum(if(proses='STR1' ,berat,0))-sum(if(proses='STR1' ,berat_kosong,0))) as brtkain_STR1,
	sum(if(proses='TDR1' ,berat,0)) as berat_TDR1,
	sum(if(proses='TDR1' ,berat_kosong,0)) as berat_kosong_TDR1,
	(sum(if(proses='TDR1' ,berat,0))-sum(if(proses='TDR1' ,berat_kosong,0))) as brtkain_TDR1,
	sum(if(proses='PRE1' ,berat,0)) as berat_PRE1,
	sum(if(proses='PRE1' ,berat_kosong,0)) as berat_kosong_PRE1,
	(sum(if(proses='PRE1' ,berat,0))-sum(if(proses='PRE1' ,berat_kosong,0))) as brtkain_PRE1,
	sum(if(proses='SUE1' ,berat,0)) as berat_SUE1,
	sum(if(proses='SUE1' ,berat_kosong,0)) as berat_kosong_SUE1,
	(sum(if(proses='SUE1' ,berat,0))-sum(if(proses='SUE1' ,berat_kosong,0))) as brtkain_SUE1,
	sum(if(proses='SUE2' ,berat,0)) as berat_SUE2,
	sum(if(proses='SUE2' ,berat_kosong,0)) as berat_kosong_SUE2,
	(sum(if(proses='SUE2' ,berat,0))-sum(if(proses='SUE2' ,berat_kosong,0))) as brtkain_SUE2,
	sum(if(proses='SUE3' ,berat,0)) as berat_SUE3,
	sum(if(proses='SUE3' ,berat_kosong,0)) as berat_kosong_SUE3,
	(sum(if(proses='SUE3' ,berat,0))-sum(if(proses='SUE3' ,berat_kosong,0))) as brtkain_SUE3,
	sum(if(proses='SUE4' ,berat,0)) as berat_SUE4,
	sum(if(proses='SUE4' ,berat_kosong,0)) as berat_kosong_SUE4,
	(sum(if(proses='SUE4' ,berat,0))-sum(if(proses='SUE4' ,berat_kosong,0))) as brtkain_SUE4,
	sum(if(proses='DYE1' ,berat,0)) as berat_DYE1,
	sum(if(proses='DYE1' ,berat_kosong,0)) as berat_kosong_DYE1,
	round(sum(if(proses='DYE1' ,berat,0))-sum(if(proses='DYE1' ,berat_kosong,0)),2) as brtkain_DYE1,
	sum(if(proses='DYE2' ,berat,0)) as berat_DYE2,
	sum(if(proses='DYE2' ,berat_kosong,0)) as berat_kosong_DYE2,
	round(sum(if(proses='DYE2' ,berat,0))-sum(if(proses='DYE2' ,berat_kosong,0)),2) as brtkain_DYE2,
	sum(if(proses='DYE4' ,berat,0)) as berat_DYE4,
	sum(if(proses='DYE4' ,berat_kosong,0)) as berat_kosong_DYE4,
	round(sum(if(proses='DYE4' ,berat,0))-sum(if(proses='DYE4' ,berat_kosong,0)),2) as brtkain_DYE4,
	sum(if(proses='OVN1' ,berat,0)) as berat_OVN1,
	sum(if(proses='OVN1' ,berat_kosong,0)) as berat_kosong_OVN1,
	(sum(if(proses='OVN1' ,berat,0))-sum(if(proses='OVN1' ,berat_kosong,0))) as brtkain_OVN1,
	sum(if(proses='OVN2' ,berat,0)) as berat_OVN2,
	sum(if(proses='OVN2' ,berat_kosong,0)) as berat_kosong_OVN2,
	(sum(if(proses='OVN2' ,berat,0))-sum(if(proses='OVN2' ,berat_kosong,0))) as brtkain_OVN2,
	sum(if(proses='OVN4' ,berat,0)) as berat_OVN4,
	sum(if(proses='OVN4' ,berat_kosong,0)) as berat_kosong_OVN4,
	(sum(if(proses='OVN4' ,berat,0))-sum(if(proses='OVN4' ,berat_kosong,0))) as brtkain_OVN4,
	sum(if(proses='OVD1' ,berat,0)) as berat_OVD1,
	sum(if(proses='OVD1' ,berat_kosong,0)) as berat_kosong_OVD1,
	(sum(if(proses='OVD1' ,berat,0))-sum(if(proses='OVD1' ,berat_kosong,0))) as brtkain_OVD1,
	sum(if(proses='OVD2' ,berat,0)) as berat_OVD2,
	sum(if(proses='OVD2' ,berat_kosong,0)) as berat_kosong_OVD2,
	(sum(if(proses='OVD2' ,berat,0))-sum(if(proses='OVD2' ,berat_kosong,0))) as brtkain_OVD2,
	sum(if(proses='OVB1' ,berat,0)) as berat_OVB1,
	sum(if(proses='OVB1' ,berat_kosong,0)) as berat_kosong_OVB1,
	(sum(if(proses='OVB1' ,berat,0))-sum(if(proses='OVB1' ,berat_kosong,0))) as brtkain_OVB1,
	sum(if(proses='OVB2' ,berat,0)) as berat_OVB2,
	sum(if(proses='OVB2' ,berat_kosong,0)) as berat_kosong_OVB2,
	(sum(if(proses='OVB2' ,berat,0))-sum(if(proses='OVB2' ,berat_kosong,0))) as brtkain_OVB2,
	sum(if(proses='OPW1' ,berat,0)) as berat_OPW1,
	sum(if(proses='OPW1' ,berat_kosong,0)) as berat_kosong_OPW1,
	(sum(if(proses='OPW1' ,berat,0))-sum(if(proses='OPW1' ,berat_kosong,0))) as brtkain_OPW1,
	sum(if(proses='RSE2' ,berat,0)) as berat_RSE2,
	sum(if(proses='RSE2' ,berat_kosong,0)) as berat_kosong_RSE2,
	(sum(if(proses='RSE2' ,berat,0))-sum(if(proses='RSE2' ,berat_kosong,0))) as brtkain_RSE2,
	sum(if(proses='RSE4' ,berat,0)) as berat_RSE4,
	sum(if(proses='RSE4' ,berat_kosong,0)) as berat_kosong_RSE4,
	(sum(if(proses='RSE4' ,berat,0))-sum(if(proses='RSE4' ,berat_kosong,0))) as brtkain_RSE4,
	sum(if(proses='RSE5' ,berat,0)) as berat_RSE5,
	sum(if(proses='RSE5' ,berat_kosong,0)) as berat_kosong_RSE5,
	(sum(if(proses='RSE5' ,berat,0))-sum(if(proses='RSE5' ,berat_kosong,0))) as brtkain_RSE5,
	sum(if(proses='FIN1' ,berat,0)) as berat_FIN1,
	sum(if(proses='FIN1' ,berat_kosong,0)) as berat_kosong_FIN1,
	(sum(if(proses='FIN1' ,berat,0))-sum(if(proses='FIN1' ,berat_kosong,0))) as brtkain_FIN1,
	sum(if(proses='SHR4' ,berat,0)) as berat_SHR4,
	sum(if(proses='SHR4' ,berat_kosong,0)) as berat_kosong_SHR4,
	(sum(if(proses='SHR4' ,berat,0))-sum(if(proses='SHR4' ,berat_kosong,0))) as brtkain_SHR4,
	sum(if(proses='SHR3' ,berat,0)) as berat_SHR3,
	sum(if(proses='SHR3' ,berat_kosong,0)) as berat_kosong_SHR3,
	(sum(if(proses='SHR3' ,berat,0))-sum(if(proses='SHR3' ,berat_kosong,0))) as brtkain_SHR3,
	sum(if(proses='FNJ1' ,berat,0)) as berat_FNJ1,
	sum(if(proses='FNJ1' ,berat_kosong,0)) as berat_kosong_FNJ1,
	(sum(if(proses='FNJ1' ,berat,0))-sum(if(proses='FNJ1' ,berat_kosong,0))) as brtkain_FNJ1,
	sum(if(proses='FNJ2' ,berat,0)) as berat_FNJ2,
	sum(if(proses='FNJ2' ,berat_kosong,0)) as berat_kosong_FNJ2,
	(sum(if(proses='FNJ2' ,berat,0))-sum(if(proses='FNJ2' ,berat_kosong,0))) as brtkain_FNJ2,
	sum(if(proses='FNJ3' ,berat,0)) as berat_FNJ3,
	sum(if(proses='FNJ3' ,berat_kosong,0)) as berat_kosong_FNJ3,
	(sum(if(proses='FNJ3' ,berat,0))-sum(if(proses='FNJ3' ,berat_kosong,0))) as brtkain_FNJ3,
	sum(if(proses='INS2' ,berat,0)) as berat_INS2,
	sum(if(proses='INS2' ,berat_kosong,0)) as berat_kosong_INS2,
	(sum(if(proses='INS2' ,berat,0))-sum(if(proses='INS2' ,berat_kosong,0))) as brtkain_INS2,
	sum(if(proses='INS3' ,berat,0)) as berat_INS3,
	sum(if(proses='INS3' ,berat_kosong,0)) as berat_kosong_INS3,
	(sum(if(proses='INS3' ,berat,0))-sum(if(proses='INS3' ,berat_kosong,0))) as brtkain_INS3,
	sum(if(proses='INS7' ,berat,0)) as berat_INS7,
	sum(if(proses='INS7' ,berat_kosong,0)) as berat_kosong_INS7,
	(sum(if(proses='INS7' ,berat,0))-sum(if(proses='INS7' ,berat_kosong,0))) as brtkain_INS7,
	no_demand,
	ket,
	max(kp.tgl_update) as tgl_update
from
	kain_proses kp
 where
 ket='after'
group by
	ket,
	no_demand	
	) as after1
on kp.no_demand=after1.no_demand
where
	(kp.ket = 'before'
		or kp.ket = 'after') 
		and kp.no_demand='".$row1['nodemand']."'
		and kp.prod_order='".$row1['nokk']."'
		and kp.no_hanger='".$row1['no_item']."'
group by
	kp.no_demand
order by kp.prod_order DESC
		";
$sql 	= mysqli_query($conr,$query);
$r		= mysqli_fetch_array($sql);
			  
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
WHERE a.PRODUCTIONORDERCODE ='".$r['prdorder']."'";			
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
	p.CODE = '".$r['demandno']."'";			
$stmt2S = db2_exec($conn1, $sqlto1, array('cursor' => DB2_SCROLLABLE));
$rowto1 = db2_fetch_assoc($stmt2S);
			  
			  
	?>		  
      <tr>
        <td align="left"><?php if($r['pelanggan']!=""){echo $r['pelanggan'];}else{echo $row1['pelanggan'];} ?></td>
        <td align="left"><?php if($r['warna']!=""){echo $r['warna'];}else{echo $row1['warna'];} ?></td>
        <td><?php if($r['no_hanger']!=""){echo $r['no_hanger'];}else{echo $row1['no_item'];} ?></td>
        <td><?php echo $r['rol_bagi']; ?></td>
        <td align="right"><?php echo round($r['bagi_kain'],2); ?></td>
        <td><?php if($r['lot']!=""){echo $r['lot'];}else{echo $row1['lot_lgcy'];} ?></td>
        <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?php echo $row1['nodemand']; ?>&prod_order=<?php echo $row1['nokk']; ?>">`<?php echo $row1['nodemand']; ?></a></td>
        <td><a href="#" class="show_detail" id="<?php echo $row1['nokk'].", "; ?>"><?php echo $row1['nokk']; ?></a></td>
        <td align="center"><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bagi_kain']; echo " After: ".$r['aBAT2'];  ?>">
          <?php if($r['bagi_kain']>0 and $r['aBAT2']>0){ echo round($r['bagi_kain']-$r['aBAT2'],2); }else{ echo "0"; }  ?>
        </span></td>
        <td align="center"><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSCO1']; echo " After: ".$r['aPRE1']; ?>">
          <?php if($r['bSCO1']>0){ echo number_format($r['bSCO1']-$r['bSCO1'],2); }else{ echo "0"; }  ?>
        </span></td>
        <td align="center"><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bDYE2']; echo " After: ".$r['aOVN1']; ?>">
          <?php if($r['bDYE2']>0){ echo number_format($r['bDYE2']-$r['bDYE2'],2); }else{ echo "0"; } ?>
        </span></td>
        <td align="center"><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bDYE2']; echo " After: ".$r['aOVN1']; ?>">
          <?php if($r['bDYE2']>0 and $r['aOVN1']>0){ echo number_format($r['bDYE2']-$r['aOVN1'],2); }else{ echo "0"; } ?>
        </span></td>
        <td align="center" ><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".($r['bDYE1']+$r['bDYE2']+$r['bDYE4']+$r['bFEW1']+$r['bHEW1']+$r['bLVL1']+$r['bRDC1']+$r['bRLX1']+$r['bSOA1']+$r['bSOF1']); echo " After: ".($r['aOVD1']+$r['aOVD2']+$r['aOVD3']+$r['aOVD4']); ?>">
          <?php if(($r['bDYE1']+$r['bDYE2']+$r['bDYE4']+$r['bFEW1']+$r['bHEW1']+$r['bLVL1']+$r['bRDC1']+$r['bRLX1']+$r['bSOA1']+$r['bSOF1'])>0 and ($r['aOVD1']+$r['aOVD2']+$r['aOVD3']+$r['aOVD4'])>0){ echo ($r['bDYE1']+$r['bDYE2']+$r['bDYE4']+$r['bFEW1']+$r['bHEW1']+$r['bLVL1']+$r['bRDC1']+$r['bRLX1']+$r['bSOA1']+$r['bSOF1'])-($r['aOVD1']+$r['aOVD2']+$r['aOVD3']+$r['aOVD4']); }else{ echo "0"; } ?>
        </span></td>
        <td align="center" ><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSCO1']." After: ".$r['aPRE1']; ?>">
          <?php if($r['bSCO1']>0 and $r['aPRE1']>0){echo $r['bSCO1']-$r['aPRE1'];}else{echo "0";} ?>
        </span></td>
        <td align="center" ><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSUE1']." After: ".$r['aSUE1']; ?>">
          <?php if($r['bSUE1']>0 and $r['aSUE1']>0){echo $r['bSUE1']-$r['aSUE1'];}else{echo "0";} ?>
        </span></td>
        <td align="center" ><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSUE2']." After: ".$r['aSUE2']; ?>">
          <?php if($r['bSUE2']>0 and $r['aSUE2']>0){echo $r['bSUE2']-$r['aSUE2'];}else{echo "0";} ?>
        </span></td>
        <td align="center" ><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSUE3']." After: ".$r['aSUE3']; ?>">
          <?php if($r['bSUE3']>0 and $r['aSUE3']>0){echo $r['bSUE3']-$r['aSUE3'];}else{echo "0";} ?>
        </span></td>
        <td align="center" ><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSUE4']." After: ".$r['aSUE4']; ?>">
          <?php if($r['bSUE4']>0 and $r['aSUE4']>0){echo $r['bSUE4']-$r['aSUE4'];}else{echo "0";} ?>
        </span></td>
        <td align="center" ><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bRSE2']." After: ".$r['aRSE2']; ?>">
          <?php if($r['bRSE2']>0 and $r['aRSE2']>0){echo $r['bRSE2']-$r['aRSE2'];}else{echo "0";} ?>
        </span></td>
        <td align="center" ><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bRSE4']." After: ".$r['aRSE4']; ?>">
          <?php if($r['bRSE4']>0 and $r['aRSE4']>0){echo $r['bRSE4']-$r['aRSE4'];}else{echo "0";} ?>
        </span></td>
        <td align="center" ><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bRSE5']." After: ".$r['aRSE5']; ?>">
          <?php if($r['bRSE5']>0 and $r['aRSE5']>0){echo $r['bRSE5']-$r['aRSE5'];}else{echo "0";} ?>
        </span></td>
        <td align="center" ><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bTDR1']." After: ".$r['aTDR1']; ?>">
          <?php if($r['bTDR1']>0 and $r['aTDR1']>0){echo number_format($r['bTDR1']-$r['aTDR1'],2);}else{echo "0";} ?>
        </span></td>
        <td align="center" ><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bCPT1']." After: ".$r['aCPT1']; ?>">
          <?php if($r['bCPT1']>0 and $r['aCPT1']>0){echo number_format($r['bCPT1']-$r['aCPT1'],2);}else{echo "0";} ?>
        </span></td>
        <td align="center"><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bFIN1']." After: ".$r['aFIN1']; ?>">
          <?php if($r['bFIN1']>0 and $r['aFIN1']>0){echo number_format($r['bFIN1']-$r['aFIN1'],2);}else{echo "0";} ?>
        </span></td>
        <td align="center"><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSHR3']." After: ".$r['aSHR3']; ?>">
          <?php if($r['bSHR3']>0 and $r['aSHR3']>0){echo number_format($r['bSHR3']-$r['aSHR3'],2);}else{echo "0";} ?>
        </span></td>
        <td align="center"><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSHR4']." After: ".$r['aSHR4']; ?>">
          <?php if($r['bSHR4']>0 and $r['aSHR4']>0){echo number_format($r['bSHR4']-$r['aSHR4'],2);}else{echo "0";} ?>
        </span></td>
        <td align="center"><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bFNJ1']." After: ".$r['aFNJ1']; ?>">
          <?php if($r['bFNJ1']>0 and $r['aFNJ1']>0){echo number_format($r['bFNJ1']-$r['aFNJ1'],2);}else if($r['bDYE2']>0){echo number_format($r['bDYE2']-$r['aFNJ1'],2);}else{echo "0";} ?>
        </span></td>
        <td align="center"><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bINS3']." After: ".$r['aINS3']; ?>">
          <?php if($r['bINS3']>0 and $r['aINS3']>0){echo number_format($r['bINS3']-$r['aINS3'],2);}else{echo "0";} ?>
        </span></td>
        <td align="center"><span class="" id="span" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['aINS3']; echo " After: ".$rowto['TOTAL_KG'];  ?>">
          <?php if($r['aINS3']>0 and $rowto['TOTAL_KG']>0){echo number_format($r['aINS3']-$rowto['TOTAL_KG'],2);}else{echo "0";} ?>
        </span></td>
        <td align="center"><?php if($r['bagi_kain']>0 and $rowto['TOTAL_KG']>0) {echo (round($r['bagi_kain'],2)-$rowto['TOTAL_KG']);}else{echo "0";} ?></td>
        <td align="center"><?php if($rowto['TOTAL_ROLL']>0){echo $rowto['TOTAL_ROLL'];}else{echo "0";} ?></td>
        <td align="center"><?php if($rowto['TOTAL_KG']>0){echo $rowto['TOTAL_KG'];}else{echo "0";} ?></td>
        <td align="center"><?php if($rowto['TOTAL_KG']>0){echo round((round($r['bagi_kain'],2)-$rowto['TOTAL_KG'])/$rowto['TOTAL_KG'],4)*10;}else {echo "0";} ?></td>
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