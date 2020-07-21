<? 
 
 
$tousu=check_tousu(xiaoyewl_ip());
 
 if ($tousu==1)
 {alert_url('/err.php');}
 
//alert_url('/zf.php?id='.$_GET['id'].'');
 
 $result = mysql_query('select * from '.flag.'usershipin where uid = '.get_usershipin('uid',$_GET['id']).'   order by rand()');
$row = mysql_fetch_array($result);
{
	$title=$row['name'];
	$image=$row['image'];
	$id=$row['ID'];
	$price=$row['price'];
	
	
}


 $result = mysql_query('select * from '.flag.'usershipin where uid = '.get_usershipin('uid',$_GET['id']).'   order by rand()');
$row = mysql_fetch_array($result);
{
	$titles=$row['name'];
	$images=$row['image'];
	$ids=$row['ID'];
	$prices=$row['price'];
	
	
}

$biaoti=get_usershipin('name',$_GET['id']);
$tupian=get_usershipin('image',$_GET['id']);
$jiage=get_usershipin('price',$_GET['id']);
$max_price = get_usershipin('max_price',$_GET['id']);

if(intval($max_price))
{
	$jiage = mt_rand($jiage,$max_price);
  	//$jiage = floatval($jiages,1);
}


  if ($site_suiji==1) {$dashangsl=rand(1000,9999);} else {$dashangsl=get_ordersl($_GET['id']);}  
  
  
   $result = mysql_query('select * from '.flag.'image order by rand()');
$row = mysql_fetch_array($result);
{
$tupian=$row['image'];	
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>주문서 제출 중...</title>
    <link rel="stylesheet" href="/dashang/public/layui/css/layui.css">
    <link rel="stylesheet" href="/dashang/public/weui/weui.css">
    <link rel="stylesheet" href="/dashang/public/static/template/css/ds.css">
    <link rel="stylesheet" href="/dashang/public/static/template/css/m.css">
    <script src='/dashang/public/layui/layui.js'></script>
    <script src="/dashang/public/jquery.js"></script>
</head>
<body id="body">
<div id="is_view">
  <div id="background" style="position:absolute;z-index:-1;width:100%;height:100%;top:0px;left:0px;"><img
            src="
<?=$tupian?>" width="100%" height="100%"></div>
    <div class="content">
        <div class="nav" onclick="pay(<?=$jiage?>);"><p class="p3" style="font-size:22px;">支付<?=$jiage?>元</p>
            <p class="p2" style="color:white;font-size:15px;"><?=mb_substr($biaoti,0,25,'utf-8')?>...</p>
          <div style="height:30PX"></div>
            <div class="reward" style="">
                <div class="button"  style="width:100%;font-size:15px;height:40px;line-height:40px;">
                    <a onclick="pay(<?=$jiage?>)"
                       style="background:#fae2b2;border-radius:10px; color:#d35b4d;display:inline-block;width:100%;height:40px;font-weight:bold;margin-left:1px">点击观看</a>
                </div>

              <a href="/user.php?uid=<?=get_usershipin('uid',$_GET['id'])?>">
                    
                    <button type="button" class="submit1">更多精彩视频</button>
                </a></div>
            <div style="text-align:center; color:#fff; font-size:14px; margin-top:8px; padding:10px; "></div>
        </div>
    </div>
    <div class="footer"><a href="tousu.php?userid=<?=get_usershipin('uid',$_GET['id'])?>&amp;sid=<?=$_GET['id']?>"> &nbsp;&nbsp;&nbsp;投诉</a></div>
    <div style="width:100%;height:100%;background:#000;position:fixed;top:0; filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity:0.5;"
         id="touming"></div>

</div>
<script>
    function pay(jiage){
        var url='zf.php?id=<?=$_GET['id']?>&jiage='+jiage;
        location.href = url;
    }
    function is_weixin() {
        if (/MicroMessenger/i.test(navigator.userAgent)) {
            return true;
        } else {
            return false;
        }
    }
    
    
</script>
</body>
</html>
