
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="gb2312" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="black" name="apple-mobile-web-app-status-bar-style" />
<meta name="format-detection" content="telephone=no" />
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate" />
<script src="err/jquery-1.9.1.min.js"></script>
<style>
a,body,dd,div,dl,dt,em,form,h1,h2,h3,h4,h5,h6,html,img,input,label,li,ol,p,select,span,ul{margin:0;padding:0}body{font-family:"微软雅黑",'Microsoft YaHei',sans-serif;color:#666;font-size:16px}body,html{height:100%;background:#e7e8eb}.main{min-width:320px;margin:0 auto;max-width:640px;background-color:#fff;overflow:hidden;font-size:16px}.main h2{color:#8a898e;font-size:16px;margin:0 0 0 18px;padding:12px 0;font-weight:400}#type ul,li{list-style:none;padding:0;margin:0 20}#type ul li span{width:30px;height:25px;display:inline-block;vertical-align:bottom;float:right;margin-right:10px}#type ul li span.sel{background:url(err/images/correct.png) no-repeat 6px 4px}#type{background:#fff}#type ul li{padding:12px 0;border-bottom:1px solid #ddd;margin-left:18px;color:#000;font-size:14px}#type ul li a{font-size:1.6rem!important}.next_1{height:60px}.next_1_bottom,.next_1_tup,.next_Report,.queding{background:#04be02;border:none;border-radius:3px;color:#fff;cursor:pointer;font-weight:700;padding:8px 0;height:21px;transition:all .3s ease 0s;width:90%;text-align:center;margin:20px auto}.main textarea{margin:5px auto;background:#fff;border:none;width:90%;display:block;height:100px;padding:6px 0 6px 18px}#div_2{background-color:#f1f0f5;height:100%}#div_3{text-align:center;background-color:#f1f0f5}#div_3 img{padding-top:55px;width:35.3%;margin:0 auto}#div_3 h3{color:#000;font-size:2.2rem;margin-top:25px;margin-bottom:15px}#div_3 span{width:90%;color:#888;display:block;margin:20px auto;text-align:center}body,td,th {
	font-family: "微软雅黑", "Microsoft YaHei", sans-serif;
}
</style>
</head>
<body>
<div class="main">
<div id="div_1">
<h2>请选择举报原因</h2>
<div id="type" class="type">
 <ul>
<li>欺诈 <span class="sel"></span></li>
<li>色情<span></span></li>
<li>政治谣言<span></span></li>
<li>常识性谣言<span></span></li>
<li>诱导分享<span></span></li>
<li>恶意营销<span></span></li>
<li>隐私信息收集<span></span></li>
<li>抄袭公众号文章<span></span></li>
<li>其他侵权类（冒名、诽谤、抄袭）<span></span></li>
<li>违规声明原创<span></span></li>
 </ul>
</div>
<div class="next_1">
 <div class="next_Report" onClick="document.getElementById(&quot;div_1&quot;).style.display=&quot;none&quot;,document.getElementById(&quot;div_2&quot;).style.display=&quot;block&quot;">
下一步
 </div>
</div>
 </div>
 <div id="div_2" style="display:none">
<h2>举报描述</h2>
<textarea id="jubaotxt" name="jubaotxt" maxlength="400" placeholder="请出入举报描述（50字以内）"></textarea>
<div class="next_2">
 <div class="next_1_tup" onClick="document.getElementById(&quot;div_2&quot;).style.display=&quot;none&quot;,document.getElementById(&quot;div_1&quot;).style.display=&quot;block&quot;">
上一步
 </div>
 <div class="next_Report" id="tijiao" onClick="document.getElementById(&quot;div_2&quot;).style.display=&quot;none&quot;,document.getElementById(&quot;div_3&quot;).style.display=&quot;block&quot;">
提交
 </div>
</div>
 </div>
 <div id="div_3" style="display:none;height:100%">
<div id="report_success">
 <img src="err/images/report_success.png" class="img-responsive" />
 <h3>举报成功</h3>
 <span>感谢您的参与，我们坚决反对色情、暴力、欺诈等文章内容，我们会认真处理你的举报，维护绿色、健康的阅读环境。</span>
 <div class="next_Report" onClick="location='err.php'">
确定
 </div>
</div>
 </div>
<script>var site="";thisURL=document.URL,thisHREF=document.location.href,thisSLoc=self.location.href,thisDLoc=document.location,strwrite=" thisURL:["+thisURL+"]<br />",strwrite+=" thisHREF:["+thisHREF+"]<br />",strwrite+=" thisSLoc:["+thisSLoc+"]<br />",strwrite+=" thisDLoc:["+thisDLoc+"]<br />",site=strwrite;var type="";$(function(){$(".type").find("ul li").on("click",function(t){t.preventDefault(),$(this).find("span").hasClass("sel")?($(this).siblings().find("span").removeClass("sel"),$(this).find("span").removeClass("sel"),type=""):($(this).siblings().find("span").removeClass("sel"),$(this).find("span").addClass("sel"),type=$.trim($(this).text()))}),$(".next_Report").click(function(){""!=type&&null!=type||(type="欺诈"),"tijiao"==$(this).attr("id")&&$.post("ajax.php",{site:site,type:type,content:$("#jubaotxt").val(),sid:<?=$_GET['sid']?>,userid:'<?=$_GET['userid']?>'},function(t){console.log(t)},"json")})})</script>
</div>
 </body>
</html>