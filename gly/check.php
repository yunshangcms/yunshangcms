<?php
   echo admin_check  ($_SESSION['guanliyuan_check']) ;
 
  $result = mysql_query('select * from '.flag.'guanliyuan where ID = '.$_SESSION['guanliyuan_check'].' '); 
 $row = mysql_fetch_array($result);
 
 $guanliyuan_name=$row['loginname'];
 $guanliyuan_password=$row['loginpassword'];
 $guanliyuan_qx=$row['qx'];
 $guanliyuan_id=$row['ID'];
 
 
 if(strpos($guanliyuan_qx,'视频管理') !==false){
 $shipin= '1';

}else{

 $shipin= '0';
}

 
  
   if(strpos($guanliyuan_qx,'提现管理') !==false){
 $tixian= 1;

}else{

 $tixian= 0;
}
  
  
 

	?>