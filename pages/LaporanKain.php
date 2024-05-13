<?php 
ini_set("error_reporting", 0);
$NoDemand 	= isset($_POST['nodemand']) ? $_POST['nodemand'] : '';
$ProdOrder	= isset($_POST['prodorder']) ? $_POST['prodorder'] : '';
$NoHanger	= isset($_POST['nohanger']) ? $_POST['nohanger'] : '';

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
    <h3 class="card-title">Detail Data Gerobak</h3>
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
        <th valign="middle" style="text-align: center">OPW1</th>
        <th valign="middle" style="text-align: center">OVN1</th>
        <th valign="middle" style="text-align: center">OVD1</th>
        <th valign="middle" style="text-align: center">PRE1</th>
        <th valign="middle" style="text-align: center">SUE1 </th>
        <th valign="middle" style="text-align: center">SUE2</th>
        <th valign="middle" style="text-align: center">SUE3</th>
        <th valign="middle" style="text-align: center">SUE4</th>
        <th valign="middle" style="text-align: center">RSE2</th>
        <th valign="middle" style="text-align: center">RSE4</th>
        <th valign="middle" style="text-align: center">RSE5</th>
        <th valign="middle" style="text-align: center">RSE4</th>
        <th valign="middle" style="text-align: center">FIN1</th>
        <th valign="middle" style="text-align: center">SHR4</th>
        <th valign="middle" style="text-align: center">SHR3</th>
        <th valign="middle" style="text-align: center">FNJ1</th>
        <th valign="middle" style="text-align: center">INS3</th>
        <th valign="middle" style="text-align: center">PACK</th>
        </tr>
    </thead>
    <tbody>
      <?php
        $no = 1;
        $c = 0;
        		
		if($NoDemand!=""){
		$where2 = " AND kp.no_demand='$NoDemand' ";	
		}else{
		$where2 = " ";	
		}
		
		if($ProdOrder!=""){
		$where3 = " AND kp.prod_order='$ProdOrder' ";	
		}else{
		$where3 = " ";	
		}
		
		if($NoHanger!=""){
		$where4 = " AND kp.no_hanger LIKE '%$NoHanger%' ";	
		}else{
		$where4 = " ";	
		}
		if($NoDemand=="" and $ProdOrder=="" and $NoHanger==""){
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
	before1.brtkain_PRE1 as bPRE1,
	after1.brtkain_PRE1 as aPRE1,
	before1.brtkain_SUE1 as bSUE1,
	after1.brtkain_SUE1 as aSUE1,
	before1.brtkain_SUE1 as bSUE1,
	after1.brtkain_SUE1 as aSUE1,
	before1.brtkain_SUE2 as bSUE2,
	after1.brtkain_SUE2 as aSUE2,
	before1.brtkain_SUE3 as bSUE3,
	after1.brtkain_SUE3 as aSUE3,
	before1.brtkain_SUE4 as bSUE4,
	after1.brtkain_SUE4 as aSUE4,
	before1.brtkain_RSE2 as bRSE2,
	after1.brtkain_RSE2 as aRSE2,
	before1.brtkain_RSE4 as bRSE4,
	after1.brtkain_RSE4 as aRSE4,
	before1.brtkain_RSE5 as bRSE5,
	after1.brtkain_RSE5 as aRSE5,
	before1.brtkain_FIN1 as bFIN1,
	after1.brtkain_FIN1 as aFIN1,
	before1.brtkain_SHR3 as bSHR3,
	after1.brtkain_SHR3 as aSHR3,
	before1.brtkain_SHR4 as bSHR4,
	after1.brtkain_SHR4 as aSHR4,
	before1.brtkain_FNJ1 as bFNJ1,
	after1.brtkain_FNJ1 as aFNJ1,
	before1.brtkain_INS3 as bINS3,
	after1.brtkain_INS3 as aINS3,	
	round(after1.brtkain_BAT2-after1.brtkain_BAT2,2) as BAT2,
	if(before1.brtkain_SCO1>0,(after1.brtkain_BAT2-before1.brtkain_SCO1),0) as SCO1,
	if(before1.brtkain_DYE2>0,(after1.brtkain_BAT2-before1.brtkain_DYE2),0) as DYE2,
	if(before1.brtkain_OPW1>0,(after1.brtkain_BAT2-before1.brtkain_OPW1),0) as OPW1,
	if(after1.brtkain_OVN1>0,(before1.brtkain_SCO1-after1.brtkain_OVN1),0) as OVN1,
	if(after1.brtkain_OVD1>0,(before1.brtkain_SCO1-after1.brtkain_OVD1),0) as OVD1,	
	(before1.brtkain_PRE1-after1.brtkain_PRE1) as PRE1,
	(before1.brtkain_SUE1-after1.brtkain_SUE1) as SUE1,
	(before1.brtkain_SUE2-after1.brtkain_SUE2) as FIN1,
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
	sum(if(proses='BAT2' ,berat,0)) as berat_BAT2,
	sum(if(proses='BAT2' ,berat_kosong,0)) as berat_kosong_BAT2,
	(sum(if(proses='BAT2' ,berat,0))-sum(if(proses='BAT2' ,berat_kosong,0))) as brtkain_BAT2,
	sum(if(proses='SCO1' ,berat,0)) as berat_SCO1,
	sum(if(proses='SCO1' ,berat_kosong,0)) as berat_kosong_SCO1,
	(sum(if(proses='SCO1' ,berat,0))-sum(if(proses='SCO1' ,berat_kosong,0))) as brtkain_SCO1,
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
	sum(if(proses='DYE2' ,berat,0)) as berat_DYE2,
	sum(if(proses='DYE2' ,berat_kosong,0)) as berat_kosong_DYE2,
	round(sum(if(proses='DYE2' ,berat,0))-sum(if(proses='DYE2' ,berat_kosong,0)),2) as brtkain_DYE2,
	sum(if(proses='OVN1' ,berat,0)) as berat_OVN1,
	sum(if(proses='OVN1' ,berat_kosong,0)) as berat_kosong_OVN1,
	(sum(if(proses='OVN1' ,berat,0))-sum(if(proses='OVN1' ,berat_kosong,0))) as brtkain_OVN1,
	sum(if(proses='OVD1' ,berat,0)) as berat_OVD1,
	sum(if(proses='OVD1' ,berat_kosong,0)) as berat_kosong_OVD1,
	(sum(if(proses='OVD1' ,berat,0))-sum(if(proses='OVD1' ,berat_kosong,0))) as brtkain_OVD1,
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
	sum(if(proses='INS3' ,berat,0)) as berat_INS3,
	sum(if(proses='INS3' ,berat_kosong,0)) as berat_kosong_INS3,
	(sum(if(proses='INS3' ,berat,0))-sum(if(proses='INS3' ,berat_kosong,0))) as brtkain_INS3,
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
	sum(if(proses='BAT2' ,berat,0)) as berat_BAT2,
	sum(if(proses='BAT2' ,berat_kosong,0)) as berat_kosong_BAT2,
	(sum(if(proses='BAT2' ,berat,0))-sum(if(proses='BAT2' ,berat_kosong,0))) as brtkain_BAT2,
	sum(if(proses='SCO1' ,berat,0)) as berat_SCO1,
	sum(if(proses='SCO1' ,berat_kosong,0)) as berat_kosong_SCO1,
	(sum(if(proses='SCO1' ,berat,0))-sum(if(proses='SCO1' ,berat_kosong,0))) as brtkain_SCO1,
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
	sum(if(proses='DYE2' ,berat,0)) as berat_DYE2,
	sum(if(proses='DYE2' ,berat_kosong,0)) as berat_kosong_DYE2,
	round(sum(if(proses='DYE2' ,berat,0))-sum(if(proses='DYE2' ,berat_kosong,0)),2) as brtkain_DYE2,
	sum(if(proses='OVN1' ,berat,0)) as berat_OVN1,
	sum(if(proses='OVN1' ,berat_kosong,0)) as berat_kosong_OVN1,
	(sum(if(proses='OVN1' ,berat,0))-sum(if(proses='OVN1' ,berat_kosong,0))) as brtkain_OVN1,
	sum(if(proses='OVD1' ,berat,0)) as berat_OVD1,
	sum(if(proses='OVD1' ,berat_kosong,0)) as berat_kosong_OVD1,
	(sum(if(proses='OVD1' ,berat,0))-sum(if(proses='OVD1' ,berat_kosong,0))) as brtkain_OVD1,
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
	sum(if(proses='INS3' ,berat,0)) as berat_INS3,
	sum(if(proses='INS3' ,berat_kosong,0)) as berat_kosong_INS3,
	(sum(if(proses='INS3' ,berat,0))-sum(if(proses='INS3' ,berat_kosong,0))) as brtkain_INS3,
	no_demand,
	ket
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
group by
	kp.no_demand
order by kp.prod_order DESC
LIMIT 300
		";	
		}else{
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
	before1.brtkain_PRE1 as bPRE1,
	after1.brtkain_PRE1 as aPRE1,
	before1.brtkain_SUE1 as bSUE1,
	after1.brtkain_SUE1 as aSUE1,
	before1.brtkain_SUE1 as bSUE1,
	after1.brtkain_SUE1 as aSUE1,
	before1.brtkain_SUE2 as bSUE2,
	after1.brtkain_SUE2 as aSUE2,
	before1.brtkain_SUE3 as bSUE3,
	after1.brtkain_SUE3 as aSUE3,
	before1.brtkain_SUE4 as bSUE4,
	after1.brtkain_SUE4 as aSUE4,
	before1.brtkain_RSE2 as bRSE2,
	after1.brtkain_RSE2 as aRSE2,
	before1.brtkain_RSE4 as bRSE4,
	after1.brtkain_RSE4 as aRSE4,
	before1.brtkain_RSE5 as bRSE5,
	after1.brtkain_RSE5 as aRSE5,
	before1.brtkain_FIN1 as bFIN1,
	after1.brtkain_FIN1 as aFIN1,
	before1.brtkain_SHR3 as bSHR3,
	after1.brtkain_SHR3 as aSHR3,
	before1.brtkain_SHR4 as bSHR4,
	after1.brtkain_SHR4 as aSHR4,
	before1.brtkain_FNJ1 as bFNJ1,
	after1.brtkain_FNJ1 as aFNJ1,
	before1.brtkain_INS3 as bINS3,
	after1.brtkain_INS3 as aINS3,	
	round(after1.brtkain_BAT2-after1.brtkain_BAT2,2) as BAT2,
	if(before1.brtkain_SCO1>0,(after1.brtkain_BAT2-before1.brtkain_SCO1),0) as SCO1,
	if(before1.brtkain_DYE2>0,(after1.brtkain_BAT2-before1.brtkain_DYE2),0) as DYE2,
	if(before1.brtkain_OPW1>0,(after1.brtkain_BAT2-before1.brtkain_OPW1),0) as OPW1,
	if(after1.brtkain_OVN1>0,(before1.brtkain_SCO1-after1.brtkain_OVN1),0) as OVN1,
	if(after1.brtkain_OVD1>0,(before1.brtkain_SCO1-after1.brtkain_OVD1),0) as OVD1,	
	(before1.brtkain_SCO1-after1.brtkain_PRE1) as PRE1,
	(before1.brtkain_SUE1-after1.brtkain_SUE1) as SUE1,
	(before1.brtkain_SUE2-after1.brtkain_SUE2) as FIN1,
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
	sum(if(proses='BAT2' ,berat,0)) as berat_BAT2,
	sum(if(proses='BAT2' ,berat_kosong,0)) as berat_kosong_BAT2,
	(sum(if(proses='BAT2' ,berat,0))-sum(if(proses='BAT2' ,berat_kosong,0))) as brtkain_BAT2,
	sum(if(proses='SCO1' ,berat,0)) as berat_SCO1,
	sum(if(proses='SCO1' ,berat_kosong,0)) as berat_kosong_SCO1,
	(sum(if(proses='SCO1' ,berat,0))-sum(if(proses='SCO1' ,berat_kosong,0))) as brtkain_SCO1,
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
	sum(if(proses='DYE2' ,berat,0)) as berat_DYE2,
	sum(if(proses='DYE2' ,berat_kosong,0)) as berat_kosong_DYE2,
	round(sum(if(proses='DYE2' ,berat,0))-sum(if(proses='DYE2' ,berat_kosong,0)),2) as brtkain_DYE2,
	sum(if(proses='OVN1' ,berat,0)) as berat_OVN1,
	sum(if(proses='OVN1' ,berat_kosong,0)) as berat_kosong_OVN1,
	(sum(if(proses='OVN1' ,berat,0))-sum(if(proses='OVN1' ,berat_kosong,0))) as brtkain_OVN1,
	sum(if(proses='OVD1' ,berat,0)) as berat_OVD1,
	sum(if(proses='OVD1' ,berat_kosong,0)) as berat_kosong_OVD1,
	(sum(if(proses='OVD1' ,berat,0))-sum(if(proses='OVD1' ,berat_kosong,0))) as brtkain_OVD1,
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
	sum(if(proses='INS3' ,berat,0)) as berat_INS3,
	sum(if(proses='INS3' ,berat_kosong,0)) as berat_kosong_INS3,
	(sum(if(proses='INS3' ,berat,0))-sum(if(proses='INS3' ,berat_kosong,0))) as brtkain_INS3,
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
	sum(if(proses='BAT2' ,berat,0)) as berat_BAT2,
	sum(if(proses='BAT2' ,berat_kosong,0)) as berat_kosong_BAT2,
	(sum(if(proses='BAT2' ,berat,0))-sum(if(proses='BAT2' ,berat_kosong,0))) as brtkain_BAT2,
	sum(if(proses='SCO1' ,berat,0)) as berat_SCO1,
	sum(if(proses='SCO1' ,berat_kosong,0)) as berat_kosong_SCO1,
	(sum(if(proses='SCO1' ,berat,0))-sum(if(proses='SCO1' ,berat_kosong,0))) as brtkain_SCO1,
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
	sum(if(proses='DYE2' ,berat,0)) as berat_DYE2,
	sum(if(proses='DYE2' ,berat_kosong,0)) as berat_kosong_DYE2,
	round(sum(if(proses='DYE2' ,berat,0))-sum(if(proses='DYE2' ,berat_kosong,0)),2) as brtkain_DYE2,
	sum(if(proses='OVN1' ,berat,0)) as berat_OVN1,
	sum(if(proses='OVN1' ,berat_kosong,0)) as berat_kosong_OVN1,
	(sum(if(proses='OVN1' ,berat,0))-sum(if(proses='OVN1' ,berat_kosong,0))) as brtkain_OVN1,
	sum(if(proses='OVD1' ,berat,0)) as berat_OVD1,
	sum(if(proses='OVD1' ,berat_kosong,0)) as berat_kosong_OVD1,
	(sum(if(proses='OVD1' ,berat,0))-sum(if(proses='OVD1' ,berat_kosong,0))) as brtkain_OVD1,
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
	sum(if(proses='INS3' ,berat,0)) as berat_INS3,
	sum(if(proses='INS3' ,berat_kosong,0)) as berat_kosong_INS3,
	(sum(if(proses='INS3' ,berat,0))-sum(if(proses='INS3' ,berat_kosong,0))) as brtkain_INS3,
	no_demand,
	ket
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
$where1 $where2 $where3 $where4		
group by
	kp.no_demand
order by kp.prod_order DESC
		 ";	
		}
		
		$sql = mysqli_query($conr,$query);
		while ($r=mysqli_fetch_array($sql)){   
			
//	    $sql_ITXVIEWKK  = db2_exec($conn1, "SELECT
//                                            TRIM(PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE,
//                                            TRIM(DEAMAND) AS DEMAND,
//                                            ORIGDLVSALORDERLINEORDERLINE,
//                                            PROJECTCODE,
//                                            ORDPRNCUSTOMERSUPPLIERCODE,
//                                            TRIM(SUBCODE01) AS SUBCODE01, TRIM(SUBCODE02) AS SUBCODE02, TRIM(SUBCODE03) AS SUBCODE03, TRIM(SUBCODE04) AS SUBCODE04,
//                                            TRIM(SUBCODE05) AS SUBCODE05, TRIM(SUBCODE06) AS SUBCODE06, TRIM(SUBCODE07) AS SUBCODE07, TRIM(SUBCODE08) AS SUBCODE08,
//                                            TRIM(SUBCODE09) AS SUBCODE09, TRIM(SUBCODE10) AS SUBCODE10, 
//                                            TRIM(ITEMTYPEAFICODE) AS ITEMTYPEAFICODE,
//                                            TRIM(DSUBCODE05) AS NO_WARNA,
//                                            TRIM(DSUBCODE02) || '-' || TRIM(DSUBCODE03)  AS NO_HANGER,
//                                            TRIM(ITEMDESCRIPTION) AS ITEMDESCRIPTION,
//                                            DELIVERYDATE,
//                                            LOT
//                                        FROM 
//                                            ITXVIEWKK 
//                                        WHERE 
//                                            PRODUCTIONORDERCODE = '".$r['prdorder']."' AND DEAMAND = '".$r['demandno']."'");
//    $dt_ITXVIEWKK	= db2_fetch_assoc($sql_ITXVIEWKK);
//
//    $sql_pelanggan_buyer 	= db2_exec($conn1, "SELECT TRIM(LANGGANAN) AS PELANGGAN, TRIM(BUYER) AS BUYER FROM ITXVIEW_PELANGGAN 
//                                                        WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$dt_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' AND CODE = '$dt_ITXVIEWKK[PROJECTCODE]'");
//    $dt_pelanggan_buyer		= db2_fetch_assoc($sql_pelanggan_buyer);
//	$sql_warna		= db2_exec($conn1, "SELECT DISTINCT TRIM(WARNA) AS WARNA FROM ITXVIEWCOLOR 
//                                            WHERE ITEMTYPECODE = '$dt_ITXVIEWKK[ITEMTYPEAFICODE]' 
//                                            AND SUBCODE01 = '$dt_ITXVIEWKK[SUBCODE01]' 
//                                            AND SUBCODE02 = '$dt_ITXVIEWKK[SUBCODE02]'
//                                            AND SUBCODE03 = '$dt_ITXVIEWKK[SUBCODE03]' 
//                                            AND SUBCODE04 = '$dt_ITXVIEWKK[SUBCODE04]'
//                                            AND SUBCODE05 = '$dt_ITXVIEWKK[SUBCODE05]' 
//                                            AND SUBCODE06 = '$dt_ITXVIEWKK[SUBCODE06]'
//                                            AND SUBCODE07 = '$dt_ITXVIEWKK[SUBCODE07]' 
//                                            AND SUBCODE08 = '$dt_ITXVIEWKK[SUBCODE08]'
//                                            AND SUBCODE09 = '$dt_ITXVIEWKK[SUBCODE09]' 
//                                            AND SUBCODE10 = '$dt_ITXVIEWKK[SUBCODE10]'");
//    $dt_warna		= db2_fetch_assoc($sql_warna);
//	$sql_roll		= db2_exec($conn1, "SELECT count(*) AS ROLL, sum(s2.USERPRIMARYQUANTITY) AS BERAT, s2.PRODUCTIONORDERCODE
//                FROM STOCKTRANSACTION s2 
//                WHERE s2.ITEMTYPECODE ='KGF' AND s2.PRODUCTIONORDERCODE = '".$r['prdorder']."'
//                GROUP BY s2.PRODUCTIONORDERCODE");
//    $dt_roll   		= db2_fetch_assoc($sql_roll);	
			
			
//	if($r['pelanggan']==""){
//	$query1 = "UPDATE kain_proses SET 
//	pelanggan='".trim($dt_pelanggan_buyer['PELANGGAN'])."',
//	warna='".trim($dt_warna['WARNA'])."',
//	lot='".trim($dt_ITXVIEWKK['LOT'])."'
//	WHERE no_demand='".$r['demandno']."' ";	
//	$sql1 = mysqli_query($conr,$query1);	
//	}
//$sqlto = "SELECT 
//ELEMENTSINSPECTION.DEMANDCODE,
//ELEMENTSINSPECTION.OPERATORCODE,
//ELEMENTSINSPECTION.INSPECTIONSTATION,
//ELEMENTSINSPECTION.LENGTHUOMCODE,
//A.TGL_AWAL_INSPEK,
//A.JAM_AWAL_INSPEK,
//B.TGL_AKHIR_INSPEK,
//B.JAM_AKHIR_INSPEK,
//COUNT(ELEMENTSINSPECTION.ELEMENTCODE) AS TOTAL_ROLL,
//SUM(ELEMENTSINSPECTION.WEIGHTGROSS) AS TOTAL_KG,
//SUM(ELEMENTSINSPECTION.LENGTHGROSS) AS TOTAL_YARD
//FROM ELEMENTSINSPECTION ELEMENTSINSPECTION 
//LEFT JOIN
//	(SELECT
//	ELEMENTSINSPECTION.DEMANDCODE,
//	ELEMENTSINSPECTION.OPERATORCODE,
//	LEFT(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,10) AS TGL_AWAL_INSPEK,
//	SUBSTR(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,12,5) AS JAM_AWAL_INSPEK
//	FROM ELEMENTSINSPECTION ELEMENTSINSPECTION 
//	WHERE ELEMENTSINSPECTION.DEMANDCODE ='".$r['demandno']."'
//	AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13
//	ORDER BY ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME ASC LIMIT 1) A
//ON ELEMENTSINSPECTION.DEMANDCODE = A.DEMANDCODE AND 
//ELEMENTSINSPECTION.OPERATORCODE = A.OPERATORCODE
//LEFT JOIN
//	(SELECT
//	ELEMENTSINSPECTION.DEMANDCODE,
//	ELEMENTSINSPECTION.OPERATORCODE,
//	LEFT(ELEMENTSINSPECTION.INSPECTIONENDDATETIME,10) AS TGL_AKHIR_INSPEK,
//	SUBSTR(ELEMENTSINSPECTION.INSPECTIONENDDATETIME,12,5) AS JAM_AKHIR_INSPEK
//	FROM ELEMENTSINSPECTION ELEMENTSINSPECTION 
//	WHERE ELEMENTSINSPECTION.DEMANDCODE ='".$r['demandno']."'
//	AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13
//	ORDER BY ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME DESC LIMIT 1) B
//ON ELEMENTSINSPECTION.DEMANDCODE = B.DEMANDCODE AND 
//ELEMENTSINSPECTION.OPERATORCODE = B.OPERATORCODE
//WHERE ELEMENTSINSPECTION.DEMANDCODE ='".$r['demandno']."'
//AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13	
//GROUP BY 
//ELEMENTSINSPECTION.DEMANDCODE,
//ELEMENTSINSPECTION.OPERATORCODE,
//ELEMENTSINSPECTION.INSPECTIONSTATION,
//ELEMENTSINSPECTION.LENGTHUOMCODE,
//A.TGL_AWAL_INSPEK,
//A.JAM_AWAL_INSPEK,
//B.TGL_AKHIR_INSPEK,
//B.JAM_AKHIR_INSPEK";
			
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
      ?>
      <tr>
        <td align="left" ><?php echo $r['pelanggan']; ?></td>
        <td align="left" ><?php echo $r['warna']; ?></td>
        <td ><?php echo $r['no_hanger']; ?></td>
        <td ><?php echo $r['rol_bagi']; ?></td>
        <td align="right" ><?php echo round($r['bagi_kain'],2); ?></td>
        <td ><?php echo $r['lot']; ?></td>
        <td ><?php echo $r['demandno']; ?></td>
        <td ><?php echo $r['prdorder']; ?></td>
        <td align="center" ><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php if($r['brtkain_BAT2']>0){ echo $r['brtkain_BAT2']; }else { echo "0"; } ?>"><?php if($r['BAT2']!=""){ echo round($r['bagi_kain']-$r['brtkain_BAT2'],2); }else{ echo "0"; }  ?></span></td>
        <td align="center" ><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php if($r['brtkain_SCO1']>0){ echo $r['brtkain_SCO1']; }else { echo "0"; } ?>"><?php if($r['SCO1']>0){ echo $r['SCO1']; }else{ echo "0"; }  ?></span></td>
        <td align="center"><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php if($r['brtkain_DYE2']>0){ echo $r['brtkain_DYE2']; }else{ echo "0"; } ?>"><?php if($r['DYE2']>0){ echo $r['DYE2']; } else{ echo "0"; } ?></span></td>
        <td align="center" ><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo $r['brtkain_OPW1']; ?>"><?php if($r['OPW1']!=""){echo $r['OPW1'];}else{echo "0";} ?></span></td>
        <td align="center"><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo $r['brtkain_OVN1']; ?>"><?php if($r['OVN1']!=""){echo $r['OVN1'];}else{echo "0";} ?></span></td>
        <td align="center" ><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo $r['brtkain_OVD1']; ?>"><?php if($r['OVD1']!=""){echo $r['OVD1'];}else{echo "0";} ?></span></td>
        <td align="center" ><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSCO1']." After: ".$r['aPRE1']; ?>"><?php if($r['PRE1']!=""){echo $r['PRE1'];}else{echo "0";} ?></span></td>
        <td align="center" ><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSUE1']." After: ".$r['aSUE1']; ?>"><?php if($r['SUE1']!=""){echo $r['SUE1'];}else{echo "0";} ?></span></td>
        <td align="center" ><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSUE2']." After: ".$r['aSUE2']; ?>"><?php if($r['SUE2']!=""){echo $r['SUE2'];}else{echo "0";} ?></span></td>
        <td align="center" ><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSUE3']." After: ".$r['aSUE3']; ?>"><?php if($r['SUE3']!=""){echo $r['SUE3'];}else{echo "0";} ?></span></td>
        <td align="center" ><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSUE4']." After: ".$r['aSUE4']; ?>"><?php if($r['SUE4']!=""){echo $r['SUE4'];}else{echo "0";} ?></span></td>
        <td align="center" ><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bRSE2']." After: ".$r['aRSE2']; ?>"><?php if($r['RSE2']!=""){echo $r['RSE2'];}else{echo "0";} ?></span></td>
        <td align="center" ><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bRSE4']." After: ".$r['aRSE4']; ?>"><?php if($r['RSE4']!=""){echo $r['RSE4'];}else{echo "0";} ?></span></td>
        <td align="center" ><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bRSE5']." After: ".$r['aRSE5']; ?>"><?php if($r['RSE5']!=""){echo $r['RSE5'];}else{echo "0";} ?></span></td>
        <td align="center"><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bRSE4']." After: ".$r['aRSE4']; ?>"><?php if($r['RSE4']!=""){echo $r['RSE4'];}else{echo "0";} ?></span></td>
        <td align="center"><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bFIN1']." After: ".$r['aFIN1']; ?>"><?php if($r['FIN1']!=""){echo $r['FIN1'];}else{echo "0";} ?></span></td>
        <td align="center"><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSHR4']." After: ".$r['aSHR4']; ?>"><?php if($r['SHR4']!=""){echo $r['SHR4'];}else{echo "0";} ?></span></td>
        <td align="center"><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bSHR3']." After: ".$r['aSHR3']; ?>"><?php if($r['SHR3']!=""){echo $r['SHR3'];}else{echo "0";} ?></span></td>
        <td align="center"><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bFNJ1']." After: ".$r['aFNJ1']; ?>"><?php if($r['FNJ1']!=""){echo $r['FNJ1'];}else{echo "0";} ?></span></td>
        <td align="center"><span class="" id="" data-toggle="tooltip" data-html="true" title="<?php echo "Before: ".$r['bINS3']." After: ".$r['aINS3']; ?>"><?php if($r['INS3']!=""){echo $r['INS3'];}else{echo "0";} ?></span></td>
        <td align="center"><?php if($r['INS3']!=""){echo number_format($r['aINS3']-$rowto['TOTAL_KG'],2);}else{echo "0";} ?></td>
        <td align="center"><?php if($r['bagi_kain']>0 and $rowto['TOTAL_KG']>0) {echo (round($r['bagi_kain'],2)-$rowto['TOTAL_KG']);}else{echo "0";} ?></td>
        <td align="center"><?php if($rowto['TOTAL_ROLL']>0){echo $rowto['TOTAL_ROLL'];}else{echo "0";} ?></td>
        <td align="center"><?php if($rowto['TOTAL_KG']>0){echo $rowto['TOTAL_KG'];}else{echo "0";} ?></td>
        <td align="center"><?php if($rowto['TOTAL_KG']>0){echo round((round($r['bagi_kain'],2)-$rowto['TOTAL_KG'])/$rowto['TOTAL_KG'],4)*10;}else {echo "0";} ?></td>
        <td ><?php echo $r['demandno']; ?></td>
        <td align="center">&nbsp;</td>
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