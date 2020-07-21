<?php
include('../system/inc.php');
include('./admin_config.php');

  include('checkapi.php');


$array="".$site_tzdomain1."|".$site_tzdomain2."|".$site_tzdomain3."|".$site_tzdomain4."|".$site_tzdomain5."|".$site_tzdomain6."|".$site_tzdomain7."|".$site_tzdomain8."|".$site_tzdomain9."|".$site_tzdomain10."|";
$two=explode("|",$array);


foreach ($two  as $cs=>$ym){
   
  $data=getCurl($apiurl.'http://'.$ym.'');
 $data = json_decode($data,true);
   
  if($data['status'] == '0')
  {
 	
	 $results = mysql_query('select * from '.flag.'domainku  order by ID asc ');
$rows = mysql_fetch_array($results);
{
$addid=$rows['ID'];	
$adddomain=$rows['name'];	
}

 
$upsql = 'update   '.flag.'system set s_tzdomain'.($cs+1).'= "'.$adddomain.'" where ID = 1 ';
	if (mysql_query($upsql)) {
 		  $dsql = 'delete from '.flag.'domainku where id = '.$addid;
             mysql_query($dsql);
  	}  
	
	sleep(5);
  }
	    
  



	

			
          
        
}
echo 'ok';

