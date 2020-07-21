<? include('system/inc.php'); 
 
 $file = 'install/index.php'; 
if (is_readable($file) == false) { 
  alert_url('login.php');
  } else { 
alert_url ('/install/'); 
} 


 ?>
 