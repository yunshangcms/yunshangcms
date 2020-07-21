<?php
include('../system/inc.php');
include('./admin_config.php');
include('checkapi.php');

$data=getCurl($apiurl.'http://'.$site_domain.'');
 $data = json_decode($data,true);
  
  
  if($data['status'] == '0')
  {
    
 $results = mysql_query('select * from '.flag.'domainku  order by ID asc ');
$rows = mysql_fetch_array($results);
{
$addid=$rows['ID'];	
$adddomain=$rows['name'];	
}

	 
	$upsql = 'update   '.flag.'system set s_domain= "'.$adddomain.'" where ID = 1 ';
	if (mysql_query($upsql)) {
 		  $dsql = 'delete from '.flag.'domainku where id = '.$addid;
             mysql_query($dsql);
  	}  
 
	    
   
        
}
echo 'ok';

