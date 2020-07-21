<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='kouliang';

if (isset($_POST['提交'])){
	null_back($_POST['uid'],'请输入用户UID');
	null_back($_POST['num'],'请输入笔数');
	null_back($_POST['nums'],'请输入扣量');
 
 
  
  $result = mysql_query('select * from '.flag.'kouliang where uid = '.$_POST['uid'].'');
if ($row = mysql_fetch_array($result))
{
	{ alert_back('添加失败:该用户已有扣量存在'); }

	
}
 
  $result = mysql_query('select * from '.flag.'user where id = '.$_POST['uid'].'');
if ($row = mysql_fetch_array($result))
{
 	
	$_data['uid'] = $_POST['uid'];
	$_data['num'] = $_POST['num'];
	$_data['nums'] = $_POST['nums'];
 
	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'kouliang ('.$str[0].') values ('.$str[1].')';
	if (mysql_query($sql)) {
		$order = mysql_insert_id();
      
      	 $kouliangsql = 'update '.flag.'order set kouliang=1 where uid = '.$_POST['uid'].' ';
     mysql_query($kouliangsql);
      
	 
		alert_href('扣量添加成功1!','kouliang.php');
	} else {
		alert_back('添加失败!');
	}
	
	
}
else
{ alert_back('添加失败:用户UID:'.$_POST['uid'].'不存在!!'); }
 	 
}
 			?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>新增扣量</title>

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
				<li class="active">新增扣量</li>
			</ol>
		</div><!--/.row-->
		
 <br>
   
	 
			 
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> 新增扣量</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							
							                 
                 
					   
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">扣量用户</label>
									<div class="col-md-9">
									     <select        class="form-control"  id="user" name="user"  data-val="true"  >
 								
									<?php
						$result = mysql_query('select * from '.flag.'user  order by ID desc ,id desc');
						while($row = mysql_fetch_array($result)){
						?>
			                <option value="<? echo $row['ID'];?>"><? echo $row['username'];?> [UID:<?=$row['ID']?>]</option>
							
							 
		                  <? } ?>
						  </select>
						  
  

							</div>
								</div>
							
							
										<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">用户UID</label>
									<div class="col-md-9">
 
 			                <input name="uid" type="text"  class="form-control" id="uid" placeholder="请输入用户UID"    >


 
							</div>
								</div>
							
							
							
										<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">笔数</label>
									<div class="col-md-9">
 
 
			                <input name="num" type="text"  class="form-control"  id="" placeholder="请输入笔数"    >

 
							</div>
								</div>
											<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">扣量</label>
									<div class="col-md-9">
 
 
			                <input name="nums" type="text"   class="form-control"  id="" placeholder="请输入扣量"    >

 
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
