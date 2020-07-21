<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
<? $nav='shipin';
if (@$_GET['act']=='del')
{
 
 $sql = 'update '.flag.'usershipin set isdel=1 where id ='.$_GET['id'].' and uid = '.$member_id.'';
 
	 if (mysql_query($sql))
	 {
		 alert_href('删除成功','?');

	 }
	 else
	 {
		 alert_href('删除失败','?');

}
	 
	
	 
 
	
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
        <title>我的视频-<?=$site_name?></title>
         <link href="agency/css/style.css" rel="stylesheet" type="text/css">
         <link rel="stylesheet" href="../member/layui/css/layui.css">
        <script type="text/javascript" src="agency/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="agency/js/lyz.delayLoading.min.js"></script>
        <script type="text/javascript" src="agency/js/lyz_load.js"></script>
        <script type="text/javascript" src="agency/js/public.js"></script>
        <script type="text/javascript" src="agency/js/winset.js"></script>
		<script src="../member/layui/layui.all.js"></script>
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
             <div class="h_home_box">
<?

 if ($site_fangfengurl!='')
{$site_ffurl='&'.$site_fangfengurl;}
else
{$site_ffurl='';}
  
    $url='http://'.$site_domain.'/url/user.php?uid='.$member_id.$tzinfo.$site_ffurl.'';
 
   ?>
               <div class="h_ewwmurl_con">
                    <i class="btn2"><a href="javascript:;" id="batch-price-btn">一键改价</a></i>
                </div>
               
               <div class="h_ewwmurl_con">
                    <i class="btn2"><a href="javascript:Open_win_con('<?=get_dwz($site_dwz,$url)?>');">我的二维码</a></i>
                </div>
</div>
          <script type="text/template" id="editPriceFormTpl">
    <form class="layui-form edit-form">
        <div class="layui-form-item" style="margin-top:15px;">
            <label class="layui-form-label">价格</label>
            <div class="layui-input-block" style="width:60%;">
                <input type="text" name="price" lay-verify="required" placeholder="请输入价格" autocomplete="off" class="layui-input">
            </div>
        </div>
                <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-sm" lay-submit lay-filter="editPriceForm">确定</button>
            </div>
        </div>
    </form>
</script>
<script>
  var layer = layui.layer;
          $('#batch-price-btn').on('click', function() {
    layer.open({
        type: 1,
        title:'批量修改视频价格',
        move:false,
        resize:false,
        area:'80%',
        shadeClose: true, //点击遮罩关闭
        content: $('#editPriceFormTpl').html(),
        success: function(layero, index){
        }
    })
})
  
  top.layui.form.on("submit(editPriceForm)", function(data) {
    if (data.field.price<=0) {
        error('价格必须大于0')
        return false
    }
    if (data.field.real_price<0) {
        error('价格2不能小于0')
        return false
    }
    $.ajax({
        url: '../member/ajax.php?act=editprice',
        data: data.field,
      	type:'post',
        success: function(response) {
          response =  $.parseJSON(response)
            if (response.code == 0) {
                alert(response.msg)
                location.reload()
            }else if (response.code==1) {
                error(response.msg)
            }
        }
    })
    return false
})
  
          </script>

            <div class="h_pubvideo_box">
              <?
            if ($_GET['cid']!='')
{$where='and cid = '.$_GET['cid'].'';}
else
{$where='';}

								if ($_GET['key']!='') 
							 {	$sql = 'select * from '.flag.'usershipin  where name like "%'.$_GET['key'].'%"  and  uid  ='.$member_id.' and isdel = 0  '.$where.'  order by ID desc , id desc';}
							 else

								{$sql = 'select * from '.flag.'usershipin  where  uid  ='.$member_id.' and isdel = 0    '.$where.' order by ID desc , id desc';
}
  								$pager = page_handle('page',10,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
								
								$url=shipin_url($row['ID']).$tzinfo.$site_ffurl;
                                $shikanurl=shikan_url($row['ID']).$tzinfo.$site_ffurl;

								/*
                                    $shikanurl=get_dwz('urlcn',$shikanurl);  
									
                                    $urlcn=get_dwz('urlcn',$url);   


                                 $tcnurl=get_dwz('tcn',$url);    
                                 
                                 */
                              		$shikanurl = urlencode($shikanurl);
                              $urlcn = urlencode($url);
                              $tcnurl=get_dwz('tcn',$url);  
								?>
            
                                <dl>
                    <dt><em></em><img src="<?=$row['image']?>" ></dt>
                    <dd>
                        <span><?=$row['name']?></span>
                        <i>
                          
                            <a href="javascript:get_dwz('urlcn','<?=$shikanurl?>','试看链接');" class="btn">试看链接</a>
                            <a href="javascript:get_dwz('urlcn','<?=$urlcn?>','URL短链接');" class="btn">URL链接</a>
                            <a href="javascript:Open_win_cons('<?=$tcnurl?>','Tcn短链接');" class="btn">Tcn链接</a>
                        </i>
                       

                        <i>
                   <input class="btn btn-info btn-sm"  onclick= window.location.href='?act=del&id=<?=$row['ID']?>'    type="button" value="删除">
                        </i>

                    </dd>
                </dl>
                      <? }?>
                            </div>
            <div class="dataTables_paginate paging_simple_numbers"><div class="page_box">
            
             <?php echo xiaoyewl_pape($pager[2],$pager[3],$pager[4],2);?> 
             
             </div></div>            <div class="f_padheght"></div>
            <!-------------------mid1------------>
            <!---------------bottom0------------>
                <? include('footer.php'); ?>


 

 


            <script>
                $(function () {
                    $(".zhezhao").bind("click",function(e){
                        var target  = $(e.target);
                        if(target.closest(".videoinfo").length == 0){
                            $(".zhezhao").hide();
                        }
                    });


                    $('.videoyulan').click(function () {
                        $(".zhezhao").css("display", "block");
                        var yingpianid = $(this).attr('yingpianid');
                        var biaoti = $(this).attr('biaoti');
                        var domain = "http://qluxl.rowb1x.uwrtvx.cn";
                        $dizhi = domain+"agency/login/video?videoid="+yingpianid;

                        var dizhi = "https://www.kuaizhan.com/common/encode-png?large=true&data="+$dizhi;

                        $(".biaoti").html(biaoti);
                        $("#videoimg").attr("src",dizhi);
                    })
                })
            </script>
            <!---------------bottom1------------>
        </section>
    </body>

             
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
<script>
   function get_dwz($type,$url,m)
{
 	var lll ;
   if ($type=='0') {  lll =  $url;Open_win_cons(lll,m)  }
 	


  if ($type=='tcn') {
		var api_url = 'http://api.t.sina.com.cn/short_url/shorten.json?source=3271760578&url_long='+$url
		$.get(api_url,function(res){
            res =   $.parseJSON(res)
			 lll =   res[0].url_short;
              Open_win_cons(lll,m)                                                                                     
		})
 }

 if ($type=='urlcn') {

 	$.get("http://tools.aeink.com/tools/dwz/urldwz.php?api=urlcn&longurl="+$url,function(res){
               res =   $.parseJSON(res)
 		 lll =   res.ae_url
         Open_win_cons(lll,m)
 	})
  }
}

</script>                                                          
</html>
                                                          