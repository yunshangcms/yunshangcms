	<? include('../system/inc.php');include('check.php');
	if ($_POST['do']=='save')
{
null_back($_POST['content'],'请输入反馈内容');

 	 
	 
    $_data['uid'] = $member_id;
  	$_data['remark'] = $_POST['content'];
  	$_data['date'] = date('Y-m-d H:i:s');
 	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'fankui ('.$str[0].') values ('.$str[1].')';
		if (mysql_query($sql)) {
 
 		alert_href('反馈成功!','');
	} else {
		alert_back('反馈失败!');
	}
	
	
	
}
 ?>
	 <!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>在线反馈</title>
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
						<label class="layui-form-label">反馈内容</label>
						<div class="layui-input-block">
							<textarea  name="content" class="layui-input" placeholder="请输入反馈内容" autocomplete="off"></textarea>
						</div>
	
					</div>
					
						  
                   
                  
                   <div class="layui-form-item layui-">
                    <button id="submit" class="layui-btn" lay-submit lay-filter="uploadForm">确定</button>
                </div>

                     
			 
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
             { field: 'remark', title: '反馈' ,width:400},
            {field:'date', title: '时间' },
            {field:'huifu', title: '回复' , templet: '#priceTpl'}
             
         ]
    ],
    url: 'ajax.php?act=fankui',
    id: 'video'
})



</script>
	 </body>
	</html>