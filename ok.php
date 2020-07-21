 <? include('system/inc.php'); ?> 
<?php
if(isset($_GET['token']))
{
  $id = $_GET['token'] / 789;
alert_url('http://'.$site_luodiurl.'/shipin.php?id='.$id);	exit;
}


 if ($_SESSION['vid']!='')
 {
 alert_url('http://'.$site_luodiurl.'/shipin.php?id='.$_SESSION['vid']);	
}

else
{

  $result = mysql_query('select * from '.flag.'order  where ip = "'.xiaoyewl_ip().'" and zt =1  order by id desc     ');
$row = mysql_fetch_array($result);
 
{
 alert_url('http://'.$site_luodiurl.'/shipin.php?id='.$row['vid']);	
}
}?>