<?php
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";
$ip = $_SERVER['REMOTE_ADDR'];
$os = $_SERVER['HTTP_USER_AGENT'];
// var_dump($_SESSION);
// die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NOWGerobak | Log in</title>

  <!-- Google Font: Source Sans Pro -->
 <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">-->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">		
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="icon" type="image/png" href="dist/img/ITTI_Logo index.ico">	
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card  card-danger">
    <div class="card-header text-center">
      <a href="login" class="h1"><b>PRD</b> ITTI</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><strong>Sign in to start your session</strong></p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username" autofocus autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>  
		<div class="row mt-3">
          <div class="col-12 text-center">
            <a href="Home">Back Home</a>
          </div>
          <!-- /.col -->
        </div>  
      </form>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>	
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
<?php
if ($_POST) { //login user
	extract($_POST);
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$passMD5 = $password; //md5($password);
	$sql = mysqli_query($conr,"select * from tbl_user where username='$username' and password='$passMD5' limit 1");
	if (mysqli_num_rows($sql) > 0) {
		$_SESSION['userPRD'] = $username;
		$_SESSION['passPRD'] = $passMD5;
		$r = mysqli_fetch_array($sql);
		$_SESSION['idPRD'] = $r['id'];
		$_SESSION['lvlPRD'] = $r['level'];
		$_SESSION['ketPRD'] = $r['ket'];
		$_SESSION['os'] = $os;
		$_SESSION['ip'] = $ip;
		// 1 == admin
		// 2 == spv
		// 3 == user
		//login_validate();
//		mysqli_query($con,"INSERT into tbl_log SET `what` = 'login',
//				`what_do` = 'login into MKT',
//				`do_by` = '$_SESSION[userPRD]',
//				`do_at` = '$time',
//				`ip` = '$ip',
//				`os` = '$os',
//				`foto` = '$_SESSION[fotoMKT]',
//				`remark`='$_SESSION[jabatanMKT]'");
		echo "<script> window.location='PosisiGerobak';</script>";
	} else {
		echo "<script>
  	$(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'bottom-end',
      showConfirmButton: false,
      timer: 6000
    });
	Toast.fire({
        type: 'warning',
		icon: 'warning',
        title: ' $username Login Gagal!!'
      });
  });
  
</script>";
		//echo "<script>alert('Login Gagal!! $username');window.location='index';</script>";
	}
} elseif ($_GET['act'] == "logout") { //logout user
//	mysqli_query($con,"INSERT into tbl_log SET
//	`what` = 'Logout',
//	`what_do` = 'Logout from MKT',
//	`do_by` = '$_SESSION[userMKT]',
//	`do_at` = '$time',
//	`ip` = '$ip',
//	`os` = '$os',
//	`foto` = '$_SESSION[fotoMKT]',
//	`remark`='$_SESSION[jabatanMKT]'");
	session_destroy();
	//echo "<script>window.location='login';</script>";
	echo "<script>
  	$(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'bottom-end',
      showConfirmButton: false,
      timer: 6000
    });
	Toast.fire({
        type: 'success',
		icon: 'success',
        title: 'Log out successful'
      });
  });
  
</script>";
}
?>
