<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
<? $nav='password';?> 
<?
if (@$_POST['act']=='a')
{
 null_back($_POST['content'],'请输入反馈内容');

 	 
    $_data['uid'] = $member_id;
  	$_data['remark'] = $_POST['content'];
  	$_data['date'] = date('Y-m-d H:i:s');
 	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'fankui ('.$str[0].') values ('.$str[1].')';
		if (mysql_query($sql)) {
 
 		alert_href('反馈成功!','');
	} else {
		alert_back('反馈失败!');
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
        <title>在线反馈-<?=$site_name?></title>
         <link href="agency/css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="agency/js/jquery-1.11.2.min.js"></script>
         <script type="text/javascript" src="agency/js/public.js"></script>
        <script type="text/javascript" src="agency/js/winset.js"></script>
    </head>
    <body>
        <section id="container">
            <div id="ts_loadering"></div>
            <!-------------------mid0------------>
            <div class="toptitle_box">
                <div class="conbox"><i onClick="javascript:history.go(-1);"><img src="agency/images/back.png"></i><span>在线反馈</span>
                </div>
            </div>
            <div class="h_updatepwd_box">
                <form method="post" name="infoform">
                                        <input type="hidden" class="m_text" name="act" value="a">

                    <div class="m_con"><span>反馈内容：</span>
                        <textarea name="content"    class="m_text"  style="width:100%; height:200PX"></textarea>
                    </div>
                   
                    <input   type="submit" class="m_sub" value="提  交"  >
                </form>
            </div>
 
         

            <div class="f_padheght"></div>
            <!-------------------mid1------------>
            <!---------------bottom0------------>
          <? include('footer.php'); ?>

            <!---------------bottom1------------>
        </section>
    </body>

</html>