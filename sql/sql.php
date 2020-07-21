 <? include('../system/inc.php');
        
            $sql1="CREATE TABLE IF NOT EXISTS `".flag."image` (
                          `image` LONGTEXT  NULL
                     
                     ) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
           $sql2=" ALTER TABLE  `".flag."image` ADD  `ID` INT NOT NULL AUTO_INCREMENT ,
                    ADD PRIMARY KEY (  `ID` )    ;   ";
					
					
           $sql3="  ALTER TABLE `".flag."_system` ADD `s_wapnotice` LONGTEXT NULL AFTER `s_dailiprice`;   ";
 

    $sql4="CREATE TABLE IF NOT EXISTS `".flag."fankui` (
                          `uid` int  NULL,
                          `remark` LONGTEXT  NULL,
                        `date` datetime  NULL
                     ) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
           $sql5=" ALTER TABLE  `".flag."fankui` ADD  `ID` INT NOT NULL AUTO_INCREMENT ,
                    ADD PRIMARY KEY (  `ID` )    ;   ";
  

 
					
 			 
  if (mysql_query($sql1))
  {echo "数据库新增成功";}
  else
  {echo "数据库新增失败";}

 			 
  if (mysql_query($sql2))
  {echo "ID设置成功";}
  else
  {echo "ID设置失败";}
  
    if (mysql_query($sql3))
  {echo "3ok";}
  else
  {echo "3no";}
  
  
    
    if (mysql_query($sql4))
  {echo "4ok";}
  else
  {echo "4no";}


    if (mysql_query($sql5))
  {echo "5ok";}
  else
  {echo "5no";}

 
?>