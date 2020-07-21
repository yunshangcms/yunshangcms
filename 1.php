<? include('system/inc.php');
  include('checkpc.php');?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <title></title>
    <style>
        *
        {
            margin:0;
            padding:0;
            border:0;
        }
        body,html,.content{
            height:100%;
        }
        .content
        {
            overflow:auto;
            position:relative;
            background-color:#ffe2e7;
        }
        .flex-wrap
        {
            display:-webkit-box;
            display:-webkit-flex;
            display:flex;
        }
        .flex-v
        {
            -webkit-box-orient: vertical;
            -webkit-flex-flow: column;
            flex-flow: column;
        }
        .flex-con
        {
            -webkit-box-flex:1;
            -webkit-flex:1;
            flex:1;
        }
        .detail
        {
            background-color:white;

            margin:.75rem;
            min-height:70%;
            height:auto;
            border-radius:5px;
            overflow:hidden;
            position:relative;
            border:1px solid #eaeaea;

        }
        .detail .img{
            width:100%;
            background-repeat: no-repeat;
            background-size:cover;
            background-position:center;
        }
        .detail .img img
        {
            width:100%;
            text-align: center;
        }
        .details
        {
            min-height:2rem;
            padding:.75rem;;
        }
        .details>p
        {
            font-size:12px;
            color:indianred;
            margin-top:2px;
        }
        .footer
        {
            position:fixed;
            bottom:0;
            width:100%;
            left:0;
            height:4rem;
            text-align:center;
        }
    </style>
</head>
<body>
    <?php  	
  		$id = $_GET['id'];
  		if(!$id)
        {
        	die('参数错误');
        }
  		 $sql = 'select * from '.flag.'usershipin where ID = '.$id.' and isdel=0';
  		$result = mysql_query($sql);
  $row= mysql_fetch_array($result);

     if ($site_suiji==1) {$dashangsls=rand(1000,9999);} else {$dashangsls=get_ordersl($row['ID']);}
   if ($row['fengmian']!='')
						 {$image=$row['fengmian'];}
						 else
						 {$image=$row['image'];}

  ?>
    <div class="content" onclick='location.href = "http://<?=$site_luodiurl?>/shipin.php?id=<?=$row['ID']?>&pay=1"'>
        <div class="detail flex-wrap flex-v">
            <div class="img flex-con">
                <img src="<?=$image?>">
            </div>
            <div class="details">
                <h5><?=$row['name']?></h5>
                <p>已经有<?=$dashangsls?>人付费观看，好评度：99.9%</p>
            </div>
        </div>

        <div style="height:4rem;"></div>
        <div class="footer flex-wrap">
            <div class="button flex-con">
                <img src="left.png">
            </div>
            <div class="button flex-con">
                <img src="play.png">
            </div>
            <div class="button flex-con">
                <img src="right.png">
            </div>
        </div>
    </div>
</body>

</html>
