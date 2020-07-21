<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
<? $nav='my';?> 
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
                <form method="post" name="infoform">
 <input type="hidden" name="do" value="save" />
 
 
 
   <div class="m_con"><span>盒子列表：</span>
                         

 <select required="required"  lay-verify="required"  name="hid" class="m_text">
                      <option>请选择盒子</option>
                         <?php                                                                                
                   
 						$result = mysql_query('select * from '.flag.'hezi  where uid = '.$member_id.'   order by ID asc  ');
						while($row = mysql_fetch_array($result)){
						?>
                      <option value="<?=$row['ID']?>"><?=$row['name']?></option>


<? }?>
                    </select>
                    
                    
                    </div>
 
                    <div class="m_con"><span>免费链接：</span>
                         
                                                <input type="text" name="url" required lay-verify="required" placeholder="请输入免费链接" autocomplete="off" class="m_text">

                    </div>
                   
                     
                    <input   type="submit" class="m_sub" value="提交"  >
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