<?php 
require_once '../include.php';
if(!isLogin()){
	echo "<script type='text/javascript'>window.history.back();</script>";
	exit;
}
$act=$_REQUEST['act'];
if($act==="review"){
	$pID=$_REQUEST['pID'];
	$mes=myReview($pID);
}elseif($act==="post"){
	$mes=myPost();
}elseif($act==="delReview"){
	$rID=$_REQUEST['rID'];
	$mes=delReview($rID);
}elseif($act==="delPost"){
	$pID=$_REQUEST['pID'];
	$mes=delPost($pID);
}
if($mes){
	echo "<script type='text/javascript'>alert('".$mes."');</script>";
}
?>

<script type="text/javascript">
	window.history.back(); 
</script>