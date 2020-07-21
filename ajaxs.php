<? include('system/inc.php'); 
 
 $sql = 'select * from '.flag.'usershipin where uid = '.$_REQUEST['uid'].'   order by id desc , id desc';
 								$pager = page_handle('page',20,mysql_num_rows(mysql_query($sql)));
								$result = mysql_query($sql.' limit '.$pager[0].','.$pager[1].'');
							while($row= mysql_fetch_array($result)){
														 $url='http://'.$site_domains.'/';
						 
						 if ($row['fengmian']!='')
						 {$image=$row['fengmian'];}
						 else
						 {$image=$row['image'];}
						 
						 
								$list=$list.'{"id":12231,"money":"5","sj":"5","cs":0,"url":'.json_encode($image).',"userid":"'.$_REQUEST['uid'].'","name":"'.$row['name'].'","zykey":"dd3a092fdf4b656019c38829d7ebeec8","shijian":"2019-04-05 10:44:56","pid":11031,"photo":'.json_encode($image).',"dwz":'.json_encode('http://'.$site_luodiurl.'/shipin.php?id='.$row['ID'].'&pay=1').'},';
							}?>
[<?=substr($list, 0, -1)?>]