<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='daili';
if ( isset($_POST['提交']) ) {
	null_back($_POST['rmb'],'请输入用户余额');
	
	if ($_POST['shangji']!='')
	{
	if ($_POST['shangji']==$_GET['id'])	
{		alert_href('不允许设置自己为自己的上级',''); }

	$result = mysql_query('select * from '.flag.'user where id = '.$_POST['shangji'].'');
if ($row = mysql_fetch_array($result))
{ 	$_data['shangji'] = $_POST['shangji'];   }	
else
{		alert_href('上级ID:'.$_POST['shangji'].'不存在',''); }
	
	}
	
 	$_data['nickname'] = $_POST['nickname'];
	if ($_POST['password']!='')
 	{$_data['password'] = $_POST['password'];}
 	$_data['rmb'] = $_POST['rmb'];
 	$_data['sxf'] = $_POST['sxf'];
 
 	$_data['ticheng'] = $_POST['ticheng'];
	$str = arrtoinsert($_data);
	$sql = 'update '.flag.'user set '.arrtoupdate($_data).' where id = '.$_GET['id'].'';
	if (mysql_query($sql)) {
		$order = mysql_insert_id();
 	}  {
		alert_href('修改成功!','daili.php');
	}
}
  			?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>修改代理</title>

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
				<li class="active">修改代理</li>
			</ol>
		</div><!--/.row-->
		
 <br>
   
	 
			 
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> 修改代理</div>
					<div class="panel-body">
						<?php
					$result = mysql_query('select * from '.flag.'user where id = '.$_GET['id'].' ');
					if ($row = mysql_fetch_array($result)){
					?>
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							
							                		<div class="form-group">
									<label class="col-md-3 control-label" for="name">用户ID</label>
									<div class="col-md-9">
 
			                <input   type="text"  class="form-control"    readonly=""  value="<? echo $row['ID'];?>" >

							</div>
								</div> 
                 
					   
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">用户名</label>
									<div class="col-md-9">
 
			                <input   type="text" class="form-control" readonly=""  value="<? echo $row['ID'];?>" >


							</div>
								</div>
							
							 
							 
							 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">用户密码</label>
									<div class="col-md-9">
 
			                <input   type="text" class="form-control"     name="password"  value="" placeholder="不修改则为空" >

							</div>
								</div>
								
								
											 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">用户QQ</label>
									<div class="col-md-9">
 
			                <input   type="number" class="form-control"     name="qq"  value="<? echo $row['qq'];?>" >

							</div>
								</div>
							
							 
							 
							 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">用户余额</label>
									<div class="col-md-9">
 
			                <input   type="text" class="form-control"     name="rmb"  value="<? echo $row['rmb'];?>" >

							</div>
								</div>
								
								
									 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">提现手续费</label>
									<div class="col-md-9">
 
			                <input   type="text" class="form-control"     name="sxf"  value="<? echo $row['sxf'];?>" >

							</div>
								</div>
								
							
							
							 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">上级ID</label>
									<div class="col-md-9">
 
			                <input   type="text" class="form-control"     name="shangji"  value="<? echo $row['shangji'];?>" >

							</div>
								</div>
								
						
							 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">提成</label>
									<div class="col-md-9">
 
			                <input   type="text" class="form-control"   placeholder="单位%"   name="ticheng"  value="<? echo $row['ticheng'];?>" >

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
