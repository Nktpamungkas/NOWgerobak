<?php
//$id	= isset($_GET['id']) ? $_GET['id'] : '';
// $DemandP	= isset($_POST['demand']) ? $_POST['demand'] : '';
$demand	= isset($_GET['demand']) ? $_GET['demand'] : '';
  $sqlDB2 = "SELECT PRODUCTIONDEMAND.CODE, PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
  PRODUCTIONDEMAND.FINALPLANNEDDATE, PRODUCTIONDEMAND.ITEMTYPEAFICODE,
  TRIM(PRODUCTIONDEMAND.SUBCODE01) AS SUBCODE01, TRIM(PRODUCTIONDEMAND.SUBCODE02) AS SUBCODE02, TRIM(PRODUCTIONDEMAND.SUBCODE03) AS SUBCODE03,
  TRIM(PRODUCTIONDEMAND.SUBCODE04) AS SUBCODE04, TRIM(PRODUCTIONDEMAND.SUBCODE05) AS SUBCODE05, TRIM(PRODUCTIONDEMAND.SUBCODE06) AS SUBCODE06,
  TRIM(PRODUCTIONDEMAND.SUBCODE07) AS SUBCODE07, TRIM(PRODUCTIONDEMAND.SUBCODE08) AS SUBCODE08, TRIM(PRODUCTIONDEMAND.SUBCODE09) AS SUBCODE09,
  TRIM(PRODUCTIONDEMAND.SUBCODE10) AS SUBCODE10, PRODUCT.LONGDESCRIPTION, A.WARNA, PRODUCTIONDEMAND.PROJECTCODE,
  PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE,
  PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE, 
  PRODUCTIONDEMAND.USERPRIMARYQUANTITY, PRODUCTIONDEMAND.USERPRIMARYUOMCODE,
  PRODUCTIONDEMAND.USERSECONDARYQUANTITY, PRODUCTIONDEMAND.USERSECONDARYUOMCODE, 
  SALESORDERDELIVERY.DELIVERYDATE,
  BUSINESSPARTNER.LEGALNAME1 AS LANGGANAN,
  ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER
  FROM PRODUCTIONDEMAND PRODUCTIONDEMAND LEFT JOIN PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
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
  SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE AND SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE
  WHERE PRODUCTIONDEMANDSTEP.OPERATIONCODE ='BAT1' AND PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE ='$demand'";
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
FROM PRODUCTIONORDER PRODUCTIONORDER
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
<!-- Main content -->
      <div class="container-fluid">
		<form role="form" method="post" enctype="multipart/form-data" name="form1">  
		<div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Identitas Gerobak</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div class="form-group row">
                <label for="demand" class="col-md-1 col-form-label">Prod. Demand</label>  
                    <div class="col-sm-2">
                      <input class="form-control form-control-sm" onchange="window.location='IdentitasGerobak-'+this.value" value="<?php echo $_GET['demand'];?>" type="text" name="demand" id="demand" placeholder="">	
                    </div>	 
              </div>
              <div class="form-group row">
                <label for="deliv" class="col-md-1 col-form-label">Delivery Date</label>  
                    <div class="col-sm-2">
                      <input class="form-control form-control-sm" readonly value="<?php if($rowdb2['DELIVERYDATE']!=""){echo $rowdb2['DELIVERYDATE'];}?>" type="text" name="deliv" id="deliv" placeholder="">	
                    </div>	 
              </div>
              <div class="form-group row">
               <label for="customer" class="col-md-1 col-form-label">Customer</label>  
				          <div class="col-sm-4">
                 	  <input class="form-control form-control-sm" readonly value="<?php echo $rowdb2['LANGGANAN']."/".$rowdb2['BUYER'];?>" type="text" name="customer" id="customer" placeholder="">	
				          </div>	 
              </div>
			        <div class="form-group row">
               <label for="itemcode" class="col-md-1 col-form-label">Full Item</label>  
				          <div class="col-sm-4">
                 	  <input class="form-control form-control-sm" readonly value="<?php echo $rowdb2['SUBCODE01']."-".$rowdb2['SUBCODE02']."-".$rowdb2['SUBCODE03']."-".$rowdb2['SUBCODE04']."-".$rowdb2['SUBCODE05']."-".$rowdb2['SUBCODE06']."-".$rowdb2['SUBCODE07']."-".$rowdb2['SUBCODE08']."-".$rowdb2['SUBCODE09']."-".$rowdb2['SUBCODE10'];?>" type="text" name="itemcode" id="itemcode" placeholder="">	
				          </div>	 
              </div>
              <div class="form-group row">
                <label for="jenis_kain" class="col-md-1 col-form-label">Description</label>  
                  <div class="col-sm-4">
                    <textarea class="form-control form-control-sm" readonly type="text" name="jenis_kain" id="jenis_kain" placeholder=""><?php echo $rowdb2['LONGDESCRIPTION'];?></textarea>	
                  </div>	 
              </div>
              <div class="form-group row">
                <label for="color" class="col-md-1 col-form-label">Color Name</label>  
                  <div class="col-sm-2">
                    <input class="form-control form-control-sm" readonly value="<?php if($rowdb2['WARNA']!=""){echo $rowdb2['WARNA'];}?>" type="text" name="color" id="color" placeholder="">	
                  </div>	 
              </div>
              <div class="form-group row">
                <label for="project" class="col-md-1 col-form-label">Project</label>  
                  <div class="col-sm-2">
                    <input class="form-control form-control-sm" readonly value="<?php if($rowdb2['ORIGDLVSALORDLINESALORDERCODE']!=""){echo $rowdb2['ORIGDLVSALORDLINESALORDERCODE'];}?>" type="text" name="project" id="project" placeholder="">	
                  </div>	 
              </div>
              <div class="form-group row">
                <label for="qty" class="col-sm-1 col-form-label">Quantity</label>
                  <div class="col-sm-2">
                    <input name="qty_prm" type="text" readonly class="form-control form-control-sm" id="qty_prm" value="<?php echo number_format($rowBK['USERPRIMARYQUANTITY'],2); ?>" placeholder="0.00" style="text-align: right;">
                    <input name="qty_scnd" type="text" readonly class="form-control form-control-sm" id="qty_scnd" value="<?php echo number_format($rowBK['USERSECONDARYQUANTITY'],2); ?>" placeholder="0.00" style="text-align: right;">
                  </div>				   
                  <div class="col-sm-1">
                    <input name="satuan_prm" type="text" readonly class="form-control form-control-sm" id="satuan_prm" value="<?php echo $rowBK['USERPRIMARYUOMCODE']; ?>" placeholder="">	
                    <input name="satuan_scnd" type="text" readonly class="form-control form-control-sm" id="satuan_scnd" value="<?php echo $rowBK['USERSECONDARYUOMCODE']; ?>" placeholder="">		
                  </div>				   
              </div>
              <a href="pages/cetak/cetak_kartu_gerobak.php?demand=<?php echo $demand; ?>&" target="_blank" class="btn btn-sm btn-danger <?php if($demand==""){echo "disabled";}?>"><i class="fa fa-print"></i> Cetak Kartu Gerobak</a>	
              <a href="pages/cetak/cetak_kartu_gerobak_salinan.php?demand=<?php echo $demand; ?>&" target="_blank" class="btn btn-sm btn-warning <?php if($demand==""){echo "disabled";}?>"><i class="fa fa-print"></i> Cetak Kartu Gerobak Salinan</a>
              <a href="pages/cetak/cetak_demandstep_detaiL_qa.php?demand=<?php echo $demand; ?>&" target="_blank" class="btn btn-sm btn-success <?php if($demand==""){echo "disabled";}?>"><i class="fa fa-print"></i> Cetak Detail Demand Step</a>	
              <!-- <button class="btn btn-info" type="submit">Cari Data</button>		  -->
        </div>
		  
		  <!-- /.card-body -->
          
        </div> 
		  <div class="card">
              <div class="card-header">
                <h3 class="card-title">Production Demand Step</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
          <table id="example3" class="table table-sm table-bordered table-striped" style="font-size:13px;">
                  <thead>
                  <tr>
                    <th style="text-align: center" rowspan="2">Group Step</th>
                    <th style="text-align: center" rowspan="2">Step Type</th>
                    <th style="text-align: center" rowspan="2">Prod. Order</th>
                    <th style="text-align: center" rowspan="2">Workcenter</th>
                    <th style="text-align: center" rowspan="2">Operation</th>
                    <!-- <th style="text-align: center" colspan="2">Tgl Progress</th> -->
                    <th style="text-align: center" colspan="2">Tgl Progress</th>
                    <th style="text-align: center" rowspan="2">Gerobak</th>
                    <!-- <th style="text-align: center" rowspan="2">Gerobak</th> -->
                    <th style="text-align: center" rowspan="2">QA Data</th>
                    <th style="text-align: center" rowspan="2">Description</th>
                    <th style="text-align: center" rowspan="2">Progress Status</th>
                    </tr>
                    <tr>
                    <!-- <th style="text-align: center">Start</th>
                    <th style="text-align: center">End</th> -->
                    <th style="text-align: center">Start</th>
                    <th style="text-align: center">End</th>
                    </tr>
                  </thead>
                  <tbody>
<?php	
   				  
   $no=1;   
   $c=0;
   //$sqlDB22 = " SELECT * FROM ELEMENTSINSPECTION WHERE NUMBERGROUPSHIFT='1' AND NUMBERSHIFT='1' AND LENGTH(TRIM(ELEMENTCODE))= 13 $Where $Where1 ";
   $sqlr="SELECT 
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
   END AS STATUS
   FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
   LEFT JOIN OPERATION OPERATION ON PRODUCTIONDEMANDSTEP.OPERATIONCODE = OPERATION.CODE
   LEFT JOIN QUALITYDOCUMENT QUALITYDOCUMENT ON PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE = QUALITYDOCUMENT.PRODUCTIONORDERCODE
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
   PRODUCTIONDEMANDSTEP.PROGRESSSTATUS
   ORDER BY PRODUCTIONDEMANDSTEP.GROUPSTEPNUMBER ASC";
$stmt2   = db2_exec($conn1,$sqlr, array('cursor'=>DB2_SCROLLABLE));
    while($row1 = db2_fetch_assoc($stmt2)){	

      //START DATE
      $sqldtl="SELECT 
          p.PROPROGRESSPROGRESSNUMBER,
          p.DEMANDSTEPSTEPNUMBER,
          LISTAGG(p2.PROGRESSSTARTPROCESSDATE || ' ' || PROGRESSSTARTPROCESSTIME , ',') AS MULAI
      FROM PRODUCTIONPROGRESSSTEPUPDATED p
      RIGHT JOIN PRODUCTIONPROGRESS p2 ON p2.PROGRESSNUMBER = p.PROPROGRESSPROGRESSNUMBER AND p2.PROGRESSTEMPLATECODE = 'S01'
      WHERE p.DEMANDSTEPPRODUCTIONDEMANDCODE = '$row1[PRODUCTIONDEMANDCODE]' AND p.DEMANDSTEPSTEPNUMBER = '$row1[STEPNUMBER]'
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

      //GEROBAK
      // $sqlgrb="SELECT
      // QUALITYDOCUMENT.OPERATIONCODE,
      // QUALITYDOCUMENT.WORKCENTERCODE,
      // QUALITYDOClINE.QUALITYDOCPRODUCTIONORDERCODE,
      // LISTAGG(TRIM(QUALITYDOClINE.VALUEQUANTITY),',') AS GEROBAK
      //FROM QUALITYDOCUMENT QUALITYDOCUMENT
      // LEFT JOIN QUALITYDOCLINE QUALITYDOCLINE ON QUALITYDOCUMENT.HEADERNUMBERID = QUALITYDOCLINE.QUALITYDOCUMENTHEADERNUMBERID AND 
      // QUALITYDOCUMENT.HEADERLINE = QUALITYDOCLINE.QUALITYDOCUMENTHEADERLINE AND QUALITYDOCUMENT.PRODUCTIONORDERCODE = QUALITYDOCLINE.QUALITYDOCPRODUCTIONORDERCODE
      // LEFT JOIN QUALITYCHARACTERISTICTYPE QUALITYCHARACTERISTICTYPE ON
      // QUALITYDOClINE.CHARACTERISTICCODE = QUALITYCHARACTERISTICTYPE.CODE
      // WHERE QUALITYDOCUMENT.OPERATIONCODE='$row1[OPERATIONCODE]' AND QUALITYDOCUMENT.WORKCENTERCODE ='$row1[WORKCENTERCODE]' AND
      // QUALITYDOClINE.QUALITYDOCPRODUCTIONORDERCODE ='$row1[PRODUCTIONORDERCODE]' AND QUALITYDOCLINE.VALUEQUANTITY IS NOT NULL AND QUALITYDOCLINE.VALUEQUANTITY <> 0 AND LEFT(QUALITYDOCLINE.CHARACTERISTICCODE,3)='GRB'
      // GROUP BY 
      // QUALITYDOCUMENT.OPERATIONCODE,
      // QUALITYDOCUMENT.WORKCENTERCODE,
      // QUALITYDOClINE.QUALITYDOCPRODUCTIONORDERCODE";
      // $stmt5   = db2_exec($conn1,$sqlgrb, array('cursor'=>DB2_SCROLLABLE));
      // $rgrb = db2_fetch_assoc($stmt5);
?>
	  <tr>
      <td style="text-align: center"><?php echo $row1['GROUPSTEPNUMBER']; ?></td>
      <td style="text-align: center"><?php echo $row1['STEPTYPE']; ?></td>
      <td style="text-align: center"><?php echo $row1['PRODUCTIONORDERCODE']; ?></td>
      <td style="text-align: center"><?php echo $row1['WORKCENTERCODE']; ?></td>
      <td style="text-align: center"><?php echo $row1['OPERATIONCODE']; ?></td>
      <td style="text-align: center"><?php echo $rdtl['MULAI']; ?></td>
      <td style="text-align: center"><?php echo $rdtl2['SELESAI']; ?></td>
      <!-- <td align="center"><a href="#" id='<?php echo $row1['PRODUCTIONORDERCODE']; ?>' wct='<?php echo $row1['WORKCENTERCODE']; ?>' opt='<?php echo $row1['OPERATIONCODE']; ?>' class="btn btn-primary btn-xs detail_timestart"><i class="fa fa-clock"></i></a></td> -->
      <!-- <td align="center"><a href="#" id='<?php echo $row1['PRODUCTIONORDERCODE']; ?>' wct='<?php echo $row1['WORKCENTERCODE']; ?>' opt='<?php echo $row1['OPERATIONCODE']; ?>' class="btn btn-success btn-xs detail_timeend"><i class="fa fa-clock"></i></a></td> -->
      <!-- <td align="center"><a href="#" id='<?php echo $row1['PRODUCTIONORDERCODE']; ?>' wct='<?php echo $row1['WORKCENTERCODE']; ?>' opt='<?php echo $row1['OPERATIONCODE']; ?>' class="btn btn-warning btn-xs detail_gerobak"><i class="fa fa-edit"></i></a></td> -->
      <!-- <td align="center"><a href="#" class="btn btn-primary btn-xs" onClick="window.open('pages/detail-waktu-mulai.php?id=<?php echo $row1['PRODUCTIONORDERCODE']; ?>&wct=<?php echo $row1['WORKCENTERCODE']; ?>&opt=<?php echo $row1['OPERATIONCODE']; ?>','MyWindow','height=400,width=600,top=250,left=530');"><i class="fa fa-clock"></i></a></td> -->
      <!-- <td align="center"><a href="#" class="btn btn-success btn-xs" onClick="window.open('pages/detail-waktu-selesai.php?id=<?php echo $row1['PRODUCTIONORDERCODE']; ?>&wct=<?php echo $row1['WORKCENTERCODE']; ?>&opt=<?php echo $row1['OPERATIONCODE']; ?>','MyWindow','height=400,width=600,top=250,left=530');"><i class="fa fa-clock"></i></a></td> -->
      <td align="center"><a href="#" class="btn btn-warning btn-xs" onClick="window.open('pages/detail-grb.php?id=<?php echo $row1['PRODUCTIONORDERCODE']; ?>&wct=<?php echo $row1['WORKCENTERCODE']; ?>&opt=<?php echo $row1['OPERATIONCODE']; ?>','MyWindow','height=400,width=600,top=250,left=530');"><i class="fa fa-edit"></i></a></td>
      <td align="center"><a href="#" class="btn btn-warning btn-xs" onClick="window.open('pages/detail-qa-data.php?id=<?php echo $row1['PRODUCTIONORDERCODE']; ?>&wct=<?php echo $row1['WORKCENTERCODE']; ?>&opt=<?php echo $row1['OPERATIONCODE']; ?>&gsn=<?php echo $row1['GROUPSTEPNUMBER']; ?>','MyWindow','height=400,width=600,top=250,left=530');"><i class="fa fa-edit"></i></a></td>
      <!-- <td style="text-align: center"><?php echo $rgrb['GEROBAK']; ?></td> -->
      <td style="text-align: center"><?php echo $row1['DESKRIPSI']; ?></td>
      <td style="text-align: center"><?php echo $row1['STATUS']; ?></td>
      </tr>				  
<?php	$no++;} ?>
				  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
        </div>  
		</form>	
</div><!-- /.container-fluid -->
    <!-- /.content -->
<div id="DetailGerobak" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
<div id="DetailQaData" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
<div id="DetailTimeStart" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
<div id="DetailTimeEnd" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
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