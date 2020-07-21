<?
 if ($_GET['json']==1)
{


  $where = '';
  		if(isset($_REQUEST['cid']) && $_REQUEST['cid'])
        { 	$where .= ' and cid = '.$_REQUEST['cid'];   }

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
						 
						 $urls='http://'.$site_luodiurl.'/shipin.php?id='.$row['ID'].'';
						  if ($site_suiji==1) {$dashangsls=rand(1000,9999);} else {$dashangsls=get_ordersl($row['ID']);}
						 $list=$list.'{"res_id":"'.$row['ID'].'","title":'.json_encode($row['name']).',"thumbnail":'.json_encode($image).',"video_server_group_id":"1","uid":"'.$row['uid'].'"},';
						 
						 
						 
						 }
						 
						 
$json='{"ret":1,"package":['.substr($list, 0, -1).'],"err":"\u83b7\u53d6\u6570\u636e\u6210\u529f"}';

die ($json);

}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Welcome</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
		<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
		<meta http-equiv="Pragma" content="no-cache" />
		<meta http-equiv="Expires" content="0" />
		<link rel="stylesheet" href="/template/user/04/static/css/layout.css?v=20190413000005" />
		<link rel="stylesheet" href="/template/user/04/static/css/master.css?v=20190413000005" />
		<script type="text/javascript" src="/template/user/04/static/js/flexible.js?v=20190413000005" ></script>
		<script type="text/javascript" src="/template/user/04/static/js/axios.min.js" ></script>
	</head>

	<body>
			
		<div class="page unselect">
			<div class="page-head page-head--gray">
				<div class="page-head__left">
				</div>
				<div class="page-head__center page-head__center--green">
					精彩视频
				</div>
				<div class="page-head__right">
				</div>
			</div>
			<div class="page-body">
				
				<!-- 如果需要显示 则控制 state="show" state="hide" 可以设置true/false -->
				<!--
				<video class="video-player" state="hide" poster="http://www.ofp878.cn/video/11.jpg" id="player" 
					playsinline="true" 
					controls="" 
					title="test"
					x5-video-player-type="h5" 
					x5-video-player-fullscreen="true" 
					x5-video-orientation="landscape|portrait"
					preload="auto" 
					>
				    <source src="blob:https://www.tom305.com/6d39b9bd-05e6-4c60-bc7b-0243d8476f5e" type="video/mp4">
				</video>
				
				<video class="video-player" state="show"
				    controls="controls" autoplay="autoplay"
				    x-webkit-airplay="true" x5-video-player-fullscreen="true"
				    preload="auto" playsinline="true" webkit-playsinline
				    x5-video-player-typ="h5">
				    <source type="application/x-mpegURL" src="http://192.168.1.170:8020/micro_driver/jy/offline.m3u8">
				</video>
				
				<video class="video-player" state="show"
				    controls="controls" autoplay="autoplay"
				    x-webkit-airplay="true" x5-video-player-fullscreen="true"
				    preload="auto" playsinline="true" webkit-playsinline
				    x5-video-player-typ="h5">
				    <source type="application/x-mpegURL" src="http://192.168.1.170:8020/micro_driver/jy-1/.m3u8">
				</video>
				
				<video class="video-player" state="show"
				    controls="controls" autoplay="autoplay"
				    x-webkit-airplay="true" x5-video-player-fullscreen="true"
				    preload="auto" playsinline="true" webkit-playsinline
				    x5-video-player-typ="h5">
				    <source type="application/x-mpegURL" src="http://cdn.801zy.com:8091/2018/05/16/AB33F2/index.m3u8">
				</video>
                -->
				
				<!-- 如果需要显示 则控制 state="show" state="hide" 可以设置true/false -->
				<!--
				<div class="video-describe" state="show">
					【人兽】土豪女主人让保姆伺候自己的爱犬跪在地上让狗插土豪女主人让保姆伺候自己的爱犬跪在地上让狗插
				</div>
				-->
				<div class="video-list" id="video_list">
				</div>
				<div class="video-more" id="more">
					<span class="video-more__button">查看更多</span>
				</div>
				
			</div>
			
		</div>
		
		<script type="text/javascript" src="/template/user/04/static/js/list.js?v=20190413000005" ></script>

	</body>

</html>