<? include('../system/inc.php');include('check.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>我的视频</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    
    <link rel="stylesheet" href="layui/css/layui.css">
    <link rel="stylesheet" href="css/pc.css">
    
</head>
<body>

<div class="layui-fluid child-body">
    <div class="layui-row">
            <div class="layui-btn-group">
              <button class="layui-btn layui-btn-sm" id="batch-price-btn"><i class="layui-icon">&#xe64c;</i>一键改价</button>
                <button  class="layui-btn layui-btn-sm" id="skurl-all-btn"><i class="layui-icon">&#xe64c;</i>获取选中试看链接</button>
                <button class="layui-btn layui-btn-sm" id="surl-all-btn"><i class="layui-icon">&#xe64c;</i>获取选中URL链接</button>

                <button class="layui-btn layui-btn-sm" id="tcn-all-btn"><i class="layui-icon">&#xe64c;</i>获取选中TCN链接</button>
                <button class="layui-btn layui-btn-sm" id="wcn-all-btn"><i class="layui-icon">&#xe64c;</i>获取选中WURL链接</button>

                <button class="layui-btn layui-btn-sm layui-btn-normal" id="my-surl-btn"><i class="layui-icon">&#xe641;</i>获取我的视频分享链接</button>


                <button class="layui-btn layui-btn-sm layui-btn-normal" id="myerweima"><i class="layui-icon">&#xe641;</i>获取我的二维码</button>


 

                
                <button class="layui-btn layui-btn-sm layui-btn-danger" id="delete-all-btn"><i class="layui-icon">&#xe640;</i>删除全部选中视频</button>
 

                            

                
                 
                
 
      </div>
      
       <select name="hid" id="hid" class="layui-select"  style="width:150PX">
  <option value="">请选择盒子ID</option>
     <?php                                                                                
                   
 						$result = mysql_query('select * from '.flag.'hezi   where uid = '.$member_id.'   order by ID desc  ');
						while($row = mysql_fetch_array($result)){
						?>

  <option value="<?=$row['ID']?>"><?=$row['name']?></option>
 <? } ?>
</select>

                 <button class="layui-btn layui-btn-sm layui-btn-danger" id="hezi-all-btn"><i class="layui-icon">&#xe654;</i>添加到我的盒子</button>



    <script type="text/JavaScript">
<!--
function MM_jumpMenu1(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
    </script>
					 
                     
                      <select name="menu1" onChange="MM_jumpMenu1('self',this,0)"  style="height:32PX">
			                <option   value="?"  >视频分类</option>
 			                    			                 
		                  		 	<?php
						$result = mysql_query('select * from '.flag.'channel    order by sort desc ,id desc');
						while($row = mysql_fetch_array($result)){
						?>
			                <option  <? if ($row['ID'] == $_GET['cid'] ) { echo "selected";} ?>  value="?cid=<? echo $row['ID'];?>"  ><? echo $row['name'];?> </option>
			                    			                 
		                  <? } ?>
			                    			                 
		                  			  </select>
                                      
                                      
                                      
    </div> 
    

</div>

 
<table id="video" lay-filter="list"></table>
<!-- <table class="layui-table" lay-data="{ url:'./index.php?i=5&c=entry&view=video&do=pc&m=czt_tushang_v4', page:true, id:'video',limit:20,method:'post',loading:false,limits:[10,20,30],height: 'full-60'}" lay-filter="list">
    <thead>
        <tr>
            <th lay-data="{type:'checkbox'}"></th>
            <th lay-data="{field:'id', width:80 }">ID</th>
            <th lay-data="{field:'title'}">标题</th>





            <th lay-data="{field:'price', width:150 , templet: '#priceTpl'}">价格</th>
            <th lay-data="{field:'pay_count', width:120 }">打赏人数</th>
            <th lay-data="{fixed: 'right', width:320, align:'center', toolbar: '#operate'}">操作</th>
        </tr>
    </thead>
</table> -->
<script type="text/html" id="priceTpl">
  {{#  if(d.real_price > 0){ }}
    {{d.price}}/{{d.real_price}}
  {{#  } else { }}
    {{d.price}}
  {{#  } }}
</script>
    <a class="layui-btn layui-btn-xs"   style=" display:none" lay-event="surl"><i class="layui-icon">&#xe64c;</i>URL连接</a>

<script type="text/html" id="operate">
    <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit"><i class="layui-icon">&#xe642;</i>修改</a>

 
    <a class="layui-btn layui-btn-xs" lay-event="tcnurl"><i class="layui-icon">&#xe64c;</i>TCN连接</a>
    <a class="layui-btn layui-btn-xs" lay-event="wurl"><i class="layui-icon">&#xe64c;</i>WURL连接</a>

    <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="view"><i class="layui-icon">&#xe623;</i>查看</a>
    <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="delete"><i class="layui-icon">&#xe640;</i>删除</a>
  

</script>
<script type="text/template" id="editFormTpl">
    <form class="layui-form edit-form">
        <input type="hidden" name="id">
    
	    <div class="layui-form-item">
            <label class="layui-form-label">封面图</label>
            <div class="layui-input-block">
                <input type="text" name="fengmian"    placeholder="请输入封面图片地址 / 留空则默认"   class="layui-input">
            </div>
        </div>
		
		    <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">价格</label>
            <div class="layui-input-block">
                <input type="text" name="price" lay-verify="required" placeholder="请输入价格" autocomplete="off" class="layui-input">
            </div>
        </div>
                <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-sm" lay-submit lay-filter="editForm">确定</button>
            </div>
        </div>
    </form>
</script>
<script type="text/template" id="editPriceFormTpl">
    <form class="layui-form edit-form">
        <div class="layui-form-item">
            <label class="layui-form-label">价格</label>
            <div class="layui-input-block">
                <input type="text" name="price" lay-verify="required" placeholder="请输入价格" autocomplete="off" class="layui-input">
            </div>
        </div>
                <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-sm" lay-submit lay-filter="editPriceForm">确定</button>
            </div>
        </div>
    </form>
</script>

<?

 if ($site_fangfengurl!='')
{$site_ffurl='&'.$site_fangfengurl;}
else
{$site_ffurl='';}
  
    $url='http://'.$site_domain.'/url/user.php?uid='.$member_id.$tzinfo.$site_ffurl.'';
 
   ?>

<script type="text/template" id="erweimahtml">
 
        <div class="layui-form-item">
             <div >
<img  src="http://qr.liantu.com/api.php?text=<?=get_dwz($site_dwz,$url)?>" >            </div>
        </div>
                
   
</script>

 
     

<script src="layui/layui.all.js"></script>
<script src="js/pc.min.js"></script>

<script>
editItem=null


function getimage ($id) {
 
 layer.open({
  type: 2,
  title:'图片',
  area: ['700px', '450px'],
  fixed: false, //不固定
  maxmin: true,
  content: 'img.php?act=myshipin&id='+$id+''
});


}


table.render({
    elem: '#video', //指定原始表格元素选择器（推荐id选择器）
    cols: [
        [ //标题栏
            { checkbox: true },
            { field: 'id', title: 'ID', width: 80 },
             { field: 'title', title: '标题' ,width:350},
            {field:'price', title: '价格',width:80 , templet: '#priceTpl'},
            {field:'pay_count', title: '打赏数',width:80},
            {field:'image', title: '图片',width:200, align:'center'},
            {field:'zt', title: '状态',width:80},
            {field:'date', title: '添加时间',width:180 },
            
            {fixed: 'right',title: '操作', width:400, align:'center', toolbar: '#operate'}
        ]
    ],
    url: 'ajax.php?act=myshipin&cid=<?=$_GET['cid']?>',
    id: 'video'
})

table.on('tool(list)', function(obj) {
    var data = obj.data
    if (obj.event === 'view') {
        layer.open({
            type: 2,
            // maxmin: true,
            title: false,
            // area: ['100%', '100%'],
            shadeClose: true, //点击遮罩关闭层
            content: '/member/play.php?src=' + data.url,
            success: function(layero, index) {
                var width =500
                var height =500
                var win_width, win_height
                if (self != top) {
                    win_height = $(top.window).height()
                    win_width = $(top.window).width()
                } else {
                    win_height = $(window).height()
                    win_width = $(window).width()
                }
                layer.style(index, {
                    width: width,
                    height: height,
                    top: (win_height - height) / 2,
                    left: (win_width - width) / 2
                })
                layer.iframeAuto(index)
            }
        })
    } else if (obj.event === 'delete') {
        deleteVideo([data.id],function () {
            obj.del()
        })
    } else if (obj.event === 'edit') {
        editItem=obj
        layer.open({
            type: 1,

            title:'修改视频信息',
            move:false,
            resize:false,
            area:'400px',
            shadeClose: true, //点击遮罩关闭
            content: $('#editFormTpl').html(),
            success: function(layero, index){
                layero.find('input[name="fengmian"]').val(data.fengmian)
                layero.find('input[name="title"]').val(data.title)
                layero.find('input[name="id"]').val(data.id)
                layero.find('input[name="price"]').val(data.price)
                layero.find('input[name="real_price"]').val(data.real_price)
              }
        })
    } else if (obj.event === 'surl') {
        surlVideo([data])
    }
	 else if (obj.event === 'tcnurl') {
        surlVideos([data])
    }
		 else if (obj.event === 'wurl') {
        wcnurlVideos([data])
    }
	
	else if (obj.event === 'ysurl') {
        ysurlVideos([data])
    }
	
	else if (obj.event === 'shikanurl') {
        shikanVideos([data])
    }
	
})

top.layui.form.on("submit(editForm)", function(data) {

    if (data.field.price<=0) {
        error('价格必须大于0')
        return false
    }
    if (data.field.real_price<0) {
        error('价格2不能小于0')
        return false
    }
    $.ajax({
        url: 'ajax.php?act=editmyshipin',
        data: data.field,
        success: function(response) {
            if (response.code == 0) {
                
                data.field.real_price=money_format(data.field.real_price||0)
              	if(data.field.price.indexOf('-') != -1)
                {
                  editItem.update({'title':data.field.title,'price':data.field.price,'real_price':data.field.real_price})
                }
              else
              {
                data.field.price=money_format(data.field.price)
              	editItem.update({'title':data.field.title,'price':data.field.price,'real_price':data.field.real_price})
              }
                	
                //editItem.update({'title':data.field.title,'price':data.field.price,'real_price':data.field.real_price})
                editItem=null
                success(response.msg,function() {
                    layer.closeAll('page')
                })
            }else if (response.code==1) {
                error(response.msg)
            }
        }
    })
    return false

})

top.layui.form.on("submit(editPriceForm)", function(data) {
    if (data.field.price<=0) {
        error('价格必须大于0')
        return false
    }
    if (data.field.real_price<0) {
        error('价格2不能小于0')
        return false
    }
    $.ajax({
        url: 'ajax.php?act=editprice',
        data: data.field,
        success: function(response) {
            if (response.code == 0) {
                layer.closeAll('page')
                location.reload()
            }else if (response.code==1) {
                error(response.msg)
            }
        }
    })
    return false
})

function surlVideo (data) {
    var id=data.map(function(item) {return parseInt(item.id)})
    var title={}
    for (var i = 0; i < data.length; i++) {
        title[data[i].id]=data[i].title
    }
    $.ajax({
      url: "ajax.php?act=geturl&u=urlcn",
      timeout: 60000,
      data: { id: id },
      success: function(response) {
        $('div.laytable-cell-checkbox').find('div.layui-form-checked').click()
        if (response.code == 0) {
            var text=''
            for(var i in response.data){
                text=title[i]+"\n"+response.data[i].join("\n")+"\n\n"+text
            }
            layer.prompt({
                formType: 2,
                value: text.trim("\n"),
                title:'视频短连接',
                btn: false,
                shadeClose: true,
                area: ['400px', '400px'],
                btn: ['复制全部', '关闭']
             }, function(value, index, elem){
                elem.focus()
                elem.select()
                top.document.execCommand('copy')&&(layer.close(index),layer.msg('复制成功', {time: 1000}))
            })
        } else if (response.code==1) {
          error(response.msg)
        }
      }
    })
}





function shikanVideos (data) {
    var id=data.map(function(item) {return parseInt(item.id)})
    var title={}
    for (var i = 0; i < data.length; i++) {
        title[data[i].id]=data[i].title
    }
    $.ajax({
      url: "ajax.php?act=geturl&u=shikanurl",
      timeout: 60000,
      data: { id: id },
      success: function(response) {
        $('div.laytable-cell-checkbox').find('div.layui-form-checked').click()
        if (response.code == 0) {
            var text=''
            for(var i in response.data){
                text=title[i]+"\n"+response.data[i].join("\n")+"\n\n"+text
            }
            layer.prompt({
                formType: 2,
                value: text.trim("\n"),
                title:'视频短连接',
                btn: false,
                shadeClose: true,
                area: ['400px', '400px'],
                btn: ['复制全部', '关闭']
             }, function(value, index, elem){
                elem.focus()
                elem.select()
                top.document.execCommand('copy')&&(layer.close(index),layer.msg('复制成功', {time: 1000}))
            })
        } else if (response.code==1) {
          error(response.msg)
        }
      }
    })
}





function ysurlVideos (data) {
    var id=data.map(function(item) {return parseInt(item.id)})
    var title={}
    for (var i = 0; i < data.length; i++) {
        title[data[i].id]=data[i].title
    }
    $.ajax({
      url: "ajax.php?act=geturl&u=ysurl",
      timeout: 60000,
      data: { id: id },
      success: function(response) {
        $('div.laytable-cell-checkbox').find('div.layui-form-checked').click()
        if (response.code == 0) {
            var text=''
            for(var i in response.data){
                text=title[i]+"\n"+response.data[i].join("\n")+"\n\n"+text
            }
            layer.prompt({
                formType: 2,
                value: text.trim("\n"),
                title:'视频短连接',
                btn: false,
                shadeClose: true,
                area: ['400px', '400px'],
                btn: ['复制全部', '关闭']
             }, function(value, index, elem){
                elem.focus()
                elem.select()
                top.document.execCommand('copy')&&(layer.close(index),layer.msg('复制成功', {time: 1000}))
            })
        } else if (response.code==1) {
          error(response.msg)
        }
      }
    })
}



function surlVideos (data) {
    var id=data.map(function(item) {return parseInt(item.id)})
    var title={}
    for (var i = 0; i < data.length; i++) {
        title[data[i].id]=data[i].title
    }
    $.ajax({
      url: "ajax.php?act=geturl&u=tcn",
      timeout: 60000,
      data: { id: id },
      success: function(response) {
        $('div.laytable-cell-checkbox').find('div.layui-form-checked').click()
        if (response.code == 0) {
            var text=''
            for(var i in response.data){
                text=title[i]+"\n"+response.data[i].join("\n")+"\n\n"+text
            }
            layer.prompt({
                formType: 2,
                value: text.trim("\n"),
                title:'视频短连接',
                btn: false,
                shadeClose: true,
                area: ['400px', '400px'],
                btn: ['复制全部', '关闭']
             }, function(value, index, elem){
                elem.focus()
                elem.select()
                top.document.execCommand('copy')&&(layer.close(index),layer.msg('复制成功', {time: 1000}))
            })
        } else if (response.code==1) {
          error(response.msg)
        }
      }
    })
}




function wcnurlVideos (data) {
    var id=data.map(function(item) {return parseInt(item.id)})
    var title={}
    for (var i = 0; i < data.length; i++) {
        title[data[i].id]=data[i].title
    }
    $.ajax({
      url: "ajax.php?act=geturl&u=wcn",
      timeout: 60000,
      data: { id: id },
      success: function(response) {
        $('div.laytable-cell-checkbox').find('div.layui-form-checked').click()
        if (response.code == 0) {
            var text=''
            for(var i in response.data){
                text=title[i]+"\n"+response.data[i].join("\n")+"\n\n"+text
            }
            layer.prompt({
                formType: 2,
                value: text.trim("\n"),
                title:'视频短连接',
                btn: false,
                shadeClose: true,
                area: ['400px', '400px'],
                btn: ['复制全部', '关闭']
             }, function(value, index, elem){
                elem.focus()
                elem.select()
                top.document.execCommand('copy')&&(layer.close(index),layer.msg('复制成功', {time: 1000}))
            })
        } else if (response.code==1) {
          error(response.msg)
        }
      }
    })
}




$('#my-surl-btn').on('click', function() {
   $.ajax({
      url: "ajax.php?act=getmyurl",
      success: function(response) {
        if (response.code == 0) {
            layer.prompt({
              formType: 0,
              value: response.data.url,
              title: '我的视频分享链接',
              shadeClose: true,
              btn: ['复制链接', '关闭']
            }, function(value, index, elem){
                elem.focus()
                elem.select()
                top.document.execCommand('copy')&&(layer.close(index),layer.msg('复制成功', {time: 1000}))
            })
        } else if (response.code==1) {
          error(response.msg)
        }
      }
    })
})

$('#surl-all-btn').on('click', function() {
    var checkStatus = table.checkStatus('video')
    var data = checkStatus.data
    if (data.length) {
      surlVideo(data)
    }
})


$('#skurl-all-btn').on('click', function() {
    var checkStatus = table.checkStatus('video')
    var data = checkStatus.data
    if (data.length) {
      shikanVideos(data)
    }
})


$('#tcn-all-btn').on('click', function() {
    var checkStatus = table.checkStatus('video')
    var data = checkStatus.data
    if (data.length) {
      surlVideos(data)
    }
})


$('#wcn-all-btn').on('click', function() {
    var checkStatus = table.checkStatus('video')
    var data = checkStatus.data
    if (data.length) {
      wcnurlVideos(data)
    }
})


function deleteVideo (id,callback) {
  $.ajax({
      url: "ajax.php?act=delmyshipin",
      data: { id: id },
      success: function(response) {
          if (response.code == 0) {
              success(response.msg,callback)
          } else if (response.code==1) {
              error(response.msg)
          }
      }
  })
}




$('#delete-all-btn').on('click', function() {
    var checkStatus = table.checkStatus('video')
    var data = checkStatus.data
    if (data.length) {
      var id=data.map(function(item) {return parseInt(item.id)})
      deleteVideo(id,function () {
          table.reload('video')
      })
    }
})



function addhezi (id,callback,hid) {
  $.ajax({
      url: "ajax.php?act=addhezishipin",
      data: { id: id ,hid:hid},
      success: function(response) {
          if (response.code == 0) {
              success(response.msg,callback)
          } else if (response.code==1) {
              error(response.msg)
          }
      }
  })
}


$('#hezi-all-btn').on('click', function() {
    var checkStatus = table.checkStatus('video')
    var data = checkStatus.data
	var hid = document.getElementById("hid").value;
	if (hid =='') 
	{ 	alert('请选择盒子ID'); }
	
    else if (data.length) {
	 
       var id=data.map(function(item) {return parseInt(item.id)})
      addhezi(id,function () {
          table.reload('video')
      },hid)
    }
})

 

$('#myerweima').on('click', function() {
    layer.open({
        type: 1,
        title:'我的二维码',
        move:false,
        resize:false,
        area:'310px',
        shadeClose: true, //点击遮罩关闭
        content: $('#erweimahtml').html(),
        success: function(layero, index){
        }
    })
})

 


$('#batch-price-btn').on('click', function() {
    layer.open({
        type: 1,
        title:'批量修改视频价格',
        move:false,
        resize:false,
        area:'400px',
        shadeClose: true, //点击遮罩关闭
        content: $('#editPriceFormTpl').html(),
        success: function(layero, index){
        }
    })
})

function money_format (str) {
    if(!/\./.test(str)) str += '.00'
    str += '00'
    str = str.match(/\d+\.\d{2}/)[0]
    return str
}
</script>

<script>;</script> </body>
</html>