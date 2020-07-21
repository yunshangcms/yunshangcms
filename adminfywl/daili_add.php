<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='daili';

if ( isset($_POST['提交']) ) {
	null_back($_POST['username'],'请输入用户名');
	null_back($_POST['password'],'请输入用户余额');
	null_back($_POST['rmb'],'请输入用户余额');
	null_back($_POST['sxf'],'请输入用户手续费');
	
	
 $result = mysql_query('select * from '.flag.'user where username=  "'.$_POST['username'].'"   ');
if ($row = mysql_fetch_array($result))
{
	alert_back('添加失败:用户名'.$_POST['username'].'已被注册');	

}


 	$_data['ticheng'] = $site_morenticheng;
 	$_data['username'] = $_POST['username'];
 	$_data['password'] = $_POST['password'];
 	$_data['qq'] = $_POST['qq'];
 	$_data['rmb'] = $_POST['rmb'];
 	$_data['sxf'] = $_POST['sxf'];
	$_data['date'] =date('Y-m-d H:i:s');

  	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'user ('.$str[0].') values ('.$str[1].')';
  	if (mysql_query($sql)) {
		 	alert_href('添加成功!','daili.php');
 	} else  {
		alert_back('添加失败!');
	}
}
  			?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>新增代理</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
	
 
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body>
	<? include('header.php');?>
		
	<? include('left.php');?><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin_index.php"><span class="glyphicon glyphicon-home">管理首页</span></a></li>
				<li class="active">新增代理</li>
			</ol>
		</div><!--/.row-->
		
 <br>
   
	 
			 
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> 新增代理</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							
							                 
                 
					   
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">用户名</label>
									<div class="col-md-9">
 
 						  			                <input  name="username" type="text" class="form-control"    placeholder="请输入用户名" lay-verify="required">

							</div>
								</div>
							
							 
							 
							 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">用户密码</label>
									<div class="col-md-9">
 
 						  			                <input  name="password" type="text" class="form-control"    placeholder="请输入用户密码" lay-verify="required">

							</div>
								</div>
								
								
											 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">用户QQ</label>
									<div class="col-md-9">
 
 						  			                <input  name="qq" type="number" class="form-control"    placeholder="请输入用户QQ" lay-verify="required">

							</div>
								</div>
							
							 
							 
							 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">用户余额</label>
									<div class="col-md-9">
 
 						  			                <input  name="rmb" type="number" class="form-control"  value="0"   placeholder="请输入用户余额" lay-verify="required">

							</div>
								</div>
								
								
									 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">提现手续费</label>
									<div class="col-md-9">
 
			                <input   type="text"    class="form-control"   name="sxf"  value="0" >

							</div>
								</div>
								
							
					 
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
						 <input name="提交" class="btn"  type="hidden"    value="提交">

										<button type="submit" class="btn btn-default btn-md pull-right">新增</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				
		  </div>
			<!--/.col-->
			<!--/.col-->
        </div>
		<!--/.row-->
	</div>	<!--/.main-->
		  

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
