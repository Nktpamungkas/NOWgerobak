<?PHP
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
$ip_num = $_SERVER['REMOTE_ADDR'];
$os= $_SERVER['HTTP_USER_AGENT'];

mysqli_query($con,"UPDATE kain_proses SET `jml_rol` = '$_POST[value]' where id = '".$_POST['pk']."'");
//mysqli_query($con,"INSERT into tbl_log SET
//	`what` = 'Edit Data Sales Order',
//	`what_do` = 'Edit Data Sales Order bruto $_POST[value]',
//	`project` = '$_POST[pk]',
//	`do_by` = '$_SESSION[userMKT]',
//	`do_at` = '$time',
//	`ip` = '$ip_num',
//	`os` = '$os',
//	`foto` = '$_SESSION[fotoMKT]',
//	`remark`='$_SESSION[jabatanMKT]'");
echo json_encode('success');
