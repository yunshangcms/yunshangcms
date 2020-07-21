 <? include('system/inc.php'); ?> 
<?php
 
$dingdan		=	'2019040912513325645'; //自己网站上订单的订单号  能用到
 

   function userkouliangsl($uid,$zt)
{
	//$zt = 0未扣量  1 已扣量
	$result = mysql_query('select  count(*) as sl  from '.flag.'order where uid = '.$uid.'  and  zt = 1  and kouliang  = '.$zt.' ');
	if (!!($row = mysql_fetch_array($result))) {
		
		if ($row['sl']!='')
		{return $row['sl'];}
		else
		{return 0;}
		 
	} else {
		return 0;
	}
}




 
  function kouliangorder($uid)
{
 
	$result = mysql_query('select  count(*) as sl  from '.flag.'kouliangorder where uid = '.$uid.'   ');
	if (!!($row = mysql_fetch_array($result))) {
		
		if ($row['sl']!='')
		{return $row['sl'];}
		else
		{return 0;}
		 
	} else {
		return 0;
	}
}
 
  
	 
	  $results = mysql_query('select * from '.flag.'order where  dingdanhao="'.$dingdan.'"  ');
$rows = mysql_fetch_array($results);
{
	//查询是否有扣量条件
		  $checkkl = mysql_query('select * from '.flag.'kouliang where  uid='.$rows['uid'].'  ');
 if ($ckrow = mysql_fetch_array($checkkl))
{$ifkouliang=1; die ('有扣量');}
	else
{$ifkouliang=0; die ($row['uid'].'没有扣量');}
	//用户上级
	  $shangjiid=get_user('shangji',$rows['uid']);
	//上级提成
	  $shangjitc=(get_user('ticheng',$shangjiid)/100);
	  //上级提成金额
	  $shangjiticheng=$money*$shangjitc;
	  	
	
  	//用户扣量条件值
	 $kouliangnum=get_kouliang('num',$rows['uid']); 
  	//用户扣量值
	 $kouliangnums=get_kouliang('nums',$rows['uid']); 
 	 //条件达到这个数开始执行
	 $shijizhi=$kouliangnum-$kouliangnums;
 	//获取未扣量过的订单数量
	$weikouliangnum=userkouliangsl($rows['uid'],0);
	//获取已扣量过的订单数量
	$yikouliangnum=userkouliangsl($rows['uid'],1);
	
	//获取扣量订单表里的数量
	 $kordersl=kouliangorder($rows['uid']);
  
  if ($shangjiid>0)
  {$shijidashangje=$money-$shangjiticheng;}
  else
  {$shijidashangje=$money;}
  
  
    if  ($kordersl==$kouliangnums)
   { $kouchu=0;
	 $dksql = 'delete from '.flag.'kouliangorder   where uid = '.$rows['uid'].' ';
     mysql_query($dksql);
	 
	 if ($shangjiid>0)
	 {
		
	$_sjrmbdata['uid'] = $shangjiid;
	$_sjrmbdata['type'] = 1;// 0扣除1增加;
	$_sjrmbdata['qje'] = get_user('rmb',$shangjiid);
	$_sjrmbdata['je'] = $shangjiticheng;
	$_sjrmbdata['hje'] = get_user('rmb',$shangjiid)+$shangjiticheng;
	$_sjrmbdata['remark'] = '下级打赏提成|金额:'.$shangjiticheng.'';
 	$_sjrmbdata['date'] =date('Y-m-d H:i:s');
  	$sjrmbstr = arrtoinsert($_sjrmbdata);
	$sjrmbsql = 'insert into '.flag.'rmbjl ('.$sjrmbstr[0].') values ('.$sjrmbstr[1].')';
	 mysql_query($sjrmbsql);
   $sjusersql = 'update '.flag.'user set rmb= rmb+'.$shangjiticheng.'   where ID='.$shangjiid.'  ';
  mysql_query($sjusersql);
   
	 }
	 
	 
	 
	  	$_rmbdata['uid'] = $rows['uid'];
	$_rmbdata['type'] = 1;// 0扣除1增加;
	$_rmbdata['qje'] = get_user('rmb',$rows['uid']);
	$_rmbdata['je'] = $shijidashangje;
	$_rmbdata['hje'] = get_user('rmb',$rows['uid'])+$shijidashangje;
	$_rmbdata['remark'] = '用户打赏|金额:'.$shijidashangje.'|资源ID:'.$rows['vid'].'';
 	$_rmbdata['date'] =date('Y-m-d H:i:s');
  	$rmbstr = arrtoinsert($_rmbdata);
	$rmbsql = 'insert into '.flag.'rmbjl ('.$rmbstr[0].') values ('.$rmbstr[1].')';
	 mysql_query($rmbsql);
   $usersql = 'update '.flag.'user set rmb= rmb+'.$shijidashangje.'   where ID='.$rows['uid'].'  ';
  mysql_query($usersql);
  
  
  
   }	 
   else
   {$kouchu=1;}
   
   //是否需要继续扣掉
   if ($kordersl==0)
   {  $jixukou=0;}  // 不需要继续扣
   else
   {  $jixukou=1; }//需要继续扣}
    
  
 if  ($jixukou==1 && $kouchu==1 && $ifkouliang==1)
 {
 	 	 //继续扣掉这笔订单
	 $kouliang=1;
	 $kouliangsql = 'update '.flag.'order set kouliang=1 where uid = '.$rows['uid'].' ';
     mysql_query($kouliangsql);
	 
	 $klsql = 'update '.flag.'order set kl=1 where dingdanhao = "'.$rows['dingdanhao'].'" ';
     mysql_query($klsql);
	 
  	$_kldata['uid'] =$rows['uid'];
 	$_kldata['dingdanhao'] =$rows['dingdanhao'];
 	$_kldata['laiyuan'] ='继续扣掉';
  	$klstr = arrtoinsert($_kldata);
	$ksql = 'insert into '.flag.'kouliangorder ('.$klstr[0].') values ('.$klstr[1].')';
	 mysql_query($ksql);
	 
	 
}	 
 
  
 
   //满足扣量条件
 	if ($weikouliangnum==$shijizhi && $ifkouliang==1)
	{
	 //扣掉这笔订单
	 $kouliang=1;
	 $kouliangsql = 'update '.flag.'order set kouliang=1 where uid = '.$rows['uid'].' ';
     mysql_query($kouliangsql);
	 
	 $klsql = 'update '.flag.'order set kl=1 where dingdanhao = "'.$rows['dingdanhao'].'" ';
     mysql_query($klsql);
	 
  	$_kldata['uid'] =$rows['uid'];
 	$_kldata['dingdanhao'] =$rows['dingdanhao'];
 	$_kldata['laiyuan'] ='满足条件扣';
  	$klstr = arrtoinsert($_kldata);
	$ksql = 'insert into '.flag.'kouliangorder ('.$klstr[0].') values ('.$klstr[1].')';
	 mysql_query($ksql);
  		 
     }
	else
	{   $kouliang=0;}	 
		
  
	  if ($kouliang==0 && $jixukou==0)  {
		  
		  
		  
		  	 if ($shangjiid>0)
	 {
		
	$_sjrmbdata['uid'] = $shangjiid;
	$_sjrmbdata['type'] = 1;// 0扣除1增加;
	$_sjrmbdata['qje'] = get_user('rmb',$shangjiid);
	$_sjrmbdata['je'] = $shangjiticheng;
	$_sjrmbdata['hje'] = get_user('rmb',$shangjiid)+$shangjiticheng;
	$_sjrmbdata['remark'] = '下级打赏提成|金额:'.$shangjiticheng.'';
 	$_sjrmbdata['date'] =date('Y-m-d H:i:s');
  	$sjrmbstr = arrtoinsert($_sjrmbdata);
	$sjrmbsql = 'insert into '.flag.'rmbjl ('.$sjrmbstr[0].') values ('.$sjrmbstr[1].')';
	 mysql_query($sjrmbsql);
   $sjusersql = 'update '.flag.'user set rmb= rmb+'.$shangjiticheng.'   where ID='.$shangjiid.'  ';
  mysql_query($sjusersql);
   
	 }
	 
	 
	 
 	$_rmbdata['uid'] = $rows['uid'];
	$_rmbdata['type'] = 1;// 0扣除1增加;
	$_rmbdata['qje'] = get_user('rmb',$rows['uid']);
	$_rmbdata['je'] = $shijidashangje;
	$_rmbdata['hje'] = get_user('rmb',$rows['uid'])+$shijidashangje;
	$_rmbdata['remark'] = '用户打赏|金额:'.$shijidashangje.'|资源ID:'.$rows['vid'].'';
 	$_rmbdata['date'] =date('Y-m-d H:i:s');
  	$rmbstr = arrtoinsert($_rmbdata);
	$rmbsql = 'insert into '.flag.'rmbjl ('.$rmbstr[0].') values ('.$rmbstr[1].')';
	 mysql_query($rmbsql);
   $usersql = 'update '.flag.'user set rmb= rmb+'.$shijidashangje.'   where ID='.$rows['uid'].'  ';
  mysql_query($usersql);
	  }
  
}
 
$sql = 'update '.flag.'order set jiaoyihao=  "'.$ddh.'",zt=1,payprice='.$shijidashangje.',pdate="'.date('Y-m-d H:i:s').'"   where dingdanhao="'.$dingdan.'"  ';
  mysql_query($sql);




  
//-----------------------------------------------------------------
if ($bjsnk===0)
{ echo "Success";//返回成功

}else{
echo 'Key';//返回Key秘钥错误
}
?>