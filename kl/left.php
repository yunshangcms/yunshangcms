<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control"    name="key" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
 
			<li class="<? if ($nav=='kouliang') {echo 'active';}?>"><a href="kouliang.php"><span class="glyphicon glyphicon-th"></span> 扣量管理</a></li>
				 
			<li class="<? if ($nav=='order') {echo 'active';}?>"><a href="kouliangorder.php"><span class="glyphicon glyphicon-list"></span>扣量订单</a></li>
 
		 
			<li role="presentation" class="divider"></li>
 		</ul>
	 
	</div>