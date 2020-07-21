<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='domainku';


 
if (isset($_POST['提交'])){


	null_back($_POST['content'],'请输入内容');



$array=$_POST['content'];
$array=explode("\n", $array); 
 foreach($array as $v){
        if($v!=''){
            //    $v=explode('|',$v);
                if(isset($v[1])){
                       $s[]='("'.$v[0].'","'.$v[1].'")';
					   $sl[]=$v[0];   
 					   $plkey1[]=$v;   
					   $plkey2[]=$v[1];   
					   $plkey3[]=$v[2];   
  					 
  			    }
        }
}
 
 
   for ($i = 0; $i < sizeof($s); $i++) {  
 
  
    $_data2['name'] = trim($plkey1[$i]);
	 
      
   	$str2 = arrtoinsert($_data2);
	$sql2 = 'insert into '.flag.'zhudomain ('.$str2[0].') values ('.$str2[1].')';
    mysql_query($sql2);	
	
	
  
  }
		alert_href('成功添加'.sizeof($s).'条','');


}



 
					?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>批量新增主域名库</title>

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
				<li class="active">批量新增主域名库</li>
			</ol>
		</div><!--/.row-->
		
 <br>
   
	 
			 
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> 批量新增主域名库</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							
							                 
                 
					   
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">内容</label>
									<div class="col-md-9">
                          <textarea name="content"    class="form-control"   style="height:300PX"   placeholder="格式:域名地址  一行一个"></textarea> 
							</div>
								</div>
							
							
					 
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
															<input name="提交" class="btn"  type="hidden"  class="btn btn-default btn-md pull-right"  value="提交">

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
