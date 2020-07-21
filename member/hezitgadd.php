<? include('../system/inc.php');include('check.php'); ?>
<?
if ($_POST['do']=='save')
{
null_back($_POST['hid'],'请选择盒子');
null_back($_POST['url'],'请输入免费链接');
 

	$_rmbdata['uid'] = $member_id;
	$_rmbdata['hid'] = $_POST['hid'];
	$_rmbdata['url'] = $_POST['url'];
  
 	$rmbstr = arrtoinsert($_rmbdata);
	$rmbsql = 'insert into '.flag.'hezidtl ('.$rmbstr[0].') values ('.$rmbstr[1].')';
	  if (mysql_query($rmbsql)){
  
		alert_href('添加成功!','hezitg.php');
	} else {
		alert_back('添加失败!');
	}
	
	
	
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>余额提现</title>
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

<style>
    .layui-table, .layui-table-view{margin: 0;}
</style>
<div class="layui-fluid child-body">
    <div class="layui-row layui-col-space10">
        <div class="layui-col-md6">
           
            <form class="layui-form layui-form-pane" action=""  method="post">
			<input name="do" type="hidden" value="save">
                <div class="layui-form-item">
                    <label class="layui-form-label">盒子列表</label>
                    <div class="layui-input-block">
                    <select required="required"  lay-verify="required"  name="hid">
                      <option>请选择盒子</option>
                         <?php                                                                                
                   
 						$result = mysql_query('select * from '.flag.'hezi  where uid = '.$member_id.'   order by ID asc  ');
						while($row = mysql_fetch_array($result)){
						?>
                      <option value="<?=$row['ID']?>"><?=$row['name']?></option>


<? }?>
                    </select>
                     </div>
                </div>
				
				 <div class="layui-form-item">
                    <label class="layui-form-label">免费链接</label>
                    <div class="layui-input-block">
                      <input name="url" type="text" required="required" class="layui-input" placeholder="请输入免费链接" autocomplete="off" value="" lay-verify="required">
                    </div>
                </div>
				
				
				  
				 
				
				
                <div class="layui-form-item">
                    <button class="layui-btn" lay-submit lay-filter="withdrawForm">立即提交</button>
                </div>
            </form>
        </div>
        <div class="layui-col-md6">
            <table id="list"></table>
        </div>
    </div>
</div>

<script src="layui/layui.all.js"></script>
<script src="js/pc.min.js"></script>

<script type="text/html" id="timeTpl">
    {{layui.util.toDateString(parseInt(d.create_time+'000'),'yyyy-MM-dd HH:mm')}}
</script>
<script type="text/html" id="statusTpl">
    {{#  if(d.status == 1){ }}
    完成
    {{#  } else { }}
    -
    {{#  } }}
</script>
<script>
table.render({
    elem: '#list', 
    height: 'full-20',
    cols: [
        [ 
            { field: 'id', title: 'ID', width: '25%' },
            { field: 'create_time', title: '申请时间', width: '30%',templet: '#timeTpl' },
            { field:'cash_amount', title: '提现金额',width:'25%' },
            { field: 'status', title: '状态' ,width:'20%',templet: '#statusTpl'}
        ]
    ],
    url: './index.php?i=5&c=entry&view=withdraw&op=record&do=pc&m=czt_tushang_v4',
    id: 'list'
})
form.on("submit(withdrawForm)", function(data) {
    if (data.field.fee<=0) {
        error('价格必须大于0')
        return false
    }
    if (data.field.fee<||data.field.fee>) {
        error('注意：最低提现元，最高提现元')
        return false
    }
    $.ajax({
        url: './index.php?i=5&c=entry&view=withdraw&do=pc&m=czt_tushang_v4',
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