<?
 include('../system/inc.php');
include('./admin_config.php');
 	
$act = $_POST['act'];
$username = $_POST['username'];
$password = $_POST['password'];
  if ($act=='login')
{ $result = mysql_query('select * from '.flag.'guanliyuan where loginname = "'.$username.'" and  loginpassword  = "'.$password.'"'); 
 if ($row = mysql_fetch_array($result))
{
 
 	$_SESSION['guanliyuan_check'] = $row['ID'];
 	 alert_url('admin_index.php');
 
  }  
 else
 {alert_href('管理员账户或密码不正确','');}
 
 }
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员登陆</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/body.css"/> 
</head>
<body>

<div class="container">
	<section id="content">
		<form action=""  method="post">
		<input name="act" type="hidden" value="login">
 

			<h1>资源/财务/管理登录</h1>
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