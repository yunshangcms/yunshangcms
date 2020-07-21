(function() {

	var $ = function(e) {
		return Array.prototype.slice.apply(document.querySelectorAll(e));
	};
	
	var getURLString = function(){
		return location.protocol + '//' +location.host;
	};
	
	var getRandom = function(){
		return new String(Math.random()).substring(2);
	};
	
	var getQueryString = function(name) { 
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i"); 
        var r = window.location.search.substr(1).match(reg); 
        if (r != null) return unescape(r[2]); 
        return null; 
    }
	
	var video_list = $('#video_list')[0];
	
	var pageIndex = 0,
		pageSize = 10,
		pageIndexName = 'page', // 设置分页码页参数名称
		pageSizeName = 'count', // 设置分页大小参数名称
		video_url = '/user.php'; // 设置请求地址
		item_url = '/shipin.php',  // 替换跳转链接
		item_img = 'thumbnail',  // 替换图片链接
		item_txt = 'title';  // 替换显示文本

	// 加载数据到页面
	var loadListItem = function(data) {
		var list = data.package;
		var uid = getQueryString('uid');
		if(list.length==0) {
			return alert('已经到底！');
		}
		var tmp =
			'<a class="video-list-item" href="$url" target="_self">' +
			'<div class="video-list-item__image">' +
			'<img src="$img" width="100%">' +
			'</div>' +
			'<div class="video-list-item__label">' +
			'$txt' +
			'</div>' +
			'</a>';
		var htmlStr = '';
		for(var idx = 0, siz = list.length; idx < siz; idx++) {
			var dat = list[idx];
			htmlStr +=
				tmp
				.replace('$url', item_url+'?id='+dat.res_id+'&uid='+uid+'&time='+getRandom())
				.replace('$img', dat[item_img])
				.replace('$txt', dat[item_txt])
			;
		}
		video_list.innerHTML += htmlStr;
	};

	/**
	 * 加载视频列表
	 */
	var loadVideoList = function() {
		var uid = getQueryString('uid');
		axios.get(
			[getURLString(), video_url, '?json=1&', pageIndexName,'=',pageIndex, '&', pageSizeName, '=', pageSize, '&', 'uid', '=', uid].join('') 
			).then(function(res){
			loadListItem(res.data);
		}).catch(function(res){
//			alert('请求错误:'+JSON.stringify(res))
		});
		pageIndex++;
	};
	
	/**
	 * 判断是否是微信浏览器的函数
	 */
	var isWeiXin = function (){
			var ua = window.navigator.userAgent.toLowerCase();
			if(ua.match(/MicroMessenger/i) == 'micromessenger'){
				return true;
			}else{
				return false;
			}
		}

	// 更多事件绑定
	if(isWeiXin()){
		$('#more')[0].addEventListener('touchend', loadVideoList)
	}else{
		$('#more')[0].addEventListener('click', loadVideoList)
	}

	// 首次加载数据
	loadVideoList();

}())