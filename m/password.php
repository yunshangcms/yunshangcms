<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
<? $nav='password';?> 
<?
if (@$_POST['act']=='a')
{
if ($_POST['old_password']=='')
{alert_back('请输入旧密码');  }
if ($_POST['new_password']=='')
{alert_back('请输入新密码');  }
  if ($_POST['re_new_password']=='')
 {alert_back('请重复新密码');  }
if ($_POST['old_password']!=$member_password)
 {alert_back('旧密码不正确');  }
 
if ($_POST['new_password']!=$_POST['re_new_password'])
 {alert_back('两次密码不一致');  }

 if ($_POST['old_password']==$member_password)
{
 $sql = 'update '.flag.'user set password=  "'.$_POST['new_password'].'" where id = '.$member_id.'';
	if (mysql_query($sql)) {
	 alert_href('修改成功');   

	} else {
		  alert_back('修改失败');   


	}
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
        <title>密码修改-<?=$site_name?></title>
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
                <div class="conbox"><i onclick="javascript:history.go(-1);"><img src="agency/images/back.png"></i><span>密码修改</span>
                </div>
            </div>
            <div class="h_updatepwd_box">
                <form method="post" name="infoform">
                                        <input type="hidden" class="m_text" name="act" value="a">

                    <div class="m_con"><span>当前密码：</span>
                        <input type="password" class="m_text" maxlength="20" name="old_password">
                    </div>
                    <div class="m_con"><span>新的密码：</span>
                        <input type="password" class="m_text" maxlength="20" name="new_password">
                    </div>
                    <div class="m_con"><span>密码确认：</span>
                        <input type="password" class="m_text" maxlength="20" name="re_new_password">
                    </div>
                    <input   type="submit" class="m_sub" value="修　改"  >
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