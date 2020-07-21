<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body><?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='sys';

if(isset($_POST['提交'])){
	$_data['s_mintxje'] = $_POST['s_mintxje'];
	$_data['s_maxtxje'] = $_POST['s_maxtxje'];
	$_data['s_maxtxcs'] = $_POST['s_maxtxcs'];
	$_data['s_txsxf'] = $_POST['s_txsxf'];
	$_data['s_api'] = $_POST['s_api'];
	$_data['s_name'] = $_POST['s_name'];
	$_data['s_sname'] = $_POST['s_sname'];
	$_data['s_content'] = $_POST['s_content'];
	$_data['s_domain'] = trim($_POST['s_domain']);
	$_data['s_domains'] = trim($_POST['s_domains']);
	$_data['s_hezi'] = $_POST['s_hezi'];
	$_data['s_suiji'] = $_POST['s_suiji'];
	$_data['s_pc'] = $_POST['s_pc'];
	$_data['s_userupload'] = $_POST['s_userupload'];
	$_data['s_fangfengurl'] = $_POST['s_fangfengurl'];
	$_data['s_morenticheng'] = $_POST['s_morenticheng'];
	$_data['s_tichengset'] = $_POST['s_ticheng'];
	$_data['s_dingshi'] = $_POST['s_dingshi'];
	$_data['s_notice'] = $_POST['s_notice'];
	$_data['s_wapnotice'] = $_POST['s_wapnotice'];
    $_data['s_dailiprice'] = floatval($_POST['s_dailiprice']);
    $_data['s_tzweiba']=$_POST['s_tzweiba'];
    $_data['s_sort']=$_POST['s_sort'];
  	$sql = 'update '.flag.'system set '.arrtoupdate($_data).' where id = 1';
	if(mysql_query($sql)){
	
	
	 $filename="../system/apiurl.php";

//配置文件内容
 	$config = '';
	$config .= '<?php';
	$config .= "\n";
   	$config .= 'define(\'apiurl\', \''.apiurl.'\');';
	$config .= "\n";	
   	$config .= 'define(\'template\', \''.$_POST['template'].'\');';
	$config .= "\n";		
 	$config .= '?>';

     if(is_writable($filename)){//检测是否有权限可写
        $handle=fopen($filename, "w+");
        fwrite($handle, $config);
		
		ob_start();
session_start();
 
 }
   
  
  
  
		alert_href('系统设置修改成功!','sys.php');
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
<title>系统设置</title>

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
				<li class="active">系统设置</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
<h1 class="page-header">系统设置</h1>			</div>
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
									<label class="col-md-3 control-label" for="name">会员视频排序</label>
									<div class="col-md-9">
  <select name="sort" class="form-control"    data-val="true" lay-filter="pid"  lay-verify="required">
  			                <option <?  if ($site_sort ==0) { echo "selected";}?>  value="0"  >随机排序</option>
  			                <option <?  if ($site_sort ==1) { echo "selected";}?>  value="1"  >升序排列</option>
  			                <option <?  if ($site_sort =='2') { echo "selected";}?>  value="2"  >降序排列</option>
   								 
						  </select>									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">打赏页模板</label>
									<div class="col-md-9">
  <select name="template" class="form-control"    data-val="true" lay-filter="pid"  lay-verify="required">
  			                <option <?  if (template =='01') { echo "selected";}?>  value="01"  >默认风格</option>
  			                <option <?  if (template =='02') { echo "selected";}?>  value="02"  >风格2</option>
  			                <option <?  if (template =='03') { echo "selected";}?>  value="03"  >风格3</option>
  			                <option <?  if (template =='04') { echo "selected";}?>  value="04"  >风格4</option>
  								 
						  </select>									</div>
								</div>
					   
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">电脑访问</label>
									<div class="col-md-9">
  <select name="s_pc" class="form-control"    data-val="true" lay-filter="pid"  lay-verify="required">
  			                <option <?  if ($site_pc =='1') { echo "selected";}?>  value="1"  >允许</option>
			                <option  <?  if ($site_pc =='0') { echo "selected";}?> value="0"  >不允许</option>
 								 
						  </select>									</div>
								</div>
							
							
							
						 
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">代理上传</label>
									<div class="col-md-9">
      <select name="s_userupload"  class="form-control"   data-val="true" lay-filter="pid"  lay-verify="required">
  			                <option <?  if ($site_userupload =='1') { echo "selected";}?>  value="1"  >允许</option>
			                <option  <?  if ($site_userupload =='0') { echo "selected";}?> value="0"  >不允许</option>
 								 
						  </select>							</div>
								</div>
								
								
								 
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">盒子推广</label>
									<div class="col-md-9">
         <select name="s_hezi"     class="form-control"   lay-verify="required">
  			                <option <?  if ($site_hezi =='1') { echo "selected";}?>  value="1"  >启用</option>
			                <option  <?  if ($site_hezi =='0') { echo "selected";}?> value="0"  >关闭</option>
 								 
						  </select>					</div>
								</div>
								
								
									<div class="form-group">
									<label class="col-md-3 control-label" for="name">随机打赏数</label>
								 	<div class="col-md-9">
         <select name="s_suiji"     class="form-control"   lay-verify="required">
   			                <option <?  if ($site_suiji =='1') { echo "selected";}?>  value="1"  >启用</option>
			                <option  <?  if ($site_suiji =='0') { echo "selected";}?> value="0"  >关闭</option>
 								 
						  </select>				</div>
								</div>
                              
                        
								
							
							
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">网站标题</label>
									<div class="col-md-9">
      			                <input name="s_name" type="text"  class="form-control"   value="<? echo $site_name?>" placeholder="请输入网站标题">
		</div>
								</div>
								
								
								
							
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">网站副标题</label>
									<div class="col-md-9">
			                <input name="s_sname" type="text" class="form-control"  value="<? echo $site_sname?>" placeholder="请输入网站副标题">
		</div>
								</div>
								
								
								
								
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">平台公告</label>
									<div class="col-md-9">
			                <textarea name="s_notice" id="s_notice" class="form-control" placeholder="请输入平台公告"><? echo $site_notice?></textarea>
		</div>
								</div>
								
							
							
									
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">移动端公告</label>
									<div class="col-md-9">
			                <textarea name="s_wapnotice" id="s_wapnotice" class="form-control" placeholder="请输入手机版公告"><? echo $site_wapnotice?></textarea>
		</div>
								</div>
								
							
							
										
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">版权信息</label>
									<div class="col-md-9">
			                <textarea name="s_content"  class="form-control"  placeholder="请输入版权信息"><? echo $site_content?></textarea>
		</div>
								</div>
								
							
										
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">主域名</label>
									<div class="col-md-9">
			                <input name="s_domain" type="text"    class="form-control" id="domain" value="<? echo $site_domain?>" placeholder="请输入主域名">
		</div>
								</div>
								
							
							
											
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">落地域名随机调用</label>
									<div class="col-md-9">
      <select name="s_domains"   data-val="true" lay-filter="pid"   class="form-control"   lay-verify="required">
			                <option value="1" <?  if ($site_domains =='1') { echo "selected";}?>  >开启</option>
			                <option value="0" <?  if ($site_domains =='0') { echo "selected";}?>  >关闭</option>
									 
						  </select>		</div>
								</div>
								
							
							
											
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">防封尾缀</label>
									<div class="col-md-9">
          			                <input name="s_fangfengurl" type="text"  class="form-control"  value="<? echo $site_fangfengurl?>" placeholder="仿封尾缀"> 
	</div>
								</div>
									<div class="form-group">
									<label class="col-md-3 control-label" for="name">跳转尾缀</label>
									<div class="col-md-9">
          			                <input name="s_tzweiba" type="text"  class="form-control"  value="<? echo $site_tzweiba?>" placeholder="跳转尾缀"> 
	</div>
								</div>
								
								
												
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">代理金额限制</label>
									<div class="col-md-9">
			                <input name="s_dailiprice" type="text"  class="form-control" id="dailiprice" value="<? echo $site_dailiprice ?>" placeholder="代理金额限制">
	</div>
								</div>
								
								
							
							
									<div class="form-group">
									<label class="col-md-3 control-label" for="name">默认提成</label>
									<div class="col-md-9">
    			                <input name="s_morenticheng" type="text"   class="form-control"     value="<? echo $site_morenticheng?>" placeholder="代理默认提成"> 
	</div>
								</div>
								
								
								      <div class="form-group">
									<label class="col-md-3 control-label" for="name">代理自定义提成</label>
								 	<div class="col-md-9">
         <select name="s_ticheng"     class="form-control"   lay-verify="required">
   			                <option <?  if ($site_setticheng =='1') { echo "selected";}?>  value="1"  >启用</option>
			                <option  <?  if ($site_setticheng =='0') { echo "selected";}?> value="0"  >关闭</option>
 								 
						  </select>				</div>
								</div>
								
								 
								

							
									<div class="form-group">
									<label class="col-md-3 control-label" for="name">最低提现金额</label>
									<div class="col-md-9">

    			                <input name="s_mintxje" type="text" class="form-control"  value="<? echo $site_mintxje?>" placeholder="最低提现金额"> 
	</div>
								</div>
								

									<div class="form-group">
									<label class="col-md-3 control-label" for="name">最高提现金额</label>
									<div class="col-md-9">

    			                <input name="s_maxtxje" type="text"  class="form-control"    value="<? echo $site_maxtxje?>" placeholder="最高提现金额"> 
	</div>
								</div>
							
							
									<div class="form-group">
									<label class="col-md-3 control-label" for="name">每日最多提现次数</label>
									<div class="col-md-9">

    			              			                <input name="s_maxtxcs" type="text"  class="form-control"    value="<? echo $site_maxtxcs?>" placeholder="每日最多提现次数"> 

	</div>
								</div>
								
								
										<div class="form-group">
									<label class="col-md-3 control-label" for="name">短网址接口</label>
									<div class="col-md-9">

      <select name="s_api"   data-val="true" lay-filter="pid"    class="form-control"  lay-verify="required">
			                <option value=""  >请选择短网址接口</option>
			                <option value="0" <?  if ($site_dwz =='0') { echo "selected";}?>   >不设置</option>
			                <option <?  if ($site_dwz =='tcn') { echo "selected";}?>  value="tcn"  >t.cn</option>
			                <option  <?  if ($site_dwz =='urlcn') { echo "selected";}?> value="urlcn"  >url.cn</option>
			                <option  <?  if ($site_dwz =='wcn') { echo "selected";}?> value="wcn"  >wcn</option>
 								 
						  </select>
	</div>
								</div>
								
								
								
								
										<div class="form-group">
									<label class="col-md-3 control-label" for="name">试看时间</label>
									<div class="col-md-9">

    			                <input name="s_dingshi" type="text"  class="form-control"  value="<? echo $site_dingshi?>" placeholder="请输入试看时间"> 

	</div>
								</div>
								
								
								
								
								
								
										<div class="form-group">
									<label class="col-md-3 control-label" for="name">提现手续费</label>
									<div class="col-md-9">

    			                <input name="s_txsxf" type="text"   class="form-control"  value="<? echo $site_txsxf?>" placeholder="提现手续费%"> 

	</div>
								</div>
								
								
							 
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
															<input name="提交"  type="hidden"  class="btn btn-default btn-md pull-right"  value="提交">

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

</body>
</html>
