<?php


 						$result = mysql_query(' select count(*) as sl from '.flag.'usershipin where uid = '.$_REQUEST['uid'].' and isdel=0  ');
						while($row = mysql_fetch_array($result)){
							if ($row['sl']!='')
 {$totalpage=$row['sl']/20;}
 else
 {$totalpage=1;}
							}
						?>
 <html>
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0"/>
      <title>Ta的视频</title>
      <link href="/template/user/02/public/css/vendor.css?v=20160530" rel="stylesheet">
      <link href="/template/user/02/public/css/style.css?v=20160530" rel="stylesheet"> 
  <script language="javascript" src="/template/user/02/public/js/jquery-1.11.1.min.js"></script><style></style>
    <script type="text/javascript" charset="utf-8" src="/template/user/02/public/js/ckplayer/ckplayer.js"></script>
        <link href="/template/user/02/public/video_css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="/template/user/02/public/video_css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
        <link href="/template/user/02/public/video_css/bootstrap-admin-theme.css" rel="stylesheet" media="screen">
    <style>
    #order_loading { width:94%;padding:10px;color:#666;text-align: center;margin:0 auto;margin-top: -20px;}
    #recodesLeft{
        padding-bottom: 20px;
    }
  .case-list li {
      padding: 10px 0;
      overflow: hidden;
      border-bottom: 1px solid #eee;
      width: 98%;
      display: inline-block;
      height: 280px;
  }
.case-pic-link {
    display: block;
    width: 100%;
}
.case-list li .case-content {
     padding-left: 0px; 
}
.case-pic-link img {
    display: block;
    width: 100%;
    height: 243px;
}
.h_playlist_box {
    margin: 6px 2% 0 2%;
    width: 96%;
    float: left;
    display: inline;
}
.h_playlist_box dl dt {
    position: relative;
    margin: 0 0 0 3%;
    width: 35%;
    text-align: center;
    background: #f5f5f5;
    float: left;
    display: inline;
    overflow: hidden;
}
.h_playlist_box dl dd p i a {
    margin: 0px;
    padding: 0 8px;
    width: auto;
    height: 24px;
    color: #fff;
    background: #d66b6b;
    border: none;
    border-radius: 3px;
    float: left;
    display: block;
    overflow: hidden;
}
.h_playlist_box dl {
    margin: 6px 0 0 0;
    padding: 6px 0;
    width: 99%;
    background: #fff;
    border: #eee 1px solid;
    float: left;
    display: inline;
}
.h_playlist_box dl dd span {
    margin: 0px;
    width: 100%;
    line-height: 140%;
    font-size: 15px;
    color: #000;
    float: left;
    display: inline;
}
.h_playlist_box dl dt {
    position: relative;
    margin: 0 0 0 3%;
    width: 35%;
    text-align: center;
    background: #f5f5f5;
    float: left;
    display: inline;
    overflow: hidden;
}
.h_playlist_box dl dt img {
    width: 100%;
}
.h_playlist_box dl dd {
    margin: 0 3% 0 0;
    width: 54%;
    float: right;
    display: inline;
}
body {
    background-color: rgba(245, 245, 245, 0.5);
    padding-top: 1px;
}
.xin{
    text-decoration: none;
    background-color: #ff5484;
    color: white;
    padding: 5px 5px;
    margin: 5px;
    margin-bottom: 10px;
    display: inline-block;
}
    </style>

</head>
<body>
  <!-- list common start: 案例列表/商户列表/话题列表页公共部分 开始 -->
<!--头部bar开始-->
<div class="top-bar-holder">
<div id="top-bar">
  <h1 class="cate-title">Ta的视频</h1>
</div>
</div>
<div class="rootBar" style="margin-top: 10px;">
           
		    <a href="?cid=0&uid=<? echo $_REQUEST['uid'] ?>"   class="xin" >首页 </a>
                      		 	<?php
						$result = mysql_query('select * from '.flag.'channel    order by sort desc ,id desc');
						while($row = mysql_fetch_array($result)){
						?>
			                <a class="xin"  href="?cid=<? echo $row['ID'];?>&uid=<? echo $_REQUEST['uid'] ?>"  ><? echo $row['name'];?> </a>

		                  <? } ?>


    </div>
<!--头部bar结束-->
<div id="goods_list">
    <div class="h_playlist_box">
	
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
            <dl style="width: 358px;">
        <dt style="height: 88.3365px;">
          <em></em><img src="<?=$image?>" style="height: 88.3365px; display: inline;" >
        </dt>
        <dd> 
          <span style="min-height: 58.3365px;"> <?=$row['name']?></span> 
          <p><i><a  href="http://<?=$site_luodiurl?>/shipin.php?id=<?=$row['ID']?>" >点击播放</a></i></p>  
        </dd>
      </dl>
      
	  			<? }?>

       
 
        </div>
    <!-- list common end:公共部分 结束 -->
    <div class="bootstrap-table">
        <div class="fixed-table-pagination">
            <div class="pull-center pagination" style="text-align: center;width: 100%;">
			
			
			  <div class="dataTables_paginate paging_simple_numbers">
		<ul class="pagination">

		 <?php echo xiaoyewl_pape($pager[2],$pager[3],$pager[4],2);?>


		 </ul></div>
		 
		 
		 
                        </div>
        </div>
    </div>
</div>
<!-- common end: 公共部分 结束 -->

</div>

</body>
 

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


?></html>