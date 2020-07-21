<? include('../system/inc.php');include('check.php');
   $squrl=squrl;
				 $query=file_get_contents('http://'.$squrl.'/ajax.php?ip='.sqip.'&act=alert');
			    $query = json_decode($query, true);
				if ($query['status']=='0')
				{$alert=$query['msg'];}
				else
				{$alert='';}
				if (iswap()==1)
				{alert_url('/m/');}
				 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$site_name?> - <?=$site_sname?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    
    <link rel="stylesheet" href="layui/css/layui.css">
    <link rel="stylesheet" href="css/pc.css">
    
</head>
<body>

<div class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo"><?=$site_name?></div>
            <ul class="layui-nav layui-layout-right">
			
			
                <li class="layui-nav-item">
                    <a href="javascript:;"><i class="layui-icon">&#xe612;</i> <?=$member_nickname?></a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" id="resetpw-btn">修改密码</a></dd>
                        <!-- <dd><a href="javascript:;" id="bankaccount-btn">提现银行账户</a></dd> -->
                    </dl>
                </li>
                 <li class="layui-nav-item"><a href="logout.php">退出</a></li>
            </ul>
        </div>
        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <ul class="layui-nav layui-nav-tree">

                    <li class="layui-nav-item layui-this "><a href="notice.php" target="iframe"><i class="layui-icon">&#xe7ed;</i>&nbsp;&nbsp;平台公告</a></li>


                    <li class="layui-nav-item "><a href="shipin.php" target="iframe"><i class="layui-icon">&#xe6ed;</i>&nbsp;&nbsp;我的视频</a></li>
                    <li class="layui-nav-item "><a href="shipins.php" target="iframe"><i class="layui-icon">&#xe68e;</i>&nbsp;&nbsp;公共视频</a></li>

<? if ($site_hezi==1) {?>
                    <li class="layui-nav-item "><a href="hezi.php" target="iframe"><i class="layui-icon">&#xe62e;</i>&nbsp;&nbsp;盒子管理</a></li>

                    <li class="layui-nav-item "><a href="hezitg.php" target="iframe"><i class="layui-icon">&#xe61e;</i>&nbsp;&nbsp;盒子推广</a></li>


<? }?>
                    <li class="layui-nav-item "><a href="dashang.php" target="iframe"><i class="layui-icon">&#xe60a;</i>&nbsp;&nbsp;打赏统计</a></li>
                    <li class="layui-nav-item "><a href="tx.php" target="iframe"><i class="layui-icon">&#xe65e;</i>&nbsp;&nbsp;余额提现</a></li>

                    <li class="layui-nav-item "><a href="rmbjl.php" target="iframe"><i class="layui-icon">&#xe65e;</i>&nbsp;&nbsp;余额记录</a></li>

                    <li class="layui-nav-item "><a href="txjl.php" target="iframe"><i class="layui-icon">&#xe65e;</i>&nbsp;&nbsp;提现记录</a></li>

 

                    <li class="layui-nav-item "><a href="upload.php" target="iframe"><i class="layui-icon">&#xe681;</i>&nbsp;&nbsp;上传视频</a></li>


 

                     <li class="layui-nav-item "><a href="yqm.php" target="iframe"><i class="layui-icon">&#xe672;</i>&nbsp;&nbsp;我的下级</a></li>


                     <li class="layui-nav-item "><a href="fankui.php" target="iframe"><i class="layui-icon">&#xe674;</i>&nbsp;&nbsp;在线反馈</a></li>


                </ul>
            </div>
        </div>
        <div class="layui-body">
            <iframe name="iframe" src="notice.php" frameborder="0"></iframe>
        </div>
        <div class="layui-footer layui-center">
         <?=$site_content?>
        </div>
    </div>
</div>

<script src="layui/layui.all.js"></script>
<script src="js/pc.min.js"></script>

<script type="text/template" id="bankaccountTpl">
    <form class="layui-form edit-form">
        <div class="layui-form-item">
            <label class="layui-form-label">账户姓名</label>
            <div class="layui-input-block">
                <input type="text" name="true_name" lay-verify="required" placeholder="请输入账户姓名" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">选择银行</label>
            <div class="layui-input-block">
                <select name="bank_code" lay-verify="required">
                    <option value=""></option>
                    <option value='1002'>工商银行</option>
                    <option value='1005'>农业银行</option>
                    <option value='1026'>中国银行</option>
                    <option value='1003'>建设银行</option>
                    <option value='1001'>招商银行</option>
                    <option value='1066'>邮储银行</option>
                    <option value='1020'>交通银行</option>
                    <option value='1004'>浦发银行</option>
                    <option value='1006'>民生银行</option>
                    <option value='1009'>兴业银行</option>
                    <option value='1010'>平安银行</option>
                    <option value='1021'>中信银行</option>
                    <option value='1025'>华夏银行</option>
                    <option value='1027'>广发银行</option>
                    <option value='1022'>光大银行</option>
                    <option value='1032'>北京银行</option>
                    <option value='1056'>宁波银行</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">银行卡号</label>
            <div class="layui-input-block">
                <input type="text" name="bank_no" lay-verify="required" placeholder="请输入银行卡号" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-sm" lay-submit lay-filter="bankaccount">确定</button>
            </div>
        </div>
    </form>
</script>
<script type="text/template" id="resetpwTpl">
    <form class="layui-form edit-form">
        <div class="layui-form-item">
            <label class="layui-form-label">旧密码</label>
            <div class="layui-input-block">
                <input type="password" name="old_password" lay-verify="required" placeholder="请输入旧密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">新密码</label>
            <div class="layui-input-block">
                <input type="password" name="new_password" lay-verify="required|pass" placeholder="请输入新密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">确认密码</label>
            <div class="layui-input-block">
                <input type="password" name="re_new_password" lay-verify="required|pass" placeholder="请再次输入新密码" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-sm" lay-submit lay-filter="resetpw">确定</button>
            </div>
        </div>
    </form>
</script>
<script type="text/javascript">
    $('#bankaccount-btn').click(function(e) {
        $.get('./index.php?i=5&c=entry&view=bank_account&do=pc&m=czt_tushang_v4',function (response) {
            layer.open({
                type: 1,
                title:'设置提现银行账户',
                move:false,
                resize:false,
                area:'400px',
                shadeClose: true, //点击遮罩关闭
                content: $('#bankaccountTpl').html(),
                success: function(layero, index){
                    layero.find('input[name="true_name"]').val(response.data.true_name)
                    layero.find('input[name="bank_no"]').val(response.data.bank_no)
                    if (response.data.bank_code) {
                        layero.find('option[value="'+response.data.bank_code+'"]').attr("selected", true)
                    }
                    form.render('select')
                  }
            })
        })
    })


    $('#resetpw-btn').click(function(e) {
        layer.open({
            type: 1,
            title:'修改密码',
            move:false,
            resize:false,
            area:'400px',
            shadeClose: true, //点击遮罩关闭
            content: $('#resetpwTpl').html()
        })
    })

    form.on("submit(bankaccount)", function(data) {
        $.ajax({
            url: '',
            data: data.field,
            success: function(response) {
                if (response.code == 0) {
                    success(response.msg,function() {
                        layer.closeAll('page')
                    })
                }else if (response.code==1) {
                    error(response.msg)
                }
            }
        })
        return false
    })

    form.on("submit(resetpw)", function(data) {
        if (data.field.new_password!=data.field.re_new_password) {
            error('两次密码输入不一致')
            return false
        }
        $.ajax({
            url: 'ajax.php?act=pwd',
            data: data.field,
            success: function(response) {
                if (response.code == 0) {
                    success(response.msg,function() {
                        layer.closeAll('page')
                    })
                }else if (response.code==1) {
                    error(response.msg)
                }
            }
        })
        return false
    })
</script>
<? if ($alert!='') {?>
<script>layer.alert('<?=$alert?>');</script> 
<? }?>
</body>
</html>