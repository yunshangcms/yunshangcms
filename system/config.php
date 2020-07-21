<?php
$dqurl=$_SERVER['HTTP_HOST']; 
  $result = mysql_query('select * from '.flag.'zhudomain  order by rand()');
$row = mysql_fetch_array($result);
{
$site_domain=$row['name'];
}
	
 
 $result = mysql_query('select * from '.flag.'system where id = 1');
$row = mysql_fetch_array($result);
{
$site_sort = $row['s_sort'];
$site_tzweiba = $row['s_tzweiba'];
$site_wapnotice = $row['s_wapnotice'];
$site_notice = $row['s_notice'];
$site_fangfengurl = $row['s_fangfengurl'];
$site_userupload = $row['s_userupload'];
$site_pc = $row['s_pc'];
$site_suiji = $row['s_suiji'];
$site_hezi = $row['s_hezi'];
$site_mintxje = $row['s_mintxje'];
$site_maxtxje = $row['s_maxtxje'];
$site_maxtxcs = $row['s_maxtxcs'];
$site_txsxf = $row['s_txsxf'];
$site_dwz = $row['s_api'];
$site_name = $row['s_name'];
$site_sname = $row['s_sname'];
$site_content = $row['s_content'];
//$site_domain = $row['s_domain'];
$site_domains = $row['s_domains']; //落地是否随机
$site_tzdomain1 = $row['s_tzdomain1'];
$site_tzdomain2 = $row['s_tzdomain2'];
$site_tzdomain3 = $row['s_tzdomain3'];
$site_tzdomain4 = $row['s_tzdomain4'];
$site_tzdomain5 = $row['s_tzdomain5'];
$site_tzdomain6 = $row['s_tzdomain6'];
$site_tzdomain7 = $row['s_tzdomain7'];
$site_tzdomain8 = $row['s_tzdomain8'];
$site_tzdomain9 = $row['s_tzdomain9'];
$site_tzdomain10 = $row['s_tzdomain10'];
$site_setticheng = $row['s_tichengset'];
$site_morenticheng = $row['s_morenticheng'];
$site_dingshi = $row['s_dingshi'];
$site_dailiprice = $row['s_dailiprice'];
 
   }  



 $result = mysql_query('select * from '.flag.'tzurl   order by rand() ');
$row = mysql_fetch_array($result);
{ $site_tzurl = $row['name'];}  

 
 $result = mysql_query('select * from '.flag.'domain where zt = 0  order by rand() ');
$row = mysql_fetch_array($result);
{ $site_luodi = $row['name'];}  


if ($site_domains=='1')
{$site_luodiurl=$site_luodi;}
else
{$site_luodiurl=$site_domain;}

               
 
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
$member_sxf = $row['sxf'];
$member_skm = $row['skm'];
$member_password = $row['password'];
$member_nickname = $row['nickname'];
$member_qq = $row['qq'];
$member_rmb = $row['rmb'];
$member_ticheng = $row['ticheng'];
$member_date = $row['date'];

 
 
  $result = mysql_query('select sum(je) as je from '.flag.'rmbjl where uid = '.$member_id.' and  remark like "%下级打赏提成|金额%"');
$row = mysql_fetch_array($result);
{
	if ($row['je']!='')
	{$member_xiajiticheng=$row['je'];}
	else
	{$member_xiajiticheng=0;}

}



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
 define('zhuurl', $site_domain);
 define('luodiurl', $site_luodiurl);
 
 if ($site_fangfengurl!='')
{$site_ffurl='&'.$site_fangfengurl;}
else
{$site_ffurl='';}
 
 include('apiurl.php');
$apiurl=apiurl;
  
 	
	
?>