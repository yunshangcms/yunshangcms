<? include('system/inc.php'); 
 
		$_data['uid'] = $_POST['userid'];
		$_data['sid'] = $_POST['sid'];
		$_data['type'] = $_POST['type'];
		$_data['content'] = $_POST['content'];
		$_data['ip'] = xiaoyewl_ip();
	    $_data['date'] =date('Y-m-d H:i:s');
  	$str = arrtoinsert($_data);
	$sql = 'insert into '.flag.'tousu ('.$str[0].') values ('.$str[1].')';
	 if (mysql_query($sql))
	{
	  die ('举报成功'); }	
	 else
	 {	  die ('举报失败');	}
 	
 
 
?>
 