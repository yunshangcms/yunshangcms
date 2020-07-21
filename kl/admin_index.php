<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='home';
function get_shipin()
{
	$result = mysql_query('select count(*) as sl1 from '.flag.'shipin  ');
	if (!!($row = mysql_fetch_array($result))) {
		return $row['sl1'];
	} else {
		return '0';
	}
}

 
function get_daili()
{
	$result = mysql_query('select count(*) as sl1 from '.flag.'user  ');
	if (!!($row = mysql_fetch_array($result))) {
		return $row['sl1'];
	} else {
		return '0';
	}
}


function get_guanliyuan()
{
	$result = mysql_query('select count(*) as sl1 from '.flag.'gaunliyuan  ');
	if (!!($row = mysql_fetch_array($result))) {
		return $row['sl1'];
	} else {
		return '0';
	}
}


function get_ordersls()
{
	$result = mysql_query('select count(*) as sl1 from '.flag.'order where zt =1  ');
	if (!!($row = mysql_fetch_array($result))) {
		return $row['sl1'];
	} else {
		return '0';
	}
}


 
   $squrl=squrl;
				 $query=file_get_contents('http://'.$squrl.'/ajax.php?ip='.sqip.'&act=alert');
			    $query = json_decode($query, true);
				if ($query['status']=='0')
				{$alert=$query['msg'];}
				else
				{$alert='';}
 
					$result = mysql_query('select   * from '.flag.'log  order by id desc');
					if ($row = mysql_fetch_array($result)){
					
					$dlsj=$row['l_date'];
					$dlip=$row['l_ip'];
				
					}
					?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>管理首页</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<? include('header.php');?>
		
	<? include('left.php');?><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"  style="font-size:12PX">提示：尊敬的 <? echo $a_name ;?>（超级管理员），欢迎您的使用云赏系统，您本次登录时间:<? echo $dlsj	 ;?>，登录IP为 <? echo $dlip	 ;?></h1>
			</div>
		</div><!--/.row-->
        
        <div class="copyrights">@<?=date('Y')?></div>
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-shopping-cart glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?=get_ordersls()?></div>
							<div class="text-muted">订单总数</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-comment glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?=get_guanliyuan()?></div>
							<div class="text-muted">管理员总数</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-user glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?=get_daili()?></div>
							<div class="text-muted">代理总数</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<em class="glyphicon glyphicon-stats glyphicon-l"></em>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?=get_shipin()?></div>
							<div class="text-muted">视频总数</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">访问统计</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row--><!--/.row-->
        <!--/.row-->
    </div>
	<!--/.main-->

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
