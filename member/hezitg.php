<? include('../system/inc.php');include('check.php'); ?>
<html><head>
    <meta charset="utf-8">
    <title>盒子推广</title>
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
             <a  href="hezitgadd.php"> <button class="layui-btn layui-btn-sm" ><i class="layui-icon"></i>添加推广</button></a>               
                <button class="layui-btn layui-btn-sm layui-btn-danger" id="delete-all-btn"><i class="layui-icon"></i>删除全部选中推广</button>
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
       <a class="layui-btn layui-btn-xs layui-btn-danger" lay-event="delete"><i class="layui-icon">&#xe640;</i>删除</a>
</script>
 
 
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
            { field: 'title', title: '盒子名称' },
            { field: 'url', title: '免费视频地址' , width: 280 },
            { field: 'urls', title: '推广链接' , width: 350},
             
            {fixed: 'right',title: '操作',   align:'center', toolbar: '#operate'}
        ]
    ],
    url: 'ajax.php?act=myhezidtl',
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
    }   else if (obj.event === 'surl') {
        surlVideo([data])
    }
})



 

function deleteVideo (id,callback) {
  $.ajax({
      url: "ajax.php?act=delmyhezidtl",
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

 
function money_format (str) {
    if(!/\./.test(str)) str += '.00'
    str += '00'
    str = str.match(/\d+\.\d{2}/)[0]
    return str
}
</script><div class="layui-layer-move"></div>

 
</body></html>