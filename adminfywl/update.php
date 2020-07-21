<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='update';
 $result = mysql_query('select * from '.flag.'system where id = 1');
$row = mysql_fetch_array($result);
{
$site_banben=$row['s_banben'];	
}
 
 
if ($_GET['act']=='update')
{
	
$source = $_GET['url'];
$ch = curl_init();//初始化一个cURL会话
curl_setopt($ch,CURLOPT_URL,$source);//抓取url
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//是否显示头信息
curl_setopt($ch,CURLOPT_SSLVERSION,3);//传递一个包含SSL版本的长参数
$data = curl_exec($ch);// 执行一个cURL会话
$error = curl_error($ch);//返回一条最近一次cURL操作明确的文本的错误信息。
curl_close($ch);//关闭一个cURL会话并且释放所有资源
$destination = '../update/up.zip';
$file = fopen($destination,"w+");
fputs($file,$data);//写入文件
fclose($file);

$zip = new ZipArchive;
 if ($zip->open('../update/up.zip') === TRUE) {//中文文件名要使用ANSI编码的文件格式
  $zip->extractTo('../');//提取全部文件
  //$zip->extractTo('/my/destination/dir/', array('pear_item.gif', 'testfromfile.php'));//提取部分文件
  $zip->close();
  mysql_query('update '.flag.'system set s_banben='.$_GET['banben'].' where ID = 1');
  $file = "../update/sql.php";
 if(file_exists($file))
{ file_get_contents('http://'.$_SERVER['HTTP_HOST']."/update/sql.php");}
   $path = "../update/";
   //清空文件夹函数和清空文件夹后删除空文件夹函数的处理
   function deldir($path){
    //如果是目录则继续
    if(is_dir($path)){
     //扫描一个文件夹内的所有文件夹和文件并返回数组
    $p = scandir($path);
    foreach($p as $val){
     //排除目录中的.和..
     if($val !="." && $val !=".."){
      //如果是目录则递归子目录，继续操作
      if(is_dir($path.$val)){
       //子目录中操作删除文件夹和文件
       deldir($path.$val.'/');
       //目录清空后删除空文件夹
       @rmdir($path.$val.'/');

     }else{
       //如果是文件直接删除
       unlink($path.$val);
      }

    }

   }

  }

  }
   deldir($path);
     alert_href ('更新成功','?');
} else {
  alert_href ('更新失败','?');
}


}
  
					?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>系统更新</title>

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
				<li class="active">系统更新</li>
			</ol>
		</div><!--/.row-->
		
	<br>
	 
			 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> 系统更新</div>
					<div class="panel-body">
						<form class="form-horizontal" action="" method="post">
							<fieldset>
							
							                 
                 
					   
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">当前版本</label>
									<div class="col-md-9">
V<?=$site_banben?>    						 
								</div>
									</div>
							  <? if ($banben>$site_banben) {?>
							
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">最新版本</label>
									<div class="col-md-9">
V<?=$banben?></font> <a   href="?act=update&url=<?=$url?>&banben=<?=$banben?>"> 立即更新</a> 			 
								</div>
						 
							 <? }?>	
								
						 
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
