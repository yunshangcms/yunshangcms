<?
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='tzdomain';
if($_GET['act'] =='del'){
	$sql = 'delete from '.flag.'tzurl where id = '.$_GET['id'].'';
	if(mysql_query($sql)){
		alert_href('删除成功!','?');
	}else{
		alert_back('删除失败！');
	}
}

 
					?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>跳转域名</title>

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
				<li class="active">跳转域名</li>
			</ol>
		</div><!--/.row-->
<br>
	 
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">跳转域名</div>
					<div class="panel-body">
 					<a href="tzdomain_pladd.php" class="btn btn-primary">新增</a>
					
					<table  class="table table-hover">
					 
				 
						    <thead>
						    <tr align="center">
						        <th data-field="id"  >ID</th>
						        <th data-field="name">域名</th>
						        <th  align="center">操作</th>
						    </tr>
						    </thead>
							
							
							 
						<?php
					 
				 $result = mysql_query('select * from '.flag.'tzurl      order by id desc ,id desc');
					 
						while($row = mysql_fetch_array($result)){
						?>
						
															<tr>
									<td><? echo $row['ID']?> </td>
									 <td  ><? echo $row['name']?> </td>
									 <td> 
		                         <a class="btn do-action"  href="?act=del&id=<? echo $row['ID']?>">删除</a>						</td>
								</tr>
								
							 <? }?>
							 
						</table>
						
					  
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		 <!--/.row-->	
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
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
