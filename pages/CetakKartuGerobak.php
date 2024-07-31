<?php
// $Demand	= isset($_POST['demand']) ? $_POST['demand'] : '';
$Demand	= isset($_GET['demand']) ? $_GET['demand'] : '';
?>
<!-- Main content -->
      <div class="container-fluid">
		<form role="form" method="post" enctype="multipart/form-data" name="form1">  
		<div class="card card-success">
          <div class="card-header">
            <h3 class="card-title">Filter Data Production Demand</h3>

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
                 	  <input class="form-control form-control-sm" onchange="window.location='CetakKartuGerobak-'+this.value" value="<?php echo $_GET['demand'];?>" type="text" name="demand" id="demand" placeholder="" required>	
				          </div>
            </div>
            <div class="form-group row">
                <label class="col-md-12">*Note : Setelah memasukan Prod. Demand, silahkan di <b>TAB</b> saja. Tidak perlu di <b>ENTER</b>. Terimakasih</label>  
            </div>
            <!-- <button class="btn btn-info" type="submit">Cari Data</button> -->
      </div> 
			  
          </div>		  
		  <!-- /.card-body -->          
        </div>  
			
		<div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Detail Data Production Demand</h3>				 
          </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-sm table-bordered table-striped" style="font-size: 13px; text-align: center;">
                  <thead>
                  <tr>
                    <th rowspan="2" valign="middle" style="text-align: center">No</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Aksi</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Status</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Prod. Demand</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Prod. Order</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Delivery Date</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Customer</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Full Item</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Description</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Color Name</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Project</th>
                    <th colspan="2" valign="middle" style="text-align: center">Qty Bagi Kain</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Status Terakhir</th>
                    <th rowspan="2" valign="middle" style="text-align: center">External Reference</th>
                    <th rowspan="2" valign="middle" style="text-align: center">Internal Reference</th>
                  </tr>
                  <tr>
                    <th valign="middle" style="text-align: center">KG</th>
                    <th valign="middle" style="text-align: center">Yard</th>
                  </tr>
                  </thead>
                  <tbody>
				  <?php
	 
$no=1;   
$c=0;

if($Demand!=''){
$sqlDB2 ="SELECT 
PRODUCTIONDEMAND.CODE,
A.PRODUCTIONORDERCODE,
PRODUCTIONDEMAND.ITEMTYPEAFICODE,
PRODUCTIONDEMAND.SUBCODE01,
PRODUCTIONDEMAND.SUBCODE02,
PRODUCTIONDEMAND.SUBCODE03,
PRODUCTIONDEMAND.SUBCODE04,
PRODUCTIONDEMAND.SUBCODE05,
PRODUCTIONDEMAND.SUBCODE06,
PRODUCTIONDEMAND.SUBCODE07,
PRODUCTIONDEMAND.SUBCODE08,
PRODUCTIONDEMAND.SUBCODE09,
PRODUCTIONDEMAND.SUBCODE10,
PRODUCT.LONGDESCRIPTION AS JENIS_KAIN,
PRODUCTIONDEMAND.PROJECTCODE,
PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE,
PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE,
PRODUCTIONDEMAND.DLVSALORDERLINESALESORDERCODE,
PRODUCTIONDEMAND.DLVSALESORDERLINEORDERLINE,
PRODUCTIONDEMAND.FINALPLANNEDDATE,
PRODUCTIONDEMAND.EXTERNALREFERENCE,
PRODUCTIONDEMAND.INTERNALREFERENCE,
PRODUCTIONDEMAND.USERPRIMARYQUANTITY,
PRODUCTIONDEMAND.USERPRIMARYUOMCODE,
PRODUCTIONDEMAND.USERSECONDARYQUANTITY,
PRODUCTIONDEMAND.USERSECONDARYUOMCODE,
ITXVIEWCOLOR.WARNA, 
SALESORDERDELIVERY.DELIVERYDATE,
  BUSINESSPARTNER.LEGALNAME1 AS LANGGANAN,
  ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER
FROM PRODUCTIONDEMAND PRODUCTIONDEMAND
LEFT JOIN ITXVIEWCOLOR ITXVIEWCOLOR
ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = ITXVIEWCOLOR.ITEMTYPECODE AND 
PRODUCTIONDEMAND.SUBCODE01 = ITXVIEWCOLOR.SUBCODE01 AND 
PRODUCTIONDEMAND.SUBCODE02 = ITXVIEWCOLOR.SUBCODE02 AND 
PRODUCTIONDEMAND.SUBCODE03 = ITXVIEWCOLOR.SUBCODE03 AND 
PRODUCTIONDEMAND.SUBCODE04 = ITXVIEWCOLOR.SUBCODE04 AND 
PRODUCTIONDEMAND.SUBCODE05 = ITXVIEWCOLOR.SUBCODE05 AND 
PRODUCTIONDEMAND.SUBCODE06 = ITXVIEWCOLOR.SUBCODE06 AND 
PRODUCTIONDEMAND.SUBCODE07 = ITXVIEWCOLOR.SUBCODE07 AND 
PRODUCTIONDEMAND.SUBCODE08 = ITXVIEWCOLOR.SUBCODE08 AND 
PRODUCTIONDEMAND.SUBCODE09 = ITXVIEWCOLOR.SUBCODE09 AND 
PRODUCTIONDEMAND.SUBCODE10 = ITXVIEWCOLOR.SUBCODE10
LEFT JOIN PRODUCT PRODUCT 
ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = PRODUCT.ITEMTYPECODE AND 
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
LEFT JOIN (
	SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
	PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
	FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
	GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
	PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
) A ON PRODUCTIONDEMAND.CODE = A.PRODUCTIONDEMANDCODE 
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
WHERE PRODUCTIONDEMAND.CODE='$Demand'";	
	$stmt   = db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
}else{
  $sqlDB2 ="SELECT 
  PRODUCTIONDEMAND.CODE,
  A.PRODUCTIONORDERCODE,
  PRODUCTIONDEMAND.ITEMTYPEAFICODE,
  PRODUCTIONDEMAND.SUBCODE01,
  PRODUCTIONDEMAND.SUBCODE02,
  PRODUCTIONDEMAND.SUBCODE03,
  PRODUCTIONDEMAND.SUBCODE04,
  PRODUCTIONDEMAND.SUBCODE05,
  PRODUCTIONDEMAND.SUBCODE06,
  PRODUCTIONDEMAND.SUBCODE07,
  PRODUCTIONDEMAND.SUBCODE08,
  PRODUCTIONDEMAND.SUBCODE09,
  PRODUCTIONDEMAND.SUBCODE10,
  PRODUCT.LONGDESCRIPTION AS JENIS_KAIN,
  PRODUCTIONDEMAND.PROJECTCODE,
  PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE,
  PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE,  
  PRODUCTIONDEMAND.DLVSALORDERLINESALESORDERCODE,
  PRODUCTIONDEMAND.DLVSALESORDERLINEORDERLINE,
  PRODUCTIONDEMAND.FINALPLANNEDDATE,
  PRODUCTIONDEMAND.EXTERNALREFERENCE,
  PRODUCTIONDEMAND.INTERNALREFERENCE,
  PRODUCTIONDEMAND.USERPRIMARYQUANTITY,
  PRODUCTIONDEMAND.USERPRIMARYUOMCODE,
  PRODUCTIONDEMAND.USERSECONDARYQUANTITY,
  PRODUCTIONDEMAND.USERSECONDARYUOMCODE,
  ITXVIEWCOLOR.WARNA, 
  SALESORDERDELIVERY.DELIVERYDATE,
  BUSINESSPARTNER.LEGALNAME1 AS LANGGANAN,
  ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER
  FROM PRODUCTIONDEMAND PRODUCTIONDEMAND
  LEFT JOIN ITXVIEWCOLOR ITXVIEWCOLOR
  ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = ITXVIEWCOLOR.ITEMTYPECODE AND 
  PRODUCTIONDEMAND.SUBCODE01 = ITXVIEWCOLOR.SUBCODE01 AND 
  PRODUCTIONDEMAND.SUBCODE02 = ITXVIEWCOLOR.SUBCODE02 AND 
  PRODUCTIONDEMAND.SUBCODE03 = ITXVIEWCOLOR.SUBCODE03 AND 
  PRODUCTIONDEMAND.SUBCODE04 = ITXVIEWCOLOR.SUBCODE04 AND 
  PRODUCTIONDEMAND.SUBCODE05 = ITXVIEWCOLOR.SUBCODE05 AND 
  PRODUCTIONDEMAND.SUBCODE06 = ITXVIEWCOLOR.SUBCODE06 AND 
  PRODUCTIONDEMAND.SUBCODE07 = ITXVIEWCOLOR.SUBCODE07 AND 
  PRODUCTIONDEMAND.SUBCODE08 = ITXVIEWCOLOR.SUBCODE08 AND 
  PRODUCTIONDEMAND.SUBCODE09 = ITXVIEWCOLOR.SUBCODE09 AND 
  PRODUCTIONDEMAND.SUBCODE10 = ITXVIEWCOLOR.SUBCODE10
  LEFT JOIN PRODUCT PRODUCT 
  ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = PRODUCT.ITEMTYPECODE AND 
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
  LEFT JOIN (
    SELECT PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
    PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
    FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
    GROUP BY PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
    PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
  ) A ON PRODUCTIONDEMAND.CODE = A.PRODUCTIONDEMANDCODE 
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
  WHERE PRODUCTIONDEMAND.CODE='$Demand'
  ORDER BY PRODUCTIONDEMAND.CODE ASC";	
	$stmt   = db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
}
	//}				  
    while($rowdb2 = db2_fetch_assoc($stmt)){
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

      $q_deteksi_status_close = db2_exec($conn1, "SELECT 
        p.PRODUCTIONORDERCODE AS PRODUCTIONORDERCODE, 
        p.PRODUCTIONDEMANDCODE AS PRODUCTIONDEMANDCODE, 
        p.GROUPSTEPNUMBER AS GROUPSTEPNUMBER
          FROM 
        PRODUCTIONDEMANDSTEP p
          WHERE
        p.PRODUCTIONORDERCODE = '$rowdb2[PRODUCTIONORDERCODE]' AND p.PRODUCTIONDEMANDCODE = '$rowdb2[CODE]'
        AND p.PROGRESSSTATUS = '3' ORDER BY p.GROUPSTEPNUMBER DESC LIMIT 1");
      $row_status_close = db2_fetch_assoc($q_deteksi_status_close);

      $q_StatusTerakhir = db2_exec($conn1, "SELECT 
      p.PRODUCTIONORDERCODE, 
      p.PRODUCTIONDEMANDCODE, 
      p.GROUPSTEPNUMBER, 
      p.OPERATIONCODE, 
      p.LONGDESCRIPTION AS LONGDESCRIPTION, 
      CASE
          WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
          WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
          WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
          WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
      END AS STATUS_OPERATION,
      wc.LONGDESCRIPTION AS DEPT, 
      p.WORKCENTERCODE
  FROM 
      PRODUCTIONDEMANDSTEP p
  LEFT JOIN WORKCENTER wc ON wc.CODE = p.WORKCENTERCODE
  WHERE 
      p.PRODUCTIONORDERCODE = '$row_status_close[PRODUCTIONORDERCODE]' AND p.PRODUCTIONDEMANDCODE = '$row_status_close[PRODUCTIONDEMANDCODE]' 
      AND (p.PROGRESSSTATUS = '0' OR p.PROGRESSSTATUS = '1' OR p.PROGRESSSTATUS ='2') 
      AND p.GROUPSTEPNUMBER > '$row_status_close[GROUPSTEPNUMBER]'
  ORDER BY p.GROUPSTEPNUMBER ASC LIMIT 1");
  $rowST = db2_fetch_assoc($q_StatusTerakhir);

  $sqlPOrder=db2_exec($conn1,"SELECT PRODUCTIONORDER.CODE, PRODUCTIONORDER.PROGRESSSTATUS FROM PRODUCTIONORDER PRODUCTIONORDER
  WHERE PRODUCTIONORDER.CODE='$row_status_close[PRODUCTIONORDERCODE]'");
  $rowPO = db2_fetch_assoc($sqlPOrder);
?>
	  <tr>
	    <td style="text-align: center"><?php echo $no;?></td>
      <td style="text-align: center"><div class="btn-group">
        <!-- <a href="pages/cetak/cetak_kartu_gerobak.php?demand=<?php echo $rowdb2['CODE']; ?>&" target="_blank" class="btn btn-sm btn-danger"><i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="Cetak"></i></a> -->
        <a href="pages/cetak/cetak_kartu_gerobak_salinan.php?demand=<?php echo TRIM($rowdb2['CODE']); ?>&nokk=<?= TRIM($rowdb2['PRODUCTIONORDERCODE']); ?>" target="_blank" class="btn btn-sm btn-warning"><i class="fa fa-print" data-toggle="tooltip" data-placement="top" title="Salinan"></i></a>
      </div>
      </td>
	    <td style="text-align: center"><a href="IdentitasGerobak-<?php echo $rowdb2['CODE']; ?>" class="btn btn-sm btn-success" target="_blank"><i class="fa fa-lightbulb"></i> </a></td>
      <td style="text-align: center"><?php echo $rowdb2['CODE']; ?></td>
      <td style="text-align: center"><?php echo $rowdb2['PRODUCTIONORDERCODE']; ?></td>
      <td style="text-align: center"><?php echo $rowdb2['DELIVERYDATE']; ?></td>
      <td style="text-align: left"><?php echo $rowdb2['LANGGANAN'].'/'.$rowdb2['BUYER']; ?></td>
      <td style="text-align: left"><?php echo $rowdb2['SUBCODE01'].'-'.$rowdb2['SUBCODE02'].'-'.$rowdb2['SUBCODE03'].'-'.$rowdb2['SUBCODE04'].'-'.$rowdb2['SUBCODE05'].'-'.$rowdb2['SUBCODE06'].'-'.$rowdb2['SUBCODE07'].'-'.$rowdb2['SUBCODE08'].'-'.$rowdb2['SUBCODE09'].'-'.$rowdb2['SUBCODE09'].'-'.$rowdb2['SUBCODE10']; ?></td>
      <td style="text-align: left"><?php echo $rowdb2['JENIS_KAIN']; ?></td> 
      <td style="text-align: center"><?php echo $rowdb2['WARNA']; ?></td>
      <td style="text-align: center"><?php echo $rowdb2['ORIGDLVSALORDLINESALORDERCODE']; ?></td>
      <td style="text-align: center"><?php echo number_format($rowBK['USERPRIMARYQUANTITY'],2)." ".$rowBK['USERPRIMARYUOMCODE']; ?></td>
      <td style="text-align: center"><?php echo number_format($rowBK['USERSECONDARYQUANTITY'],2)." ".$rowBK['USERSECONDARYUOMCODE']; ?></td>
      <td style="text-align: center"><?php if($rowPO['PROGRESSSTATUS']!='6' AND $rowST['LONGDESCRIPTION']==''){echo "KK Oke<span class='badge bg-red blink_me'>(Segera Closed Production Order)</span>";}else if($rowPO['PROGRESSSTATUS']=='6' AND $rowST['LONGDESCRIPTION']==''){echo "KK Oke";}else{echo $rowST['LONGDESCRIPTION'];} ?></td>
      <td style="text-align: center"><?php echo $rowdb2['EXTERNALREFERENCE']; ?></td>
      <td style="text-align: center"><?php echo $rowdb2['INTERNALREFERENCE']; ?></td>
    </tr>
	  				  
	<?php 
	 $no++; 
	} ?>
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
<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});

	</script>