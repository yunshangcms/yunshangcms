<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='guanliyuan';
if ( isset($_POST['提交']) ) {
		null_back($_POST['loginname'],'请输入登录账号');
	null_back($_POST['loginpassword'],'请输入登录密码');
	   $qx= implode(",",$_POST['qx']);

 	$_data['loginname'] = $_POST['loginname'];
	$_data['loginpassword'] = $_POST['loginpassword'];
	$_data['qx'] = $qx;
	$str = arrtoinsert($_data);
	$sql = 'update '.flag.'guanliyuan set '.arrtoupdate($_data).' where id = '.$_GET['id'].'';
	if (mysql_query($sql)) {
		$order = mysql_insert_id();
 	}  {
		alert_href('修改成功!','guanliyuan.php');
	}
}
 
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>修改管理员</title>

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
				<li class="active">修改管理员</li>
			</ol>
		</div><!--/.row-->
		
 <br>
   
	 
			 
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> 修改管理员</div>
					<div class="panel-body">
					
						<?php
					$result = mysql_query('select * from '.flag.'guanliyuan where id = '.$_GET['id'].' ');
					if ($row = mysql_fetch_array($result)){
					?>
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							
							                 
                 
					   
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">登陆账号</label>
									<div class="col-md-9">
 
 
 			                <input name="loginname" type="text"  class="form-control"   value="<?=$row['loginname']?>" id="" placeholder="请输入登录账号"    >

							</div>
								</div>
							
							
										<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">登陆密码</label>
									<div class="col-md-9">
 
			                <input name="loginpassword" type="text"  class="form-control"   value="<?=$row['loginpassword']?>" placeholder="请输入登录密码"    >

							</div>
								</div>
							
							
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">权限</label>
									<div class="col-md-9">
 <?
if(strpos($row['qx'],'视频管理') !==false)
{$shipinqx= 'checked';}

else{$shipinqx= '';}


if(strpos($row['qx'],'提现管理') !==false)
{$tixianqx= 'checked';}

else{$tixianqx= '';}

?>
     	  <div class="layui-input-inline"> <input name="qx[]"  <?=$shipinqx?>   type="checkbox" value="视频管理">视频管理 </div>
       	  <div class="layui-input-inline"> <input name="qx[]"  <?=$tixianqx?> type="checkbox" value="提现管理">提现管理 </div>
							</div>
								</div>
							
							
							
							
	 
					 
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
						 <input name="提交" class="btn"  type="hidden"    value="提交">

										<button type="submit" class="btn btn-default btn-md pull-right">修改</button>
									</div>
								</div>
							</fieldset>
						</form>
						<? }?>
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
