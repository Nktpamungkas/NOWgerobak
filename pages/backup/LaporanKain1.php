<?php 
ini_set("error_reporting", 0);
$NoDemand 	= isset($_POST['nodemand']) ? $_POST['nodemand'] : '';
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
  <table id="example1" class="table table-sm table-bordered table-striped" style="font-size: 13px; text-align: center;">
    <thead>
      <tr>
        <th valign="middle" style="text-align: center">Pelanggan</th>
        <th valign="middle" style="text-align: center">Warna</th>
        <th valign="middle" style="text-align: center">Roll Bagi Kain</th>
        <th valign="middle" style="text-align: center">Bagi Kain</th>
        <th valign="middle" style="text-align: center">Lot</th>
        <th valign="middle" style="text-align: center">Prod. Demand</th>
        <th valign="middle" style="text-align: center">Prod. Order</th>
        <th valign="middle" style="text-align: center">BAT2</th>
        <th valign="middle" style="text-align: center">SCO1</th>
        <th valign="middle" style="text-align: center">PRE</th>
        <th valign="middle" style="text-align: center">SUE </th>
        <th valign="middle" style="text-align: center">RSE</th>
        <th valign="middle" style="text-align: center">DYE2</th>
        <th valign="middle" style="text-align: center">OPW</th>
        <th valign="middle" style="text-align: center">OVN1</th>
        <th valign="middle" style="text-align: center">RSE4</th>
        <th valign="middle" style="text-align: center">FIN1</th>
        <th valign="middle" style="text-align: center">SHR4</th>
        <th valign="middle" style="text-align: center">SHR3</th>
        <th valign="middle" style="text-align: center">FNJ1</th>
        <th valign="middle" style="text-align: center">INS3</th>
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
		if($NoDemand=="" and $ProdOrder==""){
		$query = " 
		select
	kp.no_demand as demandno,
	kp.prod_order as prdorder,
	kp.pelanggan,
	kp.warna,
	kp.lot,
	abs(before1.brtkain_BAT2-after1.brtkain_BAT2) as BAT2,
	abs(before1.brtkain_SCO1-after1.brtkain_SCO1) as SCO1,
	abs(before1.brtkain_DYE2-after1.brtkain_BAT2) as DYE2,
	abs(before1.brtkain_OVN1-after1.brtkain_OVN1) as OVN1,
	abs(before1.brtkain_RSE4-after1.brtkain_RSE4) as RSE4,
	abs(before1.brtkain_FIN1-after1.brtkain_FIN1) as FIN1,
	abs(before1.brtkain_SHR4-after1.brtkain_SHR4) as SHR4,
	abs(before1.brtkain_SHR3-after1.brtkain_SHR3) as SHR3,
	abs(before1.brtkain_PNJ1-after1.brtkain_PNJ1) as PNJ1,
	abs(before1.brtkain_INS1-after1.brtkain_INS1) as INS1
from
	kain_proses kp left join (
select
	sum(if(proses='BAT2' ,berat,0)) as berat_BAT2,
	sum(if(proses='BAT2' ,berat_kosong,0)) as berat_kosong_BAT2,
	(sum(if(proses='BAT2' ,berat,0))-sum(if(proses='BAT2' ,berat_kosong,0))) as brtkain_BAT2,
	sum(if(proses='SCO1' ,berat,0)) as berat_SCO1,
	sum(if(proses='SCO1' ,berat_kosong,0)) as berat_kosong_SCO1,
	(sum(if(proses='SCO1' ,berat,0))-sum(if(proses='SCO1' ,berat_kosong,0))) as brtkain_SCO1,
	sum(if(proses='DYE2' ,berat,0)) as berat_DYE2,
	sum(if(proses='DYE2' ,berat_kosong,0)) as berat_kosong_DYE2,
	(sum(if(proses='DYE2' ,berat,0))-sum(if(proses='DYE2' ,berat_kosong,0))) as brtkain_DYE2,
	sum(if(proses='OVN1' ,berat,0)) as berat_OVN1,
	sum(if(proses='OVN1' ,berat_kosong,0)) as berat_kosong_OVN1,
	(sum(if(proses='OVN1' ,berat,0))-sum(if(proses='OVN1' ,berat_kosong,0))) as brtkain_OVN1,
	sum(if(proses='RSE4' ,berat,0)) as berat_RSE4,
	sum(if(proses='RSE4' ,berat_kosong,0)) as berat_kosong_RSE4,
	(sum(if(proses='RSE4' ,berat,0))-sum(if(proses='RSE4' ,berat_kosong,0))) as brtkain_RSE4,
	sum(if(proses='FIN1' ,berat,0)) as berat_FIN1,
	sum(if(proses='FIN1' ,berat_kosong,0)) as berat_kosong_FIN1,
	(sum(if(proses='FIN1' ,berat,0))-sum(if(proses='FIN1' ,berat_kosong,0))) as brtkain_FIN1,
	sum(if(proses='SHR4' ,berat,0)) as berat_SHR4,
	sum(if(proses='SHR4' ,berat_kosong,0)) as berat_kosong_SHR4,
	(sum(if(proses='SHR4' ,berat,0))-sum(if(proses='SHR4' ,berat_kosong,0))) as brtkain_SHR4,
	sum(if(proses='SHR3' ,berat,0)) as berat_SHR3,
	sum(if(proses='SHR3' ,berat_kosong,0)) as berat_kosong_SHR3,
	(sum(if(proses='SHR3' ,berat,0))-sum(if(proses='SHR3' ,berat_kosong,0))) as brtkain_SHR3,
	sum(if(proses='PNJ1' ,berat,0)) as berat_PNJ1,
	sum(if(proses='PNJ1' ,berat_kosong,0)) as berat_kosong_PNJ1,
	(sum(if(proses='PNJ1' ,berat,0))-sum(if(proses='PNJ1' ,berat_kosong,0))) as brtkain_PNJ1,
	sum(if(proses='INS1' ,berat,0)) as berat_INS1,
	sum(if(proses='INS1' ,berat_kosong,0)) as berat_kosong_INS1,
	(sum(if(proses='INS1' ,berat,0))-sum(if(proses='INS1' ,berat_kosong,0))) as brtkain_INS1,
	no_demand,
	ket
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
	sum(if(proses='DYE2' ,berat,0)) as berat_DYE2,
	sum(if(proses='DYE2' ,berat_kosong,0)) as berat_kosong_DYE2,
	(sum(if(proses='DYE2' ,berat,0))-sum(if(proses='DYE2' ,berat_kosong,0))) as brtkain_DYE2,
	sum(if(proses='OVN1' ,berat,0)) as berat_OVN1,
	sum(if(proses='OVN1' ,berat_kosong,0)) as berat_kosong_OVN1,
	(sum(if(proses='OVN1' ,berat,0))-sum(if(proses='OVN1' ,berat_kosong,0))) as brtkain_OVN1,
	sum(if(proses='RSE4' ,berat,0)) as berat_RSE4,
	sum(if(proses='RSE4' ,berat_kosong,0)) as berat_kosong_RSE4,
	(sum(if(proses='RSE4' ,berat,0))-sum(if(proses='RSE4' ,berat_kosong,0))) as brtkain_RSE4,
	sum(if(proses='FIN1' ,berat,0)) as berat_FIN1,
	sum(if(proses='FIN1' ,berat_kosong,0)) as berat_kosong_FIN1,
	(sum(if(proses='FIN1' ,berat,0))-sum(if(proses='FIN1' ,berat_kosong,0))) as brtkain_FIN1,
	sum(if(proses='SHR4' ,berat,0)) as berat_SHR4,
	sum(if(proses='SHR4' ,berat_kosong,0)) as berat_kosong_SHR4,
	(sum(if(proses='SHR4' ,berat,0))-sum(if(proses='SHR4' ,berat_kosong,0))) as brtkain_SHR4,
	sum(if(proses='SHR3' ,berat,0)) as berat_SHR3,
	sum(if(proses='SHR3' ,berat_kosong,0)) as berat_kosong_SHR3,
	(sum(if(proses='SHR3' ,berat,0))-sum(if(proses='SHR3' ,berat_kosong,0))) as brtkain_SHR3,
	sum(if(proses='PNJ1' ,berat,0)) as berat_PNJ1,
	sum(if(proses='PNJ1' ,berat_kosong,0)) as berat_kosong_PNJ1,
	(sum(if(proses='PNJ1' ,berat,0))-sum(if(proses='PNJ1' ,berat_kosong,0))) as brtkain_PNJ1,
	sum(if(proses='INS1' ,berat,0)) as berat_INS1,
	sum(if(proses='INS1' ,berat_kosong,0)) as berat_kosong_INS1,
	(sum(if(proses='INS1' ,berat,0))-sum(if(proses='INS1' ,berat_kosong,0))) as brtkain_INS1,
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
		or kp.ket = 'after') and (isnull(no_hanger) or isnull(pelanggan)) 
group by
	kp.no_demand
		";	
		}else{
		$query = " 
		select
	kp.no_demand as demandno,
	kp.prod_order as prdorder,
	kp.pelanggan,
	kp.warna,
	kp.lot,
	abs(before1.brtkain_BAT2-after1.brtkain_BAT2) as BAT2,
	abs(before1.brtkain_SCO1-after1.brtkain_SCO1) as SCO1,
	abs(before1.brtkain_DYE2-after1.brtkain_BAT2) as DYE2,
	abs(before1.brtkain_OVN1-after1.brtkain_OVN1) as OVN1,
	abs(before1.brtkain_RSE4-after1.brtkain_RSE4) as RSE4,
	abs(before1.brtkain_FIN1-after1.brtkain_FIN1) as FIN1,
	abs(before1.brtkain_SHR4-after1.brtkain_SHR4) as SHR4,
	abs(before1.brtkain_SHR3-after1.brtkain_SHR3) as SHR3,
	abs(before1.brtkain_PNJ1-after1.brtkain_PNJ1) as PNJ1,
	abs(before1.brtkain_INS1-after1.brtkain_INS1) as INS1
from
	kain_proses kp left join (
select
	sum(if(proses='BAT2' ,berat,0)) as berat_BAT2,
	sum(if(proses='BAT2' ,berat_kosong,0)) as berat_kosong_BAT2,
	(sum(if(proses='BAT2' ,berat,0))-sum(if(proses='BAT2' ,berat_kosong,0))) as brtkain_BAT2,
	sum(if(proses='SCO1' ,berat,0)) as berat_SCO1,
	sum(if(proses='SCO1' ,berat_kosong,0)) as berat_kosong_SCO1,
	(sum(if(proses='SCO1' ,berat,0))-sum(if(proses='SCO1' ,berat_kosong,0))) as brtkain_SCO1,
	sum(if(proses='DYE2' ,berat,0)) as berat_DYE2,
	sum(if(proses='DYE2' ,berat_kosong,0)) as berat_kosong_DYE2,
	(sum(if(proses='DYE2' ,berat,0))-sum(if(proses='DYE2' ,berat_kosong,0))) as brtkain_DYE2,
	sum(if(proses='OVN1' ,berat,0)) as berat_OVN1,
	sum(if(proses='OVN1' ,berat_kosong,0)) as berat_kosong_OVN1,
	(sum(if(proses='OVN1' ,berat,0))-sum(if(proses='OVN1' ,berat_kosong,0))) as brtkain_OVN1,
	sum(if(proses='RSE4' ,berat,0)) as berat_RSE4,
	sum(if(proses='RSE4' ,berat_kosong,0)) as berat_kosong_RSE4,
	(sum(if(proses='RSE4' ,berat,0))-sum(if(proses='RSE4' ,berat_kosong,0))) as brtkain_RSE4,
	sum(if(proses='FIN1' ,berat,0)) as berat_FIN1,
	sum(if(proses='FIN1' ,berat_kosong,0)) as berat_kosong_FIN1,
	(sum(if(proses='FIN1' ,berat,0))-sum(if(proses='FIN1' ,berat_kosong,0))) as brtkain_FIN1,
	sum(if(proses='SHR4' ,berat,0)) as berat_SHR4,
	sum(if(proses='SHR4' ,berat_kosong,0)) as berat_kosong_SHR4,
	(sum(if(proses='SHR4' ,berat,0))-sum(if(proses='SHR4' ,berat_kosong,0))) as brtkain_SHR4,
	sum(if(proses='SHR3' ,berat,0)) as berat_SHR3,
	sum(if(proses='SHR3' ,berat_kosong,0)) as berat_kosong_SHR3,
	(sum(if(proses='SHR3' ,berat,0))-sum(if(proses='SHR3' ,berat_kosong,0))) as brtkain_SHR3,
	sum(if(proses='PNJ1' ,berat,0)) as berat_PNJ1,
	sum(if(proses='PNJ1' ,berat_kosong,0)) as berat_kosong_PNJ1,
	(sum(if(proses='PNJ1' ,berat,0))-sum(if(proses='PNJ1' ,berat_kosong,0))) as brtkain_PNJ1,
	sum(if(proses='INS1' ,berat,0)) as berat_INS1,
	sum(if(proses='INS1' ,berat_kosong,0)) as berat_kosong_INS1,
	(sum(if(proses='INS1' ,berat,0))-sum(if(proses='INS1' ,berat_kosong,0))) as brtkain_INS1,
	no_demand,
	ket
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
	sum(if(proses='DYE2' ,berat,0)) as berat_DYE2,
	sum(if(proses='DYE2' ,berat_kosong,0)) as berat_kosong_DYE2,
	(sum(if(proses='DYE2' ,berat,0))-sum(if(proses='DYE2' ,berat_kosong,0))) as brtkain_DYE2,
	sum(if(proses='OVN1' ,berat,0)) as berat_OVN1,
	sum(if(proses='OVN1' ,berat_kosong,0)) as berat_kosong_OVN1,
	(sum(if(proses='OVN1' ,berat,0))-sum(if(proses='OVN1' ,berat_kosong,0))) as brtkain_OVN1,
	sum(if(proses='RSE4' ,berat,0)) as berat_RSE4,
	sum(if(proses='RSE4' ,berat_kosong,0)) as berat_kosong_RSE4,
	(sum(if(proses='RSE4' ,berat,0))-sum(if(proses='RSE4' ,berat_kosong,0))) as brtkain_RSE4,
	sum(if(proses='FIN1' ,berat,0)) as berat_FIN1,
	sum(if(proses='FIN1' ,berat_kosong,0)) as berat_kosong_FIN1,
	(sum(if(proses='FIN1' ,berat,0))-sum(if(proses='FIN1' ,berat_kosong,0))) as brtkain_FIN1,
	sum(if(proses='SHR4' ,berat,0)) as berat_SHR4,
	sum(if(proses='SHR4' ,berat_kosong,0)) as berat_kosong_SHR4,
	(sum(if(proses='SHR4' ,berat,0))-sum(if(proses='SHR4' ,berat_kosong,0))) as brtkain_SHR4,
	sum(if(proses='SHR3' ,berat,0)) as berat_SHR3,
	sum(if(proses='SHR3' ,berat_kosong,0)) as berat_kosong_SHR3,
	(sum(if(proses='SHR3' ,berat,0))-sum(if(proses='SHR3' ,berat_kosong,0))) as brtkain_SHR3,
	sum(if(proses='PNJ1' ,berat,0)) as berat_PNJ1,
	sum(if(proses='PNJ1' ,berat_kosong,0)) as berat_kosong_PNJ1,
	(sum(if(proses='PNJ1' ,berat,0))-sum(if(proses='PNJ1' ,berat_kosong,0))) as brtkain_PNJ1,
	sum(if(proses='INS1' ,berat,0)) as berat_INS1,
	sum(if(proses='INS1' ,berat_kosong,0)) as berat_kosong_INS1,
	(sum(if(proses='INS1' ,berat,0))-sum(if(proses='INS1' ,berat_kosong,0))) as brtkain_INS1,
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
		or kp.ket = 'after') and (isnull(no_hanger) or isnull(pelanggan)) 
$where1 $where2 $where3		
group by
	kp.no_demand
		 ";	
		}
		
		$sql = mysqli_query($conr,$query);
		while ($r=mysqli_fetch_array($sql)){   
			
	    $sql_ITXVIEWKK  = db2_exec($conn1, "SELECT
                                            TRIM(PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE,
                                            TRIM(DEAMAND) AS DEMAND,
                                            ORIGDLVSALORDERLINEORDERLINE,
                                            PROJECTCODE,
                                            ORDPRNCUSTOMERSUPPLIERCODE,
                                            TRIM(SUBCODE01) AS SUBCODE01, TRIM(SUBCODE02) AS SUBCODE02, TRIM(SUBCODE03) AS SUBCODE03, TRIM(SUBCODE04) AS SUBCODE04,
                                            TRIM(SUBCODE05) AS SUBCODE05, TRIM(SUBCODE06) AS SUBCODE06, TRIM(SUBCODE07) AS SUBCODE07, TRIM(SUBCODE08) AS SUBCODE08,
                                            TRIM(SUBCODE09) AS SUBCODE09, TRIM(SUBCODE10) AS SUBCODE10, 
                                            TRIM(ITEMTYPEAFICODE) AS ITEMTYPEAFICODE,
                                            TRIM(DSUBCODE05) AS NO_WARNA,
                                            TRIM(DSUBCODE02) || '-' || TRIM(DSUBCODE03)  AS NO_HANGER,
                                            TRIM(ITEMDESCRIPTION) AS ITEMDESCRIPTION,
                                            DELIVERYDATE,
                                            LOT
                                        FROM 
                                            ITXVIEWKK 
                                        WHERE 
                                            PRODUCTIONORDERCODE = '".$r['prdorder']."' AND DEAMAND = '".$r['demandno']."'");
    $dt_ITXVIEWKK	= db2_fetch_assoc($sql_ITXVIEWKK);

    $sql_pelanggan_buyer 	= db2_exec($conn1, "SELECT TRIM(LANGGANAN) AS PELANGGAN, TRIM(BUYER) AS BUYER FROM ITXVIEW_PELANGGAN 
                                                        WHERE ORDPRNCUSTOMERSUPPLIERCODE = '$dt_ITXVIEWKK[ORDPRNCUSTOMERSUPPLIERCODE]' AND CODE = '$dt_ITXVIEWKK[PROJECTCODE]'");
    $dt_pelanggan_buyer		= db2_fetch_assoc($sql_pelanggan_buyer);
	$sql_warna		= db2_exec($conn1, "SELECT DISTINCT TRIM(WARNA) AS WARNA FROM ITXVIEWCOLOR 
                                            WHERE ITEMTYPECODE = '$dt_ITXVIEWKK[ITEMTYPEAFICODE]' 
                                            AND SUBCODE01 = '$dt_ITXVIEWKK[SUBCODE01]' 
                                            AND SUBCODE02 = '$dt_ITXVIEWKK[SUBCODE02]'
                                            AND SUBCODE03 = '$dt_ITXVIEWKK[SUBCODE03]' 
                                            AND SUBCODE04 = '$dt_ITXVIEWKK[SUBCODE04]'
                                            AND SUBCODE05 = '$dt_ITXVIEWKK[SUBCODE05]' 
                                            AND SUBCODE06 = '$dt_ITXVIEWKK[SUBCODE06]'
                                            AND SUBCODE07 = '$dt_ITXVIEWKK[SUBCODE07]' 
                                            AND SUBCODE08 = '$dt_ITXVIEWKK[SUBCODE08]'
                                            AND SUBCODE09 = '$dt_ITXVIEWKK[SUBCODE09]' 
                                            AND SUBCODE10 = '$dt_ITXVIEWKK[SUBCODE10]'");
    $dt_warna		= db2_fetch_assoc($sql_warna);
	$sql_roll		= db2_exec($conn1, "SELECT count(*) AS ROLL, sum(s2.USERPRIMARYQUANTITY) AS BERAT, s2.PRODUCTIONORDERCODE
                FROM STOCKTRANSACTION s2 
                WHERE s2.ITEMTYPECODE ='KGF' AND s2.PRODUCTIONORDERCODE = '".$r['prdorder']."'
                GROUP BY s2.PRODUCTIONORDERCODE");
    $dt_roll   		= db2_fetch_assoc($sql_roll);	
			
			
//	if($r['pelanggan']==""){
//	$query1 = "UPDATE kain_proses SET 
//	pelanggan='".trim($dt_pelanggan_buyer['PELANGGAN'])."',
//	warna='".trim($dt_warna['WARNA'])."',
//	lot='".trim($dt_ITXVIEWKK['LOT'])."'
//	WHERE no_demand='".$r['demandno']."' ";	
//	$sql1 = mysqli_query($conr,$query1);	
//	}
	if($r['no_hanger']=="" or $r['pelanggan']==""){
	$query1 = "UPDATE kain_proses SET 
	pelanggan='".trim($dt_pelanggan_buyer['PELANGGAN'])."',
	warna='".trim($dt_warna['WARNA'])."',
	lot='".trim($dt_ITXVIEWKK['LOT'])."',
	no_hanger='".trim($dt_ITXVIEWKK['SUBCODE02']).trim($dt_ITXVIEWKK['SUBCODE03'])."',
	rol_bagi='".$dt_roll['ROLL']."',
	bagi_kain='".round($dt_roll['BERAT'],2)."'
	WHERE no_demand='".$r['demandno']."' ";	
	$sql1 = mysqli_query($conr,$query1);	
	}		
      ?>
<!--
      <tr>
        <td align="left" ><?php echo $r['pelanggan']; ?></td>
        <td align="left" ><?php echo $r['warna']; ?></td>
        <td ><?php echo $dt_roll['ROLL']; ?></td>
        <td align="right" ><?php echo round($dt_roll['BERAT'],2); ?></td>
        <td ><?php echo $r['lot']; ?></td>
        <td ><?php echo $r['demandno']; ?></td>
        <td ><?php echo $r['prdorder']; ?></td>
        <td align="center" ><?php echo $r['BAT2']; ?></td>
        <td align="center" ><?php echo $r['SCO1']; ?></td>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        <td align="center" >&nbsp;</td>
        <td align="center"><?php echo $r['DYE2']; ?></td>
        <td align="center" >&nbsp;</td>
        <td align="center"><?php echo $r['OVN1']; ?></td>
        <td align="center"><?php echo $r['RSE4']; ?></td>
        <td align="center"><?php echo $r['FIN1']; ?></td>
        <td align="center"><?php echo $r['SHR4']; ?></td>
        <td align="center"><?php echo $r['SHR3']; ?></td>
        <td align="center"><?php echo $r['FNJ1']; ?></td>
        <td align="center"><?php echo $r['INS3']; ?></td>
        </tr>
-->
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