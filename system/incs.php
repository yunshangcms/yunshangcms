<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
 require_once('conn.php');
require_once('library.php');
 
 
 
 $result = mysql_query('select * from '.flag.'system where id = 1');
$row = mysql_fetch_array($result);
{
$site_hezi = $row['s_hezi'];
$site_mintxje = $row['s_mintxje'];
$site_maxtxje = $row['s_maxtxje'];
$site_maxtxcs = $row['s_maxtxcs'];
$site_txsxf = $row['s_txsxf'];
$site_dwz = $row['s_api'];
$site_name = $row['s_name'];
$site_sname = $row['s_sname'];
$site_content = $row['s_content'];
$site_domain = $row['s_domain'];
$site_domains = $row['s_domains'];
$site_tzdomain1 = $row['s_tzdomain1'];
$site_tzdomain2 = $row['s_tzdomain2'];
$site_tzdomain3 = $row['s_tzdomain3'];
$site_tzdomain4 = $row['s_tzdomain4'];
$site_tzdomain5 = $row['s_tzdomain5'];
 $site_dailiprice = $row['s_dailiprice'];

   }  
               

   if ($site_tzdomain1!='')
  {$tz1='&tzid=1';}
  else
  {$tz1='';}

 
  $tzinfo=$tz1.$tz2.$tz3.$tz4.$tz5;
 $sj =    date("Y-m-d H:i:s",intval(time()));  
  


$result = mysql_query('select * from '.flag.'admin where id = 1  ');
$row = mysql_fetch_array($result);
$a_name = $row['a_name'];
$a_password = $row['a_password'];
 



if ($_SESSION['member_id']!='')
{

$result = mysql_query('select * from '.flag.'user where id = '.$_SESSION['member_id'].'  ');
$row = mysql_fetch_array($result);
$member_id = $row['ID'];
$member_name = $row['username'];
$member_password = $row['password'];
$member_nickname = $row['nickname'];
$member_qq = $row['qq'];
$member_rmb = $row['rmb'];
$member_date = $row['date'];

 
 

}





 
 
 // 定义一个函数getIP()
function xiaoyewl_ip(){
global $ip;
if (getenv("HTTP_CLIENT_IP"))
$ip = getenv("HTTP_CLIENT_IP");
else if(getenv("HTTP_X_FORWARDED_FOR"))
$ip = getenv("HTTP_X_FORWARDED_FOR");
else if(getenv("REMOTE_ADDR"))
$ip = getenv("REMOTE_ADDR");
else $ip = "Unknow";
return $ip;
}

 define('domain', $site_domain);
 define('domains', $site_domains);

 
 


require_once('function.php');
require_once('safe.php');
?>