<?php 
require_once 'include.php';
$act=$_REQUEST['act'];
if($act==="reg"){
	$mes=reg();
}elseif($act==="login"){
	$mes=login();
}elseif($act==="userOut"){
	$mes=userOut();
}elseif($act==="updateUserinfo"){
	$mes=updateUserinfo();
}elseif($act==="changePwd"){
	$mes=changePwd();
}elseif($act=="TraceRecord"){
	TraceRecord();
}
if($mes){
	echo "<script type='text/javascript'>alert('".$mes."');</script>";
}
?>

<script type="text/javascript">
	window.history.back(); 
</script>