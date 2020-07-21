	<? include('../system/inc.php');include('check.php');
	if ($_POST['do']=='save')
{
null_back($_POST['ticheng'],'请输入提成');

 	 
	 
	$usql = 'update '.flag.'user set ticheng = '.$_POST['ticheng'].' where ID ='.$member_id.'';
	if (mysql_query($usql)) {
 
 		alert_href('设置成功!','');
	} else {
		alert_back('设置失败!');
	}
	
	
	
}
 ?>
	 <!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>我的邀请码</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		
		<link rel="stylesheet" href="layui/css/layui.css">
		<link rel="stylesheet" href="css/pc.css">
		
		<script type="text/javascript" src="/statics/js/jquery.min.js"></script>
		<script type="text/javascript" src="/statics/js/ui.js"></script>
		<script type="text/javascript" src="/statics/js/public.js"></script>
		<script type="text/javascript" src="/statics/layui/layui.js"></script>
		<script type="text/javascript" src="/statics/js/global.js"></script>
	<script type="text/javascript" src="./js/pinyin.js"></script>
	
	 <link rel="stylesheet" href="../editor/themes/default/default.css" />
	  <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="../ui/ui.js"></script>
	<script type="text/javascript" src="../js/admin.js"></script>
	<script charset="utf-8" type="text/javascript" src="../editor/kindeditor.js"></script>
	
	
		<script>
				KindEditor.ready(function(K) {
					var uploadbutton = K.uploadbutton({
						button : K('#uploadButton')[0],
						fieldName : 'imgFile',
						url : '../editor/php/shoukuantu.php?dir=file',
						afterUpload : function(data) {
							if (data.error === 0) {
								var url = K.formatUrl(data.url, 'absolute');
								K('#skt').val(url);
							} else {
								alert(data.message);
							}
						},
						afterError : function(str) {
							alert('自定义错误信息: ' + str);
						}
					});
					uploadbutton.fileBox.change(function(e) {
						uploadbutton.submit();
					});
				});
			</script>
	
	
		
	</head>
	<body>
	
	<style>
		.layui-table, .layui-table-view{margin: 0;}
	</style>
    
     
  
 
	<div class="layui-fluid child-body">
    
				<form class="layui-form layui-form-pane" action=""  method="post">
			 <input name="do" type="hidden" value="save">
			   
					<div class="layui-form-item">
						<label class="layui-form-label">推广链接</label>
						<div class="layui-input-block">
							<input type="text" name=""    readonly  placeholder="我的链接"  value="http://<?=$dqurl?>/register.php?uid=<?=$member_id?>" autocomplete="off" class="layui-input">
						</div>
	
					</div>
					
						 <div class="layui-form-item">
						<label class="layui-form-label">我的邀请码</label>
						<div class="layui-input-block">
							<input type="text" name=""  readonly   value="<?=base64_encode($member_id)?>"   placeholder="我的邀请码" autocomplete="off" class="layui-input">
						</div>
	
					</div>
                  
                   <div class="layui-form-item">
						<label class="layui-form-label">我的提成</label>
						<div class="layui-input-block">
							<input type="text" name="" readonly      value="<?=$member_ticheng?>%"     autocomplete="off" class="layui-input">
						</div>
	
					</div>
                  
                  
                    <? if ($site_setticheng==1) {?>
                    
                    	 <div class="layui-form-item">
						<label class="layui-form-label">提成设置</label>
						<div class="layui-input-block">
							<input type="text" name="ticheng"      value="<?=$member_ticheng?>"     autocomplete="off" class="layui-input">
						</div>
	
					</div>
						
                
						<? }?>
                        
                     
			 
				</form>
 

     <table id="video" lay-filter="list"></table>
	 
	</div>
 
 
	
	
<script src="layui/layui.all.js"></script>
<script src="js/pc.min.js"></script>

<script>
editItem=null

table.render({
    elem: '#video', //指定原始表格元素选择器（推荐id选择器）
    cols: [
        [ //标题栏
            { checkbox: true },
            { field: 'id', title: 'ID', width: 80 },
             { field: 'title', title: '账号' ,width:400},
            {field:'dsnnum', title: '打赏数',width:80 },
            {field:'ticheng', title: '提成',width:80 , templet: '#priceTpl'}
             
         ]
    ],
    url: 'ajax.php?act=xiaji',
    id: 'video'
})



</script>
	 </body>
	</html>