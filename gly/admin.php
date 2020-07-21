<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='admin';
$post_name = $_POST['admin_name'];
$post_password = $_POST['admin_password'];
if(isset($_POST['提交'])){

 
 	if ($post_password !='') { 
	$_data['loginpassword'] = $post_password;
	}
 
  	$sql = 'update '.flag.'guanliyuan set '.arrtoupdate($_data).' where id ='.$guanliyuan_id.'';
	if(mysql_query($sql)){
		alert_href('账户修改成功!','');
	}else{
		alert_back('修改失败!');
	}}
 
 
					?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>修改账户</title>

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
				<li class="active">修改账户</li>
			</ol>
		</div><!--/.row-->
		
	<br>
	 
			 
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> 修改账户</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							
							                 
                 
					   
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">账户名称</label>
									<div class="col-md-9">
			                <input name="admin_name" type="text"   class="form-control"  value="<? echo $guanliyuan_name?>" placeholder="">
							</div>
								</div>
							
							
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">账户密码</label>
									<div class="col-md-9">
			                <input name="admin_password" type="text"   class="form-control"  value="" placeholder="请输入您要修改的账户密码(为空不修改)">
							</div>
								</div>
						 
							 
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
					 	<input name="提交"   type="hidden"  class="btn btn-default btn-md pull-right"  value="提交">

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
