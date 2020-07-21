<?
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='domain';
if($_GET['act'] =='del'){
	$sql = 'delete from '.flag.'domain where id = '.$_GET['id'].'';
	if(mysql_query($sql)){
		alert_href('删除成功!','?');
	}else{
		alert_back('删除失败！');
	}
}

if ($_GET['act']=='jc') 
 {


 $post_data = array(
  'token' => '289dff07669d7a23de0ef88d2f7129e7',  
  'url' => 'http://'.$_GET['domain'].'',
  'type' => '1'
  
  );				  
 $jg=  send_post('http://wx.03426.com/api.php', $post_data);
$query = json_decode($jg, true);
 
  if  ($query['msg']=='域名状态正常')
 {mysql_query('update '.flag.'domain set zt = 0 where  ID ='.$_GET['id'].' ');};
   if  ($query['msg']!='域名状态正常')
 {mysql_query('update '.flag.'domain set zt = 1 where  ID ='.$_GET['id'].' ');};
 
 
 alert_href($query['msg'],'?');
 

 
}
  function send_post($url, $post_data) {

  $postdata = http_build_query($post_data);
  $options = array(
    'http' => array(
      'method' => 'POST',
      'header' => 'Content-type:application/x-www-form-urlencoded',
      'content' => $postdata,
      'timeout' => 15 * 60 // 超时时间（单位:s）
    )
  );
  $context = stream_context_create($options);
  $result = file_get_contents($url, false, $context);

  return $result;
}

					?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>落地域名</title>

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
				<li class="active">落地域名</li>
			</ol>
		</div><!--/.row-->
<br>
	 
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">落地域名</div>
					<div class="panel-body">
					<a href="domain_add.php" class="btn btn-primary">新增</a>
					<a href="domain_pladd.php" class="btn btn-primary">批量新增</a>
					
					<table  class="table table-hover">
					 
				 
						    <thead>
						    <tr align="center">
						        <th data-field="id"  >ID</th>
						        <th data-field="name">域名</th>
						        <th  align="center">操作</th>
						    </tr>
						    </thead>
							
							
							 
						<?php
					 
				 $result = mysql_query('select * from '.flag.'domain      order by id desc ,id desc');
					 
						while($row = mysql_fetch_array($result)){
						?>
						
															<tr>
									<td><? echo $row['ID']?> </td>
									 <td  ><? echo $row['name']?> </td>
									 <td><a class="btn do-action"  href="domain_edit.php?id=<? echo $row['ID']?>">编辑</a>
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
