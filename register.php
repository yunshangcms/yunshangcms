<? include('system/inc.php'); 
alert_url('/login/?uid='.$_GET['uid'].'');
if ($_POST['act']=='log')
{
null_back($_POST['username'],'请输入用户名');	
null_back($_POST['password'],'请输入用户密码');	
null_back($_POST['qq'],'请输入用户QQ');	
null_back($_POST['card'],'请输入邀请码');	

$yqm=base64_decode($_POST['card']);

if  ($_POST['shangji']!='')
{
 $result = mysql_query('select * from '.flag.'user where ID=  '.$_POST['shangji'].'    ');
if (!$row = mysql_fetch_array($result))
{ alert_back('注册失败:推荐人ID'.$_POST['shangji'].'不存在');	}
 
}


 $result = mysql_query('select * from '.flag.'user where ID=  '.$yqm.'    ');
if ($row = mysql_fetch_array($result))
{ $shangjiid=$row['ID'];	}

 
else
{
 $result = mysql_query('select * from '.flag.'yqm where card=  "'.$_POST['card'].'"  and  uid  = 0   ');
if (!$row = mysql_fetch_array($result))
{ alert_back('注册失败:邀请码'.$_POST['card'].'不正确/已被使用');	}
}

 


 
 $result = mysql_query('select * from '.flag.'user where username=  "'.$_POST['username'].'"   ');
if ($row = mysql_fetch_array($result))
{
	alert_back('注册失败:用户名'.$_POST['username'].'已被注册');	

}
else
{
		$_data['rmb'] = 0;
		$_data['sxf'] = 0;
		$_data['ticheng'] = $site_morenticheng;
	$_data['username'] =$_POST['username'];
	$_data['nickname'] =$_POST['username'];
	$_data['password'] =$_POST['password'];
if ($_POST['shangji']!='' && $shangjiid=='')
	{$_data['shangji'] =$_POST['shangji'];}

if ( $shangjiid!='')
	{$_data['shangji'] =$shangjiid;}



	$_data['qq'] =$_POST['qq'];
	$_data['date'] =date('Y-m-d H:i:s');
  	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'user ('.$str[0].') values ('.$str[1].')';
	 if (mysql_query($sql))
	{
		$uid = mysql_insert_id();
		$cardsql = 'update  '.flag.'yqm set  uid = '.$uid.'  where card="'.$_POST['card'].'" and uid = 0 ';
	  mysql_query($cardsql);
	 
	 
	  alert_href('注册成功','/login.php');}	
	 else
	 {	alert_back('注册失败:数据写入失败!');	}
 	
}
	}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>用户注册</title>

        <!-- CSS -->
         <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>用户注册</strong> </h1>
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        	 
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">用户名</label>
			                        	<input type="text"   name="username" placeholder="请输入用户名" class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">用户密码</label>
			                        	<input type="password"   name="password" placeholder="请输入用户名密码" class="form-password form-control" id="form-password">
			                        </div>
                                    
                                    
                                       <div class="form-group">
			                        	<label class="sr-only" for="form-password">用户QQ</label>
			                        	<input type="text"   name="qq" placeholder="请输入您的QQ联系方式" class="form-password form-control" id="form-password">
			                        </div>
                                    
                                  <div class="form-group">
		                        	<label class="sr-only" for="form-password">推荐人</label>
		                        	<input   name="shangji" type="number" class="form-control" placeholder="请输入推荐人ID，没有请留空" value="<?=$_GET['uid']?>"  >
			                        </div>
                                    
                                    
                                    
                                      <div class="form-group">
			                        	<label class="sr-only" for="form-password">邀请码</label>
			                        	<input type="text"   name="card" placeholder="请输入注册邀请码" class="form-password form-control" id="form-password">
			                        </div>
                                    
                                    
                                    
                                    
                                    
			                        <input   type="hidden"  name="act" value="log">
			                        <button type="submit" class="btn">注册</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                         
                        	<div class="social-login-buttons">
	                        
	                        	<a class="btn btn-link-1 btn-link-1-twitter" href="login.php">
	                        		<i class="fa fa-twitter"></i> 登录账号
	                        	</a>
	                        	 
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
 

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>