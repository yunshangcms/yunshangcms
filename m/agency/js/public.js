<!--
//-------------------------

    function creatajax() {
        var ajax = null;
        if (window.XMLHttpRequest) {
            //对于Mozilla、Netscape、Safari等浏览器，创建XMLHttpRequest对象
            ajax = new XMLHttpRequest();
            if (ajax.overrideMimeType) {
                //如果服务器响应的header不是text/xml，可以调用其它方法修改该header
                ajax.overrideMimeType('text/xml');
            }
        } else if (window.ActiveXObject) {
            // 对于Internet Explorer浏览器，创建XMLHttpRequest
            try {
                ajax = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    ajax = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {}
            }
        }
        return ajax;
    }
//---------------------

function check_bodywidth(sID, sWidth) {
    //check_IE_version();
    var c_width = $(window).width();
    if (c_width < sWidth) {
        $("#" + sID).css("width", sWidth);
    } else {
        $("#" + sID).css("width", "100%");
    }
}

//---------------------

function setTab_con(nameBtn, nameCon, curItem, itemCnt, nameCss) {
    for (item_i = 1; item_i <= itemCnt; item_i++) {
        if (item_i == curItem) {
            document.getElementById(nameBtn + item_i).className = nameCss + "A";
            document.getElementById(nameCon + item_i).style.display = "inline";
        } else {
            document.getElementById(nameBtn + item_i).className = nameCss;
            document.getElementById(nameCon + item_i).style.display = "none";
        }
    }
}
//-----------------------------

function setTab_pro(curItem, itemCnt) {
    for (item_i = 1; item_i <= itemCnt; item_i++) {
        if (item_i == curItem) {
            document.getElementById("set_con" + item_i).style.display = "inline";
            document.getElementById("set_btn" + item_i).className = "litdA";
        } else {
            document.getElementById("set_con" + item_i).style.display = "none";
            document.getElementById("set_btn" + item_i).className = "litd";
        }
    }
    $("#midbox").css('height', $("#midcon").innerHeight() - 110);
}

//------------------------

function Open_imgb(imgpath, proname) {

    $("#imgb_box .mainbox").css('marginTop', ($(window).height() - 540) / 2 + 'px');
    $("#imgb_box").fadeIn(600);

    $("#m_proname").html(proname);
    $("#m_bigimg").css('display', 'none');
    $("#m_bigimg").attr("src", imgpath);
    $("#m_bigimg").fadeIn(1000);

}

function Close_imgb() {
    $("#imgb_box").slideUp(300);
    document.getElementById("m_bigimg").src = "images/none.gif";
    document.getElementById("m_proname").innerHTML = "";
}

//---------------------------

function check_menu_zw() {
    //document.getElementById("toptd").innerHTML = $("#topmenu").offset().top;

    $("#top_czw").css('top', $(document).scrollTop() + "px");

    if (130 < $(document).scrollTop()) {
        $("#topmenu").css('position', 'fixed');
        $("#topmenu").css('left', '0px');
        $("#topmenu").css('top', '0px');
    } else {
        $("#topmenu").css('position', 'inherit');
        $("#topmenu").css('left', 'auto');
        $("#topmenu").css('top', 'auto');
    }

}

//---------------------------

function backtop() {
    //把内容滚动指定的像素数（第一个参数是向右滚动的像素数，第二个参数是向下滚动的像素数）
    window.scrollBy(0, -100);
    //延时递归调用，模拟滚动向上效果
    scrolldelay = setTimeout('backtop()', 20);
    //获取scrollTop值，声明了DTD的标准网页取document.documentElement.scrollTop，否则取document.body.scrollTop；因为二者只有一个会生效，另一个就恒为0，所以取和值可以得到网页的真正的scrollTop值
    var sTop = document.documentElement.scrollTop + document.body.scrollTop;
    //判断当页面到达顶部，取消延时代码（否则页面滚动到顶部会无法再向下正常浏览页面）
    if (sTop == 0) clearTimeout(scrolldelay);
}
//---------------------------
//去掉字串左边的空格   

function ltrim(str) {
    if (str.charAt(0) == " ") {
        //如果字串左边第一个字符为空格
        str = str.slice(1); //将空格从字串中去掉
        //这一句也可改成 str = str.substring(1, str.length);
        str = ltrim(str); //递归调用
    }
    return str;
}

//去掉字串右边的空格

function rtrim(str) {
    var iLength;
    iLength = str.length;
    if (str.charAt(iLength - 1) == " ") {
        //如果字串右边第一个字符为空格
        str = str.slice(0, iLength - 1); //将空格从字串中去掉
        //这一句也可改成 str = str.substring(0, iLength - 1);
        str = rtrim(str); //递归调用
    }
    return str;
}
//去掉字串两边的空格

function trim(str) {
    return ltrim(rtrim(str));
}
//---------------------------

function is_mobile(str) {
    var checkre = true;
    var mobile_character = /^1\d{10}$/;

    if (!mobile_character.test(str)) {
        checkre = false;
    }
    return checkre;
}


function is_email(str) {
    if ((str.indexOf("@") == -1) || (str.indexOf(".") == -1) || (str.indexOf("@.") != -1) || (str.indexOf(".@") != -1) ||
        (str.indexOf("..") != -1) || (str.indexOf("@@") != -1)) {
        return false;
    }
    return true;
}
//---------------------------
//function count_checked_items(sForm) {
//  var number_checked=0;
//  var s_form = sForm;
//  var box_count=s_form.length;
//  if ( box_count==null ) {
//  if ( s_form.checked==true ) {
//  number_checked=1;}else {
//  number_checked=0;}}
//  else {
//  for ( var i=0; i < (box_count); i++ ) {
//  if ( s_form[i].checked==true ) {
//  number_checked++;}}}return number_checked;
//}


function count_checked_items(selstr) {
    var checked_num = 0;
    var s_form = document.getElementsByName(selstr);
    var box_count = s_form.length;
    if (box_count == null) {

        if (s_form.checked == true)
            checked_num = 1;
        else
            checked_num = 0;

    } else {

        for (var i = 0; i < (box_count); i++) {
            if (s_form[i].checked == true) {
                checked_num++;
            }
        }
    }

    return checked_num;
}

//---------------------------

function copyText(sText, sHid) {
    var stext = document.getElementById(sText).innerHTML;
    var shid = document.getElementById(sHid);
    shid.value = trim(stext); // 修改文本框的内容
    shid.select(); // 选中文本
    //document.execCommand("copy"); // 执行浏览器复制命令
    //alert("复制成功");

    try {
        var successful = document.execCommand('copy');
        var msg = successful ? '已成功复制到剪贴板' : '本浏览器不支持点击复制，请长按内容选择后再复制';
        alert(msg);
    } catch (err) {
        alert('本浏览器不支持点击复制，请长按内容选择后再复制');
    }
}



function copyText1(sText, sHid) {
    var stext = document.getElementById(sText).innerHTML;
    var shid = document.getElementById(sHid);
    shid.value = trim(stext); // 修改文本框的内容
    shid.select(); // 选中文本
    //document.execCommand("copy"); // 执行浏览器复制命令
    //alert("复制成功");

    try {
        var successful = document.execCommand('copy');
        //var msg = successful ? '已成功复制到剪贴板' : '该浏览器不支持点击复制，请长按金额选择后再复制';
        if (successful == true) {
            $("#win_con_box1").css("display", "none");
            alert("已成功复制到剪贴板");
        } else {
            alert("本浏览器不支持点击复制，请长按金额选择后再复制");
        }
    } catch (err) {
        alert('本浏览器不支持点击复制，请长按金额选择后再复制');
    }
}
//---------------------------

function QR_Code(_weburl) {
    /* 2014/07/19 21:09 */
    //var _weburl = window.location.href;
    var _qrContent = escape(_weburl),
        _qrLogo = '',
        _qrWidth = 130,
        _qrHeight = 130,
        _qrType = 'url';

    //if(!_qrContent)
    //var _qrContent =escape(document.location.href);
    document.write(unescape(""));
}
//---------------------------------------------------------------
//---------------------------------------------------------------

function check_getcode() {
    if (trim(document.regform.username.value) == '') {
        alert("请填写用户名！");
        document.regform.username.focus();
        return false;
    }
    if (is_mobile(trim(document.regform.username.value)) == false) {
        alert("请以正确的手机号码作为用户名！");
        return false;
    }
    send_getcode();
}



var _interval_code;
var _snum_code;

function send_getcode() {

    var xmlHttp = null;
    xmlHttp = creatajax();

    username = encodeURI(trim(document.regform.username.value));

    postData = "username=" + username + "&nowget=yes";
    var url = "getcode.php";
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');
                //------------
                if (back_value_array[0] == '0') {
                    $("#getcode").html(
                        "<input type=\"button\" class=\"m_getcode\" value=\"获取验证码\" onclick=\"javascript:check_getcode();\" />");
                    alert(back_value_array[1]);
                } else {
                    //$("#getcode").html("<input type=\"button\" class=\"m_getcode\" value=\"获取验证码\" onclick=\"javascript:check_getcode();\" />");
                    _snum_code = 60;
                    _interval_code = setInterval("countdown_code()", 1000);
                    alert(back_value_array[1]);
                }

                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#getcode").html("<input type=\"button\" class=\"m_getcodeoff\" value=\"请稍等...\" />");
}


function countdown_code() {
    if (_snum_code == 1) {
        clearInterval(_interval_code);
        $("#getcode").html(
            "<input type=\"button\" class=\"m_getcode\" value=\"获取验证码\" onclick=\"javascript:check_getcode();\" />");
    } else {
        _snum_code--;
        $("#getcode").html("<input type=\"button\" class=\"m_getcodeoff\" value=\"" + _snum_code + "秒后可重获\" />");
    }
}

//---------------------------------------------------------------

function check_reg() {
    var agency =  document.regform.agency.value;
    var per = document.regform.invcode.value;

    if (trim(document.regform.username.value) == '') {
        alert("请填写用户名！");
        document.regform.username.focus();
        return false;
    }
    if (trim(document.regform.username.value).length < 2) {
        alert("对不起，用户名不能少于2位");
        document.regform.username.focus();
        return false;
    }

    if (trim(document.regform.password.value) == '') {
        alert("请填写密码！");
        document.regform.password.focus();
        return false;
    }
    if (trim(document.regform.password.value).length < 6) {
        alert("为了安全，密码不能少于6位");
        document.regform.password.focus();
        return false;
    }

    if (per == '') {
        alert("请填写代理比例！");
        document.regform.invcode.focus();
        return false;
    }


    if (per > agency || per <= 0) {
        alert("比例必须小于"+agency+"且大于零");
        document.regform.invcode.focus();
        return false;
    }

    check_sub_reg();

}

//---------------------------

function check_sub_reg() {
    var xmlHttp = null;
    xmlHttp = creatajax();

    username = encodeURI(trim(document.regform.username.value));
    password = encodeURI(trim(document.regform.password.value));
    percent = encodeURI(trim(document.regform.invcode.value));


    postData = "username=" + username + "&password=" + password + "&percent=" + percent;
    var url = ckurl;
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');
                //------------
                if (back_value_array[0] == '0') {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                } else {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                    location.href = purl;
                }

                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#ts_loadering").css("display", "inline");
}

//---------------------------------------------------------------

function check_login() {
    if (trim(document.loginform.username.value) == '') {
        alert("请输入用户名！");
        document.loginform.username.focus();
        return false;
    }

    if (trim(document.loginform.password.value) == '') {
        alert("请输入密码！");
        document.loginform.password.focus();
        return false;
    }

    if (trim(document.loginform.vcode.value) == '') {
        alert("请输入验证码！");
        document.loginform.vcode.focus();
        return false;
    }

    check_sub_login();

}

//---------------------------

function check_sub_login() {

    var xmlHttp = null;
    xmlHttp = creatajax();

    username = encodeURI(trim(document.loginform.username.value));
    password = encodeURI(trim(document.loginform.password.value));
    vcode = encodeURI(trim(document.loginform.vcode.value));

    var getSel = ""
    var rememberpsw = "0";
    getSel = document.getElementsByName("rememberpsw");
    for (i = 0; i < getSel.length; i++) {
        if (getSel[i].checked) {
            rememberpsw = getSel[i].value;
        }
    }

    postData = "username=" + username + "&password=" + password + "&vcode=" + vcode + "&rememberpsw=" + rememberpsw;
    var url = lurl;
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');
                //------------
                if (back_value_array[0] == '0') {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                } else {
                    $("#ts_loadering").css("display", "none");
                    location.href = purl;
                }


                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#ts_loadering").css("display", "inline");
}

//---------------------------------------------------------------

function check_updatepwd() {

    if (trim(document.infoform.nowpassword.value) == '') {
        alert("请输入当前密码！");
        document.infoform.nowpassword.focus();
        return false;
    }

    if (trim(document.infoform.newpassword.value) == '') {
        alert("请填写新密码！");
        document.infoform.newpassword.focus();
        return false;
    }
    if (trim(document.infoform.newpassword.value).length < 6) {
        alert("为了安全，新密码不能少于6位");
        document.infoform.newpassword.focus();
        return false;
    }

    if (trim(document.infoform.renewpassword.value) == '') {
        alert("请填写新密码确认！");
        document.infoform.renewpassword.focus();
        return false;
    }

    if (trim(document.infoform.newpassword.value) != trim(document.infoform.renewpassword.value)) {
        alert("新密码与新密码确认不一致，请再次填写！");
        document.infoform.renewpassword.value = "";
        document.infoform.renewpassword.focus();
        return false;
    }

    check_sub_updatepwd();

}

//---------------------------

function check_sub_updatepwd() {
    var xmlHttp = null;
    xmlHttp = creatajax();

    nowpassword = encodeURI(trim(document.infoform.nowpassword.value));
    newpassword = encodeURI(trim(document.infoform.newpassword.value));

    postData = "nowpassword=" + nowpassword + "&newpassword=" + newpassword;
    var url = cgpwd;
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');

                //------------
                if (back_value_array[0] == '0') {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                } else {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                    //location.href = cglogin;
                }


                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#ts_loadering").css("display", "inline");
}

//---------------------------------------------------------------

function clear_img1() {
    document.subform.myfile1.value = "";
    $("#imgDisplay1").css("display", "none");
}

function clear_img2() {
    document.subform.myfile2.value = "";
    $("#imgDisplay2").css("display", "none");
}


function check_radiotype() {
    var obj = document.getElementsByName('rewardtype');
    if (obj[0].checked == true) {
        $("#reward1").css("display", "inline");
        $("#reward2").css("display", "none");
    } else if (obj[1].checked == true) {
        $("#reward1").css("display", "none");
        $("#reward2").css("display", "inline");
    }
}
//---------------------------------------------------------------

function check_consub() {
    if (trim(document.subform.title.value) == '') {
        alert("请填写影片名称！");
        document.subform.title.focus();
        return false;
    }


    var rewardamount = trim(document.subform.rewardamount.value)
    var rewardamount_arry = rewardamount.split("-");


    if (trim(document.subform.rand_amount1.value) == '' || trim(document.subform.rand_amount2.value) == '') {
        alert("请填写打赏金额最小值和最大值！");
        return false;
    }

    if (parseFloat(trim(document.subform.rand_amount1.value)).toString() == 'NaN' || parseFloat(trim(document.subform.rand_amount2
            .value)).toString() == 'NaN') {
        alert("打赏金额必须填写数值！");
        return false;
    }

    if (parseFloat(trim(document.subform.rand_amount1.value)) < parseFloat(rewardamount_arry[0]) || parseFloat(trim(
            document.subform.rand_amount1.value)) > parseFloat(rewardamount_arry[1])) {
        alert("打赏金额必须在 " + rewardamount + "元之间！");
        return false;
    }

    if (parseFloat(trim(document.subform.rand_amount2.value)) < parseFloat(rewardamount_arry[0]) || parseFloat(trim(
            document.subform.rand_amount2.value)) > parseFloat(rewardamount_arry[1])) {
        alert("打赏金额必须在 " + rewardamount + "元之间！");
        return false;
    }

    if (parseFloat(trim(document.subform.rand_amount1.value)) >= parseFloat(trim(document.subform.rand_amount2.value))) {
        alert("打赏金额最大值必须大于最小值！");
        return false;
    }



    check_sub_consub();

}

//---------------------------

function check_sub_consub() {
    $("#ts_loadering").css("display", "inline");

    var getSel = ""

    var isdownload = 0;
    getSel = document.getElementsByName("isdownload");
    for (i = 0; i < getSel.length; i++) {
        if (getSel[i].checked) {
            isdownload = getSel[i].value;
        }
    }


    subtype = trim(document.subform.subtype.value);
    id = document.subform.id.value;


    title = encodeURI(trim(document.subform.title.value));
    rand_amount1 = encodeURI(trim(document.subform.rand_amount1.value));
    rand_amount2 = encodeURI(trim(document.subform.rand_amount2.value));

    $.ajaxFileUpload({
        url: 'consave.php',
        secureuri: false,
        fileElementId: ['myfile1', 'myfile2'],
        //fileElementId: 'myfile',
        dataType: 'json',
        type: 'post',
        data: {
            id: id,
            subtype: subtype,
            title: title,
            rand_amount1: rand_amount1,
            rand_amount2: rand_amount2,
            isdownload: isdownload
        }, //一同上传的数据  
        /*beforeSend:function() {
         $('#ts_wxmass').html('<img src=\"images/loader.gif\" style=\"vertical-align:middle;\" /> 请稍等...');
         },*/
        success: function (data, status) {
            //console.log(res.msg);
            //-------------------------------
            data_arr = data.split('|');

            if (data_arr[0] == '0') {
                $("#ts_loadering").css("display", "none");
                alert(data_arr[1]);
            } else if (data_arr[0] == '1') {
                $("#ts_loadering").css("display", "none");
                alert(data_arr[1]);
                location.href = "conlist.php";
            } else if (data_arr[0] == '2') {
                $("#ts_loadering").css("display", "none");
                alert(data_arr[1]);
                location.href = "conlist.php?page=" + trim(document.subform.page.value);
            }
            //-------------------------------

        },
        error: function (data, status, e) {
            alert(e);
        }
    });
}


//---------------------------------------------------------------

function check_con_onoff(cid) {
    var xmlHttp = null;
    xmlHttp = creatajax();

    var isonoff = "0";
    var cform = document.getElementsByName("ckb" + cid + "[]");
    if (cform[0].checked) {
        isonoff = cform[0].value;
    }

    postData = "isonoff=" + isonoff + "&cid=" + cid + "&subtype=onoff";
    var url = "consave.php";
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');
                //------------
                if (back_value_array[0] == '0') {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                } else {
                    $("#ts_loadering").css("display", "none");
                }

                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#ts_loadering").css("display", "inline");
}

//---------------------------------------------------------------

function check_con_del(did) {
    var xmlHttp = null;
    xmlHttp = creatajax();

    postData = "did=" + did + "&subtype=del";
    var url = "consave.php";
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');
                //------------
                if (back_value_array[0] == '0') {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                } else {
                    $("#ts_loadering").css("display", "none");
                    location.href = back_value_array[1];
                }

                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#ts_loadering").css("display", "inline");
}


//---------------------------------------------------------------

function check_getcash() {

    var status = trim(document.subform.status.value);
    if(status == 0){
        var cangetamount = trim(document.subform.cangetamount.value);
        var lowamount = trim(document.subform.lowamount.value);

        if (parseFloat(cangetamount) < parseFloat(lowamount)) {
            alert("对不起，您当前可提现金额小于 " + lowamount + "元，无法提现。");
            return false;
        }

        if (trim(document.subform.qid.value) == '') {
            alert("请先上传微信收款码");
            var qurl = document.subform.upqimg.value;
            location.href=qurl;
            return false;
        }

        if (count_checked_items('gettotal') == 0) {
            if (trim(document.subform.getamount.value) == '') {
                alert("请输入要提现的金额！");
                document.subform.getamount.focus();
                return false;
            }

            if (parseFloat(trim(document.subform.getamount.value)).toString() == 'NaN') {
                alert("提现金额必须填写数值！");
                return false;
            }

            if (parseFloat(trim(document.subform.getamount.value)) < parseFloat(lowamount)) {
                alert("对不起，提现金额不能小于 " + lowamount + "元");
                return false;
            }

            if (parseFloat(trim(document.subform.getamount.value)) > parseFloat(cangetamount)) {
                alert("对不起，您填写的提现金额已超过可提现金额");
                return false;
            }

            if (parseFloat(trim(document.subform.qid.value)) == '') {
                alert("请先上传收款码");
                return false;
            }

        }

        if (confirm('确定提现吗？')) {
            check_sub_getcash();
        }
    }else if(status == 1){

        var cangetamount = trim(document.subform.extend_money.value);
        var lowamount = trim(document.subform.lowamount.value);

        if (parseFloat(cangetamount) < parseFloat(lowamount)) {
            alert("对不起，您当前可提现佣金小于 " + lowamount + "元，无法提现。");
            return false;
        }

        if (trim(document.subform.qid.value) == '') {
            alert("请先上传微信收款码");
            var qurl = document.subform.upqimg.value;
            location.href=qurl;
            return false;
        }

        if (count_checked_items('gettotal') == 0) {
            if (trim(document.subform.getamount.value) == '') {
                alert("请输入要提现的佣金金额！");
                document.subform.getamount.focus();
                return false;
            }

            if (parseFloat(trim(document.subform.getamount.value)).toString() == 'NaN') {
                alert("提现佣金金额必须填写数值！");
                return false;
            }

            if (parseFloat(trim(document.subform.getamount.value)) < parseFloat(lowamount)) {
                alert("对不起，提现佣金金额不能小于 " + lowamount + "元");
                return false;
            }

            if (parseFloat(trim(document.subform.getamount.value)) > parseFloat(cangetamount)) {
                alert("对不起，您填写的提现佣金金额已超过可提现佣金金额");
                return false;
            }

            if (parseFloat(trim(document.subform.qid.value)) == '') {
                alert("请先上传收款码");
                return false;
            }

        }

        if (confirm('确定提现吗？')) {
            check_sub_getcash();
        }




    }else{
        alert('数据错误');
    }


}


//---------------------------
//现金提现
function check_sub_getcash() {
    var xmlHttp = null;
    xmlHttp = creatajax();

    var getSel = "";

    var gettotal = "";
    getSel = document.getElementsByName("gettotal");
    for (i = 0; i < getSel.length; i++) {
        if (getSel[i].checked) {
            gettotal = getSel[i].value;
        }
    }

    getamount = encodeURI(trim(document.subform.getamount.value));
    status = encodeURI(trim(document.subform.status.value));
    qid = encodeURI(trim(document.subform.qid.value));


    postData = "money=" + getamount + "&istotal=" + gettotal + "&qid=" + qid + "&subtype=getcash&status="+ status;
    var url = apply_url;

    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');
                //------------
                if (back_value_array[0] == '0') {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                } else {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                    location.href = back_value_array[2];
                }

                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#ts_loadering").css("display", "inline");
}



//-----------------上传收款二维码-------------------------
function check_upqrcode() {
    if (trim(document.subform.wx_account.value) == '') {
        alert("请填写微信账号！");
        document.subform.wx_account.focus();
        return false;
    }
    if (trim(document.subform.img.value) == '') {
        alert("收款码不能空！");
        document.subform.img.focus();
        return false;
    }

    if (confirm('确定上传吗？')) {
        check_sub_qrcode();
    }

}


//------------------------------------------------

function check_sub_qrcode() {
    var xmlHttp = null;
    xmlHttp = creatajax();

    account = encodeURI(trim(document.subform.wx_account.value));
    qimg = encodeURI(trim(document.subform.img.value));
    id = encodeURI(trim(document.subform.id.value));


    postData = "account=" + account + "&qimg=" + qimg + "&id=" + id;
    var url = upqrcode_url;
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');
                //------------
                if (back_value_array[0] == '0') {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                } else {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                    location.href = back_value_array[2];
                }

                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#ts_loadering").css("display", "inline");
}

//---------------------------------------------------------------

function check_addinvcode() {

    var inviteamount = trim(document.getElementById('inviteamount').value);

    if (confirm('生成邀请码将从您账户余额中扣除 ' + inviteamount + '元，您确定要生成吗？')) {
        check_sub_addinvcode();
    }

}

//---------------------------

function check_sub_addinvcode() {
    var xmlHttp = null;
    xmlHttp = creatajax();

    postData = "type=addinvcode";
    var url = codeurl;
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');
                //------------
                if (back_value_array[0] == '0') {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                } else {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                    //location.href = back_value_array[2];
                }

                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#ts_loadering").css("display", "inline");
}

//---------------------------------------------------------------

function check_feedback() {

    if (trim(document.subform.content.value) == '') {
        alert("请填写您的意见！");
        document.subform.content.focus();
        return false;
    }
    if (trim(document.subform.content.value).length > 100) {
        alert("对不起，意见内容不能超过120字！");
        return false;
    }

    if (confirm('确定提交吗？')) {
        check_sub_feedback();
    }

}

//---------------------------

function check_sub_feedback() {
    var xmlHttp = null;
    xmlHttp = creatajax();

    content = encodeURI(trim(document.subform.content.value));

    postData = "content=" + content + "&subtype=feedback";
    var url = "consave.php";
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');
                //------------
                if (back_value_array[0] == '0') {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                } else {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                    location.href = back_value_array[2];
                }

                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#ts_loadering").css("display", "inline");
}

//---------------------------------------------------------------

function check_copyvideo() {

    if (count_checked_items('selid[]') == 0) {
        alert("请选择您想要复制的影片！");
        return;
    }

    if (confirm('确定复制吗？')) {
        check_sub_copyvideo();
    }

}

//---------------------------

function check_sub_copyvideo() {
    var xmlHttp = null;
    xmlHttp = creatajax();


    var getSel = ""
    var selid = "";
    var num = 0;
    getSel = document.getElementsByName("selid[]");
    for (i = 0; i < getSel.length; i++) {
        if (getSel[i].checked) {
            num++;
            if (num == 1)
                selid = getSel[i].value;
            else
                selid = getSel[i].value + "," + selid;

        }
    }


    postData = "selid=" + encodeURI(selid) + "&subtype=copyvideo";
    var url = "consave.php";
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');
                //------------
                if (back_value_array[0] == '0') {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                } else {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                    location.href = back_value_array[2];
                }

                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#ts_loadering").css("display", "inline");
}


//---------------------------------------------

function check_cityiptest() {
    var xmlHttp = null;
    xmlHttp = creatajax();


    postData = "subtype=iptest";
    var url = "../consave.php";
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');
                //------------

                if (back_value_array[0] == '1') {
                    $("#playlistbox").css("display", "inline");
                    $("#ts_loadering").css("display", "none");
                } else {
                    $("#ts_loadering").css("display", "none");
                    window.location.href = back_value_array[1];
                }

                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#playlistbox").css("display", "none");
    $("#ts_loadering").css("display", "inline");
}


//---------------------------------------------

function check_tabplaylist(uid, page, pagesum, pagesize) {
    var xmlHttp = null;
    xmlHttp = creatajax();

    postData = "uid=" + uid + "&page=" + page + "&pagesum=" + pagesum + "&pagesize=" + pagesize;
    var url = "../tabplaylist.php";
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('$|$');
                //------------


                $("#ts_loadering").css("display", "none");
                $("#playlistbox").html(back_value_array[1]);
                $("#tabplaylist_box .conbox").html("<span onClick=\"javascript:check_tabplaylist(" + uid + "," +
                    back_value_array[0] + "," + pagesum + "," + pagesize + ");\">换一批</span>");

                check_win_playlist(); //调整排列

                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#ts_loadering").css("display", "inline");
}

//---------------------------------------------------------------

function check_palylisthtml(ShortenUrl) {
    var xmlHttp = null;
    xmlHttp = creatajax();

    postData = "subtype=palylisthtml";
    var url = "consave.php";
    xmlHttp.open("post", url, true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //------------
    xmlHttp.onreadystatechange = function () {

        if (xmlHttp.readyState == 4) {
            //document.getElementById("loading_ts").style.display = "none";
            if (xmlHttp.status == 200) {
                var back_value = xmlHttp.responseText;
                back_value_array = back_value.split('|');
                //------------
                if (back_value_array[0] == '0') {
                    $("#ts_loadering").css("display", "none");
                    alert(back_value_array[1]);
                } else {
                    $("#ts_loadering").css("display", "none");
                    Open_win_con(ShortenUrl);
                }

                xmlHttp.abort();
                xmlHttp = null;
                //------------
            }
        }

    }
    //------------
    xmlHttp.send(postData);
    $("#ts_loadering").css("display", "inline");
}

//-->