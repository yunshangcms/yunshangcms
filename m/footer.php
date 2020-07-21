  <div class="bottommenu_box">
                <div class="conbox">
    <dl  class="<? if ($nav=='home'){echo 'on';}?>" >
    	<a href="index.php"><dt class="ftb1"></dt><dd>首页</dd></a>
    </dl>

    <dl  class="<? if ($nav=='shipin'){echo 'on';}?>" >
    	<a href="shipin.php"><dt class="ftb2"></dt><dd>我的视频</dd></a>
    </dl>
    
        <dl  class="<? if ($nav=='gongong'){echo 'on';}?>" >
    	<a href="gongong.php"><dt class="ftb2"></dt><dd>公共视频</dd></a>
    </dl>
 
    <dl   class="<? if ($nav=='password' or $nav=='my'){echo 'on';}?>">
    	<a href="my.php"><dt class="ftb4"></dt><dd>个人中心</dd></a>
    </dl>
</div>
            </div>