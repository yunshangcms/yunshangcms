<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
<? $nav=='apply';?> 
<?
if ($_POST['do']=='save')
{
null_back($_POST['getamount'],'请输入提现金额');

if ($_POST['lx']==0) {
null_back($_POST['shoukuanfs'],'请输入收款方式');
null_back($_POST['shoukuanzh'],'请输入收款账号');
null_back($_POST['shoukuanxm'],'请输入收款姓名');
}


if ($_POST['lx']==1) {
null_back($_POST['skt'],'请上传收款图');
 }
if ($_POST['getamount']<$site_mintxje)
{alert_back('提现失败:提现金额不得低于'.$site_mintxje.'元');}

if ($_POST['getamount']>$site_maxtxje)
{alert_back('提现失败:提现金额不得高于'.$site_maxtxje.'元');}

if ($_POST['getamount']>$member_rmb)
{alert_back('提现失败:余额不足');}

if ($member_sxf>0) 
{ $txsxf=$_POST['getamount']*($member_sxf/100);}
else
{ $txsxf=$_POST['getamount']*($site_txsxf/100);}


	$_rmbdata['uid'] = $member_id;
	$_rmbdata['type'] = 0;// 0扣除1增加;
	$_rmbdata['qje'] = $member_rmb;
	$_rmbdata['je'] = $_POST['getamount'];
 	$_rmbdata['hje'] = $member_rmb-$_POST['getamount'];
	$_rmbdata['remark'] = '申请提现|金额:'.$_POST['getamount'].'|手续费:'.$txsxf.'元|实际到账:'.($_POST['getamount']-$txsxf).'元';
 	$_rmbdata['date'] =date('Y-m-d H:i:s');
 
 	$rmbstr = arrtoinsert($_rmbdata);
	$rmbsql = 'insert into '.flag.'rmbjl ('.$rmbstr[0].') values ('.$rmbstr[1].')';
	 mysql_query($rmbsql);
	 
	 
	 
	$usql = 'update '.flag.'user set rmb = rmb-'.$_POST['getamount'].' where ID ='.$member_id.'';
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



 
	$_data['rmb'] = $_POST['getamount'];
	$_data['sxf'] = $txsxf;
	$_data['zt'] =0;
	$_data['date'] =date('Y-m-d H:i:s');
 
 	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'tx ('.$str[0].') values ('.$str[1].')';
	 mysql_query($sql);
 
		alert_href('申请成功!','apply.php');
	} else {
		alert_back('申请失败!');
	}
	
	
	
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <title>提现申请-<?=$site_name?></title>
     <link href="agency/css/style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="agency/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">var apply_url = "agency/money/sub_apply.html";</script>
    <script type="text/javascript" src="agency/js/public.js"></script>
    <script type="text/javascript" src="agency/js/winset.js"></script>
    
    
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
<section id="container">
    <div id="ts_loadering"></div>
    <!-------------------mid0------------>

    <td>
        
            <div class="toptitle_box1">
                <span>提现申请</span><span> </span>
            </div>

            </td>

 

    <div class="h_getcash_box">
        <div class="s_con1">我的余额：<b>￥<?=get_xiaoshu($member_rmb)?></b>
        </div>

        <div class="s_con1">下级提成：<b>￥<?=get_xiaoshu($member_xiajiticheng)?></b>
        </div>

   <div class="s_con1">我的收入：<b>￥<?=get_xiaoshu(get_myshouru($member_id))?></b>
        </div>



        <div class="s_con2"><span>★ <b>提示：</b><p>最低提现<?=$site_mintxje?>元</p>
                <p>最高提现<?=$site_maxtxje?>元</p>
                <p>每日限提<?=$site_maxtxcs?>次</p>
                <? if ($member_sxf>0) {?>
                <p>平台收取<?=$member_sxf?>%手续费</p>
                <? } else {?>
                <p>平台收取<?=$site_txsxf?>%手续费</p>
                <? }?></span>
        </div>
        <form method="post" name="subform">
        			<input name="do" type="hidden" value="save">
			<input name="lx" id="lx" type="hidden" value="1">

            <div class="s_con1">
                <label>提现方式：</label>
                <label><input name="status" type="radio" value="0" checked="checked" onClick="getjiekou(1)" />收款图</label>
                <label><input name="status" type="radio" value="1" onClick="getjiekou(0)" />手动填写</label>

            </div>

            <div class="m_con" style="margin-top:15px; padding-top:15px; border-top:#eeeeee 1px solid;"><i>提现金额：</i>
                <input type="text" class="m_text" maxlength="7" name="getamount"><i class="rtd">元</i>
            </div>
             
              <div id="shoukuantu"    >
            <div class="m_con" style="margin-top:12px; padding-top:15px; border-top:#eeeeee 1px solid;"><i style="width:100%; line-height:150%;color:#e30404; font-size:13px;"><b>收款码：</b>（请正确上传收款二维码）</i>
            </div>
            <div class="m_con"> 
                 <input type="button" id="uploadButton" value="上传" />
                  <input type="text" name="skt" id="skt"   placeholder="请上传收款图" autocomplete="off" class="m_text1">
                          
            </div> 
          </div>
          
          
              <div id="shoudong"  style="display:none"    >
            <div class="m_con" style="margin-top:12px; padding-top:15px; border-top:#eeeeee 1px solid;"><i style="width:100%; line-height:150%;color:#e30404; font-size:13px;"><b>手动填写：</b></i>
            </div>
            <div class="m_con"><i style="width:90px;">收款方式：</i>
                         <input type="text" name="shoukuanfs"  placeholder="请输入收款方式" autocomplete="off" class="m_text1">

            </div>
            
             <div class="m_con"><i style="width:90px;">收款账号：</i>
                        <input type="text" name="shoukuanzh"  placeholder="请输入收款账号" autocomplete="off" class="m_text1">

            </div>
            
            
            
             <div class="m_con"><i style="width:90px;">收款姓名：</i>
                        <input type="text" name="shoukuanxm"  placeholder="请输入收款姓名" autocomplete="off" class="m_text1">

            </div>
          </div>
          
           
          
     
            <input  type="submit" class="m_sub" value="提　交"  >
        </form>
    </div>
    <div class="f_padheght"></div>
    <!-------------------mid1------------>
    <!---------------bottom0------------>
     <? include('footer.php'); ?>
    <!---------------bottom1------------>
</section>
</body>
<script type="text/javascript">
    $(function(){
        var allm = $("input[name='cangetamount']").val();
        $(".demo-checkbox").change(function() {
            if($(".demo-checkbox").prop("checked")){
                $(".m_text").val(allm);
            }else{
                $(".m_text").val('');
            }
        });
    })

 
</script>


                    <script type="text/javascript">
   function getjiekou($lx){
	   
    var lx = $lx;
	 
	if (lx==0)
    {  document.getElementById('lx').value="0";document.getElementById('shoudong').style.display="block";document.getElementById('shoukuantu').style.display="none";}

	if (lx==1)
    {   document.getElementById('lx').value="1";document.getElementById('shoudong').style.display="none";document.getElementById('shoukuantu').style.display="block";}

      }
</script>
</html>
         