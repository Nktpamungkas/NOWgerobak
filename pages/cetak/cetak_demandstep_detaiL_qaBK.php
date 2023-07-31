<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
//--
$demand	= isset($_GET['demand']) ? $_GET['demand'] : '';
  $sqlDB2 = "SELECT 
                  PRODUCTIONDEMAND.CODE, 
                  PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
                  PRODUCTIONDEMAND.FINALPLANNEDDATE, 
                  PRODUCTIONDEMAND.ITEMTYPEAFICODE,
                  TRIM(PRODUCTIONDEMAND.SUBCODE01) AS SUBCODE01, TRIM(PRODUCTIONDEMAND.SUBCODE02) AS SUBCODE02, TRIM(PRODUCTIONDEMAND.SUBCODE03) AS SUBCODE03,
                  TRIM(PRODUCTIONDEMAND.SUBCODE04) AS SUBCODE04, TRIM(PRODUCTIONDEMAND.SUBCODE05) AS SUBCODE05, TRIM(PRODUCTIONDEMAND.SUBCODE06) AS SUBCODE06,
                  TRIM(PRODUCTIONDEMAND.SUBCODE07) AS SUBCODE07, TRIM(PRODUCTIONDEMAND.SUBCODE08) AS SUBCODE08, TRIM(PRODUCTIONDEMAND.SUBCODE09) AS SUBCODE09,
                  TRIM(PRODUCTIONDEMAND.SUBCODE10) AS SUBCODE10, 
                  PRODUCT.LONGDESCRIPTION, 
                  A.WARNA, 
                  PRODUCTIONDEMAND.PROJECTCODE,
                  PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE,
                  PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE, 
                  PRODUCTIONDEMAND.USERPRIMARYQUANTITY,
                  PRODUCTIONDEMAND.USERPRIMARYUOMCODE,
                  PRODUCTIONDEMAND.USERSECONDARYQUANTITY, 
                  PRODUCTIONDEMAND.USERSECONDARYUOMCODE, 
                  SALESORDERDELIVERY.DELIVERYDATE,
                  BUSINESSPARTNER.LEGALNAME1 AS LANGGANAN,
                  ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER
            FROM 
                  PRODUCTIONDEMAND PRODUCTIONDEMAND 
                  LEFT JOIN PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
                  ON PRODUCTIONDEMAND.CODE = PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE 
                  LEFT JOIN PRODUCT PRODUCT ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = PRODUCT.ITEMTYPECODE AND 
                  PRODUCTIONDEMAND.SUBCODE01 = PRODUCT.SUBCODE01 AND 
                  PRODUCTIONDEMAND.SUBCODE02 = PRODUCT.SUBCODE02 AND 
                  PRODUCTIONDEMAND.SUBCODE03 = PRODUCT.SUBCODE03 AND 
                  PRODUCTIONDEMAND.SUBCODE04 = PRODUCT.SUBCODE04 AND 
                  PRODUCTIONDEMAND.SUBCODE05 = PRODUCT.SUBCODE05 AND 
                  PRODUCTIONDEMAND.SUBCODE06 = PRODUCT.SUBCODE06 AND 
                  PRODUCTIONDEMAND.SUBCODE07 = PRODUCT.SUBCODE07 AND 
                  PRODUCTIONDEMAND.SUBCODE08 = PRODUCT.SUBCODE08 AND 
                  PRODUCTIONDEMAND.SUBCODE09 = PRODUCT.SUBCODE09 AND 
                  PRODUCTIONDEMAND.SUBCODE10 = PRODUCT.SUBCODE10
                  LEFT JOIN ITXVIEWCOLOR A ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = A.ITEMTYPECODE AND 
                  PRODUCTIONDEMAND.SUBCODE01 = A.SUBCODE01 AND 
                  PRODUCTIONDEMAND.SUBCODE02 = A.SUBCODE02 AND 
                  PRODUCTIONDEMAND.SUBCODE03 = A.SUBCODE03 AND 
                  PRODUCTIONDEMAND.SUBCODE04 = A.SUBCODE04 AND 
                  PRODUCTIONDEMAND.SUBCODE05 = A.SUBCODE05 AND 
                  PRODUCTIONDEMAND.SUBCODE06 = A.SUBCODE06 AND 
                  PRODUCTIONDEMAND.SUBCODE07 = A.SUBCODE07 AND 
                  PRODUCTIONDEMAND.SUBCODE08 = A.SUBCODE08 AND 
                  PRODUCTIONDEMAND.SUBCODE09 = A.SUBCODE09 AND 
                  PRODUCTIONDEMAND.SUBCODE10 = A.SUBCODE10 
                  LEFT JOIN SALESORDERDELIVERY SALESORDERDELIVERY ON PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE = SALESORDERDELIVERY.SALESORDERLINESALESORDERCODE AND 
                  PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE = SALESORDERDELIVERY.SALESORDERLINEORDERLINE 
                  LEFT JOIN ORDERPARTNER ORDERPARTNER 
                  ON PRODUCTIONDEMAND.CUSTOMERCODE = ORDERPARTNER.CUSTOMERSUPPLIERCODE 
                  LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER 
                  ON ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID = BUSINESSPARTNER.NUMBERID 
                  LEFT JOIN SALESORDER SALESORDER ON 
                  PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE = SALESORDER.CODE 
                  LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON 
                  SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE 
                  AND SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE
            WHERE PRODUCTIONDEMANDSTEP.OPERATIONCODE ='BAT1' 
                  AND PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE ='$demand'";
  $stmt   = db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
  $rowdb2 = db2_fetch_assoc($stmt);

  $sqlBK="SELECT 
                PRODUCTIONORDER.CODE,
                PRODUCTIONRESERVATION.PRODUCTIONORDERCODE,
                PRODUCTIONRESERVATION.ITEMTYPEAFICODE,
                SUM(PRODUCTIONRESERVATION.USEDUSERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY,
                PRODUCTIONRESERVATION.USERPRIMARYUOMCODE,
                SUM(PRODUCTIONRESERVATION.USEDUSERSECONDARYQUANTITY) AS USERSECONDARYQUANTITY,
                PRODUCTIONRESERVATION.USERSECONDARYUOMCODE
          FROM 
                PRODUCTIONORDER PRODUCTIONORDER
                LEFT JOIN PRODUCTIONRESERVATION PRODUCTIONRESERVATION 
                ON PRODUCTIONORDER.CODE = PRODUCTIONRESERVATION.PRODUCTIONORDERCODE 
          WHERE (PRODUCTIONRESERVATION.ITEMTYPEAFICODE ='KGF' OR PRODUCTIONRESERVATION.ITEMTYPEAFICODE ='KFF')
                AND PRODUCTIONORDER.CODE='$rowdb2[PRODUCTIONORDERCODE]'
          GROUP BY 
                PRODUCTIONORDER.CODE,
                PRODUCTIONRESERVATION.PRODUCTIONORDERCODE,
                PRODUCTIONRESERVATION.ITEMTYPEAFICODE,
                PRODUCTIONRESERVATION.USERPRIMARYUOMCODE,
                PRODUCTIONRESERVATION.USERSECONDARYUOMCODE";	
  $stmt1   = db2_exec($conn1,$sqlBK, array('cursor'=>DB2_SCROLLABLE));	
  $rowBK = db2_fetch_assoc($stmt1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="styles_cetak.css" rel="stylesheet" type="text/css">
  <title>Cetak Detail Demand Step</title>
  <script>
  </script>
  <style>
    .table-list {
      clear: both;
      text-align: left;
      border-collapse: collapse;
      margin: 0px 0px 0px 5px;
      background: #fff;
    }

    .table-list td {
      color: #333;
      font-size: 12px;
      border-color: #fff;
      border-collapse: collapse;
      vertical-align: center;
      padding: 3px 5px;
      border-bottom: 1px #000000 solid;
      border-left: 1px #000000 solid;
      border-right: 1px #000000 solid;
    }

    .table-list1 {
      clear: both;
      text-align: left;
      border-collapse: collapse;
      margin: 0px 0px 5px 0px;
      background: #fff;
    }
     .table-list1 td {
      color: #333;
      font-size: 14px;
      border-color: #fff;
      border-collapse: collapse;
      vertical-align: center;
      padding: 1px 3px;
      border-bottom: 0px #000000 solid;
      border-top: 0px #000000 solid;
      border-left: 0px #000000 solid;
      border-right: 0px #000000 solid;
    }
  </style>
</head>
<body>
<table width="100%" border="0" class="table-list1">
  <tr>
    <td width="100%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid;" valign="middle" align="center"><strong><font size="+2" >DETAIL DEMAND STEP</font></strong></td>
  </tr>
</table>
<br>
<table width="100%" border="0" class="table-list1">
  <tr>
    <td width="10%" style="font-size:11px;" align="left"><strong>Prod. Demand</strong></td>
    <td width="20%" style="font-size:18px;" align="left"><strong><?php echo $_GET['demand'];?></strong></td>
    <td width="10%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid;" align="left">&nbsp;</td>
    <td width="10%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid; font-size:11px;" align="left"><strong>Delivery Date</strong></td>
    <td width="2%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid; font-size:11px;" align="center">:</td>
    <td width="15%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid; font-size:11px;" align="left"><strong><?php if($rowdb2['DELIVERYDATE']!=""){echo $rowdb2['DELIVERYDATE'];}?></strong></td>
  </tr>
  <tr>
    <td width="10%" style="font-size:11px;" align="left"><strong>Customer</strong></td>
    <td width="20%" style="font-size:11px;" align="left"><strong><?php echo $rowdb2['LANGGANAN']."/".$rowdb2['BUYER'];?></strong></td>
    <td width="10%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid;" align="left">&nbsp;</td>
    <td width="10%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid; font-size:11px;" align="left"><strong>Full Item</strong></td>
    <td width="2%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid; font-size:11px;" align="center">:</td>
    <td width="15%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid; font-size:11px;" align="left"><strong><?php echo $rowdb2['SUBCODE01']."-".$rowdb2['SUBCODE02']."-".$rowdb2['SUBCODE03']."-".$rowdb2['SUBCODE04']."-".$rowdb2['SUBCODE05']."-".$rowdb2['SUBCODE06']."-".$rowdb2['SUBCODE07']."-".$rowdb2['SUBCODE08']."-".$rowdb2['SUBCODE09']."-".$rowdb2['SUBCODE10'];?></strong></td>
  </tr>
  <tr>
    <td width="10%" style="font-size:11px;" align="left"><strong>Description</strong></td>
    <td width="20%" style="font-size:11px;" align="left"><strong><?php echo $rowdb2['LONGDESCRIPTION'];?></strong></td>
    <td width="10%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid;" align="left">&nbsp;</td>
    <td width="10%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid; font-size:11px;" align="left"><strong>Color Name</strong></td>
    <td width="2%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid; font-size:11px;" align="center">:</td>
    <td width="15%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid; font-size:11px;" align="left"><strong><?php if($rowdb2['WARNA']!=""){echo $rowdb2['WARNA'];}?></strong></td>
  </tr>
  <tr>
    <td width="10%" style="font-size:11px;" align="left"><strong>Project</strong></td>
    <td width="20%" style="font-size:11px;" align="left"><strong><?php if($rowdb2['ORIGDLVSALORDLINESALORDERCODE']!=""){echo $rowdb2['ORIGDLVSALORDLINESALORDERCODE'];}?></strong></td>
    <td width="10%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid;" align="left">&nbsp;</td>
    <td width="10%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid; font-size:11px;" align="left"><strong>Quantity</strong></td>
    <td width="2%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid; font-size:11px;" align="center">:</td>
    <td width="15%" style="border-bottom:0px #000000 solid; border-top:0px #000000 solid; border-right:0px #000000 solid; border-left:0px #000000 solid; font-size:11px;" align="left"><strong><?php echo number_format($rowBK['USERPRIMARYQUANTITY'],2); ?>&nbsp;&nbsp;<?php echo $rowBK['USERPRIMARYUOMCODE']; ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php echo number_format($rowBK['USERSECONDARYQUANTITY'],2); ?>&nbsp;&nbsp;<?php echo $rowBK['USERSECONDARYUOMCODE']; ?></strong></td>
  </tr>
</table>
<!-- /.card-body -->
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
<table id="example3" border="1" class="table-list" style="font-size:13px;">
        <thead>
        <tr>
          <!-- <th style="text-align: center" rowspan="2">#</th> -->
          <th style="text-align: center" rowspan="2">Group Step</th>
          <th style="text-align: center" rowspan="2">Step Type</th>
          <th style="text-align: center" rowspan="2">Prod. Order</th>
          <th style="text-align: center" rowspan="2">Workcenter</th>
          <th style="text-align: center" rowspan="2">Operation</th>
          <th style="text-align: center" colspan="2">Tgl Progress</th>
          <th style="text-align: center" rowspan="2">Description</th>
          <th style="text-align: center" rowspan="2">Progress Status</th>
          </tr>       
        <tr>
          <th style="text-align: center">Start</th>
          <th style="text-align: center">End</th>
          </tr>
           </thead>
        <tbody>
  </div> 
<?php	 
 $no=1;   
   $c=0;
    //$sqlDB22 = " SELECT * FROM ELEMENTSINSPECTION WHERE NUMBERGROUPSHIFT='1' AND NUMBERSHIFT='1' AND LENGTH(TRIM(ELEMENTCODE))= 13 $Where $Where1 ";
  $sqlr="SELECT DISTINCT 
                PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
                PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE,
                PRODUCTIONDEMANDSTEP.GROUPSTEPNUMBER,
                PRODUCTIONDEMANDSTEP.STEPNUMBER,
                CASE 
                  WHEN PRODUCTIONDEMANDSTEP.STEPTYPE ='0' THEN 'Normal'
                  WHEN PRODUCTIONDEMANDSTEP.STEPTYPE ='1' THEN 'Re-Operation'
                  WHEN PRODUCTIONDEMANDSTEP.STEPTYPE ='2' THEN 'Unscheduled'
                  WHEN PRODUCTIONDEMANDSTEP.STEPTYPE ='3' THEN 'Additional'
                  ELSE ''
                END AS STEPTYPE,
                PRODUCTIONDEMANDSTEP.WORKCENTERCODE,
                PRODUCTIONDEMANDSTEP.OPERATIONCODE,
                OPERATION.LONGDESCRIPTION AS DESKRIPSI,
                CASE 
                  WHEN PRODUCTIONDEMANDSTEP.PROGRESSSTATUS ='0' THEN 'Entered'
                  WHEN PRODUCTIONDEMANDSTEP.PROGRESSSTATUS ='1' THEN 'Planned'
                  WHEN PRODUCTIONDEMANDSTEP.PROGRESSSTATUS ='2' THEN 'Progress'
                  WHEN PRODUCTIONDEMANDSTEP.PROGRESSSTATUS ='3' THEN 'Closed'
                END AS STATUS,
                QUALITYDOCUMENT.HEADERNUMBERID,
                QUALITYDOCUMENT.HEADERDATE,
                QUALITYDOCUMENT.SUBCODE01,
                QUALITYDOCUMENT.SUBCODE02,
                QUALITYDOCUMENT.SUBCODE03,
                QUALITYDOCUMENT.SUBCODE04,
                QUALITYDOCUMENT.SUBCODE05,
                QUALITYDOCUMENT.SUBCODE06,
                LISTAGG(CONCAT(CONCAT(TRIM(QUALITYDOCLINE.LINE), ' : '), QUALITYDOCLINE.CHARACTERISTICCODE),
            ' - ') AS QA_DATA
              FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
                LEFT JOIN OPERATION OPERATION ON 
                PRODUCTIONDEMANDSTEP.OPERATIONCODE = OPERATION.CODE
                LEFT JOIN QUALITYDOCUMENT QUALITYDOCUMENT ON 
                PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE = QUALITYDOCUMENT.PRODUCTIONORDERCODE
                AND PRODUCTIONDEMANDSTEP.WORKCENTERCODE = QUALITYDOCUMENT.WORKCENTERCODE 
                AND PRODUCTIONDEMANDSTEP.OPERATIONCODE = QUALITYDOCUMENT.OPERATIONCODE 
                LEFT JOIN QUALITYDOCLINE QUALITYDOCLINE ON
            QUALITYDOCUMENT.HEADERLINE = QUALITYDOCLINE.QUALITYDOCUMENTHEADERLINE
                WHERE PRODUCTIONDEMANDCODE ='$rowdb2[CODE]'
                GROUP BY 
                PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
                PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE,
                PRODUCTIONDEMANDSTEP.GROUPSTEPNUMBER,
              PRODUCTIONDEMANDSTEP.STEPNUMBER,
                PRODUCTIONDEMANDSTEP.STEPTYPE,
                PRODUCTIONDEMANDSTEP.WORKCENTERCODE,
                PRODUCTIONDEMANDSTEP.OPERATIONCODE,
                OPERATION.LONGDESCRIPTION,
                PRODUCTIONDEMANDSTEP.PROGRESSSTATUS,
                QUALITYDOCUMENT.HEADERNUMBERID, 
                QUALITYDOCUMENT.HEADERDATE,
                QUALITYDOCUMENT.SUBCODE01,
                QUALITYDOCUMENT.SUBCODE02,
                QUALITYDOCUMENT.SUBCODE03,
                QUALITYDOCUMENT.SUBCODE04,
                QUALITYDOCUMENT.SUBCODE05,
                QUALITYDOCUMENT.SUBCODE06
                ORDER BY PRODUCTIONDEMANDSTEP.GROUPSTEPNUMBER ASC";
    $stmt2   = db2_exec($conn1,$sqlr, array('cursor'=>DB2_SCROLLABLE));
    while($row1 = db2_fetch_assoc($stmt2)){	
      //START DATE
      $sqldtl="SELECT 
                  p.PROPROGRESSPROGRESSNUMBER,
                  p.DEMANDSTEPSTEPNUMBER,
                  LISTAGG(p2.PROGRESSSTARTPROCESSDATE || ' ' || PROGRESSSTARTPROCESSTIME , ',') AS MULAI
              FROM PRODUCTIONPROGRESSSTEPUPDATED p
              RIGHT JOIN PRODUCTIONPROGRESS p2 ON p2.PROGRESSNUMBER = p.PROPROGRESSPROGRESSNUMBER AND 
                         p2.PROGRESSTEMPLATECODE = 'S01'
              WHERE p.DEMANDSTEPPRODUCTIONDEMANDCODE = '$row1[PRODUCTIONDEMANDCODE]' AND 
                    p.DEMANDSTEPSTEPNUMBER = '$row1[STEPNUMBER]'
              GROUP BY 
                  p.PROPROGRESSPROGRESSNUMBER,
                  p.DEMANDSTEPSTEPNUMBER";
       $stmt3   = db2_exec($conn1,$sqldtl, array('cursor'=>DB2_SCROLLABLE));
       $rdtl = db2_fetch_assoc($stmt3);

      //END DATE
      $sqldtl2="SELECT 
                    p.PROPROGRESSPROGRESSNUMBER,
                    p.DEMANDSTEPSTEPNUMBER,
                    LISTAGG(p2.PROGRESSENDDATE || ' ' || PROGRESSENDTIME , ',') AS SELESAI
                FROM PRODUCTIONPROGRESSSTEPUPDATED p
                RIGHT JOIN PRODUCTIONPROGRESS p2 ON p2.PROGRESSNUMBER = p.PROPROGRESSPROGRESSNUMBER AND p2.PROGRESSTEMPLATECODE = 'E01'
                WHERE p.DEMANDSTEPPRODUCTIONDEMANDCODE = '$row1[PRODUCTIONDEMANDCODE]' AND p.DEMANDSTEPSTEPNUMBER = '$row1[STEPNUMBER]'
                GROUP BY 
                    p.PROPROGRESSPROGRESSNUMBER,
                    p.DEMANDSTEPSTEPNUMBER";
      $stmt4   = db2_exec($conn1,$sqldtl2, array('cursor'=>DB2_SCROLLABLE));
      $rdtl2 = db2_fetch_assoc($stmt4);

    //   //DETAIL QA DATA
    // $sqlQAD="SELECT DISTINCT
    //                       	p.PRODUCTIONDEMANDCODE,
    //                         QUALITYDOClINE.LINE,
    //                         QUALITYCHARACTERISTICTYPE.LONGDESCRIPTION                         
    //                       FROM 
    //                         QUALITYDOCUMENT QUALITYDOCUMENT
    //                       LEFT JOIN QUALITYDOCLINE QUALITYDOCLINE ON 
    //                           QUALITYDOCUMENT.HEADERNUMBERID = QUALITYDOCLINE.QUALITYDOCUMENTHEADERNUMBERID 
    //                         AND QUALITYDOCUMENT.HEADERLINE = QUALITYDOCLINE.QUALITYDOCUMENTHEADERLINE
    //                       LEFT JOIN QUALITYCHARACTERISTICTYPE QUALITYCHARACTERISTICTYPE ON 
    //                         QUALITYDOClINE.CHARACTERISTICCODE = QUALITYCHARACTERISTICTYPE.CODE
    //                       LEFT JOIN PRODUCTIONDEMANDSTEP p ON
    //                       QUALITYDOCUMENT.PRODUCTIONORDERCODE = p.PRODUCTIONORDERCODE 
    //                       AND QUALITYDOCUMENT.WORKCENTERCODE = p.WORKCENTERCODE 
    //                       AND QUALITYDOCUMENT.OPERATIONCODE = p.OPERATIONCODE 
    //                       WHERE                    
    //                       QUALITYDOCUMENT.OPERATIONCODE='$row1[OPERATIONCODE]' 
    //                       AND QUALITYDOCUMENT.WORKCENTERCODE =' $row1[WORKCENTERCODE]' 
    //                       AND QUALITYDOClINE.QUALITYDOCPRODUCTIONORDERCODE ='$row1[PRODUCTIONORDERCODE]'
    //                       AND p.STEPNUMBER = '$row1[STEPNUMBER]'
    //                       AND p.PRODUCTIONDEMANDCODE = '$rowdb2[CODE]'
    //                       ORDER BY
    //                       QUALITYDOClINE.LINE ASC";
    //  $stmt5   = db2_exec($conn1,$sqlQAD, array('cursor'=>DB2_SCROLLABLE));
    //  $rQAD = db2_fetch_assoc($stmt5);
?>
    <tr>
      <!-- <td align="center" width="1%" rowspan='2'><?php echo $no; ?></td> -->
	    <td align="center" width="3%" rowspan = '2'><?php echo $row1['GROUPSTEPNUMBER']; ?></td>
      <td align="center" width="3%"><?php echo $row1['STEPTYPE']; ?></td>
      <td align="center" width="3%"><?php echo $row1['PRODUCTIONORDERCODE']; ?></td>
      <td align="center" width="3%"><?php echo $row1['WORKCENTERCODE']; ?></td>
      <td align="center" width="3%"><?php echo $row1['OPERATIONCODE']; ?></td>
      <td align="center" width="6%"><?php echo $rdtl['MULAI']; ?></td>
      <td align="center" width="6%"><?php echo $rdtl2['SELESAI']; ?></td>
      <td align="center" width="5%"><?php echo $row1['DESKRIPSI']; ?></td>
      <td align="center" width="5%"><?php echo $row1['STATUS']; ?></td>
    </tr>
    <tr>
    <div><td colspan="16"><STRONG>QA DATA  =</STRONG> <?php echo $row1['QA_DATA']; ?></td></div>
      </tr>  
    <?php	$no++;} ?>
  </tbody>
</table>
  <br />
</body>
</html>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>	
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
	$(function () {
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
function checkAll(form1){
    for (var i=0;i<document.forms['form1'].elements.length;i++)
    {
        var e=document.forms['form1'].elements[i];
        if ((e.name !='allbox') && (e.type=='checkbox'))
        {
            e.checked=document.forms['form1'].allbox.checked;
			
        }
    }
}
</script>