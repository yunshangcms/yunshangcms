<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control"    name="key" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="<? if ($nav=='home') {echo 'active';}?>"><a href="admin_index.php"><span class="glyphicon glyphicon-dashboard"></span> 管理首页</a></li>
 			
			<li class="<? if ($nav=='sys') {echo 'active';}?>"><a href="sys.php"><span class="glyphicon glyphicon-th"></span> 系统设置</a></li>
  
 
 
			
			
 	<li class="parent ">
				<a  data-toggle="collapse" href="#sub-item-1">
					<span class="glyphicon glyphicon-list"></span> 域名列表 <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse <? if ($nav=='domainku' or $nav=='zhu'  or $nav=='tzdomain'   or $nav=='domain' ){echo 'in';}?>" id="sub-item-1">
				
                  	<li  >
						<a class="" href="domainku.php">
							<span class="glyphicon glyphicon-share-alt"></span> 域名库
						</a>
					</li>
					
					    	<li  >
						<a class="" href="zhudomain.php">
							<span class="glyphicon glyphicon-share-alt"></span> 主接配置
						</a>
					</li>
					
                  <li    style=" display:none">
						<a class="" href="zhu.php">
							<span class="glyphicon glyphicon-share-alt"></span> 主接配置
						</a>
					</li>
					<li>
						<a class="" href="tzdomain.php">
							<span class="glyphicon glyphicon-share-alt"></span> 中转配置
						</a>
					</li>
					<li>
						<a class="" href="domain.php">
							<span class="glyphicon glyphicon-share-alt"></span> 落地配置
						</a>
					</li>
					
					<li>
						<a class="" href="api.php">
							<span class="glyphicon glyphicon-share-alt"></span> 检测接口
						</a>
					</li>
				</ul>
			</li>
			
			
			
			
			
			
			
			
			
			
				<li class="parent ">
				<a  data-toggle="collapse" href="#sub-item-2">
					<span class="glyphicon glyphicon-list"></span> 代理列表 <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse <? if ($nav=='yqm' or $nav=='daili'    ){echo 'in';}?>" id="sub-item-2">
					<li  >
						<a class="" href="yqm.php">
							<span class="glyphicon glyphicon-share-alt"></span> 生成邀请码
						</a>
					</li>
					<li>
						<a class="" href="daili.php">
							<span class="glyphicon glyphicon-share-alt"></span> 代理列表
						</a>
					</li>
				 
				</ul>
			</li>




	
				<li class="parent ">
				<a  data-toggle="collapse" href="#sub-item-3">
					<span class="glyphicon glyphicon-list"></span> 视频列表 <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse <? if ($nav=='channel' or $nav=='detail'    ){echo 'in';}?>" id="sub-item-3">
					<li  >
						<a class="" href="channel.php">
							<span class="glyphicon glyphicon-share-alt"></span> 视频分类
						</a>
					</li>
					<li>
						<a class="" href="detail.php">
							<span class="glyphicon glyphicon-share-alt"></span> 视频列表
						</a>
					</li>
				 
				</ul>
			</li>






		<li class="parent ">
				<a   data-toggle="collapse" href="#sub-item-4">
					<span class="glyphicon glyphicon-list"></span> 订单列表 <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse <? if ($nav=='fankui' or $nav=='txjl'   or $nav=='rmbjl'   or $nav=='order'     ){echo 'in';}?>" id="sub-item-4">
					<li  >
						<a class="" href="fankui.php">
							<span class="glyphicon glyphicon-share-alt"></span> 反馈记录
						</a>
					</li>
					<li>
						<a class="" href="txjl.php">
							<span class="glyphicon glyphicon-share-alt"></span> 提现记录
						</a>
					</li>
					
					<li>
						<a class="" href="rmbjl.php">
							<span class="glyphicon glyphicon-share-alt"></span> 余额记录
						</a>
					</li>
					<li>
						<a class="" href="order.php">
							<span class="glyphicon glyphicon-share-alt"></span> 订单记录
						</a>
					</li>
				 
				</ul>
			</li>
			
			
				<li class="parent ">
				<a  data-toggle="collapse" href="#sub-item-5">
					<span class="glyphicon glyphicon-list"></span> 查看其它 <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse <? if ($nav=='tousu' or $nav=='image'  or $nav=='guanliyuan'  or $nav=='ad'    ){echo 'in';}?>" id="sub-item-5">
				
					<li  >
						<a class="" href="ad.php">
							<span class="glyphicon glyphicon-share-alt"></span> 广告管理
						</a>
					</li>
						<li  >
						<a class="" href="tousu.php">
							<span class="glyphicon glyphicon-share-alt"></span> 投诉记录
						</a>
					</li>
					<li>
						<a class="" href="image.php">
							<span class="glyphicon glyphicon-share-alt"></span> 图片库
						</a>
					</li>
					
					<li>
						<a class="" href="guanliyuan.php">
							<span class="glyphicon glyphicon-share-alt"></span> 管理员
						</a>
					</li>
				 
				 
				</ul>
			</li>

 			 			<li class="<? if ($nav=='update') {echo 'active';}?>"><a href="update.php"><span class="glyphicon glyphicon-th"></span> 系统更新</a></li>

			<li role="presentation" class="divider"></li>
 		</ul>
	 
	</div>