<? include('../system/inc.php');include('check.php');?>

<!DOCTYPE html>
<html>
<head>
  <link href="//vjs.zencdn.net/7.1.0/video-js.css" rel="stylesheet">
  <script src="//vjs.zencdn.net/7.1.0/video.js"></script>
  <style>
    html,body{margin: 0;padding:0;}
  </style>
</head>
<body>
    <video id="my-video" class="video-js vjs-big-play-centered" controls preload="auto">
    <source id="source" src="">
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
  </video>
  <script type="text/javascript">
    src=GetQueryString('src');
    if (src) {
      src=decodeURIComponent(src);
      document.getElementById('source').src=src;
      var player = videojs('my-video').on('canplay', function() {
        if (parent.layer) {
          var index = parent.layer.getFrameIndex(window.name)
          parent.layer.style(index, {
            width: this.videoWidth()+1,
            height: this.videoHeight()+1,
            top:(parent.window.innerHeight-this.videoHeight())/2,
            left:(parent.window.innerWidth-this.videoWidth())/2
          })
        }
        // parent.layer.iframeAuto(index)
      })
    }
    function GetQueryString(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return r[2];
        return null;
    }
    </script>
</body>
</html>