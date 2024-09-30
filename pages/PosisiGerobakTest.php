<?php
ini_set("error_reporting", 1);
session_start();

if($_SESSION['userPRD']==""){
    echo "<script> window.location='login';</script>";
}

$lokasi     = isset($_POST['lokasi'])?$_POST['lokasi']:'';
$gerobak    = isset($_POST['no_gerobak'])?$_POST['no_gerobak']:'';
$prod_demand    = isset($_POST['prod_demand'])?$_POST['prod_demand']:'';
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

<!-- QR and Barcode Scanner -->
<script src="dist/js/zxing.min.js"></script>

<div class="container-fluid">
  <div class="card card-default">

    <!-- Modal -->
    <div class="modal fade" id="qrCodeModal" tabindex="-1" aria-labelledby="qrCodeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="qrCodeModalLabel">Scan QR/Barcode/DataMatrix</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Tempatkan scanner QR Code dan Barcode di sini -->
            <div id="qr-reader" style="width:100%; height:300px;"></div>
            <div id="qr-reader-results"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Form -->
    <form method="post" enctype="multipart/form-data" action="" name="form1">
      <div class="card-body">
        <div class="form-group row">
          <label for="prod_demand" class="col-md-1">Kartu Gerobak</label>
          <div class="input-group">
            <input type="text" class="form-control" maxlength="8" name="prod_demand" value="<?php echo $prod_demand; ?>" placeholder="Kartu Gerobak" id="prod_demand">
            <div class="input-group-append">
              <!-- Button untuk membuka modal scan -->
              <button type="button" class="btn btn-info" onClick="openQrModal('prod_demand');">Scan</button>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="lokasi" class="col-md-1">Lokasi</label>
          <div class="input-group">
            <input type="text" class="form-control" maxlength="8" name="lokasi" value="<?php echo $lokasi; ?>" placeholder="Lokasi" id="lokasi">
            <div class="input-group-append">
              <!-- Button untuk membuka modal scan -->
              <button type="button" class="btn btn-info" onClick="openQrModal('lokasi');">Scan</button>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="no_gerobak" class="col-md-1">No. Gerobak</label>
          <div class="input-group">
            <input type="text" class="form-control" maxlength="8" name="no_gerobak" value="<?php echo $gerobak; ?>" placeholder="No. Gerobak" id="no_gerobak">
            <div class="input-group-append">
              <!-- Button untuk membuka modal scan -->
              <button type="button" class="btn btn-info" onClick="openQrModal('no_gerobak');">Scan</button>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <button class="btn btn-primary" type="submit" name="save" value="Save" style="width: 100%;">Save</button>
        </div>
      </div>
    </form>
    <!-- /.card-body -->
  </div>
</div>
<!-- /.container-fluid -->

<script>
  var activeInput = ''; // Menyimpan input mana yang sedang aktif
  var selectedDeviceId; // Menyimpan ID perangkat kamera yang dipilih
  const codeReader = new ZXing.BrowserMultiFormatReader();

  // Fungsi untuk membuka modal dan menyimpan input field mana yang sedang diklik
  function openQrModal(inputId) {
    activeInput = inputId; // Simpan ID input yang aktif
    $('#qrCodeModal').modal('show'); // Tampilkan modal
  }

  function initScanner() {
    // Temukan perangkat kamera
    codeReader.getVideoInputDevices().then(videoInputDevices => {
      if (videoInputDevices.length > 0) {
        // Pilih kamera pertama
        selectedDeviceId = videoInputDevices[0].deviceId;
        // Mulai proses scan menggunakan perangkat kamera
        codeReader.decodeOnceFromVideoDevice(selectedDeviceId, 'qr-reader').then(result => {
          console.log(result);
          // Isi input field dengan hasil scan
          document.getElementById(activeInput).value = result.text;
          // Tutup modal setelah scan berhasil
          $('#qrCodeModal').modal('hide');
        }).catch(err => console.error('Error in scan: ', err));
      } else {
        console.error("No camera devices found.");
        alert("No camera devices found.");
      }
    }).catch(err => {
      console.error('Error getting video input devices: ', err);
      alert('Error getting video input devices: ' + err);
    });
  }

  // Inisialisasi scanner ketika modal dibuka
  $('#qrCodeModal').on('shown.bs.modal', function () {
    initScanner(); // Panggil inisialisasi scanner
  });

  // Hentikan scanner ketika modal ditutup
  $('#qrCodeModal').on('hidden.bs.modal', function () {
    codeReader.reset(); // Hentikan kamera
  });
</script>

<?php
$NoGerobak		= '0'; 
$LokasiGerobak	= '0';
$KartuGerobak	= '0';
if (!empty($_POST['prod_demand'])) {	
	$sqlDB2 = "SELECT 
PRODUCTIONDEMAND.CODE,
A.PRODUCTIONORDERCODE,
PRODUCTIONDEMAND.ITEMTYPEAFICODE,
PRODUCTIONDEMAND.DESCRIPTION,
TRIM(PRODUCTIONDEMAND.SUBCODE01) AS SUBCODE01,
TRIM(PRODUCTIONDEMAND.SUBCODE02) AS SUBCODE02,
TRIM(PRODUCTIONDEMAND.SUBCODE03) AS SUBCODE03,
TRIM(PRODUCTIONDEMAND.SUBCODE04) AS SUBCODE04,
TRIM(PRODUCTIONDEMAND.SUBCODE05) AS SUBCODE05,
TRIM(PRODUCTIONDEMAND.SUBCODE06) AS SUBCODE06,
TRIM(PRODUCTIONDEMAND.SUBCODE07) AS SUBCODE07,
TRIM(PRODUCTIONDEMAND.SUBCODE08) AS SUBCODE08,
TRIM(PRODUCTIONDEMAND.SUBCODE09) AS SUBCODE09,
TRIM(PRODUCTIONDEMAND.SUBCODE10) AS SUBCODE10,
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
WHERE PRODUCTIONDEMAND.CODE= ?
ORDER BY PRODUCTIONDEMAND.CODE ASC";
	
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