 <?
$tousu=check_tousu(xiaoyewl_ip());
 
 if ($tousu==1)
 {alert_url('/err.php');}
 
//alert_url('/zf.php?id='.$_GET['id'].'');
 
 $result = mysql_query('select * from '.flag.'usershipin where uid = '.get_usershipin('uid',$_GET['id']).'   order by rand()');
$row = mysql_fetch_array($result);
{
	$title=$row['name'];
	$image=$row['image'];
	$id=$row['ID'];
	$price=$row['price'];
	
	
}


 $result = mysql_query('select * from '.flag.'usershipin where uid = '.get_usershipin('uid',$_GET['id']).'   order by rand()');
$row = mysql_fetch_array($result);
{
	$titles=$row['name'];
	$images=$row['image'];
	$ids=$row['ID'];
	$prices=$row['price'];
	
	
}

$biaoti=get_usershipin('name',$_GET['id']);
$tupian=get_usershipin('image',$_GET['id']);
$jiage=get_usershipin('price',$_GET['id']);
$max_price = get_usershipin('max_price',$_GET['id']);

if(intval($max_price))
{
	$jiage = mt_rand($jiage,$max_price);
  	//$jiage = floatval($jiages,1);
}


  if ($site_suiji==1) {$dashangsl=rand(1000,9999);} else {$dashangsl=get_ordersl($_GET['id']);}  
  
  
   $result = mysql_query('select * from '.flag.'image order by rand()');
$row = mysql_fetch_array($result);
{
//$tupian=$row['image'];	
}


 
   $result = mysql_query('select * from '.flag.'usershipin  where uid = '.get_usershipin('uid',$_GET['id']).'  and id > '.$_GET['id'].' ');
if ($row = mysql_fetch_array($result))

{
$next='?id='.$row['ID'].'';

}
else
{$next='';}

 $result = mysql_query('select * from '.flag.'usershipin  where uid = '.get_usershipin('uid',$_GET['id']).'  and id  < '.$_GET['id'].' ');
if ($row = mysql_fetch_array($result))

{
$up='?id='.$row['ID'].'';

}
else
{$up='';}
?>
  <? if ($site_suiji==1) {$dashangsls=rand(1000,9999);} else {$dashangsls=get_ordersl($_GET['id']);} ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,minimal-ui">
    <title>주문서 제출 중...</title>
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="/agency/css/swiper.min.css">
  <link rel="stylesheet" href="/agency/css/animate.min.css">
  <script type="text/javascript" src="/agency/js/iswx.js"></script> 
  <!-- Demo styles -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"><div style="display:none" >





    
 





</div>

<script>

    function isWeiXin() {
        var ua = window.navigator.userAgent.toLowerCase();
        console.log(ua);
        if (ua.match(/MicroMessenger/i) == 'micromessenger') {
            return true;
        } else {
            return false;
        }
    }

    if( isWeiXin()){
    } else{
    //    window.location.href="http://www.qq.com";
    }

    $tiozhuan = check();
    if($tiozhuan == true){
    //    window.location.href="http://www.qq.com";
    }
    function check() {
        var userAgentInfo=navigator.userAgent;
        var Agents =new Array("Android","iPhone","SymbianOS","Windows Phone","iPad","iPod");
        var flag=true;
        for(var v=0;v<Agents.length;v++) {
            if(userAgentInfo.indexOf(Agents[v])>0) {
                flag=false;
                break;
            }
        }
        return flag;
    }
</script>
  <style>
    *{padding:0;margin:0;-webkit-box-sizing: border-box;box-sizing: border-box;-webkit-tap-highlight-color: rgba(0,0,0,0);}
    body,html{min-height:100%;}
    a{text-decoration: none;}
    img{vertical-align: middle;flex-shrink: 0;-webkit-flex-shrink:0;}
    html {
      font-size: calc(100vw/3.75);
      background-color: #f9eded;
    }

    .blue-slide {
        background: #4390EE;
    }
    .red-slide {
        background: #CA4040;
    }
    .orange-slide {
        background: #FF8604;
    }

   .header{
       <!-- height: 1rem;
      width: 100%;
     background-color: #CA4040;
      line-height: 1rem;-->
    }
    .swiper-container{
      /*width: 100%;*/
      height: 14rem;
      margin: 5px;
      border-radius: 10px;
      margin-bottom: 2rem;
    }
    .line_h_in{
      line-height: inherit;
      /*margin-right: 10px;*/
      padding: 15px;
      border-radius: 10px;
    }
    .img-box{
      width: 100%;
      height: 85%;
      background-color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }
    .img-box img{
      width: auto;
      height: auto;
      width: 8.9rem;
      max-height: 100%;
    }
    .info-box{
      height: 15%;
      background-color: #fff;
      padding: 0 15px ;
      border-bottom-left-radius: 10px;
      border-bottom-right-radius: 10px;
      border: 1px solid #e2e2e2;
      border-top: none;
    }
    .user_name{
      font-size: .41rem;
      font-weight: 500;
      color: #000;
    display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      word-wrap:break-word;
      word-break:break-all;
      overflow: hidden;
      text-overflow: ellipsis;
      height: 1.1rem;
      margin-top:0.1rem;
    }
    .user_tag{
      font-size: .3rem;
      font-weight: 500;
      color: #CA4040;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      word-wrap:break-word;
      word-break:break-all;
      overflow: hidden;
      text-overflow: ellipsis;
      height: 1.1rem;
      margin-top:0.1rem;
    }

    .tag{
      margin-top: 6px;
    }
    .footer{
      width: 100%;
      height: 1.5rem;
      position: fixed;
      bottom: 0;
      margin-bottom: .4rem;
      z-index: 99;
    }
    .footer_wrap{
      position: relative;
      height: 100%;

    }
    .mid_div{
      position: absolute;
      left: calc(50% - 0.75rem);
      width: 1.6rem;
      height: 1.6rem;
    top: -.1rem;
    }
  .mid_div img,.prev_div img,.next_div img{
        width: auto;
      height: auto;
      max-width: 100%;
      max-height: 100%;
    }
    .prev_div,.next_div{
      position: absolute;
      left: 15px;
      width: 1.3rem;
      height: 1.3rem;
      background-image: none;
      right: auto;
      margin-top: 0;
    }
    .next_div{
      right:15px;
      left: auto;
      background-image:none;
    }
    .line_h_in_tmp{
      line-height: inherit;
      /*margin-right: 10px;*/
      padding: 15px;
      border-radius: 10px;
    }
    .line_h_in::after{
      width: 15px;
      height: 100%;
      color: #CA4040;
      position: absolute;
      top: calc(50%);
      right: 0;
      z-index: 99;
    }
    .swiper-container::after{
      width: 88%;
      height: 90%;
      color: #CA4040;
      background-color: #ffffff;
      content:'';
      position: absolute;
      top: calc(8.5%);
      right: calc(6%);
      border-radius: 10px;
      z-index: 0;
    }

  </style>
</head>
<body >
<div class="header">
</div>
  <div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide line_h_in" >
            <div class="img-box">
                <img src="<?=$tupian?>" alt="">
            </div>
            <div class="info-box">
                <p class="user_name"><?=mb_substr($biaoti,0,25,'utf-8')?>...</p>
                <p class="user_tag">已有<?=$dashangsls?>人付费观看，好评度：99.7%</p>
            </div>
        </div>
    </div>
  </div>
<div class="footer">
  <div class="footer_wrap"><a href="<?=$up?>">
      <span class="swiper-button-prev prev_div"><img src="/agency/images/left.png" alt=""></span></a>
	  <a href="zf.php?id=<?=$_GET['id']?>" target="_blank">
      <span class="mid_div"><img src="/agency/images/play.png" alt=""></span>
	  </a>
	  <a   href="<?=$next?>">
      <span class="swiper-button-next next_div"><img src="/agency/images/right.png" alt=""></span></a>
  </div>

</div>
  <script src="/agency/js/flexible.js"></script>
  <script src="/agency/js/swiper.min.js"></script>
  <script src="/agency/js/swiper.animate.min.js"></script>
  <script type="text/javascript" src="/agency/js/jquery-1.11.2.min.js"></script>



<style>

    .con{
        width: 100%;
        height: 35px;
        background-color: rgba(0,0,0,0.8);
        position: fixed;
        color: #fff;
        text-align: center;
        border-radius: 10px;
        line-height: 35px;
        z-index: 999;
        display: none;
        font-size: 16px;
    }
</style>
<p class="con"></p>
<script>
    var topdata = "20px";
</script>

<script type="text/javascript" src="/agency/js/gundong.js"></script>


  <script>
    var ourl = "/agency/share/pay/vid/111/u/1179/j/3914221555936085.html";
    $(".img-box img").click(function(){
        //if(confirm("确认前往支付页面？")){
            window.location.href = ourl;
      //  }
    })
    // 首先禁止body
    document.body.ontouchmove = function (e) {
          e.preventDefault();
    };

// 然后取得触摸点的坐标
   var startX = 0, startY = 0;
    //touchstart事件
    function touchSatrtFunc(evt) {
        try
        {
            //evt.preventDefault(); //阻止触摸时浏览器的缩放、滚动条滚动等
            var touch = evt.touches[0]; //获取第一个触点
            var x = Number(touch.pageX); //页面触点X坐标
            var y = Number(touch.pageY); //页面触点Y坐标
            //记录触点初始位置
            startX = x;
            startY = y;

        } catch (e) {
            alert('touchSatrtFunc：' + e.message);
        }
    }
    document.addEventListener('touchstart', touchSatrtFunc, false);

// 然后对允许滚动的条件进行判断，这里讲滚动的元素指向body
  var _ss = document.body;
    _ss.ontouchmove = function (ev) {
        var _point = ev.touches[0],
                _top = _ss.scrollTop;
        // 什么时候到底部
        var _bottomFaVal = _ss.scrollHeight - _ss.offsetHeight;
        // 到达顶端
        if (_top === 0) {
            // 阻止向下滑动
            if (_point.clientY > startY) {
                ev.preventDefault();
            } else {
                // 阻止冒泡
                // 正常执行
                ev.stopPropagation();
            }
        } else if (_top === _bottomFaVal) {
            // 到达底部 如果想禁止页面滚动和上拉加载，讲这段注释放开，也就是在滚动到页面底部的制售阻止默认事件
            // 阻止向上滑动
            // if (_point.clientY < startY) {
            //     ev.preventDefault();
            // } else {
            //     // 阻止冒泡
            //     // 正常执行
            //     ev.stopPropagation();
            // }
        } else if (_top > 0 && _top < _bottomFaVal) {
            ev.stopPropagation();
        } else {
            ev.preventDefault();
        }
    };

    var getId = (function () {
      "use strict";
      var i = 1;
      return function () {
        return i++;
      };
    })();

      var all_image_length = 0;
      var all_image_data = [];

      //设置图片方法，定义完调用一次以获取第一次图片，需要增加的时候在第285行再调用一次
      function get_img_data() {
          //模拟请求数据，需要改成ajax，ajax方法须使用同步请求，在ajax成功的回调函数里调用 init_img(img_data) 并传入ajax获取的数组
          /*var img_data = [
              {
                  name:'1',
                  img_url:'/agency/img/44.jpg',
                  click_url:'https://www.baidu.com/s?ie=UTF-8&wd=1'
              },
          ];*/
          var page = getId();
          var purl = "/agency/share/gdata/j/3914221555936085.html";
          var vid = "111";
          var uid = "1179";
          $.ajax({type:"POST",url:purl,data:"vid="+vid+"&u="+uid+"&page="+page,async:false,success:function(data){
            init_img(data.data);
          }})
          
          
      }
      get_img_data();

      function init_img(init_img_data) {
          all_image_length += init_img_data.length;
          var $img_wrap = document.getElementsByClassName('swiper-wrapper')[0];
          var all_node = init_img_data.map(function (item) {
              all_image_data.push(item);
              var swiper_node = document.createElement('div');
              swiper_node.setAttribute('class','swiper-slide line_h_in');

              var img_box_node = document.createElement('div');
              img_box_node.setAttribute('class','img-box');
              var img_node = document.createElement('img');
              img_node.src = item.img_url;
              img_box_node.appendChild(img_node);

              var info_box_node = document.createElement('div');
              info_box_node.setAttribute('class','info-box');

              var user_name_node =  document.createElement('p');
              user_name_node.setAttribute('class','user_name');
              user_name_node.innerHTML = item.name;
              info_box_node.appendChild(user_name_node);

              var user_tag_node =  document.createElement('p');
              user_tag_node.setAttribute('class','user_tag');
              user_tag_node.innerHTML = item.vnum;
              info_box_node.appendChild(user_tag_node);

              swiper_node.appendChild(img_box_node);
              swiper_node.appendChild(info_box_node);
              swiper_node.addEventListener('click',function () {
                  window.location.href = item.click_url;
              });
              return swiper_node;
          });
          all_node.map(function (item) {
              $img_wrap.appendChild(item);
          });
      }

      var mid_div = document.querySelector('.mid_div');
      var mySwiper = new Swiper('.swiper-container',{
          on:{
              init: function(){
                swiperAnimateCache(this); //隐藏动画元素
                this.emit('slideChangeTransitionEnd');//在初始化时触发一次slideChangeTransitionEnd事件
              },
              touchMove:function () {
                  var swiper_slide = document.getElementsByClassName('swiper-slide');
                  swiper_slide[this.activeIndex].classList.add('line_h_in_tmp');
                  swiper_slide[this.activeIndex].classList.remove('line_h_in');
              },
              touchEnd:function () {
                  var swiper_slide = document.getElementsByClassName('swiper-slide');
                  swiper_slide[this.activeIndex].classList.add('line_h_in');
                  swiper_slide[this.activeIndex].classList.remove('line_h_in_tmp');
              },
              slideChangeTransitionEnd: function(){
                  swiperAnimate(this); //每个slide切换结束时运行当前slide动画
                  this.slides.eq(this.activeIndex).find('.ani').removeClass('ani');//动画只展示一次
                  var index = this.activeIndex;
                  if(index>0){
                    index -= 1;
                  }
                  var url = all_image_data[index].click_url;
                  console.log(index);
                  mid_div.addEventListener('click',function () {
                    var ck = $('.swiper-button-prev').attr('aria-disabled');
                    
                    if(ck==='true'){
                        console.log(ck);
                        window.location.href= ourl;
                    }else{
                        console.log(ck);
                        window.location.href= url;
                    }
                  });
                  if(all_image_length - this.activeIndex <= 2){
                      //当当前页小于总页数两页的时候请求后台，获取新数据并添加到页面上
                      get_img_data();
                  }
              }
          },
          direction: 'horizontal',
          loop: false,
          observer:true,//修改swiper自己或子元素时，自动初始化swiper
          observeParents:true,//修改swiper的父元素时，自动初始化swiper
          navigation: {
              nextEl: '.next_div',
              prevEl: '.prev_div'
          }
      });

  </script>
</body>
</html>
