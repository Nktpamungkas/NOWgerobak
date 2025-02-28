<?php
session_start();
//include config
include"koneksi.php";
ini_set("error_reporting", 1);

//request page
$page = isset($_GET['p'])?$_GET['p']:'';
$act  = isset($_GET['act'])?$_GET['act']:'';
$id   = isset($_GET['id'])?$_GET['id']:'';
$page = strtolower($page);
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NOWgerobak | <?php if ($_GET['p']!="") {
    echo ucwords($_GET['p']);
} else {
    echo "Home";
}?></title>

  <!-- Google Font: Source Sans Pro -->
  <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">-->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">	
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">	
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">	
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <script src="plugins/sweetalert2/sweetalert2.min.js"></script>	
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <script src="plugins/toastr/toastr.min.js"></script>	
  <!-- Theme style -->
  <style>
	  .blink_me {
  animation: blinker 1s linear infinite;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
	</style>
  <?php if($page=="hasiltimbang" ){ ?>	
  	<link rel="stylesheet" href="plugins/x-editable/dist/bootstrap4-editable/css/bootstrap-editable.css">
  <?php } ?>	
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="icon" type="image/png" href="dist/img/ITTI_Logo index.ico">	
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="Home" class="navbar-brand">
        <img src="dist/img/ITTI_Logo 2021.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">NOW<strong>gerobak</strong></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="Home" class="nav-link">Home</a>
          </li>
		  <?php if($_SESSION['userPRD']==""){ ?>	
		  <li class="nav-item">
            <a href="login" class="nav-link">Login</a>
          </li>	
		  <?php }else{ ?>
		  <li class="nav-item">
            <a href="logout" class="nav-link">Logout <em>(<?php echo $_SESSION['userPRD'];?>)</em></a>
          </li>	
		  <?php } ?>
        </ul>
      
      </div>
      
    </div>
  </nav>
  <!-- /.navbar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
	<section class="content">  
    <div class="content">
     <?php
          if (!empty($page) and !empty($act)) {
              $files = 'pages/'.$page.'.'.$act.'.php';
          } elseif (!empty($page)) {
              $files = 'pages/'.$page.'.php';
          } else {
              $files = 'pages/home.php';
          }

          if (file_exists($files)) {
              include($files);
          } else {
              include_once("blank.php");
          }
          ?>
		
    </div>
	</section>	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Indo Taichen Textile Industy
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 <a href="">DIT</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>	
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<?php if($page=="hasiltimbang"){ ?>	
<!-- xeditablejs -->
<script src="plugins/x-editable/dist/bootstrap4-editable/js/bootstrap-editable.min.js"></script>	
<?php } ?>		
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript">
$(document).on('click', '.show_detail', function(e) {
    var m = $(this).attr("id");
	
	$(this).before('<div class="loader" id="loader"></div>');
	
    $.ajax({
      url: "pages/show_detail.php",
      type: "GET",
      data: {
        id: m,
      },
      success: function(ajaxData) {
        $("#DetailShow").html(ajaxData);
        $("#DetailShow").modal('show', {
          backdrop: 'true'
        });
		  
		$("#loader").remove();  
      }
    });
  });
	
$(document).on('click', '.detail_gerobak', function (e) {
  var m = $(this).attr("id");
  var a = $(this).attr("wct");
  var b = $(this).attr("opt");
    $.ajax({
       url: "pages/detail_gerobak.php",
       type: "GET",
       data : {id: m, wct: a, opt: b,},
       success: function (ajaxData){
         $("#DetailGerobak").html(ajaxData);
         $("#DetailGerobak").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.detail_qa_data', function (e) {
  var m = $(this).attr("id");
  var a = $(this).attr("wct");
  var b = $(this).attr("opt");
    $.ajax({
       url: "pages/detail_qa_data.php",
       type: "GET",
       data : {id: m, wct: a, opt: b,},
       success: function (ajaxData){
         $("#DetailQaData").html(ajaxData);
         $("#DetailQaData").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.detail_timestart', function (e) {
  var m = $(this).attr("id");
  var a = $(this).attr("wct");
  var b = $(this).attr("opt");
    $.ajax({
       url: "pages/detail_timestart.php",
       type: "GET",
       data : {id: m, wct: a, opt: b,},
       success: function (ajaxData){
         $("#DetailTimeStart").html(ajaxData);
         $("#DetailTimeStart").modal('show',{backdrop: 'true'});
       }
     });
      });
$(document).on('click', '.detail_timeend', function (e) {
  var m = $(this).attr("id");
  var a = $(this).attr("wct");
  var b = $(this).attr("opt");
    $.ajax({
       url: "pages/detail_timeend.php",
       type: "GET",
       data : {id: m, wct: a, opt: b,},
       success: function (ajaxData){
         $("#DetailTimeEnd").html(ajaxData);
         $("#DetailTimeEnd").modal('show',{backdrop: 'true'});
       }
     });
      });
</script>
<script>
  $(function () {
    $("#cekGerobakTable").DataTable({
      order: [ 4, 'asc' ]
    } );
	$('#lookup1').DataTable({
      "searching": false,
      "info": true,
      "responsive": true,
    });  
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "excel", "pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');	 
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
	$("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "pageLength": 50,
      "buttons": ["copy", "excel", "pdf"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)'); 
	$("#example4").DataTable({
    "responsive": false,
    "lengthChange": false,
    "autoWidth": false,
    "scrollX": true, // Tambahkan scroll horizontal
    "buttons": ["copy", "excel", "pdf"]
}).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');  
  });
</script>
<script>
	$(function () {
		
	//Initialize Select2 Elements
    $('.select2').select2()	
	//Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })	
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
	//Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
});		
</script>
<script>
	/*$.fn.editable.defaults.mode = 'inline';*/
	$.fn.editable.defaults.mode = 'inline';
    $(document).ready(function() {
	/* Sales Order awal */	
	  $('.jml_rol').editable({
        type: 'text',
        disabled : false,
        url: 'pages/editable/editable_rol.php',
      });
    });
	
</script>	
</body>
</html>

