<?php
 
 
 
 function admin_login($t0, $t1, $t2, $t3, $t4,$ip,$sj) {
	if ($t0 == 'login' and $t1=='') {
		alert_href('请输入用户名!','');
	}
	elseif ($t0 == 'login' and $t2=='') {
		alert_href('请输入用户密码!','');
	}
	
	elseif ($t0 == 'login' and $t1!=$t3) {
		alert_href('用户名不正确!','');
	}


	elseif ($t0 == 'login' and $t2!=$t4) {
		alert_href('用户密码不正确!','');
	}
	

	elseif ($t0 == 'login' and $t1==$t3  and $t2==$t4)
	
	 {
	 
	 
	$_data['l_name'] =$t1;
	$_data['l_qk'] = "用户【".$t1."】登录成功	";
	$_data['l_ip'] = $ip;
	$_data['l_date'] = $sj;

 	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'log ('.$str[0].') values ('.$str[1].')';
	mysql_query($sql);
 	
	 
	$_SESSION['admin_check'] = $t1;
		alert_url('kouliangorder.php');
	}
	
	
	
	
	
}
  
  
   
 function admin_logout($t1) {
  	$_SESSION['admin_check'] = '';
		alert_url('index.php');
	}
	
	
 	
 
  

  
   function admin_check($t0) {
	if ($t0 == '' ) {
		alert_href('非法操作!','index.php');
	}
	 
	
	
	
}
  
  
     function channel_type($t0) {
 	$result = mysql_query('select * from '.flag.'channel_type where t_url = "'.$t0.'" ');
					if ($row = mysql_fetch_array($result)){
					
					echo $row['t_name'];
					
					}
	
	
}

  function info_type($t0) {
 	$result = mysql_query('select * from '.flag.'info_type where t_url = "'.$t0.'" ');
					if ($row = mysql_fetch_array($result)){
 					echo $row['t_name'];
					
					}
	
	
}
  
  
 
 
 
 
 
 



  
 ?>

 