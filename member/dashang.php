<? include('../system/inc.php');include('check.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>测试</title>
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
    <div class="layui-row layui-col-space10">
        <div class="layui-col-md3">
            <blockquote class="layui-elem-quote">
                <h3>今日打赏数：</h3>
                <br>
                <h1><?=get_tdordernum($member_id)?></h1>
            </blockquote>
        </div>
        <div class="layui-col-md3">
            <blockquote class="layui-elem-quote">
                <h3>今日收入：</h3>
                <br>
                <h1><?=get_xiaoshu(get_tdorderprice($member_id))?></h1>
            </blockquote>
        </div>
        <div class="layui-col-md3">
            <blockquote class="layui-elem-quote">
                <h3>昨日打赏数：</h3>
                <br>
                <h1><?=get_ztordernum($member_id)?></h1>
            </blockquote>
        </div>
        <div class="layui-col-md3">
            <blockquote class="layui-elem-quote">
                <h3>昨日收入：</h3>
                <br>
                <h1><?=get_xiaoshu(get_ztorderprice($member_id))?></h1>
            </blockquote>
        </div>
    </div>
    <div class="layui-row">
        <p>详细记录</p>
        <table id="list"></table>
    </div>
</div>

<script src="layui/layui.all.js"></script>
<script src="js/pc.min.js"></script>

<script type="text/html" id="timeTpl">
    {{layui.util.toDateString(parseInt(d.create_time+'000'),'yyyy-MM-dd HH:mm')}}
</script>
<script>
table.render({
    elem: '#list', 
    height: 'full-165',
    cols: [
        [ 
            { field: 'id', title: 'ID', width: 120 },
            { field: 'create_time', title: '打赏时间', width: 170},
            { field:'fee', title: '金额',width:100 , },
            { field: 'res_id', title: '资源ID' ,width:120 },
            { field:'trade_no', title: '订单号'},
        ]
    ],
    url: 'ajax.php?act=myorder',
    id: 'list'
})
</script>

<script>;</script> </body>
</html>