<?
 include('../system/inc.php');
include('./admin_config.php');
 
 	if ($wid!=0)
	{		alert_url('404');};
	
$act = $_POST['act'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$sj = date("Y-m-d H:i:s",intval(time()));   
 $ip =xiaoyewl_ip();
 
 echo admin_login($act,$username,$password,$a_name,$a_password,$ip,$sj)
 
  	
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/body.css"/> 
</head>
<body>

<div class="container">
	<section id="content">
		<form action=""  method="post">
		<input name="act" type="hidden" value="login">
 

			<h1>云赏扣量后台</h1>
			<div>
				<input type="text" placeholder="用户名" required=""   name="username" id="username" />
			</div>
			<div>
				<input type="password" placeholder="密码" required=""    name="password" id="password" />
			</div>
			 <div class="">
				<span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>			</div> 
			<div>
				<!-- <input type="submit" value="Log in" /> -->
				<input type="submit" value="登录" class="btn btn-primary" id="js-btn-login"/>
			 
				<!-- <a href="#">Register</a> -->
			</div>
		</form><!-- form -->
 
	</section><!-- content -->
</div>
<!-- container -->

 
</body>
</html>