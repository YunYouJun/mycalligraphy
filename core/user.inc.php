<?php
function reg(){
	$arr=$_POST;
	if(insert("userinfo", $arr)){
		$mes="注册成功!";
	}else{
		$mes="注册失败!";
	}
	return $mes;
}
function login(){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$autoFlag=isset($_POST['autoFlag']) ? $_POST['autoFlag'] : '';
	$sql="select * from userinfo where username='{$username}' and password='{$password}'";
	//$resNum=getResultNum($sql);
	$row=fetchOne($sql);
	//echo $resNum;
	if($row){
		if($autoFlag){
			setcookie("username",$row['username'],time()+7*24*3600);
		}
		$_SESSION['uID']=$row['uID'];
		$_SESSION['username']=$row['username'];
		$mes="登录成功!";
	}else{
		$mes="登陆失败!";
	}
	return $mes;
}

function userOut(){
	$_SESSION=array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),"",time()-1);
	}
	session_destroy();
	$mes='退出成功';
	return $mes;
}


