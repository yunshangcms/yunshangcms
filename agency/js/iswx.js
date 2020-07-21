function is_weixin(){
    var ua = navigator.userAgent.toLowerCase();
    if(ua.match(/MicroMessenger/i) == "micromessenger"){
        return true;
    }else{
        return false;
    }
}

/*if (is_weixin()==false) {
    alert("非微信浏览器禁止访问");
    window.location.href = '../error.html';
    stop();
}*/

