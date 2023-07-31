<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$modal_id=$_GET['id'];
$wct=$_GET['wct'];
$opt=$_GET['opt'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Data Detail Gerobak</title>
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">	
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">	
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">	
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">	  
  <!-- Theme style -->
</head>
<body>
<!-- Main content -->
      <div class="container-fluid">       
		      <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Data Detail Gerobak</h3>				 
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <h3><strong>No Prod. Order : <?php echo $_GET['id'];?> || Workcenter : <?php echo $_GET['wct'];?> || </strong> Operation : <?php echo $_GET['opt'];?></h3>
                <table id="example1" class="table table-sm table-bordered table-striped">
                  <thead>
                    <tr bgcolor="#9fc5e8">
                      <th width="15%" style="font-size: 15px;"><div align="center">Characteristic Code</div></th>
                      <th width="10%" style="font-size: 15px;"><div align="center">Gerobak</div></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    $sqldtl="SELECT 
                    QUALITYDOCUMENT.OPERATIONCODE,
                    QUALITYDOCUMENT.WORKCENTERCODE,
                    QUALITYDOClINE.QUALITYDOCPRODUCTIONORDERCODE, 
                    QUALITYDOClINE.CHARACTERISTICCODE,
                    QUALITYDOClINE.VALUEQUANTITY 
                    FROM QUALITYDOCUMENT QUALITYDOCUMENT
                    LEFT JOIN QUALITYDOCLINE QUALITYDOCLINE ON QUALITYDOCUMENT.HEADERNUMBERID = QUALITYDOCLINE.QUALITYDOCUMENTHEADERNUMBERID AND 
                    QUALITYDOCUMENT.HEADERLINE = QUALITYDOCLINE.QUALITYDOCUMENTHEADERLINE AND QUALITYDOCUMENT.PRODUCTIONORDERCODE = QUALITYDOCLINE.QUALITYDOCPRODUCTIONORDERCODE 
                    WHERE QUALITYDOCUMENT.OPERATIONCODE='$opt' AND QUALITYDOCUMENT.WORKCENTERCODE ='$wct' AND 
                    QUALITYDOClINE.QUALITYDOCPRODUCTIONORDERCODE ='$modal_id' AND QUALITYDOCLINE.VALUEQUANTITY IS NOT NULL AND QUALITYDOCLINE.VALUEQUANTITY <> 0 AND LEFT(QUALITYDOCLINE.CHARACTERISTICCODE,3)='GRB'";
                    $stmt=db2_exec($conn1,$sqldtl, array('cursor'=>DB2_SCROLLABLE));
                    while($rdtl = db2_fetch_assoc($stmt)){
                      $bgcolor = ($c++ & 1) ? '#33CCFF' : '#FFCC99';
                      $grb=explode(".",$rdtl['VALUEQUANTITY']);
                  ?>
                  <tr bgcolor="<?php echo $bgcolor;?>">
                    <td align="center" width="15%" style="font-size: 15px;"><?php echo $rdtl['CHARACTERISTICCODE'];?></td>
                    <td align="center" width="15%" style="font-size: 15px;"><?php echo $grb[0];?></td>
                  </tr>
                  <?php $no++;}?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
          </div> 
      </div><!-- /.container-fluid -->
    <!-- /.content -->
</body>
</html>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- DataTables  & Plugins -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../plugins/jszip/jszip.min.js"></script>
  <script src="../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>	
<!-- Bootstrap Switch -->
<script src="../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

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
  $(function () {
    $('#example11').DataTable({
	  'paging': true,
	})
  });
</script>