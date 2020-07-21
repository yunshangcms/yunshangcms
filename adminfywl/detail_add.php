<?

  
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='detail';


if (isset($_POST['提交'])){
	null_back($_POST['i_name'],'请填写视频名称');
   	non_numeric_back($_POST['i_order'],'排序必须是数字');
	$_data['cid'] = $_POST['i_cid'];
	$_data['name'] = $_POST['i_name'];
	$_data['sort'] = $_POST['i_order'];
	$_data['image'] = $_POST['i_pic'];
	$_data['url'] = $_POST['i_durl1'];
  	$_data['color'] = $_POST['i_color'];
  	$_data['font'] = $_POST['i_font'];
  	$_data['date'] =date('Y-m-d H:i:s');

	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'shipin ('.$str[0].') values ('.$str[1].')';
	if (mysql_query($sql)) {
		$order = mysql_insert_id();

		alert_href('视频添加成功!','detail.php');
	} else {
		alert_back('添加失败!');
	}
}
					?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>新增视频</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
	
 <script type="text/javascript" src="./js/pinyin.js"></script>

 <link rel="stylesheet" href="../editor/themes/default/default.css" />

    <style>
        .site-demo-upbar
        {
            position:relative;

        }
        #imgFile
        {
            position:absolute;
            left:0;
            top:0;
            width:100%;
            height:100%;
            opacity:0;
        }
        #videoFile
        {
            position:absolute;
            left:0;
            top:0;
            width:100%;
            height:100%;
            opacity:0;
        }
        .ajax-upload-view
        {
            padding-top:5px;
        }
        .ajax-upload-view .ajax-upload-item
        {
            width:100px;
            height:100px;
            background-size:cover;
            display:inline-block;
            background-color:gray;
            position:relative;
        }
        .ajax-upload-item-progress
        {
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:0;
            background-color: rgba(0, 0, 0, 0.65);
            color:white;
            line-height: 100px;
            text-align: center;
        }

        .ajax-upload-bar
        {
            width:100%;
            height:5px;
            background-color:#e4e2e2;
            position:relative;
            float:left;
            margin-top:10px;
        }
        .ajax-upload-bar-active
        {
            width:0;
            height:5px;
            position:absolute;
            background-color:greenyellow;
        }

    </style>
  <script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="../ui/ui.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>
<script charset="utf-8" type="text/javascript" src="../editor/kindeditor.js"></script>

 <script type="text/javascript">
KindEditor.ready(function(K) {
	K.create('#i_content');
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
	K('#i_d1').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#i_durl1').val(),
				clickFn : function(url, title) {
					K('#i_durl1').val(url);
					editor.hideDialog();
				}
			});

 		});
	});


	K('#i_d2').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#i_durl2').val(),
				clickFn : function(url, title) {
					K('#i_durl2').val(url);
					editor.hideDialog();
				}
			});

 		});
	});


		K('#i_d3').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#i_durl3').val(),
				clickFn : function(url, title) {
					K('#i_durl3').val(url);
					editor.hideDialog();
				}
			});

 		});
	});


		K('#i_d4').click(function() {
		editor.loadPlugin('insertfile', function() {
			editor.plugin.fileDialog({
				fileUrl : K('#i_durl4').val(),
				clickFn : function(url, title) {
					K('#i_durl4').val(url);
					editor.hideDialog();
				}
			});

 		});
	});


});

 </script>

 <script>
			KindEditor.ready(function(K) {
				var colorpicker;
				K('#colorpicker').bind('click', function(e) {
					e.stopPropagation();
					if (colorpicker) {
						colorpicker.remove();
						colorpicker = null;
						return;
					}
					var colorpickerPos = K('#colorpicker').pos();
					colorpicker = K.colorpicker({
						x : colorpickerPos.x,
						y : colorpickerPos.y + K('#colorpicker').height(),
						z : 19811214,
						selectedColor : 'default',
						noColor : '无颜色',
						click : function(color) {
							K('#i_color').val(color);
							colorpicker.remove();
							colorpicker = null;
						}
					});
				});
				K(document).click(function() {
					if (colorpicker) {
						colorpicker.remove();
						colorpicker = null;
					}
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
				<li class="active">新增视频</li>
			</ol>
		</div><!--/.row-->
		
 <br>
   
	 
			 
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-envelope"></span> 新增视频</div>
					<div class="panel-body">
				<form method="post" name="formrec"   class="form-horizontal"  id="formrec" role="form">
							<fieldset>
							
                  
					   
								<!-- Name input-->
								<div class="form-group">
									<label class="col-md-3 control-label" for="name">视频主图</label>
									<div class="col-md-9">
																<input  class="form-control"  placeholder="外链请直接输入图片地址" type="text" name="i_pic" id="i_pic" value="">

  <div class="layui-input-inline w450">
 			            	<div class="site-demo-upload upload-img fl ml5">
				                <div class="site-demo-upbar">

				                      <input name="按钮"     type="button" id="uploadimg" value="上传图片">
                                        <input type="file" accept="image/*" name="imgFile" id="imgFile">
				                </div>
                                <div class="ajax-upload-view">
                                    <div class="ajax-upload-item" id="imgFileView">
                                        <div class="ajax-upload-item-progress"></div>
                                    </div>

                                </div>
				        	</div>
			            </div>
	                
					
					
 							</div>
								</div>
							
							
					 
					 
					 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">视频分类</label>
									<div class="col-md-9">
															  <select name="i_cid"  class="form-control" id="c_main" data-val="true" lay-filter="pid"  lay-verify="required">
 								
									<?php
						$result = mysql_query('select * from '.flag.'channel    order by sort desc ,id desc');
						while($row = mysql_fetch_array($result)){
						?>
			                <option value="<? echo $row['ID'];?>"><? echo $row['name'];?></option>
							
						 
		                  <? } ?>
						  </select>

    
 							</div>
								</div>
							
											 
					 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">视频名称</label>
									<div class="col-md-9">
			                <input name="i_name" type="text"  class="form-control" id="c_name"   placeholder="视频名称"   >


    
 							</div>
								</div>
							
							
							
							 
					 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">排序</label>
									<div class="col-md-9">
		  <input name="i_order" lay-verify="number" autocomplete="off" value="0" placeholder="输入顺序"  class="form-control" type="text">


    
 							</div>
								</div>
							
							
							
<style type="text/css">
.ke-button-common   { height:40PX; margin-top:10px}
</style>

								 	<div class="form-group">
									<label class="col-md-3 control-label" for="name">视频地址</label>
									<div class="col-md-9">
 
							<input id="url"   class="form-control" type="text" name="i_durl1"  placeholder="外链请直接输入视频地址"   value="">

    
	 <div class="layui-input-inline w450">
 			            	<div class="site-demo-upload upload-img fl ml5">
				                <div class="site-demo-upbar">
				                      <input name="按钮"     type="button" id="uploadButton" value="上传视频">
                                      <input type="file" name="videoFile" id="videoFile" accept="video/mp4">
				                </div>
                                <div class="ajax-upload-view">
                                    <div class="ajax-upload-item">
                                        <video src="" style="width:100%;height:100%;" id="videoFileView"></video>
                                    </div>

                                </div>
				        	</div>
                            <div class="ajax-upload-bar" id="videFileProgress" style="display:none;">
                                <div class="ajax-upload-bar-active" style="width:0%;">
                                </div>
                                <div class="ajax-upload-name" style="margin-top:10px;float:left;"></div>
                                <div class="ajax-upload-progress-percent" style="margin-top:10px;text-align: right">0%</div>
                            </div>
			            </div>
	             


 							</div>
								</div>
							
							
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12 widget-right">
															<input name="提交"  type="hidden"  class="btn btn-default btn-md pull-right"  value="提交">

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

   <script>


        var totalSize = 0;

        //绑定所有type=file的元素的onchange事件的处理函数
        $('#imgFile').change(function() {
            $("#imgFileView").find(".ajax-upload-item-progress").css("height","0").text("")
            var file = this.files[0], //假设file标签没打开multiple属性，那么只取第一个文件就行了
                name = file.name,
                size = file.size,
                type = file.type,
                url = window.URL.createObjectURL(file); //获取本地文件的url，如果是图片文件，可用于预览图片

            $(this).next().html("文件名：" + name + " 文件类型：" + type + " 文件大小：" + size + " url: " + url);

            $("#imgFileView").css("background-image","url("+url+")");

            totalSize += size;
            console.log("总大小: " + totalSize + "bytes");
            upload()

        });

        function upload() {
            //创建FormData对象，初始化为form表单中的数据。需要添加其他数据可使用formData.append("property", "value");
            var formData = new FormData();
            formData.append("imgFile",$("#imgFile")[0].files[0])

            //ajax异步上传
            $.ajax({
                url: "../editor/php/upload_image.php?dir=file",
                type: "POST",
                data: formData,
                xhr: function(){ //获取ajaxSettings中的xhr对象，为它的upload属性绑定progress事件的处理函数

                    myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ //检查upload属性是否存在
                        //绑定progress事件的回调函数
                        myXhr.upload.addEventListener('progress',progressHandlingFunction, false);
                    }
                    return myXhr; //xhr对象返回给jQuery使用
                },
                success: function(result){
                    result=JSON.parse(result)
                    $("#i_pic").val(result.url);
                },
                contentType: false, //必须false才会自动加上正确的Content-Type
                processData: false  //必须false才会避开jQuery对 formdata 的默认处理
            });
        }




        var totalVideoSize = 0;

        //绑定所有type=file的元素的onchange事件的处理函数
        $('#videoFile').change(function() {
            var file = this.files[0], //假设file标签没打开multiple属性，那么只取第一个文件就行了
                name = file.name,
                size = file.size,
                type = file.type;
            url = window.URL.createObjectURL(file); //获取本地文件的url，如果是图片文件，可用于预览图片

            $("#videoFileView").attr("src",url)
            $("#videFileProgress").show();
            $("#videFileProgress").find(".ajax-upload-name").text(name)
            $("#videFileProgress").find(".ajax-upload-bar-active").css("width","0");
            $("#videFileProgress").find(".ajax-upload-progress-percent").text("0%");

            totalVideoSize += size;
            console.log("总大小: " + totalSize + "bytes");
            uploadVideo()

        });

        function uploadVideo() {
            //创建FormData对象，初始化为form表单中的数据。需要添加其他数据可使用formData.append("property", "value");
            var formData = new FormData();
            formData.append("imgFile",$("#videoFile")[0].files[0])

            //ajax异步上传
            $.ajax({
                url: "../editor/php/upload_json.php?dir=file",
                type: "POST",
                data: formData,
                xhr: function(){ //获取ajaxSettings中的xhr对象，为它的upload属性绑定progress事件的处理函数

                    myXhr = $.ajaxSettings.xhr();
                    if(myXhr.upload){ //检查upload属性是否存在
                        //绑定progress事件的回调函数
                        myXhr.upload.addEventListener('progress',progressHandlingFunctionVideo, false);
                    }
                    return myXhr; //xhr对象返回给jQuery使用
                },
                success: function(result){
                    result=JSON.parse(result)
                    console.log(result)
                    $("#url").val(result.url);
                },
                contentType: false, //必须false才会自动加上正确的Content-Type
                processData: false  //必须false才会避开jQuery对 formdata 的默认处理
            });
        }

        //上传进度回调函数：
        function progressHandlingFunction(e) {

            if (e.lengthComputable) {
                $('progress').attr({value : e.loaded, max : e.total}); //更新数据到进度条
                var percent = e.loaded/e.total*100;
                console.log($("#imgFileView").find(".ajax-upload-item-progress"))
                $("#imgFileView").find(".ajax-upload-item-progress").css("height",percent.toFixed(2)+"%").text(percent+"%");
            }
        }

        //上传进度回调函数：
        function progressHandlingFunctionVideo(e) {
            if (e.lengthComputable) {
                $('progress').attr({value : e.loaded, max : e.total}); //更新数据到进度条
                var percent = e.loaded/e.total*100;
                $("#videFileProgress").find(".ajax-upload-bar-active").css("width",percent.toFixed(2)+"%");
                $("#videFileProgress").find(".ajax-upload-progress-percent").text(percent+"%");
            }
        }

        /*KindEditor.ready(function(K) {
            var uploadbutton = K.uploadbutton({
                button : K('#uploadimg')[0],
                fieldName : 'imgFile',
                url : '../editor/php/upload_image.php?dir=file',
                afterUpload : function(data) {
                    if (data.error === 0) {
                        var url = K.formatUrl(data.url, 'absolute');
                        K('#i_pic').val(url);
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
        });*/
    </script>


<script type="text/javascript">
	var option= {toolbars: [[
            'fullscreen', 'source', '|',
            'bold', 'italic', 'underline', 'strikethrough', 'forecolor', 'backcolor',
            'paragraph', 'fontfamily', 'fontsize', '|',
            'indent', 'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|',
            'link', 'unlink',
        ]]};

    window.UEDITOR_HOME_URL = '/statics/ueditor/';
    window.onload = function() {
        window.UEDITOR_CONFIG.initialFrameWidth=700;
        window.UEDITOR_CONFIG.initialFrameHeight=300;
        UE.getEditor('desc',option);
        UE.getEditor('content');

    }
</script>
<script type="text/javascript" src="/statics/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/statics/ueditor/ueditor.all.min.js"></script>

<script>
layui.use(['form','common','upload'], function(){
        var $ = layui.jquery;
        $form = $('form');
        var form = layui.form(),layer = layui.layer, common=layui.common;
         //上传图片
        layui.upload({
            title:'上传图片'
            ,elem: '#upload-image' //指定原始元素，默认直接查找class="layui-upload-file"
          });

    //上传图片
        layui.upload({

             title:'颜色选择'
            ,elem: '#colorpicker' //指定原始元素，默认直接查找class="layui-upload-file"

        });




    });
</script>
<script>
layui.use(['form','common'], function(){
        var $ = layui.jquery;
        $form = $('form');
        var form = layui.form(),layer = layui.layer,common=layui.common;

        form.on('switch(switchTest1)', function(data) {
        	if (this.checked) {
        		$(".area").show();
        	}else{
        		$(".area").hide();
        	}
        });


	     form.on('switch(switchTest2)', function(data) {
        	if (this.checked) {
        		$(".area1").show();
        	}else{
        		$(".area1").hide();
        	}
        });
    });
</script></body>

</html>
