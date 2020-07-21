<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
<? $nav='my';?> 
<?
if ($_POST['do']=='save')
{
null_back($_POST['title'],'请输入标题');
null_back($_POST['price'],'请输入价格');
null_back($_POST['url'],'请上传视频');
null_back($_POST['image'],'请上传封面');



$_data['uid'] = $member_id;
$_data['isdel'] = 0;
	$_data['name'] = $_POST['title'];
	$_data['image'] = $_POST['image'];
	$_data['price'] = $_POST['price'];
	$_data['url'] = $_POST['url'];
	$_data['pv'] =0;
	$_data['date'] =date('Y-m-d H:i:s');
 
 	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'usershipin ('.$str[0].') values ('.$str[1].')';
	if (mysql_query($sql)) {
 
		alert_href('添加成功!','upload.php');
	} else {
		alert_back('添加失败!');
	}
	
	
	
}

?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <title>上传视频-<?=$site_name?></title>
         <link href="agency/css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="agency/js/jquery-1.11.2.min.js"></script>
         <script type="text/javascript" src="agency/js/public.js"></script>
        <script type="text/javascript" src="agency/js/winset.js"></script>
        
        	
 <link rel="stylesheet" href="../editor/themes/default/default.css" />
  <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../ui/ui.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>
<script charset="utf-8" type="text/javascript" src="../editor/kindeditor.js"></script>

 <script type="text/javascript">
KindEditor.ready(function(K) {
	K.create('#i_content');
	var editor = K.editor();
	K('#upload-video-cover').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
			imageUrl : K('#cover-url').val(),
			clickFn : function(url, title, width, height, border, align) {
				K('#cover-url').val(url);
				editor.hideDialog();
				}
			});
		});
	});
 	K('#upload-video').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#url').val(),
				clickFn : function(url, title) {
					K('#url').val(url);
					editor.hideDialog();
				}
			});
			
 		});
	});
	
	
 
	 
	
	
});

 </script>	
 
    </head>
    <body>
        <section id="container">
            <div id="ts_loadering"></div>
            <!-------------------mid0------------>
            <div class="toptitle_box">
                <div class="conbox"><i onclick="javascript:history.go(-1);"><img src="agency/images/back.png"></i><span>视频上传</span>
                </div>
            </div>
            <div class="h_updatepwd_box">
                <form method="post" name="infoform">
 <input type="hidden" name="do" value="save" />
                    <div class="m_con"><span>标题：</span>
                         
                                                <input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="m_text">

                    </div>
                    <div class="m_con"><span>价格：</span>
                        <input type="text" name="price" required lay-verify="required|price" placeholder="请输入价格" autocomplete="off" class="m_text">
                    </div>
                    <div class="m_con"><span>视频链接：</span>
                                    <input  name="url"  id="url" type="text" placeholder="请输入视频链接" autocomplete="off" class="m_text">
                                   <? if ($site_userupload==1) {?>     <button type="button" class="layui-btn" id="upload-video">上传视频</button><? }?>

                    </div>
                    
                      <div class="m_con"><span>视频封面：</span>
                                    <input id="cover-url" type="text"  name="image" placeholder="请输入视频封面图链接" autocomplete="off" class="m_text">   <? if ($site_userupload==1) {?> <button type="button" class="layui-btn" id="upload-video-cover">上传视频封面</button>
<? }?>
                    </div>
                    
                     
                    <input   type="submit" class="m_sub" value="提交"  >
                </form>
            </div>
 
         

            <div class="f_padheght"></div>
            <!-------------------mid1------------>
            <!---------------bottom0------------>
          <? include('footer.php'); ?>

            <!---------------bottom1------------>
        </section>
    </body>

</html>