<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
<? $nav=='home';?> 
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <title>首页-<?=$site_name?></title>
          <link href="agency/css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="agency/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="agency/js/public.js"></script>
        <script type="text/javascript" src="agency/js/winset.js"></script>
        <script type="text/javascript">
</script>
    </head>
    <body>



        <section id="container">
            <div id="ts_loadering"></div>
            <textarea id="copyhidtext"></textarea>
            <!--------------弹窗开始-------------->
            <div id="win_con_box">
                <div class="mainbox">
                    <div class="conbox">
                    <div class="h_title">好看的视频　最新大片</div>
                    <div class="h_ewmcon">
                    <img src="http://qrcode.leipi.org/js.html?qw=130&qh=130&qc=http://t.cn/EhRnZ7J&ql=&lw=32&lh=32&bor=0&op=img" width="130" height="130" border="0">
                    </div>
                    <div class="h_ewmtitle">请用微信扫一扫</div>
                    <div class="h_line"></div>
                    <div class="h_videourl" id="urltext">http://t.cn/EhRnZ7J</div>
                    <input type="button" class="h_btn" value="复制推广地址" onclick="copyText('urltext','copyhidtext');">
                    </div>
                    <div class="xclose"><i onclick="javascript:Close_win_con();"></i></div>
                </div>
            </div>
            <!--------------弹窗结束-------------->
            <!-------------------mid0------------>
            <div class="h_usertitle_box"><?=$member_name?>，欢迎您，（代理比例<?=$member_ticheng?>%）</div>
                <div class="topzhyg_box">
    <dl><dt>今日打赏数</dt>
        <dd><?=get_tdordernum($member_id)?></dd>
    </dl><em></em>
    <dl><dt>今日收入</dt>
        <dd>￥<?=get_xiaoshu(get_tdorderprice($member_id))?></dd>
    </dl><em></em>
    <span><a href="apply.php">提现申请</a></span>
</div>

            <div class="topzhyg_box">
                <dl><dt>昨日打赏数</dt>
                    <dd><?=get_ztordernum($member_id)?></dd>
                </dl><em></em>
                <dl><dt>昨日收入</dt>
                    <dd>￥<?=get_xiaoshu(get_ztorderprice($member_id))?></dd>
                </dl>
                <em></em>
                <dl><dt>账户余额</dt>
        <dd>￥<?=get_xiaoshu($member_rmb)?></dd>
                </dl>
            </div>

            <div class="h_home_box">
                <div class="h_news_con" style="margin-top: 10px;">
                    <span>公告：</span>
              <?=$site_wapnotice?>   
                </div>


<?

 if ($site_fangfengurl!='')
{$site_ffurl='&'.$site_fangfengurl;}
else
{$site_ffurl='';}
  
    $url='http://'.$site_domain.'/url/user.php?uid='.$member_id.$tzinfo.$site_ffurl.'';
 
   ?>

           
                <div class="h_ewwmurl_con">
                    <i class="btn2"><a href="javascript:Open_win_con('<?=get_dwz($site_dwz,$url)?>');">我的二维码</a></i>
                </div>
            </div>


            <div class="h_member_box">
                <div class="btnbox">
                    <i class="btn1"><a href="password.php">密码修改</a></i>
                    <i class="btn2"><a href="logout.php">退出登录</a></i>
                </div>
            </div>





            <div class="f_padheght"></div>
            <!-------------------mid1------------>
            <!---------------bottom0------------>
          <? include('footer.php'); ?>

            <!---------------bottom1------------>
        </section>
    </body>

</html>