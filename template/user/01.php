  <?php


 						$result = mysql_query(' select count(*) as sl from '.flag.'usershipin where uid = '.$_REQUEST['uid'].' and isdel=0  ');
						while($row = mysql_fetch_array($result)){
							if ($row['sl']!='')
 {$totalpage=$row['sl']/20;}
 else
 {$totalpage=1;}
							}
						?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no" />
    <title>-</title>
     <link href="/template/02/agency/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/template/02/agency/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/template/02/agency/js/lyz.delayLoading.min.js"></script>
    <script type="text/javascript" src="/template/02/agency/js/public.js"></script>
    <script type="text/javascript" src="/template/02/agency/js/winset.js"></script>
    <script type="text/javascript" src="/template/02/agency/js/iswx.js"></script>
    <div class="f_tousu_box" style="z-index: 999; position: fixed;right: 10px;width: 50px;height: 50px;border-radius: 30px;line-height: 50px;color: #fff;background: #2f2f2f;top:50%">
        <a href="/tousu.php?userid=10&sid=1639" style="color: #fff;">投诉</a>
    </div>
    <style>
        .search_item
        {
            display:inline-block;
            min-width:60px;
            height:25px;
            white-space: normal;
            background-color:red;
            color:white !important;
            line-height: 25px;
            text-align: center;
            border-radius:12.5px;
            font-size:12px;
            margin-bottom:5px;
            margin-right:5px;
            margin-left:5px;
          	padding:0 3px;
        }
    </style>
    <script>

        function isWeiXin() {
            var ua = window.navigator.userAgent.toLowerCase();
            console.log(ua);
            if (ua.match(/MicroMessenger/i) == 'micromessenger') {
                return true;
            } else {
                return false;
            }
        }

        if( isWeiXin()){
        } else{
         //   window.location.href="http://www.qq.com";
        }

        $tiozhuan = check();
        if($tiozhuan == true){
        //    window.location.href="http://www.qq.com";
        }
        function check() {
            var userAgentInfo=navigator.userAgent;
            var Agents =new Array("Android","iPhone","SymbianOS","Windows Phone","iPad","iPod");
            var flag=true;
            for(var v=0;v<Agents.length;v++) {
                if(userAgentInfo.indexOf(Agents[v])>0) {
                    flag=false;
                    break;
                }
            }
            return flag;
        }
    </script>
    <script type="text/javascript">


        //$(function(){
        //check_cityiptest();
        //});

        $(function(){
            check_win_playlist();
        });

        $(window).resize(function(){
            check_win_playlist();
        });
    </script>
</head>
<body>

<link href="/template/02/acms/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="/template/02/static/js/layer/skin/layer.css" rel="stylesheet" type="text/css" />


<section id="container">
   <div class="h_playlist_box" id="">
	 	<form action="" method="get">
          <dl>
          <div style="min-height: 50px;width:100%;text-align: center;">
						  <a href="?cid=0&uid=<? echo $_REQUEST['uid'] ?>" class="search_item"   >首页 </a>
                      		 	<?php
						$result = mysql_query('select * from '.flag.'channel    order by sort desc ,id desc');
						while($row = mysql_fetch_array($result)){
						?>
			                <a href="?cid=<? echo $row['ID'];?>&uid=<? echo $_REQUEST['uid'] ?>" class="search_item" data-cid = "<? echo $row['ID'];?>"  ><? echo $row['name'];?> </a>

		                  <? } ?>

           <input type="hidden" value="<?php echo $_REQUEST['uid'] ?>" name='uid'>
	 	</div>
            </dl>
	 	</form>
	 </div>
    <!--mid0------------>
    <div class="h_playlist_box" id="playlistbox">
        <?
  $where = '';
  		if(isset($_GET['cid']) && $_GET['cid'])
        {
        	$where .= ' and cid = '.$_GET['cid'];
        }

 
		if ($site_sort==0)
		{$sort='rand()';}
			if ($site_sort==1)
		{$sort='ID asc';}
				if ($site_sort==2)
		{$sort='ID desc';}	
		

		 $sql = 'select * from '.flag.'usershipin where uid = '.$_REQUEST['uid'].'    and isdel=0 '.$where.' order by '.$sort.' ';
		 
 								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
														 $url='http://'.$site_domains.'/';

						 if ($row['fengmian']!='')
						 {$image=$row['fengmian'];}
						 else
						 {$image=$row['image'];}

						 ?>
                            <? if ($site_suiji==1) {$dashangsls=rand(1000,9999);} else {$dashangsls=get_ordersl($row['ID']);} ?>
            <dl>
                <dt>
                    <a href="1.php?id=<?=$row['ID']?>">
                        <img src="<?=$image?>" /></a>
                </dt>
                <dd>
                    <span><a  href="http://<?=$site_luodiurl?>/shipin.php?id=<?=$row['ID']?>&pay=1&ly=1" ><?=$row['name']?></a><img originalsrc="<?=$image?>" /></span>
                    <p style="margin-top:0px;"><i style="color: #CA4040">已有<?=$dashangsls?>人付费观看，好评度：99.0%</i></p>
                    <p style="margin-top:0px;"><i><a  href="http://<?=$site_luodiurl?>/shipin.php?id=<?=$row['ID']?>&pay=1&ly=1"   style="width: 6rem;line-height: 2rem;height: 2rem;">点击播放</a></i></p>

                </dd>
            </dl>
			<? }?>




            </div>
    <div class="f_padheght" style="margin-top:15px;"></div>
    <!--mid1------------>
</section>

<div style="width: 100%;margin: 0 auto;margin-bottom: 20px;text-align: center;">
    <div style="width: 95%;margin: 0 auto;text-align: center">
        <div class="dataTables_paginate paging_simple_numbers">
		<ul class="pagination">

		 <?php echo xiaoyewl_pape($pager[2],$pager[3],$pager[4],2);?>


		 </ul></div>    </div>
</div>

<?

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
		$page_home = '<li><a href="'.$page_link.$page_parameter.'=1" title="首页">1...</a></li>';
	}
	if ($page_current == 1) {
		$page_back = '<li class="disabled"><a  title="上一页">上一页</a></li>';
	} else {
		$page_back = '<li><a href="'.$page_link.$page_parameter.'='.($page_current - 1).'" title="上一页">上一页</a></li>';
	}
	for ($i = $page_start; $i <= $page_end; $i++) {
		if ($i == $page_current) {
			$page_list = $page_list.'<li class="active"><span>'.$i.'</span></li>';
		} else {
			$page_list = $page_list.'<li><a href="'.$page_link.$page_parameter.'='.$i.'" title="第'.$i.'页">'.$i.'</a></LI>';
		}
	}
	if ($page_current < $page_sum - $page_len) {
		$page_last = '<li><a href="'.$page_link.$page_parameter.'='.$page_sum.'" title="尾页">...'.$page_sum.'</a></li>';
	}
	if ($page_current == $page_sum) {
		$page_next = '<li  class="disabled"><a   title="下一页">下一页</a></li>';
	} else {
		$page_next = '<li><a href="'.$page_link.$page_parameter.'='.($page_current + 1).'" title="下一页">下一页</a></li>';
	}
	$tmp = $tmp.$page_back.$page_home.$page_list.$page_last.$page_next.'';
	return $tmp;
}


?>
<div style="display:none" >






    <script type="text/javascript" src="https://s23.cnzz.com/z_stat.php?id=1276107596&web_id=1276107596"></script>






</div>


<style>

    .con{
        width: 100%;
        height: 35px;
        background-color: rgba(0,0,0,0.8);
        position: fixed;
        color: #fff;
        text-align: center;
        border-radius: 10px;
        line-height: 35px;
        z-index: 999;
        display: none;
        font-size: 16px;
    }
</style>
<p class="con"></p>

<script>
    var topdata = "20px";
</script>
<script type="text/javascript" src="/template/02/agency/js/gundong.js"></script>


</body>
</html>
