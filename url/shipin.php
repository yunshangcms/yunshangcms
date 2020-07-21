<? include('../system/inc.php');
 
 $trueurl='shipin.php?id='.$_GET['id'];

   if ($dqurl==$site_tzurl)
  {   $tzurl='http://'.$site_luodi.'/'.$trueurl.'&'.$site_ffurl.'';   }

   elseif ($site_tzurl!='')
  {   $tzurl='http://'.$site_tzurl.'/url/'.$trueurl.'&'.$site_tzweiba.'';   }
  else
  {   $tzurl='http://'.$site_luodi.'/'.$trueurl.'&'.$site_ffurl.'';   }
   alert_url($tzurl);
 
// echo '测试'.$tzurl;
 ?> 