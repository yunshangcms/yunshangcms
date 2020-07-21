<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='channel';
if (isset($_POST['提交'])){
	null_back($_POST['c_name'],'请填写分类名称');
 	non_numeric_back($_POST['c_order'],'排序必须是数字');
	$_data['name'] = $_POST['c_name'];
	$_data['sort'] = $_POST['c_order'];
	 
 	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'channel ('.$str[0].') values ('.$str[1].')';
	if (mysql_query($sql)) {
		$order = mysql_insert_id();
		if ( $_POST['c_order'] == 0 ) {
			mysql_query('update '.flag.'channel set sort = '.$order.' where id = '.$order);
		}
		 
		alert_href('分类添加成功!','channel.php');
	} else {
		alert_back('添加失败!');
	}
}



 
 
 
function update_channel(){
 
 	 $result = mysql_query('select * from '.flag.'channel where id = '.$_POST['c_main'].' order by id desc');
	 	if ($row = mysql_fetch_array($result)){

if($row['c_sub'] != '')
 {
$csub = $row['c_sub'].",";
}
else
 {
$csub = '';
 }
 
 	 $result1 = mysql_query('select * from '.flag.'channel  order by id desc');
	 	if ($row1 = mysql_fetch_array($result1)){
 mysql_query('update '.flag.'channel set c_sub = "'.$csub.$row1['ID'].'" where id = '.$_POST['c_main']);
}
}
}
 			?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>新增视频分类</title>

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
				<li class="active">新增视频分类</li>
			</ol>
		</div><!--/.row-->
		
 <br>
   
	 
			 
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> 新增视频分类</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							
							                 
                 
					   
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">分类名称</label>
									<div class="col-md-9">
 
 						  			                <input  name="c_name" type="text" class="form-control"    id="n_name" placeholder="请输入分类名称" lay-verify="required">

							</div>
								</div>
							
							
										<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">排序</label>
									<div class="col-md-9">
 
 						  			                <input  name="c_order" type="number" class="form-control"    id="c_order" placeholder="请输入排序" lay-verify="required">

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
