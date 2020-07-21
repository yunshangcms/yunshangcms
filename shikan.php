<? include('system/inc.php'); 
  include('checkpc.php');
 
 $url='pay';
  
  $result = mysql_query('select * from '.flag.'shikan where ip = "'.xiaoyewl_ip().'"');
if ($row = mysql_fetch_array($result))
{
	 alert_url('/'.$url.'.php?id='.$_GET['id'].'');
}

else
{
 
	$_data['vid'] = $_GET['id'];
	$_data['ip'] = xiaoyewl_ip();
	$_data['date'] = date('Y-m-d H:i:s');
	 
 	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'shikan ('.$str[0].') values ('.$str[1].')';
	 mysql_query($sql);
		
		
	
}	
 
   
 ?>
<!DOCTYPE html>
<html>
<head>
<title>-</title>
	<meta http-equiv="refresh" content="<?=$site_dingshi?>; url=/<?=$url?>.php?id=<?=$_GET['id']?>">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
	<link href="/static/index/css/style.css?v=0.1" rel="stylesheet">
	<link href="/static/index/weui.min.css" rel="stylesheet">
	<link href="/static/admin/css/style.min.css?v=0.1" rel="stylesheet">


<script type="text/javascript" src="../ckplayer/ckplayer.js" charset="UTF-8"></script>
<script type="text/javascript" src="../list/jquery.js"></script>

 
<style type="text/css">
  	.laypage_main a,.laypage_main input,.laypage_main span{height:26px;line-height:26px}.laypage_main button,.laypage_main input,.laypageskin_default a{border:1px solid #ccc;background-color:#fff}.laypage_main{font-size:0;clear:both;color:#666}.laypage_main *{display:inline-block;vertical-align:top;font-size:12px}.laypage_main a{text-decoration:none;color:#666}.laypage_main a,.laypage_main span{margin:0 3px 6px;padding:0 10px}.laypage_main input{width:40px;margin:0 5px;padding:0 5px}.laypage_main button{height:28px;line-height:28px;margin-left:5px;padding:0 10px;color:#666}.laypageskin_default span{height:28px;line-height:28px;color:#999}.laypageskin_default .laypage_curr{font-weight:700;color:#666}.laypageskin_molv a,.laypageskin_molv span{padding:0 12px;border-radius:2px}.laypageskin_molv a{background-color:#f1eff0}.laypageskin_molv .laypage_curr{background-color:#00AA91;color:#fff}.laypageskin_molv input{height:24px;line-height:24px}.laypageskin_molv button{height:26px;line-height:26px}.laypageskin_yahei{color:#333}.laypageskin_yahei a,.laypageskin_yahei span{padding:0 13px;border-radius:2px;color:#333}.laypageskin_yahei .laypage_curr{background-color:#333;color:#fff}.laypageskin_flow{text-align:center}.laypageskin_flow .page_nomore{color:#999}
	
  .btn1{ margin:12px 0 0 0; width:100%; height:42px; text-align:center; font-size:16px; font-style:normal; border-radius:5px; float:left; display:inline; overflow:hidden; }
  .btn1 a{ width:100%; line-height:42px; color:#fff; background: #009933; display:block; }
  .btn1 a:hover{ color:#fff; display:block; }
 
		#navsecond{position: absolute;bottom:0;display: none;}
 
	
	</style>
	</head>
	<body style="max-width:460px; margin:0 auto;">
	 <div style="height: 42px; width: 100%; background-color: #000;float: left;display: block;opacity: 0.8; line-height: 42px;font-size: 22px;text-align: center;color: #FFF;margin-bottom: 8px; display:none">视频播放</div>
	<div style="padding: 0px 8px 8px; ">
	 <div class="rich_media_content"  id="video" style="width: 100%; height: 250px;border: solid 1px #323136;padding-left:1px;"></div>
   
  
	
	<div id="">
	<div style="padding-top:10px;font-size:16px;">


</h2></div>

<div align="center">
   <i class="btn1"><a   href="#">查看更多视频</a></i>
               
				</div>
				
 <div  style="height:7PX"></div>

     <div  style="height:7PX"></div>
    <hr>
	<section id="container">
	<div class="h_playlist_box" id="article_list"> 
	  
	
	
	   	   
 
 
 	 
	 	   </div>
	 </section>
	 
	 
 
	
	</div>
	
	
	 <style>
	
	#container{overflow:inherit;}
	
	.h_playlist_box{margin: 0;width: 103%;}
	
	.h_playlist_box dl{padding: 6px 6px;width: 44%;float:left;height:11rem;margin-right: 1%;}
	
	.h_playlist_box dl dd{width: 100%;margin: 0;padding:0 1%;float: left;}
	
	.h_playlist_box dl dt{margin:0;position: relative;}
	
	.h_playlist_box dl dd span{font-size:13px;
	
			overflow: hidden;

	
			text-overflow: ellipsis;
	
			display: -webkit-box;
	
			-webkit-line-clamp: 3;
	
			-webkit-box-orient: vertical;
	
			margin-top:5px;
	
			}
	</style>
    
 <script type="text/javascript">
var videoObject = {
container: '#video',
variable: 'player', 
//html5m3u8:true,
loop: true,
autoplay: true, 
poster: '', 
video:'<?=get_usershipin('url',$_GET['id'])?>'
};
var player = new ckplayer(videoObject);
</script>
<script type="text/javascript">
function run () {
var index = Math.floor(Math.random()*10);
pmd(index);
};
var times = document.getElementsByClassName('fuckyou').length;
setInterval('run()',times*200);
function pmd (id) {
var colors = new Array('#FF5151','#ffaad5','#ffa6ff','#d3a4ff','#2828FF','#00FFFF','#1AFD9C','#FF8000','#81C0C0','#B766AD');
var color = colors[id];
var tmp = document.getElementsByClassName('fuckyou');
for (var i = 0; i < tmp.length; i++) {
var id = tmp[i];
var moren = id.style.color;
setTimeout(function(id){
id.style.color = color;
},i*200,id);
setTimeout(function(id,moren){
id.style.color = moren;
},i*200+180,id,moren);
};
}
</script>

	</div>
	</div>
	</div>
	</body></html>
