 <? include('../system/inc.php');
        
            $sql1="ALTER TABLE `".flag."system` ADD `s_sort` INT NULL AFTER `s_wapnotice`;";
        
  			 
  if (mysql_query($sql1))
  {echo "数据库新增成功";}
  else
  {echo "数据库新增失败";}

 
 
?>