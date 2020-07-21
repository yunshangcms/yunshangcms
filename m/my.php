<? include('../system/inc.php'); ?>
<? include('check.php'); ?>
 <? $nav='my';?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <title>个人中心-<?=$site_name?></title>
         <link href="agency/css/style.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="agency/js/jquery-1.11.2.min.js"></script>
        <script type="text/javascript" src="agency/js/public.js"></script>
        <script type="text/javascript" src="agency/js/winset.js"></script>
    </head>
    
    <body>
        <section id="container">
            <textarea id="copyhidtext"></textarea>
            <!--------------弹窗开始-------------->
            <div id="win_con_box">
                <div class="mainbox"></div>
            </div>
            <!--------------弹窗结束-------------->
            <!-------------------mid0------------>
            <div class="h_usertitle_box"><?=$member_name?>，欢迎您</div>
            <div class="h_member_box">
                <div class="h_xjdl_con">
                    <dl><dt>我的邀请码</dt>
                        <dd><?=base64_encode($member_id)?></dd>
                    </dl><em></em>

                    <dl><dt>我的提成</dt>
                        <dd><?=$member_ticheng?>%</dd>
                    </dl>
                </div>
                <div class="conbox">
                      <p  style="display:none"><span><a href="hezi.php">盒子管理</a></span>
                        <p  style="display:none"><span><a href="hezitg.php">盒子推广</a></span>
                       
                       <p><span><a href="dashangcount.php">打赏统计</a></span>
                      <p><span><a href="carry_money.php">提现记录</a></span>
                     <p><span><a href="rmbjl.php">余额记录</a></span>
                     <p><span><a href="team.php">我的下级</a></span>
                 <p><span><a href="upload.php">上传视频</a></span>
                    <p><span><a href="fankui.php">在线反馈</a></span>
                       <p><span><a href="fankuijl.php">反馈记录</a></span>

                    </p>
              
                   
                </div>
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