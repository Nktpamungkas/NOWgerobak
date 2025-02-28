<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=laporankain.xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
ini_set("error_reporting", 0);
session_start();
include "../../koneksi.php";
$NoDemand 	= isset($_GET['demand']) ? $_GET['demand'] : '';
$ProdOrder	= isset($_GET['prod']) ? $_GET['prod'] : '';
$NoHanger	= isset($_GET['hanger']) ? $_GET['hanger'] : '';
$Packing	= isset($_GET['packing']) ? $_GET['packing'] : '';

?>
  <table border="1">
    <thead>
      <tr>
        <th rowspan="2">Pelanggan</th>
        <th rowspan="2">Warna</th>
        <th rowspan="2">No Hanger</th>
        <th rowspan="2">Roll Bagi Kain</th>
        <th rowspan="2">Bagi Kain</th>
        <th rowspan="2">Lot</th>
        <th rowspan="2">Prod. Demand</th>
        <th rowspan="2">Prod. Order</th>
        <th colspan="54">POTONG KAIN (KG)</th>
        <th rowspan="2">TOTAL</th>
        <th rowspan="2">ROLL</th>
        <th rowspan="2">PACKING</th>
        <th rowspan="2">LOSS %</th>
        <th rowspan="2">Original PD</th>
        <th rowspan="2">Ket Salinan</th>
      </tr>
      <tr>
        <th>BAT2</th>
        <th>SCO1</th>
        <th>RLX1</th>
        <th>CBL1</th>
        <th>DYE1</th>
        <th>DYE2</th>
        <th>DYE4</th>
        <th>FEW1</th>
        <th>FIX1</th>
        <th>HEW1</th>
        <th>LVL1</th>
        <th>RDC1</th>
        <th>SOA1</th>
        <th>SOF1</th>
        <th>STR1</th>
        <th>NCP1</th>
        <th>CUR1</th>
        <th>ROT1</th>
        <th>TDR1</th>
        <th>COM2</th>
        <th>SUE1 </th>
        <th>SUE2</th>
        <th>SUE3</th>
        <th>SUE4</th>
        <th>RSE2</th>
        <th>RSE4</th>
        <th>RSE5</th>
        <th>SHR3</th>
        <th>SHR4</th>
        <th>STM1</th>
        <th>PAD1</th>
        <th>PAD2</th>
        <th>PRE1</th>
        <th>OVN1</th>
        <th>OVN2</th>
        <th>OVN4</th>
        <th>OVB1</th>
        <th>OVB2</th>
        <th>OVD1</th>
        <th>OVD2</th>
        <th>FNU1</th>
        <th>FNU2</th>
        <th>CPD1</th>
        <th>CPT1</th>
        <th>FIN1</th>
        <th>BLD1</th>
        <th>FNJ1</th>
        <th>FNJ2</th>
        <th>FNJ3</th>
        <th>CNP1</th>
        <th>INS2</th>
        <th>INS3</th>
        <th>INS7</th>
        <th>PACK</th>
        </tr>
    </thead>
    <tbody>
      <?php   		
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
<?php if($Packing=="sudah"){ 
	  if($rowto['TOTAL_KG']>0){?> 		
      <tr>
        <td ><?php echo $r['pelanggan']; ?></td>
        <td ><?php echo $r['warna']; ?></td>
        <td ><?php echo $r['no_hanger']; ?></td>
        <td ><?php echo $r['rol_bagi']; ?></td>
        <td align="right" ><?php echo round($r['bagi_kain'],2); ?></td>
        <td>`<?php echo $r['lot']; ?></td>
        <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?php echo $r['demandno']; ?>&prod_order=<?php echo $r['prdorder']; ?>">`<?php echo $r['demandno']; ?></a></td>
        <td>`<?php echo $r['prdorder']; ?></td>
        <td><?php if($r['bagi_kain']>0 and $r['aBAT2']>0){ echo round($r['bagi_kain']-$r['aBAT2'],2); }else{ echo "0"; }  ?></td>
        <td><?php if($r['bSCO1']>0){ echo $r['bSCO1']-$r['bSCO1']; }else{ echo "0"; }  ?></td>
        <td><?php if($r['bRLX1']>0){ echo $r['bRLX1']-$r['bRLX1'];}else{echo "0";} ?></td>
        <td><?php if($r['bCBL1']>0){ echo $r['bCBL1']-$r['bCBL1'];}else{echo "0";} ?></td>
        <td><?php if($r['bDYE1']>0){ echo $r['bDYE1']-$r['bDYE1']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bDYE2']>0){ echo $r['bDYE2']-$r['bDYE2']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bDYE4']>0){ echo $r['bDYE4']-$r['bDYE4']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bFEW1']>0){ echo $r['bFEW1']-$r['bFEW1'];}else{echo "0";} ?></td>
        <td><?php if($r['bFIX1']>0){ echo $r['bFIX1']-$r['bFIX1'];}else{echo "0";} ?></td>
        <td><?php if($r['bHEW1']>0){ echo $r['bHEW1']-$r['bHEW1'];}else{echo "0";} ?></td>
        <td><?php if($r['bLVL1']>0){ echo $r['bLVL1']-$r['bLVL1'];}else{echo "0";} ?></td>
        <td><?php if($r['bRDC1']>0){ echo $r['bRDC1']-$r['bRDC1'];}else{echo "0";} ?></td>
        <td><?php if($r['bSOA1']>0){ echo $r['bSOA1']-$r['bSOA1'];}else{echo "0";} ?></td>
        <td><?php if($r['bSOF1']>0){ echo $r['bSOF1']-$r['bSOF1'];}else{echo "0";} ?></td>
        <td><?php if($r['bSTR1']>0){ echo $r['bSTR1']-$r['bSTR1'];}else{echo "0";} ?></td>
        <td><?php if($r['bNCP1']>0 and $r['aNCP1']>0){echo $r['bNCP1']-$r['aNCP1'];}else{echo "0";} ?></td>
        <td><?php if($r['bCUR1']>0 and $r['aCUR1']>0){echo $r['bCUR1']-$r['aCUR1'];}else{echo "0";} ?></td>
        <td><?php if($r['bROT1']>0 and $r['aROT1']>0){echo $r['bROT1']-$r['aROT1'];}else{echo "0";} ?></td>
        <td><?php if($r['bTDR1']>0 and $r['aTDR1']>0){echo $r['bTDR1']-$r['aTDR1'];}else{echo "0";} ?></td>
        <td><?php if($r['bCOM1']>0 and $r['aCOM1']>0){echo $r['bCOM1']-$r['aCOM1'];}else{echo "0";} ?></td>
        <td><?php if($r['bSUE1']>0 and $r['aSUE1']>0){echo $r['bSUE1']-$r['aSUE1'];}else{echo "0";} ?></td>
        <td><?php if($r['bSUE2']>0 and $r['aSUE2']>0){echo $r['bSUE2']-$r['aSUE2'];}else{echo "0";} ?></td>
        <td><?php if($r['bSUE3']>0 and $r['aSUE3']>0){echo $r['bSUE3']-$r['aSUE3'];}else{echo "0";} ?></td>
        <td><?php if($r['bSUE4']>0 and $r['aSUE4']>0){echo $r['bSUE4']-$r['aSUE4'];}else{echo "0";} ?></td>
        <td><?php if($r['bRSE2']>0 and $r['aRSE2']>0){echo $r['bRSE2']-$r['aRSE2'];}else{echo "0";} ?></td>
        <td><?php if($r['bRSE4']>0 and $r['aRSE4']>0){echo $r['bRSE4']-$r['aRSE4'];}else{echo "0";} ?></td>
        <td><?php if($r['bRSE5']>0 and $r['aRSE5']>0){echo $r['bRSE5']-$r['aRSE5'];}else{echo "0";} ?></td>
        <td><?php if($r['bSHR3']>0 and $r['aSHR3']>0){echo $r['bSHR3']-$r['aSHR3'];}else{echo "0";} ?></td>
        <td><?php if($r['bSHR4']>0 and $r['aSHR4']>0){echo $r['bSHR4']-$r['aSHR4'];}else{echo "0";} ?></td>
        <td><?php if($r['bSTM1']>0 and $r['aSTM1']>0){echo $r['bSTM1']-$r['aSTM1'];}else{echo "0";} ?></td>
        <td><?php if($r['bPAD1']>0 and $r['aPAD1']>0){echo $r['bPAD1']-$r['aPAD1'];}else{echo "0";} ?></td>
        <td><?php if($r['bPAD2']>0 and $r['aPAD2']>0){echo $r['bPAD2']-$r['aPAD2'];}else{echo "0";} ?></td>
        <td><?php if($r['bSCO1']>0 and $r['aPRE1']>0){echo $r['bSCO1']-$r['aPRE1'];}else{echo "0";} ?></td>
        <td><?php if(($r['bDYE1']+$r['bDYE2']+$r['bDYE3']+$r['bDYE4']+$r['bDYE5']+$r['bDYE6'])>0 and $r['aOVN1']>0){ echo ($r['bDYE1']+$r['bDYE2']+$r['bDYE3']+$r['bDYE4']+$r['bDYE5']+$r['bDYE6'])-$r['aOVN1']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bDYE2']>0 and $r['aOVN2']>0){ echo $r['bDYE2']-$r['aOVN2']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bDYE2']>0 and $r['aOVN4']>0){ echo $r['bDYE2']-$r['aOVN4']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bOVB1']>0 and $r['aOVB1']>0){ echo $r['bOVB1']-$r['aOVB1']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bOVB2']>0 and $r['aOVB2']>0){ echo $r['bOVB2']-$r['aOVB2']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bOVD1']>0 and $r['aOVD1']>0){ echo $r['bOVD1']-$r['aOVD1']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bOVD2']>0 and $r['aOVD2']>0){ echo $r['bOVD2']-$r['aOVD2']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bFNU1']>0 and $r['aFNU1']>0){echo $r['bFNU1']-$r['aFNU1'];}else{echo "0";} ?></td>
        <td><?php if($r['bFNU2']>0 and $r['aFNU2']>0){echo $r['bFNU2']-$r['aFNU2'];}else{echo "0";} ?></td>
        <td><?php if($r['bCPD1']>0 and $r['aCPD1']>0){echo $r['bCPD1']-$r['aCPD1'];}else{echo "0";} ?></td>
        <td><?php if($r['bCPT1']>0 and $r['aCPT1']>0){echo $r['bCPT1']-$r['aCPT1'];}else{echo "0";} ?></td>
        <td><?php if($r['bFIN1']>0 and $r['aFIN1']>0){echo $r['bFIN1']-$r['aFIN1'];}else{echo "0";} ?></td>
        <td><?php if($r['bBLD1']>0 and $r['aBLD1']>0){ echo $r['bBLD1']-$r['aBLD1'];}else{echo "0";} ?></td>
        <td><?php if($r['bFNJ1']>0 and $r['aFNJ1']>0){echo $r['bFNJ1']-$r['aFNJ1'];}else{echo "0";} ?></td>
        <td><?php if($r['bFNJ2']>0 and $r['aFNJ2']>0){echo $r['bFNJ2']-$r['aFNJ2'];}else{echo "0";} ?></td>
        <td><?php if($r['bFNJ3']>0 and $r['aFNJ3']>0){echo $r['bFNJ3']-$r['aFNJ3'];}else{echo "0";} ?></td>
        <td><?php if($r['bCNP1']>0 and $r['aCNP1']>0){echo $r['bCNP1']-$r['aCNP1'];}else{echo "0";} ?></td>
        <td><?php if($r['bINS2']>0 and $r['aINS2']>0){echo $r['bINS2']-$r['aINS2'];}else{echo "0";} ?></td>
        <td><?php if($r['bINS3']>0 and $r['aINS3']>0){echo $r['bINS3']-$r['aINS3'];}else{echo "0";} ?></td>
        <td><?php if($r['bINS7']>0 and $r['aINS7']>0){echo $r['bINS7']-$r['aINS7'];}else{echo "0";} ?></td>
        <td><?php if($r['aINS3']>0 and $rowto['TOTAL_KG']>0){echo number_format($r['aINS3']-$rowto['TOTAL_KG'],2);}else{echo "0";} ?></td>
        <td><?php if($r['bagi_kain']>0 and $rowto['TOTAL_KG']>0) {echo (round($r['bagi_kain'],2)-$rowto['TOTAL_KG']);}else{echo "0";} ?></td>
        <td><?php if($rowto['TOTAL_ROLL']>0){echo $rowto['TOTAL_ROLL'];}else{echo "0";} ?></td>
        <td><?php if($rowto['TOTAL_KG']>0){echo $rowto['TOTAL_KG'];}else{echo "0";} ?></td>
        <td><?php if($rowto['TOTAL_KG']>0){echo round((round($r['bagi_kain'],2)-$rowto['TOTAL_KG'])/$rowto['TOTAL_KG'],4)*10;}else {echo "0";} ?></td>
        <td><?php echo $rowto1['ORIGINALPDCODE']; ?></td>
        <td><?php echo $rowto1['LONGDESCRIPTION']; ?></td>
      </tr>
		<?php }}else{ 
		if($rowto['TOTAL_KG']==0){
		?>
		<tr>
        <td><?php echo $r['pelanggan']; ?></td>
        <td><?php echo $r['warna']; ?></td>
        <td><?php echo $r['no_hanger']; ?></td>
        <td><?php echo $r['rol_bagi']; ?></td>
        <td align="right" ><?php echo round($r['bagi_kain'],2); ?></td>
        <td>`<?php echo $r['lot']; ?></td>
        <td><a target="_BLANK" href="http://online.indotaichen.com/laporan/ppc_filter_steps.php?demand=<?php echo $r['demandno']; ?>&prod_order=<?php echo $r['prdorder']; ?>">`<?php echo $r['demandno']; ?></a></td>
        <td>`<?php echo $r['prdorder']; ?></td>
        <td><?php if($r['bagi_kain']>0 and $r['aBAT2']>0){ echo round($r['bagi_kain']-$r['aBAT2'],2); }else{ echo "0"; }  ?></td>
        <td><?php if($r['bSCO1']>0){ echo $r['bSCO1']-$r['bSCO1']; }else{ echo "0"; }  ?></td>
        <td><?php if($r['bRLX1']>0){ echo $r['bRLX1']-$r['bRLX1'];}else{echo "0";} ?></td>
        <td><?php if($r['bCBL1']>0){ echo $r['bCBL1']-$r['bCBL1'];}else{echo "0";} ?></td>
        <td><?php if($r['bDYE1']>0){ echo $r['bDYE1']-$r['bDYE1']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bDYE2']>0){ echo $r['bDYE2']-$r['bDYE2']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bDYE4']>0){ echo $r['bDYE4']-$r['bDYE4']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bFEW1']>0){ echo $r['bFEW1']-$r['bFEW1'];}else{echo "0";} ?></td>
        <td><?php if($r['bFIX1']>0){ echo $r['bFIX1']-$r['bFIX1'];}else{echo "0";} ?></td>
        <td><?php if($r['bHEW1']>0){ echo $r['bHEW1']-$r['bHEW1'];}else{echo "0";} ?></td>
        <td><?php if($r['bLVL1']>0){ echo $r['bLVL1']-$r['bLVL1'];}else{echo "0";} ?></td>
        <td><?php if($r['bRDC1']>0){ echo $r['bRDC1']-$r['bRDC1'];}else{echo "0";} ?></td>
        <td><?php if($r['bSOA1']>0){ echo $r['bSOA1']-$r['bSOA1'];}else{echo "0";} ?></td>
        <td><?php if($r['bSOF1']>0){ echo $r['bSOF1']-$r['bSOF1'];}else{echo "0";} ?></td>
        <td><?php if($r['bSTR1']>0){ echo $r['bSTR1']-$r['bSTR1'];}else{echo "0";} ?></td>
        <td><?php if($r['bNCP1']>0 and $r['aNCP1']>0){echo $r['bNCP1']-$r['aNCP1'];}else{echo "0";} ?></td>
        <td><?php if($r['bCUR1']>0 and $r['aCUR1']>0){echo $r['bCUR1']-$r['aCUR1'];}else{echo "0";} ?></td>
        <td><?php if($r['bROT1']>0 and $r['aROT1']>0){echo $r['bROT1']-$r['aROT1'];}else{echo "0";} ?></td>
        <td><?php if($r['bRSE4']>0 and $r['aRSE4']>0){echo $r['bRSE4']-$r['aRSE4'];}else{echo "0";} ?></td>
        <td><?php if($r['bCOM1']>0 and $r['aCOM1']>0){echo $r['bCOM1']-$r['aCOM1'];}else{echo "0";} ?></td>
        <td><?php if($r['bSUE1']>0 and $r['aSUE1']>0){echo $r['bSUE1']-$r['aSUE1'];}else{echo "0";} ?></td>
        <td><?php if($r['bSUE2']>0 and $r['aSUE2']>0){echo $r['bSUE2']-$r['aSUE2'];}else{echo "0";} ?></td>
        <td><?php if($r['bSUE3']>0 and $r['aSUE3']>0){echo $r['bSUE3']-$r['aSUE3'];}else{echo "0";} ?></td>
        <td><?php if($r['bSUE4']>0 and $r['aSUE4']>0){echo $r['bSUE4']-$r['aSUE4'];}else{echo "0";} ?></td>
        <td><?php if($r['bRSE2']>0 and $r['aRSE2']>0){echo $r['bRSE2']-$r['aRSE2'];}else{echo "0";} ?></td>
        <td><?php if($r['bRSE4']>0 and $r['aRSE4']>0){echo $r['bRSE4']-$r['aRSE4'];}else{echo "0";} ?></td>
        <td><?php if($r['bRSE5']>0 and $r['aRSE5']>0){echo $r['bRSE5']-$r['aRSE5'];}else{echo "0";} ?></td>
        <td><?php if($r['bSHR3']>0 and $r['aSHR3']>0){echo $r['bSHR3']-$r['aSHR3'];}else{echo "0";} ?></td>
        <td><?php if($r['bSHR4']>0 and $r['aSHR4']>0){echo $r['bSHR4']-$r['aSHR4'];}else{echo "0";} ?></td>
        <td><?php if($r['bSTM1']>0 and $r['aSTM1']>0){echo $r['bSTM1']-$r['aSTM1'];}else{echo "0";} ?></td>
        <td><?php if($r['bPAD1']>0 and $r['aPAD1']>0){echo $r['bPAD1']-$r['aPAD1'];}else{echo "0";} ?></td>
        <td><?php if($r['bPAD2']>0 and $r['aPAD2']>0){echo $r['bPAD2']-$r['aPAD2'];}else{echo "0";} ?></td>
        <td><?php if($r['bSCO1']>0 and $r['aPRE1']>0){echo $r['bSCO1']-$r['aPRE1'];}else{echo "0";} ?></td>
        <td><?php if(($r['bDYE1']+$r['bDYE2']+$r['bDYE3']+$r['bDYE4']+$r['bDYE5']+$r['bDYE6'])>0 and $r['aOVN1']>0){ echo ($r['bDYE1']+$r['bDYE2']+$r['bDYE3']+$r['bDYE4']+$r['bDYE5']+$r['bDYE6'])-$r['aOVN1']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bDYE2']>0 and $r['aOVN2']>0){ echo $r['bDYE2']-$r['aOVN2']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bDYE2']>0 and $r['aOVN4']>0){ echo $r['bDYE2']-$r['aOVN4']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bOVB1']>0 and $r['aOVB1']>0){ echo $r['bOVB1']-$r['aOVB1']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bOVB2']>0 and $r['aOVB2']>0){ echo $r['bOVB2']-$r['aOVB2']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bOVD1']>0 and $r['aOVD1']>0){ echo $r['bOVD1']-$r['aOVD1']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bOVD2']>0 and $r['aOVD2']>0){ echo $r['bOVD2']-$r['aOVD2']; }else{ echo "0"; } ?></td>
        <td><?php if($r['bFNU1']>0 and $r['aFNU1']>0){echo $r['bFNU1']-$r['aFNU1'];}else{echo "0";} ?></td>
        <td><?php if($r['bFNU2']>0 and $r['aFNU2']>0){echo $r['bFNU2']-$r['aFNU2'];}else{echo "0";} ?></td>
        <td><?php if($r['bCPD1']>0 and $r['aCPD1']>0){echo $r['bCPD1']-$r['aCPD1'];}else{echo "0";} ?></td>
        <td><?php if($r['bCPT1']>0 and $r['aCPT1']>0){echo $r['bCPT1']-$r['aCPT1'];}else{echo "0";} ?></td>
        <td><?php if($r['bFIN1']>0 and $r['aFIN1']>0){echo $r['bFIN1']-$r['aFIN1'];}else{echo "0";} ?></td>
        <td><?php if($r['bBLD1']>0 and $r['aBLD1']>0){echo $r['bBLD1']-$r['aBLD1'];}else{echo "0";} ?></td>
        <td><?php if($r['bFNJ1']>0 and $r['aFNJ1']>0){echo $r['bFNJ1']-$r['aFNJ1'];}else{echo "0";} ?></td>
        <td><?php if($r['bFNJ2']>0 and $r['aFNJ2']>0){echo $r['bFNJ2']-$r['aFNJ2'];}else{echo "0";} ?></td>
        <td><?php if($r['bFNJ3']>0 and $r['aFNJ3']>0){echo $r['bFNJ3']-$r['aFNJ3'];}else{echo "0";} ?></td>
        <td><?php if($r['bCNP1']>0 and $r['aCNP1']>0){echo $r['bCNP1']-$r['aCNP1'];}else{echo "0";} ?></td>
        <td><?php if($r['bINS2']>0 and $r['aINS2']>0){echo $r['bINS2']-$r['aINS2'];}else{echo "0";} ?></td>
        <td><?php if($r['bINS3']>0 and $r['aINS3']>0){echo $r['bINS3']-$r['aINS3'];}else{echo "0";} ?></td>
        <td><?php if($r['bINS7']>0 and $r['aINS7']>0){echo $r['bINS7']-$r['aINS7'];}else{echo "0";} ?></td>
        <td><?php if($r['aINS3']>0 and $rowto['TOTAL_KG']>0){echo number_format($r['aINS3']-$rowto['TOTAL_KG'],2);}else{echo "0";} ?></td>
        <td><?php if($r['bagi_kain']>0 and $rowto['TOTAL_KG']>0) {echo (round($r['bagi_kain'],2)-$rowto['TOTAL_KG']);}else{echo "0";} ?></td>
        <td><?php if($rowto['TOTAL_ROLL']>0){echo $rowto['TOTAL_ROLL'];}else{echo "0";} ?></td>
        <td><?php if($rowto['TOTAL_KG']>0){echo $rowto['TOTAL_KG'];}else{echo "0";} ?></td>
        <td><?php if($rowto['TOTAL_KG']>0){echo round((round($r['bagi_kain'],2)-$rowto['TOTAL_KG'])/$rowto['TOTAL_KG'],4)*10;}else {echo "0";} ?></td>
        <td><?php echo $rowto1['ORIGINALPDCODE']; ?></td>
        <td><?php echo $rowto1['LONGDESCRIPTION']; ?></td>
        </tr>
		<?php } }?>
      <?php 
		} 
	  ?>
  </table>