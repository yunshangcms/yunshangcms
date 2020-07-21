<?php
 
 
 
 
  
  
   
 function admin_logout($t1) {
  	$_SESSION['guanliyuan_check'] = '';
		alert_url('index.php');
	}
	
	
 	
 
  

  
   function admin_check($t0) {
	if ($t0 == '' ) {
		alert_href('非法操作!','index.php');
	}
   }
	
 
  
    
 
 
 



  
 ?>

 