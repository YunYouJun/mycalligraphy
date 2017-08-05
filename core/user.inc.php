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

function updateUserinfo(){
	$arr=$_POST;
	$where = 'uID='.$_SESSION['uID'];
	if(update("userinfo", $arr ,$where)){
		$mes="修改成功!";
	}else{
		$mes="修改失败!";
	}
	return $mes;
}


function getUserInfo($uID){
	$usersql = 'select * from userinfo where uID ="'.$uID.'"';
	$userinfo = fetchOne($usersql);
	return $userinfo;
}

function changePwd(){
	$arr=$_POST;
	$where = 'uID='.$_SESSION['uID'];
	$result = getUserInfo($_SESSION['uID']);
	if($arr['oldpassword']==$result['password']){
		$newPwd['password'] = $arr['password'];
		if(update('userinfo',$newPwd,$where)){
			$mes="修改成功!";
		}else{
			$mes="修改失败!与原密码相同！";
		}
	}else{
		$mes="原密码输入错误！";
	}
	return $mes;
}
//插入临摹记录
function TraceRecord(){
	if(isset($_SESSION['uID'])){
		$arr['tsCharacter']=$_GET['tsCharacter'];
		$arr['uID']=$_SESSION['uID'];
		$arr['tsScore']=$_GET['score'];
		$arr['fontfamily']=$_GET['fontfamily'];
		insert("tracescore", $arr);		
	}
}
//学习记录部分
function getLearnRecord(){
	$sql="select * from tracescore where uID='".$_SESSION['uID']."'";
	$rows=fetchAll($sql);
	return $rows;
}