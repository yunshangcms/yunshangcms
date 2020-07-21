<? include('../system/inc.php');
  $trueurl='user.php?uid='.$_GET['uid'];

   if ($dqurl==$site_tzurl)
  {   $tzurl='http://'.$site_luodi.'/'.$trueurl.'&'.$site_ffurl.'';   }

   elseif ($site_tzurl!='')
  {   $tzurl='http://'.$site_tzurl.'/url/'.$trueurl.'&'.$site_tzweiba.'';   }
  else
  {   $tzurl='http://'.$site_luodi.'/'.$trueurl.'&'.$site_ffurl.'';   }
 

 
 
 alert_url($tzurl);
 ?>
 
