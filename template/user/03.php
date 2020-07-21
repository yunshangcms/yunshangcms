  <?php
 if ($_REQUEST['json']==1)
{
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
		//$page_home = '<li><a href="'.$page_link.$page_parameter.'=1" title="首页">1...</a></li>';
	}
	if ($page_current == 1) {
	//	$page_back = '<li class="disabled"><a  title="上一页">上一页</a></li>';
	} else {
		//$page_back = '<li><a href="'.$page_link.$page_parameter.'='.($page_current - 1).'" title="上一页">上一页</a></li>';
	}
	for ($i = $page_start; $i <= $page_end; $i++) {
		if ($i == $page_current) {
			//$page_list = $page_list.'<li class="active"><span>'.$i.'</span></li>';
		} else {
		//	$page_list = $page_list.'<li><a href="'.$page_link.$page_parameter.'='.$i.'" title="第'.$i.'页">'.$i.'</a></LI>';
		}
	}
	if ($page_current < $page_sum - $page_len) {
	//	$page_last = '<li><a href="'.$page_link.$page_parameter.'='.$page_sum.'" title="尾页">...'.$page_sum.'</a></li>';
	}
	if ($page_current == $page_sum) {
	 	$page_next = '0';
	} else {
 $page_next = ($page_current + 1);
	}
	$tmp = $tmp.$page_back.$page_home.$page_list.$page_last.$page_next.'';
	return $tmp;
}



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
						 $list=$list.'{"id":"'.$row['ID'].'","uniacid":"2","uid":"'.$row['uid'].'","openid":"","title":"'.$row['name'].'","url":"'.$urls.'","cover":'.json_encode($image).',"thumb":'.json_encode($image).',"duration":"0","price":"'.$row['price'].'","pay_count":"'.$dashangsls.'","is_public":"1","icon":'.json_encode($image).'},';
						 
						 
						 
						 }
die ('{"data":['.substr($list, 0, -1).'],"next_page":'.xiaoyewl_pape($pager[2],$pager[3],$pager[4],2).'}');


 

}

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>精彩视频</title>
    <link rel="stylesheet" href="/template/user/03/statics/libs/weui.min.css"/>
    <link rel="stylesheet" href="/template/user/03/statics/css/app.css"/>
    <script>
    // document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
    //      WeixinJSBridge.call("hideOptionMenu")
    //     WeixinJSBridge.call("hideToolbar")
    // });
    </script>
</head>
<body><style>
.weui-media-box__title{
  /* max-height: 54px; */
  white-space:normal;
}
.weui-media-box{
  padding-right: 5px;
}
</style>
<h2 class="page-title">精彩视频</h2>
<div class="weui-panel weui-panel_access">


    <div class="weui-panel__bd" id="list">
	
	 </div>
                      
	  
    <div class="weui-panel__ft">
	
 <a href="javascript:void(0)" id="get-more" class="weui-cell weui-cell_access weui-cell_link">
            <div class="weui-cell__bd">查看更多</div>
            <span class="weui-cell__ft"></span>
        </a>

       
    </div>
</div>
 </body>
</html>

 <script src="/template/user/03/statics/libs/zepto.min.js"></script>
<script src="/template/user/03/statics/libs/laytpl_multiline.js"></script>
<script>
var show_text_limit=0;
var fake=1
$(function(){
  getimg(1)
  $("#get-more").click(function(){
    var page = $(this).attr('data-page')
    if (page > 0) {
      getimg(page)
    }
  })
})
function getimg(page){
  if (!page) page = 1
  $.ajax({
    url : "/user.php?cid=<?=$_GET['cid']?>&uid=<?=$_GET['uid']?>&json=1",
    type : 'post',
    dataType : 'json',
    data : {
      page : page,
      op : 'my',
      type : '2'       },
    success : function(response) {
      $("#get-more").attr('data-page', response.next_page)
      if (response.data) {
        var template = multiline(function() {
            /*
            {{#  for(var i = 0, len = d.length; i < len; i++){ }}
            <a href="{{ d[i].url }}" class="weui-media-box weui-media-box_appmsg">
                <div class="weui-media-box__hd">
                    <img class="weui-media-box__thumb" src="{{ d[i].icon }}" alt="">
                </div>
                <div class="weui-media-box__bd">
                    <h4 class="weui-media-box__title">{{ d[i].title }}</h4>
                    <p class="weui-media-box__desc">
                    {{#  if(show_text_limit >= -1){ }}
                    {{# fake&&(d[i].pay_count=(Math.ceil((+new Date()/1000-d[i].create_time)/300)>(100+parseInt(d[i].create_time%100))?(100+parseInt(d[i].create_time%100)):Math.ceil((+new Date()/1000-d[i].create_time)/300))+parseInt(d[i].pay_count)+parseInt(d[i].create_time%10))}}
                      {{#  if((show_text_limit == -1 ||d[i].pay_count > show_text_limit)&& d[i].pay_count>0 ){ }}
                      {{ d[i].pay_count }}人已打赏
                      {{#  } }}
                      {{#  if(show_text_limit == -1 && d[i].pay_count<=0){ }}
                      暂未收到打赏
                      {{#  } }}
                    {{#  } }}
                    </p>
                </div>
            </a>
            {{#  } }}
            */
        })
        laytpl(template).render(response.data, function(result) {
            $('#list').append(result)
      })
      }
      if (response.next_page == 0) {
        $('#get-more>div').text('没有更多了')
      }
    },
    error : function() {
    }
  })
}
// (Math.ceil((+new Date()/1000-d[i].create_time)/300)>(100+parseInt(d[i].create_time%100))?0:Math.ceil((+new Date()/1000-d[i].create_time)/300))+parseInt(d[i].pay_count)+parseInt(d[i].create_time%10)

// (d[i].pay_count=Math.round(Math.log(Math.ceil((+new Date()/1000-d[i].create_time)/60)*Math.pow(Math.max(d[i].pay_count,1),10))/Math.log(2))+parseInt(d[i].pay_count)+parseInt(d[i].create_time%10))
</script>
<script>
// wx.ready(function(){
//   wx.hideAllNonBaseMenuItem();
//   if (typeof(wxready)=="function") {
//     wxready();
//   }
// });
</script>
<?


 ?>