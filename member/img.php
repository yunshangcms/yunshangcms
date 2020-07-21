<? include('../system/inc.php');include('check.php'); ?>
<?php

if ($_GET['act']=='shipin') {
  $result = mysql_query('select * from '.flag.'shipin where id = '.$_GET['id'].'');
   }
   
   if ($_GET['act']=='myshipin') {
  $result = mysql_query('select * from '.flag.'usershipin where id = '.$_GET['id'].'');
   }
   
$row = mysql_fetch_array($result);
{
$img=$row['image'];

}
?><div align="center">
<img src="<?=$img?>"  width="95%" height="95%" />
 </div>