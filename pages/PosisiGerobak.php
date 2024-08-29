<?php
ini_set("error_reporting", 1);
session_start();

if($_SESSION['userPRD']==""){
	echo "<script> window.location='login';</script>";
}

$lokasi 	= isset($_POST['lokasi'])?$_POST['lokasi']:'';
$gerobak 	= isset($_POST['no_gerobak'])?$_POST['no_gerobak']:'';
$prod_demand	= isset($_POST['prod_demand'])?$_POST['prod_demand']:'';
?>
<!-- Main content -->
<!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>	
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <script src="plugins/toastr/toastr.min.js"></script>	
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>

      <div class="container-fluid">
		<div class="card card-default">
         
          <!-- /.card-header -->
		  <form method="post" enctype="multipart/form-data" action="" name="form1">
          <div class="card-body">
			<div class="form-group row">
			   <label for="prod_demand" class="col-md-1">Kartu Gerobak</label>  
               <input type="text" class="form-control"  maxlength="8" name="prod_demand" value = "<?php echo $prod_demand; ?>" placeholder="Kartu Gerobak" id="prod_demand" <?php if(empty($prod_demand)){ ?> on autofocus <?php } ?>>			    
            </div>  
			<div class="form-group row">
			   <label for="lokasi" class="col-md-1">Lokasi</label>  
               <input type="text" class="form-control" maxlength="8" name="lokasi" value = "<?php echo $lokasi; ?>" placeholder="Lokasi" id="lokasi" <?php if(empty($lokasi) && empty($prod_demand)){ ?> disabled <?php } ?> on autofocus>			    
            </div>  
            <div class="form-group row"> 
			   <label for="no_gerobak" class="col-md-1">No. Gerobak</label>	
               <input type="text" class="form-control" maxlength="8" name="no_gerobak" value = "<?php echo $gerobak; ?>" placeholder="No. Gerobak" id="no_gerobak" <?php if(empty($gerobak) && empty($lokasi)){ ?> disabled <?php } ?> on autofocus>			    
            </div>	
			<div class="form-group row">  
			<button class="btn btn-primary" type="submit" name="save" value="Save" style="width: 100%;">Save</button>
			</div>  
          </div>
		  </form>
		  <!-- /.card-body -->
          
        </div> 
		     
</div><!-- /.container-fluid -->
    <!-- /.content -->

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
<?php
$NoGerobak		= '0'; 
$LokasiGerobak	= '0';
$KartuGerobak	= '0';
if (!empty($_POST['prod_demand'])) {	
	$sqlDB2 = "SELECT PRODUCTIONDEMAND.CODE, PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
    PRODUCTIONDEMAND.FINALPLANNEDDATE, PRODUCTIONDEMAND.ITEMTYPEAFICODE, PRODUCTIONDEMAND.DESCRIPTION,
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
    FROM PRODUCTIONDEMAND 
    LEFT JOIN PRODUCTIONDEMANDSTEP 
      ON PRODUCTIONDEMAND.CODE = PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE 
    LEFT JOIN PRODUCT 
      ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = PRODUCT.ITEMTYPECODE 
      AND PRODUCTIONDEMAND.SUBCODE01 = PRODUCT.SUBCODE01 
      AND PRODUCTIONDEMAND.SUBCODE02 = PRODUCT.SUBCODE02 
      AND PRODUCTIONDEMAND.SUBCODE03 = PRODUCT.SUBCODE03 
      AND PRODUCTIONDEMAND.SUBCODE04 = PRODUCT.SUBCODE04 
      AND PRODUCTIONDEMAND.SUBCODE05 = PRODUCT.SUBCODE05 
      AND PRODUCTIONDEMAND.SUBCODE06 = PRODUCT.SUBCODE06 
      AND PRODUCTIONDEMAND.SUBCODE07 = PRODUCT.SUBCODE07 
      AND PRODUCTIONDEMAND.SUBCODE08 = PRODUCT.SUBCODE08 
      AND PRODUCTIONDEMAND.SUBCODE09 = PRODUCT.SUBCODE09 
      AND PRODUCTIONDEMAND.SUBCODE10 = PRODUCT.SUBCODE10
    LEFT JOIN ITXVIEWCOLOR A 
      ON PRODUCTIONDEMAND.ITEMTYPEAFICODE = A.ITEMTYPECODE 
      AND PRODUCTIONDEMAND.SUBCODE01 = A.SUBCODE01 
      AND PRODUCTIONDEMAND.SUBCODE02 = A.SUBCODE02 
      AND PRODUCTIONDEMAND.SUBCODE03 = A.SUBCODE03 
      AND PRODUCTIONDEMAND.SUBCODE04 = A.SUBCODE04 
      AND PRODUCTIONDEMAND.SUBCODE05 = A.SUBCODE05 
      AND PRODUCTIONDEMAND.SUBCODE06 = A.SUBCODE06 
      AND PRODUCTIONDEMAND.SUBCODE07 = A.SUBCODE07 
      AND PRODUCTIONDEMAND.SUBCODE08 = A.SUBCODE08 
      AND PRODUCTIONDEMAND.SUBCODE09 = A.SUBCODE09 
      AND PRODUCTIONDEMAND.SUBCODE10 = A.SUBCODE10 
    LEFT JOIN SALESORDERDELIVERY 
      ON PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE = SALESORDERDELIVERY.SALESORDERLINESALESORDERCODE 
      AND PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE = SALESORDERDELIVERY.SALESORDERLINEORDERLINE 
    LEFT JOIN ORDERPARTNER 
      ON PRODUCTIONDEMAND.CUSTOMERCODE = ORDERPARTNER.CUSTOMERSUPPLIERCODE 
    LEFT JOIN BUSINESSPARTNER 
      ON ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID = BUSINESSPARTNER.NUMBERID 
    LEFT JOIN SALESORDER 
      ON PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE = SALESORDER.CODE 
    LEFT JOIN ORDERPARTNERBRAND 
      ON SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE 
      AND SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE
    WHERE (PRODUCTIONDEMANDSTEP.OPERATIONCODE IN ('BAT1', 'BAT2', 'NCP2', 'BKR1')) 
      AND PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE = ?";
	
	$stmt = db2_prepare($conn1, $sqlDB2);
	db2_execute($stmt, [$_POST['prod_demand']]);
	$rowdb2 = db2_fetch_assoc($stmt);

	if (empty($rowdb2['CODE'])) {
		echo "<script>
            Swal.fire({
                title: 'Kartu Gerobak Not Found',
                text: 'Click Ok to continue',
                icon: 'warning',
            }).then((result) => {
                if (result.isConfirmed) {		
                    const kartuInput = document.querySelector('input[name=prod_demand]');
                    kartuInput.value = '';  // Mengosongkan input
                    kartuInput.focus();     // Mengatur fokus ke input
                }
            });
        </script>";
	}else{
		$KartuGerobak='1';
	}
} 

if (!empty($_POST['lokasi'])) {
	$sql1 = mysqli_query($conr, "SELECT COUNT(*) as jml FROM master_area WHERE kode='".$_POST['lokasi']."'");
	$row1 = mysqli_fetch_array($sql1);

	if ($row1['jml'] <= 0) {
		echo "<script>
            Swal.fire({
                title: 'Lokasi Not Found',
                text: 'Click Ok to continue',
                icon: 'warning',
            }).then((result) => {
                if (result.isConfirmed) {		
                    const lokasiInput = document.querySelector('input[name=lokasi]');
                    lokasiInput.value = '';  // Mengosongkan input
                    lokasiInput.focus();     // Mengatur fokus ke input
                }
            });
        </script>";
	}else{
		$LokasiGerobak='1';
	}
} 
if (!empty($_POST['no_gerobak'])) {
	$sql = mysqli_query($conr, "SELECT COUNT(*) as jml FROM master_gerobak WHERE no_gerobak='".$_POST['no_gerobak']."'");
	$row = mysqli_fetch_array($sql);

	if ($row['jml'] <= 0) {
		echo "<script>
            Swal.fire({
                title: 'No Gerobak Not Found',
                text: 'Click Ok to continue',
                icon: 'warning',
            }).then((result) => {
                if (result.isConfirmed) {		
                    const nogerobakInput = document.querySelector('input[name=no_gerobak]');
                    nogerobakInput.value = '';  // Mengosongkan input
                    nogerobakInput.focus();     // Mengatur fokus ke input
                }
            });
        </script>";
	}else{
		$NoGerobak='1';
	}
} 
if ($NoGerobak=='1' && $LokasiGerobak=='1' && $KartuGerobak=='1') {
	$sql = mysqli_query($conr, "INSERT INTO posisi_gerobak SET 
        `no_gerobak` = '$gerobak',
        `kode_area` = '$lokasi',
        `prod_demand`= '$prod_demand',
        `userid` = '".$_SESSION['userPRD']."',
        `tgl_update` = NOW()");

	if ($sql) {
		echo "<script> 
            Swal.fire(
                'Saved data successfully',
                'Click Ok to continue',
                'success'
            ).then((result) => {
                if (result.value) {
                    window.location='PosisiGerobak';
                }
            });
        </script>";
	}
}

?>