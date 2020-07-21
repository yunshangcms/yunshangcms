<? include('../system/inc.php');include('check.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>提现记录</title>
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
    <div class="layui-btn-group">
        <button class="layui-btn layui-btn-sm" > 提现记录</button>
    </div>
</div>
<table id="video" lay-filter="list"></table>
<!-- <table class="layui-table" lay-data="{ url:'./index.php?i=5&c=entry&view=public_video&do=pc&m=czt_tushang_v4', page:true, id:'video',limit:20,method:'post',loading:false,limits:[10,20,30],height: 'full-60'}" lay-filter="list">
    <thead>
        <tr>
            <th lay-data="{type:'checkbox'}"></th>
            <th lay-data="{field:'id', width:80, }">ID</th>
            <th lay-data="{field:'title'}">标题</th>
            <th lay-data="{fixed: 'right', width:240, align:'center', toolbar: '#operate'}">操作</th>
        </tr>
    </thead>
</table> -->
 

<script src="layui/layui.all.js"></script>
<script src="js/pc.min.js"></script>

<script>
table.render({
    elem: '#video', //指定原始表格元素选择器（推荐id选择器）
    cols: [
        [ //标题栏
             { field: 'id', title: 'ID', width: 50 },
            { field: 'rmb', title: '金额' },
            { field: 'sxf', title: '手续费' },
            { field: 'money', title: '实际到账' },
            { field: 'shoukuanfs', title: '收款方式' },
            { field: 'shoukuanzh', title: '收款账号' },
            { field: 'shoukuanxm', title: '收款姓名' },
            { field: 'date', title: '时间' , width: 200 },
            { field: 'zt', title: '状态' },
         ]
    ],
    url: 'ajax.php?act=txjl',
    id: 'video'
})

 

</script>

<script>;</script> </body>
</html>