<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='tzurl';

if(isset($_POST['提交'])){
	$_data['s_tzdomain1'] = trim($_POST['s_tzdomain1']);
	$_data['s_tzdomain2'] = trim($_POST['s_tzdomain2']);
	$_data['s_tzdomain3'] = trim($_POST['s_tzdomain3']);
	$_data['s_tzdomain4'] = trim($_POST['s_tzdomain4']);
	$_data['s_tzdomain5'] = trim($_POST['s_tzdomain5']);
	$_data['s_tzdomain6'] = trim($_POST['s_tzdomain6']);
	$_data['s_tzdomain7'] = trim($_POST['s_tzdomain7']);
	$_data['s_tzdomain8'] = trim($_POST['s_tzdomain8']);
	$_data['s_tzdomain9'] = trim($_POST['s_tzdomain9']);
	$_data['s_tzdomain10'] = trim($_POST['s_tzdomain10']);
  	
  	$sql = 'update '.flag.'system set '.arrtoupdate($_data).' where id = 1';
	if(mysql_query($sql)){
		alert_href('跳转域名修改成功!','tzurl.php');
	}else{
		alert_back('修改失败!');
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
	
 <link rel="stylesheet" href="../editor/themes/default/default.css" />
  <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../ui/ui.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>
<script charset="utf-8" type="text/javascript" src="../editor/kindeditor.js"></script>

 <script type="text/javascript">
KindEditor.ready(function(K) {
	K.create('#s_notice');
	var editor = K.editor();
	K('#upload-image').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#site_logo').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#site_logo').val(url);
				editor.hideDialog();
				}
			});
		});
	});
	K('#slideshow').click(function() {
		editor.loadPlugin('multiimage', function() {
			editor.plugin.multiImageDialog({
				clickFn : function(urlList) {
					var tem_val = '';
					var tem_s = '';
					K.each(urlList, function(i, data) {
						tem_val = tem_val + tem_s + data.url;
						tem_s = '|';
					});
					K('#d_slideshow').val(tem_val);
					editor.hideDialog();
				}
			});
		});
	});
	K('#download1').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#download_url1').val(),
				clickFn : function(url, title) {
					K('#download_url1').val(url);
					editor.hideDialog();
				}
			});
			
 		});
	});
	
	
	K('#download2').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#download_url2').val(),
				clickFn : function(url, title) {
					K('#download_url2').val(url);
					editor.hideDialog();
				}
			});
			
 		});
	});
	
	
		K('#download3').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#download_url3').val(),
				clickFn : function(url, title) {
					K('#download_url3').val(url);
					editor.hideDialog();
				}
			});
			
 		});
	});
	
	
		K('#download4').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#download_url4').val(),
				clickFn : function(url, title) {
					K('#download_url4').val(url);
					editor.hideDialog();
				}
			});
			
 		});
	});
	
	
});
</script>	
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
		
		<div class="row">
			<div class="col-lg-12">
<h1 class="page-header">跳转域名</h1>			</div>
		</div><!--/.row-->
        
   
	 
			 
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> Sys</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							
							                 
                 
					   
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">域名一</label>
									<div class="col-md-9">
 			
						  			                <input name="s_tzdomain1" type="text"  class="form-control"   id="domain" value="<? echo $site_tzdomain1?>" placeholder="跳转域名一">

				</div>
								</div>
							
							
							
						 
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">域名二</label>
									<div class="col-md-9">
			                <input name="s_tzdomain2" type="text" class="form-control" id="domain" value="<? echo $site_tzdomain2?>" placeholder="跳转域名二">
					</div>
								</div>
								
								
								 
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">域名三</label>
									<div class="col-md-9">
      			                <input name="s_tzdomain3" type="text" class="form-control" id="domain" value="<? echo $site_tzdomain3?>" placeholder="跳转域名三">

								</div>
								
								</div>
								
								
								
									 
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">域名四</label>
									<div class="col-md-9">
					                <input name="s_tzdomain4" type="text" class="form-control" id="domain" value="<? echo $site_tzdomain4?>" placeholder="跳转域名四">

								</div>
								
								</div>
								
								
								
								
							 
								
							
							
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">域名五</label>
									<div class="col-md-9">
			                <input name="s_tzdomain5" type="text" class="form-control" id="domain" value="<? echo $site_tzdomain5?>" placeholder="跳转域名五">
		</div>
								</div>
								
								
								
							
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">域名六</label>
									<div class="col-md-9">
			                <input name="s_tzdomain6" type="text" class="form-control" id="domain" value="<? echo $site_tzdomain6?>" placeholder="跳转域名六">
		</div>
								</div>
								
								
								
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">域名七</label>
									<div class="col-md-9">
			                <input name="s_tzdomain7" type="text" class="form-control" id="domain" value="<? echo $site_tzdomain7?>" placeholder="跳转域名七">
		</div>
								</div>
								
							
							
									
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">域名八</label>
									<div class="col-md-9">
			                <input name="s_tzdomain8" type="text" class="form-control" id="domain" value="<? echo $site_tzdomain8?>" placeholder="跳转域名八">
		</div>
								</div>
								
							
							
										
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">域名九</label>
									<div class="col-md-9">
			                <input name="s_tzdomain9" type="text" class="form-control" id="domain" value="<? echo $site_tzdomain9?>" placeholder="跳转域名九">
		</div>
								</div>
								
							
										
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">域名十</label>
									<div class="col-md-9">
			                <input name="s_tzdomain10" type="text" class="form-control" id="domain" value="<? echo $site_tzdomain10?>" placeholder="跳转域名十">
		</div>
								</div>
								
							
							 
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
															<input name="提交"    type="hidden"  class="btn btn-default btn-md pull-right"  value="提交">

										<button type="submit" class="btn btn-default btn-md pull-right">提交</button>
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
