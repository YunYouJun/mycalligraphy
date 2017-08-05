<?php 
require_once '../include.php';
if(!isLogin()){
	$mes = '跳转至主页';
	$url = '../index.php';
	alertMes($mes,$url);
}
$userinfo=getUserInfo($_SESSION['uID']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>个人·设置</title>

<!-- Bootstrap -->

<?php
  include("../same/headlink.html");
  ?>
<link rel="stylesheet" href="../css/yunyou-input-group.css">

<script>
function ready(){
document.getElementById("user").classList.add('active');
}
</script>
</head>
<body onLoad="ready()" data-spy="scroll" data-target="#navbar-user" data-offset="100" >

  <?php
	include("../same/navbar.html");
	?>

<div class="container-fluid">
  <div class="row">
    <div class="text-center col-md-12">
      <h1 id="usercenter" class="text-center">个人&middot;设置</h1>
    </div>
  </div>
  <hr>
</div>

<div class="container">
	<div class="col-md-12">
		<div id="navbar-user" class="col-md-2">
			<ul class="nav nav-pills nav-stacked yunyou-bgblur yunyou-background yunyou-fixed" style="font-size:large;">
				<li ><a href="#usercenter"><span class="glyphicon glyphicon-user"></span>&nbsp;个人信息</a></li>
				<li ><a href="#modifypassword"><span class="glyphicon glyphicon-lock"></span>&nbsp;修改密码</a></li>
			</ul>
		</div>
		<!--10列的-->
		<div class="col-md-10">
		<div class="yunyou-bgblur yunyou-background yunyou-panel" id="userinformation" >
			<div class="row text-center">
				<h3>个人信息</h3>
				<br>
			</div>
				<form class="form-horizontal form-group-lg" role="form" data-animation-effect="fadeIn" method="post" action="../doAction.php?act=updateUserinfo">
				  <div class="form-group">
				    <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
				      <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span>&nbsp;用户名称</div>
              		  <input type="text" class="form-control logintext" id="username" name="username" placeholder="请填写您的用户名" value="<?php echo $userinfo['username']; ?>">
				    </div>
				  </div>
				  <div class="form-group">
		            <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
		              <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;我的职业</div>
		              <input type="hidden" id="provalue" value="<?php echo $userinfo['profession']; ?>">
		              <select class="form-control" id="profession" name="profession">
		                <option value="0">职业</option>
		                <option value="1" <?php if($userinfo['profession']==1) echo "selected=selected";?> >学生</option>
		                <option value="2" <?php if($userinfo['profession']==2) echo "selected=selected";?> >教师</option>
		                <option value="3" <?php if($userinfo['profession']==3) echo "selected=selected";?> >书法工作者</option>
		                <option value="4" <?php if($userinfo['profession']==4) echo "selected=selected";?> >其他</option>
		              </select> 
		            </div>
		          </div>
		          <div class="form-group">
		            <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
		              <div class="input-group-addon"><span class="glyphicon glyphicon-edit"></span>&nbsp;偏爱类型</div>
		              <select class="form-control" id="favfont" name="favfont">
		                <option value="0">请选择您喜爱的书法类型</option>
		                <option value="1" <?php if($userinfo['favfont']==1) echo "selected=selected";?>>行楷</option>
		                <option value="2" <?php if($userinfo['favfont']==2) echo "selected=selected";?>>行书</option>
		                <option value="3" <?php if($userinfo['favfont']==3) echo "selected=selected";?>>草书</option>
		              </select>
		            </div>
		          </div>
		          <div class="form-group">
		            <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
		              <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>&nbsp;电子邮箱</div>
		              <input type="email" class="form-control logintext" id="email" placeholder="您的邮箱" value="<?php echo $userinfo['email']; ?>" name="email">
		            </div>
		          </div>
		            <div class="form-group">
		            <div class="col-md-4 col-md-offset-4 col-sm-10 col-sm-offset-1">
		              <button type="submit" class="btn btn-inverse btn-lg btn-block yunyou-bgblur">保存</button>
		              </div>
		           </div>   
				</form>
		</div>

		<div class="yunyou-bgblur yunyou-background yunyou-panel " id="modifypassword">
			<div class="row text-center ">
				<h3 >修改密码</h3>
				<br>
			</div>
				<form class="form-horizontal form-group-lg" role="form" data-animation-effect="fadeIn" action="../doAction.php?act=changePwd" method="post">
				  <div class="form-group">
				    <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
				      <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>&nbsp;原始密码</div>
              		  <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="请填写您的原始密码">
				    </div>
				  </div>
				  <div class="form-group passwordDiv">
				    <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
				      <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>&nbsp;修改密码</div>
              		  <input type="password" class="form-control" id="Changepassword" name="password" placeholder="请填写您想要修改的密码" oninput="changeCheck();">
              		  <span class="form-control-feedback" aria-hidden="true"></span>
				    </div>
				  </div>
				  <div class="form-group passwordDiv">
				    <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
				      <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>&nbsp;确认密码</div>
              		  <input type="password" class="form-control" id="Changepassword2" placeholder="请确认您想要修改的密码" oninput="changeCheck();">
              		  <span class="form-control-feedback" aria-hidden="true"></span>
				    </div>
				  </div>
		            <div class="form-group">
		            <div class="col-md-4 col-md-offset-4 col-sm-10 col-sm-offset-1">
		              <button type="submit" class="btn btn-inverse btn-lg btn-block yunyou-bgblur">确定</button>
		              </div>
		           </div>   
				</form>
		</div>

		</div>
	</div>
</div>


  <?php
	include("../same/footer.html");
	?>
<script type="text/javascript">
	function changeCheck(){
		if($('#Changepassword').val()==$('#Changepassword2').val()){
			$('.form-control-feedback').removeClass('glyphicon glyphicon-remove');
			$('.form-control-feedback').addClass('glyphicon glyphicon-ok');
			return true;
		}else{
			$('.form-control-feedback').addClass('glyphicon glyphicon-ok');
			$('.form-control-feedback').addClass('glyphicon glyphicon-remove');
			return false;
		}
	}
</script>

</body>
</html>
