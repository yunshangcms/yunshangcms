<? include('system/inc.php'); 
 
   include('checkpc.php');
 if ($_REQUEST['page']=='')
 {$page='1';}
 else
 {$page=$_REQUEST['page'];}
 $result = mysql_query('select * from '.flag.'hezidtl where id = '.$_GET['id'].'');
$row = mysql_fetch_array($result);
{
  $hid = $row['hid'];
  $url = $row['url'];
   }  
   
   
  
 ?>

<html lang="zh-cn">
<head>
  <script>
        function onBridgeReady() {
            WeixinJSBridge.call('hideOptionMenu');
        }
 
        if (typeof WeixinJSBridge == "undefined") {
            if (document.addEventListener) {
                document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
            } else if (document.attachEvent) {
                document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
                document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
            }
        } else {
            onBridgeReady();
        }
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="renderer" content="webkit">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/public/static/template/css/box_list.css">
    <link rel="stylesheet" href="/public/static/template/css/boostrap.css">
    <!-- 微信提示 -->
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .weixin-tip {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.90);
            filter: alpha(opacity=80);
            height: 100%;
            width: 100%;
            z-index: 10002;
        }

        .weixin-tip p {
            text-align: center;
            margin-top: 10%;
            padding: 0 5%;
        }
    </style>
</head>
<body class="index" style="overflow:hidden;overflow-y:auto;">


<title>
<?=get_hezi('name',$hid)?>
</title>
<meta name="keywords" content="GAVI.">
<meta name="description" content="GAVI.">
<section class="aui-flexView">
    <section class="aui-scrollView">
        <div class="aui-cell-box">
            <div class="aui-cell-item">
                <div class="aui-cell-item-stp">
                    <div class="aui-cell-item-image">
                        <img src="/public/style_m/images/icon-cio.png" alt="">
                        <span class="aui-well-comm-vip"><img src="/public/style_m/images/icon-cion.png" alt="">
                                                    </span>
                    </div>
                    <div class="aui-cell-item-text">
                        <h4>
                            <?=get_hezi('name',$hid)?>
                        </h4>
                    </div>
                </div>
                
                 
  
<script type="text/javascript" src="ckplayer/ckplayer.js"></script>
	 <div class="rich_media_content"  id="video" style="width: 100%; height: 250px;border: solid 1px #323136;padding-left:1px;"></div>

 

    
 <script type="text/javascript">
var videoObject = {
container: '#video',
variable: 'player', 
//html5m3u8:true,
loop: true,
autoplay: true, 
poster: '', 
video:'<?=$url?>'
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




                <section class="aui-list-product"  style="display:none">
                    <video poster="http://45.113.200.81:3899/20190413/1kfheyAp/1.jpg" src="http://45.113.200.81:3899/20190413/1kfheyAp/index.m3u8" width="100%" loop
                           controls="controls" x5-playsinline="" playsinline="" webkit-playsinline="true"
                           style="background-color: rgb(0, 0, 0);"></video>
                </section>
                
                
                <div class="aui-cell-item-stp">
                    <div class="aui-cell-item-image">
                        <img src="/public/style_m/images/icon-cio.png" alt="">
                        <span class="aui-well-comm-vip"><img src="/public/style_m/images/icon-cion.png" alt="">
                                                    </span>
                    </div>
                    <div class="aui-cell-item-text">
                        <h4>
                            随机推荐
                        </h4>
                    </div>
                </div>
                <section class="aui-list-product">
                    <div class="aui-list-product-box aui-modular">
                                         	 
	<?php
						
 
 
 $sql = 'select * from '.flag.'hezishipin where hid = '.$hid.'   order by rand() desc ';
 								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
						
 						 
 							?>
 	
                                                    <a href="/shipin.php?id=<?=$row['vid']?>">
                                                        <div class="aui-list-product-box-yuan ">
                                <div class="aui-cell-item-ad">
                                    <img src="<?=get_usershipin('image',$row['vid'])?>" alt="" style="width:100%; height: 100px;">
                                </div>

                                <div class="aui-cell-item-title">
                                    <h4 style="font-size: 14px;"><?=cut_str(get_usershipin('name',$row['vid']),27,'...')?></h4>
                                </div>
                                <div class="aui-icon-text clearfix"><span><i class="icon icon-zan"></i><em><?=rand(5,1000)?></em></span>
                                    <span style="float:right; padding-right:0"><i class="icon icon-vipno"></i>
                                        <!--开放 -->  </span>
                                </div>
                            </div>
                        </a>
                                               
                                               
                                               <? }?>
                                            </div>
                </section>
            </div>
        </div>
    </section>
    <ul class="pager">
     <?php echo xiaoyewl_pape($pager[2],$pager[3],$pager[4],2);?>
     
     <?PHP

//返回翻页条
//参数说明：1.总页数。2.当前页。3.分页参数。4.分页半径。
function xiaoyewl_pape($t0, $t1, $t2, $t3) {
	$page_sum = $t0;
	$page_current = $t1;
	$page_parameter = $t2;
	$page_len = $t3;
	$page_start = '';
	$page_end = '';
	$page_start = $page_current - $page_len;
	if ($page_start <= 0) {
		$page_start = 1;
		$page_end = $page_start + $page_end;
	}
	$page_end = $page_current + $page_len;
	if ($page_end > $page_sum) {
		$page_end = $page_sum;
	}
	$page_link = $_SERVER['REQUEST_URI'];
	$tmp_arr = parse_url($page_link);
	if (isset($tmp_arr['query'])){
		$url = $tmp_arr['path'];
		$query = $tmp_arr['query'];
		parse_str($query, $arr);
		unset($arr[$page_parameter]);
		if (count($arr) != 0){
			$page_link = $url.'?'.http_build_query($arr).'&';
		}else{
			$page_link = $url.'?';
		}
	}else{
		$page_link = $page_link.'?';
	}
	$page_back = '';
	$page_home = '';
	$page_list = '';
	$page_last = '';
	$page_next = '';
	$tmp = '';
	if ($page_current > $page_len + 1) {
	//	$page_home = '<a href="'.$page_link.$page_parameter.'=1" title="首页">1...</a>';
	}
	if ($page_current == 1) {
		$page_back = '<li class="disabled"><span    title="上一页">上一页</span></li>';
	} else {
		$page_back = '<li><a href="'.$page_link.$page_parameter.'='.($page_current - 1).'"  class="laypage_prev" title="上一页">上一页</a></li>';
	}
	for ($i = $page_start; $i <= $page_end; $i++) {
		if ($i == $page_current) {
//			$page_list = $page_list.'<span class="current">'.$i.'</span>';
		} else {
	//		$page_list = $page_list.'<a href="'.$page_link.$page_parameter.'='.$i.'" title="第'.$i.'页">'.$i.'</a>';
		}
	}
	if ($page_current < $page_sum - $page_len) {
		// $page_last = '<a href="'.$page_link.$page_parameter.'='.$page_sum.'" title="尾页">...'.$page_sum.'</a>';
	}
	if ($page_current == $page_sum) {
		$page_next = '<li class="disabled"><span    title="下一页">下一页</span></li>';
	} else {
		$page_next = '<li><a href="'.$page_link.$page_parameter.'='.($page_current + 1).'"  class="laypage_next" title="下一页">下一页</a></li>';
	}
	$tmp = $tmp.$page_back.$page_home.$page_list.$page_last.$page_next.'';
	return $tmp;
}

 
?>
 </ul></section>

</body>
</html>