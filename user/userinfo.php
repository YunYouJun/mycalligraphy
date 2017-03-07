<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>汉字检索</title>

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
				<form class="form-horizontal" role="form" data-animation-effect="fadeIn">
				  <div class="form-group">
				    <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
				      <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span>&nbsp;用户名称</div>
              		  <input type="text" class="form-control" id="username" placeholder="请填写您的用户名">
				    </div>
				  </div>
				  <div class="form-group">
		            <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
		              <div class="input-group-addon"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;我的职业</div>
		              <select class="form-control" id="profession">
		                <option value="">职业</option>
		                <option>学生</option>
		                <option>教师</option>
		                <option>书法工作者</option>
		                <option>其他</option>
		              </select>
		            </div>
		          </div>
		          <div class="form-group">
		            <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
		              <div class="input-group-addon"><span class="glyphicon glyphicon-edit"></span>&nbsp;偏爱类型</div>
		              <select class="form-control" id="profession">
		                <option value="">请选择您喜爱的书法类型</option>
		                <option>行楷</option>
		                <option>草书</option>
		                <option>行书</option>
		              </select>
		            </div>
		          </div>
		          <div class="form-group">
		            <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
		              <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>&nbsp;电子邮箱</div>
		              <input type="email" class="form-control" id="email" placeholder="您的邮箱">
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
				<form class="form-horizontal" role="form" data-animation-effect="fadeIn">
				  <div class="form-group">
				    <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
				      <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>&nbsp;原始密码</div>
              		  <input type="password" class="form-control" id="password" placeholder="请填写您的原始密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
				      <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>&nbsp;确认密码</div>
              		  <input type="password" class="form-control" id="password1" placeholder="请填写您想要修改的密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="input-group col-sm-offset-1 col-sm-10 yunyou-bgblur">
				      <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span>&nbsp;修改密码</div>
              		  <input type="password" class="form-control" id="password2" placeholder="请确认您想要修改的密码">
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


</body>
</html>
