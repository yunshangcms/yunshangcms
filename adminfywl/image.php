<?
include('../system/inc.php');
include('./admin_config.php');
include('./check.php');
$nav='image';

if($_GET['act'] =='del'){
	$sql = 'delete from '.flag.'image where id = '.$_GET['id'].'';
	if(mysql_query($sql)){
		alert_href('删除成功!','image.php');
	}else{
		alert_back('删除失败！');
	}
}


if($_POST['btnSave']){
 if(empty($_POST['id'])){
    echo"<script>alert('必须选择一个ID,才可以删除!');history.back(-1);</script>";
    exit;
  }else{
/*如果要获取全部数值则使用下面代码*/
   $id= implode(",",$_POST['id']);
   $str="DELETE FROM ".flag."image where id in ($id)";
   mysql_query($str);
  echo "<script>alert('删除成功！');window.location.href='image.php';</script>";
}
}

					?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>图片库</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<style type="text/css">
	.pagelist {padding:10px 0; text-align:center;}
.pagelist span,.pagelist a{ border-radius:3px; border:1px solid #dfdfdf;display:inline-block; padding:5px 12px;}
.pagelist a{ margin:0 3px;}
.pagelist span.current{ background:#09F; color:#FFF; border-color:#09F; margin:0 2px;}
.pagelist a:hover{background:#09F; color:#FFF; border-color:#09F; }
.pagelist label{ padding-left:15px; color:#999;}
.pagelist label b{color:red; font-weight:normal; margin:0 3px;}
</STYLE>
 		<script type="text/javascript" language="javascript">
    function selectBox(selectType){
    var checkboxis = document.getElementsByName("id[]");
    if(selectType == "reverse"){
      for (var i=0; i<checkboxis.length; i++){
        //alert(checkboxis[i].checked);
        checkboxis[i].checked = !checkboxis[i].checked;
      }
    }
    else if(selectType == "all")
    {
      for (var i=0; i<checkboxis.length; i++){
        //alert(checkboxis[i].checked);
        checkboxis[i].checked = true;
      }
    }
   }
</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body>
	<? include('header.php');?>
		
	<? include('left.php');?><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="admin_index.php"><span class="glyphicon glyphicon-home">管理首页</span></a></li>
				<li class="active">图片库</li>
			</ol>
		</div><!--/.row-->
<br>
	 
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">图片库</div>
					<div class="panel-body">
					<a href="image_add.php" class="btn btn-primary">新增</a>
					<a href="image_pladd.php" class="btn btn-primary">批量新增</a>
					
					
					  <script type="text/JavaScript">
<!--
function MM_jumpMenu1(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
    </script>
					 
                    
                     
                                      <form id="form2" name="form2" method="post" action="" onSubmit="return checkF(this)">
									  
					<table  class="table table-hover">
					 
				 
						    <thead>
						    <tr align="center">
							<th   width="20"><span onClick="selectBox('reverse')">选</span></th>
								<th width="180" class="sort">图片地址</th>
								<th width="226"><span>操作</span></th>
						    </tr>
						    </thead>
							
							
							<?php
						
 
 
									$sql = 'select * from '.flag.'image  order by id desc , id desc';
 							
								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
						
 						 
 							?>
									<tr>
									<td><input type="checkbox" name="id[]" value="<? echo $row['ID']?>" style="background:none; border:none;" /></td>
									<td align=""><a  href="<?=$row['image']?>" target="_blank"><?=$row['image']?></a></td>
									<td>
								 
                                         <a class="btn" href="image_edit.php?id=<? echo $row['ID']?>" >编辑</a>
                                <a class="btn" href="?act=del&id=<? echo $row['ID']?>" >删除</a>								</tr>
															 
											 
							 <? }?>
							 
							 
							 		<tr align="left">
															  <td colspan="10"  align="left"><input type="button" value="全选"   onClick="selectBox('all')"/>
<input type="button" value="反选"  onClick="selectBox('reverse')"/>
<input type="submit" name="btnSave"  onclick="Javascript:return confirm('您确定要删除所选ID吗');"     value="删除"/>&nbsp;						  						  </td>
						  </tr>
								
												<tr>
															  <td colspan="10"><div class="pagelist"> 
 <?php echo xiaoyewl_pape($pager[2],$pager[3],$pager[4],2);?>  
 </div>			 						  						  </td>
						  </tr>
						  
						  
						</table>
						</form>
					  
					</div>
				</div>
			</div>
		</div><!--/.row-->	
		 <!--/.row-->	
		
		
	</div><!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bootstrap-table.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
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
		$page_back = '';
	} else {
		$page_back = '<a href="'.$page_link.$page_parameter.'='.($page_current - 1).'" title="上一页">上一页</a>';
	}
	for ($i = $page_start; $i <= $page_end; $i++) {
		if ($i == $page_current) {
			$page_list = $page_list.'<span class="current">'.$i.'</span>';
		} else {
			$page_list = $page_list.'<a href="'.$page_link.$page_parameter.'='.$i.'" title="第'.$i.'页">'.$i.'</a>';
		}
	}
	if ($page_current < $page_sum - $page_len) {
		$page_last = '<a href="'.$page_link.$page_parameter.'='.$page_sum.'" title="尾页">...'.$page_sum.'</a>';
	}
	if ($page_current == $page_sum) {
		$page_next = '';
	} else {
		$page_next = '<a href="'.$page_link.$page_parameter.'='.($page_current + 1).'" title="下一页">下一页</a>';
	}
	$tmp = $tmp.$page_back.$page_home.$page_list.$page_last.$page_next.'';
	return $tmp;
}

function xiaoyewl_papes($t0, $t1, $t2, $t3) {
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

	$page_back = '';
	$page_home = '';
	$page_list = '';
	$page_last = '';
	$page_next = '';
	$tmp = '';
	if ($page_current > $page_len + 1) {
		$page_home = '<a href="'.$page_parameter.'1.html" title="首页">1...</a>';
	}
	if ($page_current == 1) {
		$page_back = '';
	} else {
		$page_back = '<a href="'.$page_parameter.($page_current - 1).'.html" title="上一页">上一页</a>';
	}
	for ($i = $page_start; $i <= $page_end; $i++) {
		if ($i == $page_current) {
			$page_list = $page_list.'<li  class="active"><span href="javascript:void(0)" >'.$i.'</span>';
		} else {
			$page_list = $page_list.'<a href="'.$page_parameter.$i.'.html" title="第'.$i.'页">'.$i.'</a>';
		}
	}
	if ($page_current < $page_sum - $page_len) {
		$page_last = '<a href="'.$page_parameter.$page_sum.'.html" title="尾页">...'.$page_sum.'</a>';
	}
	if ($page_current == $page_sum) {
		$page_next = '';
	} else {
		$page_next = '<a href="'.$page_parameter.($page_current + 1).'.html" title="下一页">>></a>';
	}
	$tmp = $tmp.$page_back.$page_home.$page_list.$page_last.$page_next.'';
	return $tmp;
}



?>