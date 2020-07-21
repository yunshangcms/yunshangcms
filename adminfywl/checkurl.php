<?php
include('../system/inc.php');
include('./admin_config.php');
 include('checkapi.php');
 

$result = mysql_query('select * from '.flag.'domain order by id desc ,id desc');

while($row = mysql_fetch_array($result)){


 

   $data=getCurl($apiurl.'http://'.$row['name'].'');
 $data = json_decode($data,true);
 
 
   if($data['status'] == '0')
  {
		   $sql = 'delete from '.flag.'domain where id = '.$row['ID'];
             mysql_query($sql);
				
			
$results = mysql_query('select * from '.flag.'domainku  order by ID asc ');
$rows = mysql_fetch_array($results);
{
$addid=$rows['ID'];	
$adddomain=$rows['name'];	
}

	$_adddata['name'] = $adddomain;
 	$addstr = arrtoinsert($_adddata);
	$addsql = 'insert into '.flag.'domain ('.$addstr[0].') values ('.$addstr[1].')';
	if (mysql_query($addsql)) {
		 
		  $dsql = 'delete from '.flag.'domainku where id = '.$addid;
             mysql_query($dsql);
			 
 	}  
			
          
        }
        	sleep(5);

 	}

echo 'check ok';




?>


