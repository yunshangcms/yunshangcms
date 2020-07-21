function check_objw() {
    var jw = 1000;
    var win_jw = $(window).width();
    if (win_jw >= jw) win_jw = jw;
    return win_jw;
}

//---------------------------
//---------------------------

function check_win_common() {
    var objw = check_objw();

    if ($("#container .bottommenu_box .conbox").height() > 0) {
        $("#container .bottommenu_box .conbox").css("width", objw);
        $("#container .bottommenu_box .conbox").css("marginLeft", -(objw / 2));
    }

    if ($("#container .toptitle_box .conbox").height() > 0) {
        $("#container .toptitle_box .conbox").css("width", objw);
        $("#container .toptitle_box .conbox").css("marginLeft", -(objw / 2));
    }

    if ($("#win_con_box").length > 0) {
        $("#win_con_box .mainbox").css("width", objw);
        $("#win_con_box .mainbox").css("marginLeft", -(objw / 2));
    }
}


function Open_win_con(shorturl) {
    var ewm_img = "<img src='http://qrcode.leipi.org/js.html?qw=130&qh=130&qc=" + shorturl +
        "&ql=&lw=32&lh=32&bor=0&op=img' width='130' height='130' border='0'>";

    var str_content = "";
    str_content += "<div class=\"conbox\">\n";
    str_content += "<div class=\"h_title\">我的二维码</div>\n";
    str_content += "<div class=\"h_ewmcon\">\n";
    str_content += ewm_img + "\n";
    str_content += "</div>\n";
    str_content += "<div class=\"h_ewmtitle\">请用微信扫一扫</div>\n";
    str_content += "<div class=\"h_line\"></div>\n";
    str_content += "<div class=\"h_videourl\" id=\"urltext\">" + shorturl + "</div>\n";
    str_content +=
        "<input type=\"button\" class=\"h_btn\" value=\"复制推广地址\" onclick=\"copyText('urltext','copyhidtext');\">\n";
    str_content += "</div>\n";
    str_content += "<div class=\"xclose\"><i onClick=\"javascript:Close_win_con();\"></i></div>";

    $("#win_con_box .mainbox").html(str_content);
    $("#win_con_box").fadeIn(800);
}



function Open_win_cons(shorturl,title) {
    var ewm_img = "<img src='http://qrcode.leipi.org/js.html?qw=130&qh=130&qc=" + shorturl +
        "&ql=&lw=32&lh=32&bor=0&op=img' width='130' height='130' border='0'>";

    var str_content = "";
    str_content += "<div class=\"conbox\">\n";
    str_content += "<div class=\"h_title\">"+title+"</div>\n";
    str_content += "<div class=\"h_ewmcon\">\n";
    str_content += ewm_img + "\n";
    str_content += "</div>\n";
    str_content += "<div class=\"h_ewmtitle\">请用微信扫一扫</div>\n";
    str_content += "<div class=\"h_line\"></div>\n";
    str_content += "<div class=\"h_videourl\" id=\"urltext\">" + shorturl + "</div>\n";
    str_content +=
        "<input type=\"button\" class=\"h_btn\" value=\"复制推广地址\" onclick=\"copyText('urltext','copyhidtext');\">\n";
    str_content += "</div>\n";
    str_content += "<div class=\"xclose\"><i onClick=\"javascript:Close_win_con();\"></i></div>";

    $("#win_con_box .mainbox").html(str_content);
    $("#win_con_box").fadeIn(800);
}



function Close_win_con() {
    $("#win_con_box").slideUp(500);
}



function Close_win_con1() {
    $("#win_con_box1").css("display", "none");
}
//---------------------------
//---------------------------
$(document).ready(function () {

    $("#container .topcon_box .conbox .tcon em").click(function () {

        if ($("#container .topcon_box .conbox ul").height() == 0) {
            $("#container .topcon_box .conbox ul").animate({
                "height": $(window).height() - 57
            }, 600);
        } else {
            $("#container .topcon_box .conbox ul").animate({
                "height": "0px"
            }, 400);
        }

    });

});
//---------------------------
//---------------------------
//---------------------------
//---------------------------

function check_win_login() {
    var objw = check_objw();

    $("#container .h_login_box .m_con .m_text").css("width", objw * (94 / 100) * (98 / 100) - 70 - 10);
    $("#container .h_login_box .m_con .m_text1").css("width", objw * (94 / 100) * (98 / 100) - 70 - 10 - 90);

}


//---------------------------
//---------------------------

function check_win_reg() {
    var objw = check_objw();

    $("#container .h_reg_box .m_con .m_text").css("width", objw * (94 / 100) * (98 / 100) - 80 - 10);

}

//---------------------------.h_home_box .h_news_con ul
//---------------------------

function check_win_home() {
    var objw = check_objw();

    $("#container .h_home_box .h_news_con ul, #container .h_home_box .h_news_con ul li").css("width", objw * (94 / 100) -
        48);
}

//---------------------------
//---------------------------

function check_win_member() {
    var objw = check_objw();

    if ($("#container .h_member_news ul li").length > 0) {

        $("#container .h_member_news ul li span").css("width", objw * (94 / 100) * (98 / 100) - 11 - 70);

    }

}


//---------------------------
//---------------------------

function check_win_updatepwd() {
    var objw = check_objw();

    $("#container .h_updatepwd_box .m_con .m_text").css("width", objw * (94 / 100) - 75 - 20);

}

//---------------------------
//---------------------------

function check_win_news() {
    var objw = check_objw();

    if ($("#container .h_news_box ul li").length > 0) {

        $("#container .h_news_box ul li span").css("width", objw * (94 / 100) * (98 / 100) - 11 - 70);

    }

}
//---------------------------
//---------------------------

function check_win_getcash() {
    var objw = check_objw();

    if ($("#container .h_getcash_box .m_con input").hasClass("m_text") == true) {
        $("#container .h_getcash_box .m_con .m_text").css("width", objw * (94 / 100) - 78 - 25 - 22);

        $("#container .h_getcash_box .m_con .m_text1").css("width", objw * (94 / 100) - 91 - 22);
    }

}

//---------------------------
//---------------------------

function check_win_conaddedit() {
    var objw = check_objw();

    $("#container .h_conaddedit_box .wcon2 i").css("width", objw - objw * (6 / 100) - 70);
    $("#container .h_conaddedit_box .wcon4 .f_text").css("width", objw - objw * (6 / 100) - 70 - 22);

}

//---------------------------
//---------------------------

function check_win_pubvideo() {
    var objw = check_objw();

    $("#container .h_search_box .s_text").css("width", objw * (94 / 100) * (94 / 100) - 36 - 15);

    if ($("#container .h_pubvideo_box dl").length > 0) {
        $("#container .h_pubvideo_box dl dt, #container .h_pubvideo_box dl dt img").css("height", objw * (96 / 100) * (
            35 / 100) * (150 / 200));
    }

}

//---------------------------
//---------------------------

function check_win_conlist() {
    var objw = check_objw();

    $("#container .h_search_box .s_text").css("width", objw * (96 / 100) - 22 - 45 - 5);

    if ($("#container .h_conlist_box ul").length > 0) {
        var str_jw1 = objw * (96 / 100) - 2;
        $("#container .h_conlist_box ul li").css("width", str_jw1);
        $("#container .h_conlist_box ul li dl dt, #container .h_conlist_box ul li dl dt img").css("height", str_jw1 * (
            94 / 100) * (35 / 100) * (150 / 200));
    }

}

//---------------------------
//---------------------------

function check_win_inexrecord() {
    var objw = check_objw();

    if ($("#container .h_inexrecord_box dl").length > 0) {
        var str_jw1 = objw * (94 / 100) - 2;
        $("#container .h_inexrecord_box dl").css("width", str_jw1);
    }

}

//---------------------------
//---------------------------

function check_win_invcode() {
    var objw = check_objw();

    if ($("#container .h_invcode_box dl").length > 0) {
        var str_jw1 = objw * (94 / 100) - 2;
        $("#container .h_invcode_box dl").css("width", str_jw1);
    }

}

//---------------------------
//---------------------------

function check_win_sharelist() {
    var objw = check_objw();

    if ($("#container .h_sharelist_box .conbox dl").length > 0) {
        var str_jw1 = objw * (94 / 100) - 40 - 15;
        $("#container .h_sharelist_box .conbox dl dt").css("width", str_jw1);
    }

}

//---------------------------
//---------------------------

function check_win_invitedagent() {
    var objw = check_objw();

    if ($("#container .h_invitedagent_box dl").length > 0) {
        var str_jw1 = objw * (94 / 100) - 2;
        $("#container .h_invitedagent_box dl").css("width", str_jw1);
    }

}

//---------------------------
//---------------------------

function check_win_feedback() {
    var objw = check_objw();

    if ($("#container .h_feedback_box dl").length > 0) {
        var str_jw1 = objw * (94 / 100) - 2;
        $("#container .h_feedback_box dl").css("width", str_jw1);
    }

}

//---------------------------
//---------------------------

function check_win_feedbacksub() {
    var objw = check_objw();

    $("#container .h_feedbacksub_box .f_textarea").css("width", objw * (94 / 100) - 22);

}

//---------------------------
//---------------------------

function check_win_agreement() {
    var objw = check_objw();

    $("#container .toptitle_xy_box p").css("width", objw);
    $("#container .toptitle_xy_box p").css("marginLeft", -(objw / 2));

}

//---------------------------
//---------------------------

function check_win_playlist() {
    var objw = check_objw();

    if ($("#container .h_playlist_box dl").length > 0) {
        var str_jw1 = objw * (96 / 100) - 2;
        $("#container .h_playlist_box dl").css("width", str_jw1);
        $("#container .h_playlist_box dl dt, #container .h_playlist_box dl dt img").css("height", str_jw1 * (94 / 100) * (35 / 100) * (180/ 200));

        $("#container .h_playlist_box dl dd span").css("min-height", str_jw1 * (94 / 100) * (35 / 100) * (150 / 200) -30);
    }

}

//---------------------------
//---------------------------

function check_win_playvideo() {
    var objw = check_objw();

    if ($("#container .h_playvideo_box .h_video video").length > 0) {
        if (objw >= 640) {
            $("#container .h_playvideo_box .h_video video").css("width", 640);
            $("#container .h_playvideo_box .h_video video").css("height", 640 * (3 / 4));
        } else {
            $("#container .h_playvideo_box .h_video video").css("width", objw);
            $("#container .h_playvideo_box .h_video video").css("height", objw * (3 / 4));
        }

    }

}



//---------------------------
//---------------------------

function check_win_textvideo() {
    var objw = check_objw();

    if (objw >= 640) {
        $("#container .f_padheght f_padheght").css("width", 640);
        $("#container .f_padheght .h_video video").css("height", 640 * (3 / 4));
    } else {
        $("#container .f_padheght .h_video video").css("width", objw);
        $("#container .f_padheght .h_video video").css("height", objw * (3 / 4));
    }

    $("#container .f_padheght .h_textcon").css("width", objw * (94 / 100) - 12);

}
//---------------------------
//---------------------------

function Close_notice() {
    $(".win_update_box").slideUp(300);
}
//---------------------------
//---------------------------

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
//---------------------------
//---------------------------

function check_prolist() {
    $('#dlbox > dl').each(function () { //遍历
        //alert($(this).find("dd").height());

        if (($(this).find("dd").height() + 10) >= ($(this).find("dt").height())) {
            $(this).find("dt").css('height', ($(this).find("dd").height() + 10) + 'px');
        } else {
            $(this).find("dd").css('height', ($(this).find("dt").height() - 10) + 'px');
        }

    });
}

//---------------------------
//---------------------------

function Shrinkimg(sID, showimg, iwidth, iheight) {

    var setimg = new Image();
    setimg.src = showimg;

    if (setimg.width > 0 && setimg.height > 0) {
        if (setimg.width / setimg.height >= iwidth / iheight) {
            if (setimg.width > iwidth) {
                sID.css('width', iwidth);
                sID.css('height', (setimg.height * iwidth) / setimg.width);
                sID.css('marginTop', (iheight - (setimg.height * iwidth) / setimg.width) / 2);
            } else {
                sID.css('width', setimg.width);
                sID.css('height', setimg.height);
                sID.css('marginTop', (iheight - setimg.height) / 2);
            }
        } else {
            if (setimg.height > iheight) {
                sID.css('width', (setimg.width * iheight) / setimg.height);
                sID.css('height', iheight);
                sID.css('marginTop', 0);
            } else {
                sID.css('width', setimg.width);
                sID.css('height', setimg.height);
                sID.css('marginTop', (iheight - setimg.height) / 2);
            }
        }
    }

}