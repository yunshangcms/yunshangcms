<? include('../system/inc.php');include('check.php'); ?>
<?
if ($_POST['do']=='save')
{
null_back($_POST['rmb'],'请输入提现金额');

if ($_POST['lx']==0) {
null_back($_POST['shoukuanfs'],'请输入收款方式');
null_back($_POST['shoukuanzh'],'请输入收款账号');
null_back($_POST['shoukuanxm'],'请输入收款姓名');
}


if ($_POST['lx']==1) {
null_back($_POST['skt'],'请上传收款图');
 }
if ($_POST['rmb']<$site_mintxje)
{alert_back('提现失败:提现金额不得低于'.$site_mintxje.'元');}

if ($_POST['rmb']>$site_maxtxje)
{alert_back('提现失败:提现金额不得高于'.$site_maxtxje.'元');}

if ($_POST['rmb']>$member_rmb)
{alert_back('提现失败:余额不足');}

if ($member_sxf>0) 
{ $txsxf=$_POST['rmb']*($member_sxf/100);}
else
{ $txsxf=$_POST['rmb']*($site_txsxf/100);}


	$_rmbdata['uid'] = $member_id;
	$_rmbdata['type'] = 0;// 0扣除1增加;
	$_rmbdata['qje'] = $member_rmb;
	$_rmbdata['je'] = $_POST['rmb'];
 	$_rmbdata['hje'] = $member_rmb-$_POST['rmb'];
	$_rmbdata['remark'] = '申请提现|金额:'.$_POST['rmb'].'|手续费:'.$txsxf.'元|实际到账:'.($_POST['rmb']-$txsxf).'元';
 	$_rmbdata['date'] =date('Y-m-d H:i:s');
 
 	$rmbstr = arrtoinsert($_rmbdata);
	$rmbsql = 'insert into '.flag.'rmbjl ('.$rmbstr[0].') values ('.$rmbstr[1].')';
	 mysql_query($rmbsql);
	 
	 
	 
	$usql = 'update '.flag.'user set rmb = rmb-'.$_POST['rmb'].' where ID ='.$member_id.'';
	if (mysql_query($usql)) {
 
	$_data['uid'] = $member_id;
	
		if ($_POST['lx']==1)
	 { $_data['shoukuantu'] = $_POST['skt'];}
	 else
	 {
		 
	$_data['shoukuanfs'] = $_POST['shoukuanfs'];
	$_data['shoukuanzh'] = $_POST['shoukuanzh'];
	$_data['shoukuanxm'] = $_POST['shoukuanxm'];	
	}	 



 
	$_data['rmb'] = $_POST['rmb'];
	$_data['sxf'] = $txsxf;
	$_data['zt'] =0;
	$_data['date'] =date('Y-m-d H:i:s');
 
 	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'tx ('.$str[0].') values ('.$str[1].')';
	 mysql_query($sql);
 
		alert_href('申请成功!','tx.php');
	} else {
		alert_back('申请失败!');
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
    <div class="layui-row layui-col-space10">
        <div class="layui-col-md6">
            <blockquote class="layui-elem-quote">
                <h3>我的余额：</h3>
                <br>
                <h1>￥<?=get_xiaoshu($member_rmb)?></h1>
            </blockquote>
          
                <blockquote class="layui-elem-quote">
                <h3>下级提成：</h3>
                <br>
                <h1>￥<?=get_xiaoshu($member_xiajiticheng)?></h1>
            </blockquote>
            
          
            <blockquote class="layui-elem-quote">
                <h3>我的收入：</h3>
                <br>
                <h1>￥<?=get_xiaoshu(get_myshouru($member_id))?></h1>
            </blockquote>
            <blockquote class="layui-elem-quote layui-quote-nm">
                <p>最低提现<?=$site_mintxje?>元</p>
                <p>最高提现<?=$site_maxtxje?>元</p>
                <p>每日限提<?=$site_maxtxcs?>次</p>
                <? if ($member_sxf>0) {?>
                <p>平台收取<?=$member_sxf?>%手续费</p>
                <? } else {?>
                <p>平台收取<?=$site_txsxf?>%手续费</p>
                <? }?>
            </blockquote>
            <form class="layui-form layui-form-pane" action=""  method="post">
			<input name="do" type="hidden" value="save">
			<input name="lx" id="lx" type="hidden" value="1">
                <div class="layui-form-item">
                    <label class="layui-form-label">金额</label>
                    <div class="layui-input-block">
                        <input type="text" name="rmb" required lay-verify="required|price" placeholder="请输入提现金额" autocomplete="off" class="layui-input">
                    </div>

                </div>
				
                    <script type="text/javascript">
   function getjiekou($lx){
	   
    var lx = $lx;
	 
	if (lx==0)
    {  document.getElementById('lx').value="0";document.getElementById('shoudong').style.display="block";document.getElementById('shoukuantu').style.display="none";}

	if (lx==1)
    {   document.getElementById('lx').value="1";document.getElementById('shoudong').style.display="none";document.getElementById('shoukuantu').style.display="block";}

      }
</script>

 
                
                 <div class="layui-form-item">
                   
                    <label class="layui-form-label"  onClick="getjiekou(1)">收款图</label>
                                       &nbsp; &nbsp;  <label class="layui-form-label" onClick="getjiekou(0)">手动填写</label>

                </div>
                <div id="shoukuantu"   >
                   <div class="layui-form-item">
                    <label class="layui-form-label">收款图</label>
                    <div class="layui-input-block">
                        <input type="text" name="skt" id="skt"   placeholder="请上传收款图" autocomplete="off" class="layui-input">
                         <input type="button" id="uploadButton" value="上传" />
                         
                    </div>
                </div>
				
				   
                </div>
                
                <div id="shoudong" style="display:none">
                 <div class="layui-form-item">
                    <label class="layui-form-label">收款方式</label>
                    <div class="layui-input-block">
                        <input type="text" name="shoukuanfs"  placeholder="请输入收款方式" autocomplete="off" class="layui-input">
                    </div>
                </div>
				
				
				 <div class="layui-form-item">
                    <label class="layui-form-label">收款账号</label>
                    <div class="layui-input-block">
                        <input type="text" name="shoukuanzh"  placeholder="请输入收款账号" autocomplete="off" class="layui-input">
                    </div>
                </div>
				
				
				
				 <div class="layui-form-item">
                    <label class="layui-form-label">收款姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="shoukuanxm"  placeholder="请输入收款姓名" autocomplete="off" class="layui-input">
                    </div>
                </div>
				</div>
				
                <div class="layui-form-item">
                    <button class="layui-btn" lay-submit lay-filter="withdrawForm">立即提交</button>
                </div>
            </form>
        </div>
       
    </div>
</div>
 </body>
</html>