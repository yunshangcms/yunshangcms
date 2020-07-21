<? include('../system/inc.php');include('check.php'); ?>
<?
if ($_POST['do']=='save')
{
null_back($_POST['title'],'请输入标题');
null_back($_POST['price'],'请输入价格');
null_back($_POST['url'],'请上传视频');
null_back($_POST['image'],'请上传封面');



$_data['uid'] = $member_id;
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

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>上传视频</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    
    <link rel="stylesheet" href="layui/css/layui.css">
    <link rel="stylesheet" href="css/pc.css">
	
	
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
				fileUrl : K('#video-url').val(),
				clickFn : function(url, title) {
					K('#video-url').val(url);
					editor.hideDialog();
				}
			});
			
 		});
	});
	
	
 
	 
	
	
});

 </script>	
 

    
</head>
<body>

<div class="layui-fluid child-body">
    <div class="layui-row">
        <div class="layui-col-md6">
            <form id="myform" class="layui-form layui-form-pane" action="" method="post">
                <input type="hidden" name="do" value="save" />
                <input type="hidden" name="key" value="" />
                <input type="hidden" name="key_cover" value="" />
                <input type="hidden" name="duration" value="" />
                <div class="layui-form-item">
                    <label class="layui-form-label">标题</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">价格</label>
                    <div class="layui-input-block">
                        <input type="text" name="price" required lay-verify="required|price" placeholder="请输入价格" autocomplete="off" class="layui-input">
                    </div>
                    
                          
                    
                    <? if ($site_userupload==0) {?>
                       </div>
                      
                    
                      <div class="layui-form-item">
                                <label class="layui-form-label">视频链接</label>
                                <div class="layui-input-block">
                                    <input  name="url" type="text" placeholder="请输入视频链接" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            
                            
                            <blockquote class="layui-elem-quote layui-quote-nm">例如：http://www.baidu.com/xxx.mp4（http开头的视频播放地址链接）</blockquote>
                            <div class="layui-form-item">
                                <label class="layui-form-label">视频封面图</label>
                                <div class="layui-input-block">
                                    <input id="cover-url" type="text"  name="image" placeholder="请输入视频封面图链接" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <blockquote class="layui-elem-quote layui-quote-nm">例如：http://www.baidu.com/img/bd_logo1.png（http开头的图片链接）</blockquote>
                            
                            
                    <? } ?>
                    
                </div>
                             <? if ($site_userupload==1) {?>
                             
                                <div class="layui-tab" lay-filter="tab">
                    <ul class="layui-tab-title">
                        <li class="layui-this">手动上传</li>
                        <li>使用外链</li>
                    </ul>
                    <div class="layui-tab-content">
                        <div class="layui-tab-item layui-show">
                            <div class="layui-form-item">
                                <button type="button" class="layui-btn" id="upload-video">上传视频</button>
                            </div>
                            <div class="layui-form-item layui-hide" id="upload-video-progress">
                                <br>
                                <div class="layui-progress" lay-filter="upload-video-progress" lay-showPercent="true">
                                    <div class="layui-progress-bar layui-bg-red" lay-percent="0%"></div>
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <button type="button" class="layui-btn" id="upload-video-cover">上传视频封面</button>
                            </div>
                            <div class="layui-form-item layui-hide" id="upload-video-cover-progress">
                                <br>
                                <div class="layui-progress" lay-filter="upload-video-cover-progress" lay-showPercent="true">
                                    <div class="layui-progress-bar layui-bg-red" lay-percent="0%"></div>
                                </div>
                            </div>
                            <blockquote class="layui-elem-quote layui-quote-nm">
                                <p>视频只支持mp4、avi格式，最大20M</p>
                                <p>封面图片只支持jpg、png格式，最大5M</p>
                                                            </blockquote>
                        </div>
                        
                        
                        <div class="layui-tab-item"  >
                            <div class="layui-form-item">
                                <label class="layui-form-label">视频链接</label>
                                <div class="layui-input-block">
                                    <input id="video-url"  name="url" type="text" placeholder="请输入视频链接" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <blockquote class="layui-elem-quote layui-quote-nm">例如：http://www.baidu.com/xxx.mp4（http开头的视频播放地址链接）</blockquote>
                            <div class="layui-form-item">
                                <label class="layui-form-label">视频封面图</label>
                                <div class="layui-input-block">
                                    <input id="cover-url" type="text"  name="image" placeholder="请输入视频封面图链接" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <blockquote class="layui-elem-quote layui-quote-nm">例如：http://www.baidu.com/img/bd_logo1.png（http开头的图片链接）</blockquote>
                        </div>
                    </div>
                </div>
                 <? }?>
                 
                <div class="layui-form-item layui-">
                    <button id="submit" class="layui-btn" lay-submit lay-filter="uploadForm">确定</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="layui/layui.all.js"></script>
<script src="js/pc.min.js"></script>

 <script>
var config={"upload_limit":{"video":20,"image":5},"storage_type":2,"upload_url":"..\/app\/.\/index.php?i=5&c=entry&do=local_upload&m=czt_tushang_v4"};
var tabIndex=0
layui.element.on('tab(tab)', function(data){
    tabIndex=data.index
})

upload('upload-video','video',{
    success:function  (info) {
        $('#myform').find('[name="key"]').val(info.key)
        if (config.storage_type==1&&$('#myform').find('[name="key_cover"]').val()=='') {
            $('#myform').find('[name="key_cover"]').val(info.key)
        }
        $('#myform').find('[name="duration"]').val(info.duration||0)
        if (!$('#upload-video').find('i').length) {
            $('#upload-video').append('<i class="layui-icon">&#xe610;</i>')
        }
        $('#upload-video-progress').addClass('layui-hide')
        layer.closeAll('loading')
    },
    before:function(){
        layer.open({
            type:3,
            offset:'10px',
            shade:0.01,
            skin:'upload-loading',
            content: '<i style="color:#F0F0F0;" class="layui-icon layui-anim layui-anim-rotate layui-anim-loop">&#xe63e;</i>'
        })
        layui.element.progress('upload-video-progress', '0%')
        $('#upload-video-progress').removeClass('layui-hide')
    },
    progress:function(file){
        var percent=file.percent
        percent>1&&percent--
        layui.element.progress('upload-video-progress', percent+'%')
    },
})
upload('upload-video-cover','cover',{
    success:function  (info) {
        $('#myform').find('[name="key_cover"]').val(info.key)
        if (!$('#upload-video-cover').find('i').length) {
            $('#upload-video-cover').append('<i class="layui-icon">&#xe610;</i>')
        }
        $('#upload-video-cover-progress').addClass('layui-hide')
        layer.closeAll('loading')
    },
    before:function(){
        layer.open({
            type:3,
            offset:'10px',
            shade:0.01,
            skin:'upload-loading',
            content: '<i style="color:#F0F0F0;" class="layui-icon layui-anim layui-anim-rotate layui-anim-loop">&#xe63e;</i>'
        })
        layui.element.progress('upload-video-cover-progress', '0%')
        $('#upload-video-cover-progress').removeClass('layui-hide')
    },
    progress:function(file){
        var percent=file.percent
        percent>1&&percent--
        layui.element.progress('upload-video-cover-progress', percent+'%')
    },
})
var make_thumb_ok=false
form.on("submit(uploadForm)", function(data) {
    if (data.field.price<=0) {
        error('价格必须大于0')
        return false
    }
    if (data.field.real_price<0) {
        error('价格2不能小于0')
        return false
    }
    if (tabIndex==0) {
        if (!data.field.key) {
            error('请上传视频')
            return false
        }

        if (config.storage_type==2) {
            if (!data.field['key_cover']) {
                error('请上传视频封面')
                return false
            }
        }else{
            if (data.field['key_cover']==data.field['key']&&!make_thumb_ok) {
                layer.load(2)
                make_video_thumb(data.field['key_cover'],function () {
                    make_thumb_ok=true
                    layer.closeAll('loading')
                    $('#submit').click()
                })
                return false
            }
        }
    }else{
        var video_url=$('#video-url').val()
        if (!video_url) {
            error('请填写视频链接')
            return false
        }
        var cover_url=$('#cover-url').val()
        if (!cover_url) {
            error('请填写视频封面图链接')
            return false
        }
        if (!/(^#)|(^http(s*):\/\/[^\s]+\.[^\s]+)/.test(video_url)||!/(^#)|(^http(s*):\/\/[^\s]+\.[^\s]+)/.test(cover_url)) {
            error('链接格式不正确')
            return false
        }
        data.field['key']=video_url
        data.field['key_cover']=cover_url
    }
    $.ajax({
        url: '124',
        data: data.field,
        success: function(response) {
            if (response.code == 0) {
                success(response.msg,function() {
                    location.reload()
                })
            }else if (response.code==1) {
                error(response.msg)
            }
        }
    })
    return false
})
</script>

<script>;</script> </body>
</html>