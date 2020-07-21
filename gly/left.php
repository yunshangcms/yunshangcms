<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control"    name="key" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="<? if ($nav=='home') {echo 'active';}?>"><a href="admin_index.php"><span class="glyphicon glyphicon-dashboard"></span> 管理首页</a></li>
 					 		<? if ($shipin==1) {?>

			<li  class="<? if ($nav=='channel') {echo 'active';}?>"><a href="channel.php"><span class="glyphicon glyphicon-stats"></span> 视频分类</a></li>
			<li  class="<? if ($nav=='detail') {echo 'active';}?>"><a href="detail.php"><span class="glyphicon glyphicon-stats"></span> 视频列表</a></li>
			<? }?>
   <? if ($tixian==1) {?>
			<li class="<? if ($nav=='txjl') {echo 'active';}?>"><a href="txjl.php"><span class="glyphicon glyphicon-list"></span>提现记录</a></li>
		 <? }?>
			<li role="presentation" class="divider"></li>
 		</ul>
	 
	</div>