<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
<? $nav='gongong';
if (@$_GET['act']=='add')
{
 
 $result1 = mysql_query('select  *  from '.flag.'usershipin where vid = '.$_GET['id'].' and uid = '.$member_id.' and isdel = 0  ');
if (!$row1 = mysql_fetch_array($result1)){
  $result = mysql_query('select  *  from '.flag.'shipin where ID = '.$_GET['id'].' ');
$row = mysql_fetch_array($result);
 	$_data['isdel'] = 0;
	$_data['uid'] = $member_id;
	$_data['cid'] = $row['cid'];
	$_data['vid'] = $row['ID'];
	$_data['name'] = $row['name'];
	$_data['image'] = $row['image'];
	$_data['url'] = $row['url'];
	$_data['price'] = 1;
	$_data['pv'] = 0;
	$_data['date'] =date('Y-m-d H:i:s');
  	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'usershipin ('.$str[0].') values ('.$str[1].')';
	 mysql_query($sql);
	
	
}
alert_href('添加成功','?');

	
}	

if(isset($_GET['more_add']))
{
  
  $sql = 'select  *  from '.flag.'shipin where ID not in (select vid from '.flag.'usershipin where uid = '.$member_id.' and isdel = 0 ) ';
  $result = mysql_query($sql);
 
  while($row = mysql_fetch_array($result)){

    $_data['isdel'] = 0;
	$_data['uid'] = $member_id;
	$_data['cid'] = $row['cid'];
	$_data['vid'] = $row['ID'];
	$_data['name'] = $row['name'];
	$_data['image'] = $row['image'];
	$_data['url'] = $row['url'];
	$_data['price'] = 1;
	$_data['pv'] = 0;
	$_data['date'] =date('Y-m-d H:i:s');
  	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'usershipin ('.$str[0].') values ('.$str[1].')';
	 mysql_query($sql);


  }
  alert_href('添加成功','?');
  
}

?> 

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <title>公共片库-<?=$site_name?></title>
          <link href="agency/css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="agency/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="agency/js/lyz.delayLoading.min.js"></script>
        <script type="text/javascript" src="agency/js/lyz_load.js"></script>
        <script type="text/javascript" src="agency/js/public.js"></script>
        <script type="text/javascript" src="agency/js/winset.js"></script>
          <style>
        .search_item
        {
            display:inline-block;
            min-width:40px;
            height:25px;
            white-space: normal;
            background-color:red;
            color:white !important;
            line-height: 25px;
            text-align: center;
            border-radius:0px;
            font-size:12px;
            margin-bottom:5px;
            margin-right:5px;
            margin-left:5px;
        }
    </style>
    </head>
    <body>
        <section id="container">
            <div id="ts_loadering"></div>
            <textarea id="copyhidtext"></textarea>
            <!--------------弹窗开始-------------->
            <div id="win_con_box">
                <div class="mainbox"></div>
            </div>
            <!--------------弹窗结束-------------->
            <!-------------------mid0------------>
            <div class="h_search_box">
                <div class="conbox">
                    <form action="" name="formsearch" method="get" style="margin:0px; padding:0px;">
                        <input type="text" class="s_text" placeholder="输入关键词搜索" name="key"  value=""  >
                        <input type="submit" class="s_sub" value="">
                    </form>
                  	
                </div>
            </div>
            <div class="h_pubvideo_box">
              <a href="?more_add=1" class="search_item">一键添加</a>
            <?
            if ($_GET['cid']!='')
{$where='where cid = '.$_GET['cid'].'';}
else
{$where='';}

								if ($_GET['key']!='') 
							 {	$sql = 'select * from '.flag.'shipin  where name like "%'.$_GET['key'].'%" '.$where.' order by sort desc , id desc';}
							 else
							 {	$sql = 'select * from '.flag.'shipin  '.$where.' order by sort desc , id desc';}
  								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
								?>
            
                                <dl>
                    <dt><em></em><img src="<?=$row['image']?>" ></dt>
                    <dd>
                        <span><?=$row['name']?></span>
                     

                        <i>
                   <input class="btn btn-info btn-sm videoyulan"  onclick= window.location.href='?act=add&id=<?=$row['ID']?>'    type="button" value="添加到我的视频">
                        </i>

                    </dd>
                </dl>
                <? }?>
                                 
                                 
                                 
                              
                            </div>
            <div class="dataTables_paginate paging_simple_numbers">
            <div class="page_box">
             <?php echo xiaoyewl_pape($pager[2],$pager[3],$pager[4],2);?> 
 
            
            </div></div>            <div class="f_padheght"></div>
            <!-------------------mid1------------>
            <!---------------bottom0------------>
              <? include('footer.php'); ?>

 
             
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
 
 
            <!---------------bottom1------------>
        </section>
    </body>

</html>         