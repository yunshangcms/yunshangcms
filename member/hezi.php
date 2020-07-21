<? include('../system/inc.php');include('check.php'); ?>
<html><head>
    <meta charset="utf-8">
    <title>盒子管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    
    <link rel="stylesheet" href="layui/css/layui.css">
    <link rel="stylesheet" href="css/pc.css">
 </head>
<body style="">

<div class="layui-fluid child-body">
    <div class="layui-row">
            <div class="layui-btn-group">
              <button class="layui-btn layui-btn-sm" id="batch-price-btn"><i class="layui-icon"></i>添加盒子</button>
                  
                <button class="layui-btn layui-btn-sm layui-btn-danger" id="delete-all-btn"><i class="layui-icon"></i>删除全部选中盒子</button>
            </div>
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
<script type="text/html" id="operate">
    <a class="layui-btn layui-btn-xs layui-btn-normal" lay-event="edit"><i class="layui-icon">&#xe642;</i>修改</a>
      <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="delete"><i class="layui-icon">&#xe640;</i>删除</a>
</script>
<script type="text/template" id="editFormTpl">
    <form class="layui-form edit-form">
        <input type="hidden" name="id">
        <div class="layui-form-item">
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
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
            <label class="layui-form-label">标题</label>
            <div class="layui-input-block">
                <input type="text" name="price" lay-verify="required" placeholder="盒子标题" autocomplete="off" class="layui-input">
            </div>
        </div>
                <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-sm" lay-submit lay-filter="editPriceForm">确定</button>
            </div>
        </div>
    </form>
</script>

<script src="layui/layui.all.js"></script>
<script src="js/pc.min.js"></script>

<script>
editItem=null

table.render({
    elem: '#video', //指定原始表格元素选择器（推荐id选择器）
    cols: [
        [ //标题栏
            { checkbox: true  },
            { field: 'id', title: 'ID', width: 80 },
            { field: 'title', title: '标题' },
            { field: 'spnum', title: '视频数' },
             
            {fixed: 'right',title: '操作',  width: 180 ,   align:'center', toolbar: '#operate'}
        ]
    ],
    url: 'ajax.php?act=myhezi',
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
                var width = layer.getChildFrame('video', index).width()
                var height = layer.getChildFrame('video', index).height()
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
            title:'修改盒子信息',
            move:false,
            resize:false,
            area:'400px',
            shadeClose: true, //点击遮罩关闭
            content: $('#editFormTpl').html(),
            success: function(layero, index){
                layero.find('input[name="title"]').val(data.title)
                layero.find('input[name="id"]').val(data.id)
                layero.find('input[name="price"]').val(data.price)
                layero.find('input[name="real_price"]').val(data.real_price)
              }
        })
    } else if (obj.event === 'surl') {
        surlVideo([data])
    }
})

top.layui.form.on("submit(editForm)", function(data) {
    
    
    $.ajax({
        url: 'ajax.php?act=editmyhezi',
        data: data.field,
        success: function(response) {
            if (response.code == 0) {
              
                success(response.msg);
		                 location.reload()
            }else if (response.code==1) {
                error(response.msg)
            }
        }
    })
    return false
})

top.layui.form.on("submit(editPriceForm)", function(data) {
    if (data.field.price=='') {
        error('请输入盒子标题')
        return false
    }
 
    $.ajax({
        url: 'ajax.php?act=addhezi',
        data: data.field,
        success: function(response) {
            if (response.code == 0) {
              success(response.msg);
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
      url: "ajax.php?act=geturl",
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

function deleteVideo (id,callback) {
  $.ajax({
      url: "ajax.php?act=delmyhezi",
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

$('#batch-price-btn').on('click', function() {
    layer.open({
        type: 1,
        title:'添加盒子',
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
</script><div class="layui-layer-move"></div>

<script>;</script> 
</body></html>