<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
 <? $nav='my';?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <title>反馈记录-<?=$site_name?></title>
         <link href="agency/css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="/acms/css/bootstrap.css"/>
        <script type="text/javascript" src="agency/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="agency/js/lyz.delayLoading.min.js"></script>
        <script type="text/javascript" src="agency/js/lyz_load.js"></script>
        <script type="text/javascript" src="agency/js/public.js"></script>
        <script type="text/javascript" src="agency/js/winset.js"></script>
    </head>

    <style>
        dt{
            text-align: center;
        }
    </style>
    <body class="webbg">
        <section id="container">
            <!--mid0-->
            <?
              $result = mysql_query('select  count(*) AS SL from '.flag.'user where shangji  ='.$member_id.' ');
$row = mysql_fetch_array($result);
{
 $num=$row['SL'];
 
} 
?>
           

            <!--mid0-->
             <div class="h_invitedagent1">
                    <dl>
                         <dt><span>反馈时间</span></dt>
                        <dt><span>反馈内容</span></dt>
                        <dt><span>回复</span></dt>
                       </dl>
            </div>
            <div class="h_invitedagent_box">
            <?
	$sql = 'select * from '.flag.'fankui  where  uid  ='.$member_id.'  order by ID desc , id desc';  								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
 	
  
 							 
 									
									?>
            <dl>
                         <dt><span><?=$row['date']?></span></dt> 
                        <dt><span><?=$row['remark']?></span></dt> 
                        <dt><span><?=$row['huifu']?></span></dt> 
                      </dl>
<? }?>


                            </div>

 <div class="dataTables_paginate paging_simple_numbers">
            <div class="page_box">
             <?php echo xiaoyewl_pape($pager[2],$pager[3],$pager[4],2);?> 
 
            
            </div></div>   
                        <div class="f_padheght"></div>
            <!--mid1-->
            <!--bottom0-->
 
                <? include('footer.php'); ?>


 
 
            <!---------------bottom1------------>
        </section>
    </body>

 </html>
             
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
		$page_home = '<a href="'.$page_link.$page_parameter.'=1" title="首页">1...</a>';
	}
	if ($page_current == 1) {
		$page_back = '<i title="上一页">上一页</i>';
	} else {
		$page_back = '<a href="'.$page_link.$page_parameter.'='.($page_current - 1).'" title="上一页">上一页</a>';
	}
	for ($i = $page_start; $i <= $page_end; $i++) {
		if ($i == $page_current) {
			$page_list = $page_list.'<i class="current">'.$i.'</i>';
		} else {
			$page_list = $page_list.'<a href="'.$page_link.$page_parameter.'='.$i.'" title="第'.$i.'页">'.$i.'</a>';
		}
	}
	if ($page_current < $page_sum - $page_len) {
		$page_last = '<a href="'.$page_link.$page_parameter.'='.$page_sum.'" title="尾页">...'.$page_sum.'</a>';
	}
	if ($page_current == $page_sum) {
		$page_next = '<i >下一页</i>';
	} else {
		$page_next = '<a href="'.$page_link.$page_parameter.'='.($page_current + 1).'" title="下一页">下一页</a>';
	}
	$tmp = $tmp.$page_back.$page_home.$page_list.$page_last.$page_next.'';
	return $tmp;
}?>
 
 