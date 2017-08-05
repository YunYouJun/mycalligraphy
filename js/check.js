function check(){
var pwd1 = document.getElementById("password").value;
var pwd2 = document.getElementById("password2").value;
var passwordDiv = document.getElementsByClassName('passwordDiv');
  if(pwd1==pwd2){
  	passwordDiv[0].className="form-group passwordDiv has-success";
  	passwordDiv[1].className="form-group passwordDiv has-success";
  	return true;
  }else{
  	passwordDiv[0].className="form-group passwordDiv has-error";
  	passwordDiv[1].className="form-group passwordDiv has-error";
  	return false;   //return false是用来阻止表单提交的 
  }
}