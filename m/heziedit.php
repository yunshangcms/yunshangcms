<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
<? $nav='my';?> 
<?
if ($_POST['do']=='save')
{
 null_back($_POST['title'],'请输入盒子标题');
  
$sql = 'update '.flag.'hezi set name=  "'.$_POST['title'].'"  where  id =  '.$_GET['id'].' and  uid = '.$member_id.'';
	if (mysql_query($sql)) { alert_href('修改成功','hezi.php'); } 
	else { alert_href('修改失败','');}
	
}

?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <title>添加盒子-<?=$site_name?></title>
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
                <div class="conbox"><i onclick="javascript:history.go(-1);"><img src="agency/images/back.png"></i><span>添加盒子</span>
                </div>
            </div>
            <div class="h_updatepwd_box">
            <?
             $result = mysql_query('select  * from '.flag.'hezi where uid ='.$member_id.' and id = '.$_GET['id'].'');

$row = mysql_fetch_array($result);
{
 $title=$row['name'];
 
} 


?>
                <form method="post" name="infoform">
 <input type="hidden" name="do" value="save" />
                    <div class="m_con"><span>标题：</span>
                         
                                                <input type="text" name="title" required lay-verify="required" placeholder="请输入盒子标题" autocomplete="off"    value="<?=$title?>" class="m_text">

                    </div>
                   
                     
                    <input   type="submit" class="m_sub" value="修改"  >
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