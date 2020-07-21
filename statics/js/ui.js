function hasKey(json, key) {
	if ($.isEmptyObject(json)) return false;
	if (json.hasOwnProperty(key)) {
		return true;
	} else {
		return false;
	};
}
//点击收起下拉框
$(document).click(function () {
	$('.select').removeClass('in').children('ul').slideUp('fast');
});
window.ui = {
	//下拉框
	select : function (obj) {
		$.each(obj, function () {
			var _t = $(this);
			var div = _t.children('div');
			var input = _t.children('input');
			var ul = _t.find('ul');
			var span = _t.find('span');
			ul.not(ul.first()).each(function () {
				if($(this).children().length) $(this).prev('span').addClass('haschild').click(function () {
					event.stopPropagation();
				});
			})
			.children().each(function () {
				var t = $(this);
				var i = $('<i>└─ </i>');
				var ul = t.parentsUntil(_t, 'ul');
				t.children('span').prepend( i.css('margin-left', 20*(ul.length-2)) );
			});
			span.click(function () {
				var t = $(this);
				if (!t.hasClass('haschild')) {
					var html = t.clone();
					html.find('i').remove();
					htmlval = html.html();
					htmlrel = html.attr('rel');
					/*div.html(html);
					input.val(html);*/
					div.html(html);
					input.val(htmlrel);

					html=='请选择'?_t.removeClass('selected'):_t.addClass('selected');
				};
			});

			_t.click(function () {
				event.stopPropagation();
				$('.select').removeClass('in').children('ul').slideUp('fast');
				var t = $(this);
				var ul = t.children('ul');
				t.offset().top + t.outerHeight() + ul.outerHeight() - $(document).scrollTop() > $(window).height()?ul.addClass('top'):ul.removeClass('top');
				ul.is(':hidden')?(t.addClass('in'),ul.slideDown()):(t.removeClass('in'),ul.slideUp('fast'));
			});
		});
	},
	//表格
	table : function(obj) {
		if (ui.table.prototype) {
			ui.table.prototype.checked = function () {
				return obj.find('tbody tr:not(.last_tr) input[type=checkbox]:checked').parents('tr');
			}
		};
		obj.each(function () {
			var thead = $(this).find('thead');
			var tbody = $(this).find('tbody');
			var tr = tbody.find('tr').filter(function () {
				return !$(this).hasClass('last_tr');
			});
			var all_check = thead.find('input[type=checkbox]').add(tbody.find('.last_tr').find('input[type=checkbox]'));
			var check = tr.find('input[type=checkbox]');
			var sort = thead.find('.sort');
			check.click(function () {
				var t = $(this);
				t.is(':checked')?t.parents('tr').addClass('in'):t.parents('tr').removeClass('in');
				check.filter(':checked').length == tr.length?all_check.prop('checked', true):all_check.prop('checked', false);
			});
			all_check.click(function () {
				$(this).is(':checked')?(check.add(all_check).prop('checked', true),tr.addClass('in')):(check.add(all_check).prop('checked', false),tr.removeClass('in'));
			});

			tr.each(function (i) {
				$(this).attr('index', i);
			});
			sort.each(function () {
				$(this).children('span').append($('<div class="icon_sort"><i class="icon-sort-asc"></i><i class="icon-sort-desc"></i></div>'));
			})
			.click(function () {
				var t = $(this);
				var icon_sort = t.find('.icon_sort');
				var sort_rule = null;
				var arr = [];
				sort.not(t).find('.icon_sort').removeClass('asc desc')
				if (icon_sort.hasClass('asc')) {
					icon_sort.removeClass('asc').addClass('desc');
					sort_rule = 'desc';
				} else if(icon_sort.hasClass('desc')){
					icon_sort.removeClass('desc');
				}else{
					icon_sort.addClass('asc');
					sort_rule = 'asc';
				}

				if (sort_rule == null) {
					for (var i = 0; i < tr.length; i++) {
						tbody.prepend(tr.eq(tr.length-1-i));
					}
				} else {
					tr.each(function (i) {
						arr[i] = {};
						arr[i]['sort'] = $(this).children().eq(t.index()).html();
						arr[i]['index'] = $(this).attr('index');
					});
					arr.sort(function(x, y){
						return sort_rule == 'asc'?y['sort'].localeCompare(x['sort']):x['sort'].localeCompare(y['sort']);
					})
					for (var i = 0; i < arr.length; i++) {
						tbody.prepend(tr.eq(arr[i]['index']));
					}
				}
			});
		});
	},
	copy : function (obj) {
		if (window.getSelection) {
			var range = document.createRange();
	        range.selectNode($(obj).prev()[0]);
	        window.getSelection().removeAllRanges();
	        window.getSelection().addRange(range);
			document.execCommand("Copy");
		}else if (window.clipboardData){
			window.clipboardData.setData('text',obj.innerHTML);
		}else{
			alert('浏览器不支持复制操作 请手动进行复制');
		}
	},
	mask : function (bool) {
		var obj = $('.mask');
		if (bool == false) {
			obj.remove();
			return false;
		};
		var div = $('<div class="mask"></div>');
		if (obj.length) {
			if (bool != true) obj.remove();
		}else{
			div.click(function () {
				$('.dialog').add(div).remove();
			});
			$('body').append(div);
			div.fadeTo('normal',0.7);
		};
	},
	prompt : function (bool, text) {
		if ($('.dialog').length > 0) return;
		ui.mask(true);
		var content = (bool == false)?'<i class="icon-exclamation-circle"></i><span class="text">请至少选择一个产品!</span>':'<i class="icon-check-circle"></i><span class="text">恭喜您,添加成功</span>';
		var div = $('<div class="dialog"><div class="dialog_tit"><span>系统提示</span><a class="dialog_close icon-cross" href="javascript:;"></a></div><div class="dialog_content ellipsis">'+content+'</div><div class="dialog_btn"><a class="dialog_confirm btn" href="javascript:;">确认</a></div></div>')
		if (text) div.find('.dialog_content').find('span').html(text);
		var dialog_close = div.find('.dialog_close');
		var dialog_confirm = div.find('.dialog_confirm');
		dialog_close.add(dialog_confirm).click(function () {
			div.remove();
			ui.mask(false);
		});
		$('body').append(div);
		div.fadeIn('fast');
	},
	dialog : function (json) {
		if ($('.dialog').length > 0) return;
		if (event.keyCode==13) return;
		ui.mask(true);
		var content = hasKey(json, 'text')?json.text:'<span class="text">删除后,您将无法恢复和常看该工单,请谨慎操作</span><p>您确认要删除该工单吗?</p>';
		var div = $('<div class="dialog dialog_prompt"><div class="dialog_tit"><span>系统提示</span><a class="dialog_close icon-cross" href="javascript:;"></a></div><div class="dialog_content ellipsis"><i class="icon-exclamation-circle"></i>'+content+'</div><div class="dialog_btn"><a class="dialog_cancel btn_aux" href="javascript:;">取消</a><a class="dialog_confirm btn" href="javascript:;">确认</a></div></div>')
		var dialog_close = div.find('.dialog_close');
		var dialog_cancel = div.find('.dialog_cancel');
		var dialog_confirm = div.find('.dialog_confirm');
		function close () {
			div.remove();
			ui.mask(false);
		};
		dialog_close.click(function () {
			close();
		});
		dialog_cancel.click(function () {
			close();
			if (hasKey(json, 'cancel') && typeof json.cancel == 'function') json.cancel();
		});
		dialog_confirm.click(function () {
			close();
			if (hasKey(json, 'confirm') && typeof json.confirm == 'function') json.confirm();
		});
		$('body').append(div);
		div.fadeIn('fast');
	},
	dialog_check : function (json) {
		if ($('.dialog').length > 0) return;
		ui.mask(true);
		var div = $('<div class="dialog dialog_prompt dialog_check"><div class="dialog_tit"><span>设置选项</span><a class="dialog_close icon-cross" href="javascript:;"></a></div><div class="dialog_content clearfix"><span class="dialog_check_tit">品牌</span><div class="dialog_check_box"><div class="dialog_check_content"><input type="text" name=""><a class="icon-plus-square" href="javascript:;"></a></div><p>点击 + 号输入选项名 , 再点击 + 号或回车完成添加</p></div></div><div class="dialog_btn"><a class="dialog_confirm btn" href="javascript:;">确认</a></div></div>')
		var dialog_close = div.find('.dialog_close');
		var dialog_confirm = div.find('.dialog_confirm');
		var dialog_plus = div.find('.icon-plus-square');
		var input = div.find('input');
		var arr = [];
		function close () {
			div.remove();
			ui.mask(false);
		};
		function push () {
			var val = input.val();
			var span = $('<span>'+input.val()+'<i></i></span>');
			span.children('i').click(function () {
				var parent = $(this).parent();
				var parent_text = parent.contents().filter(function() { return this.nodeType === 3; }).text();
				arr.splice($.inArray(parent_text, arr), 1);
				parent.remove();
			});
			if (val != '') {
				arr.push(val);
				input.before(span)
			};
			input.hide().val('');
		};
		dialog_close.on('click', close);
		dialog_confirm.click(function () {
			console.log(arr);
			close();
			if (hasKey(json, 'confirm') && typeof json.confirm == 'function') json.confirm(arr);
		});
		dialog_plus.click(function () {
			if (input.is(':hidden')) {
				input.show().focus();
			} else {
				push ();
			}
		});
		input.keydown(function (event) {
			if (event.keyCode==13) push ();
		});
		$('body').append(div);
		div.fadeIn('fast');
	},
	sort : function (json) {
		var items = json.items || 'li';
		var not = json.not || '.close';
		window.getSelection().removeAllRanges();

		json.obj.on('mousedown', not, function (event) {
			event.stopPropagation();
		});

		json.obj.on('mousedown', items, function (event) {
			var t = $(this);
			function getscroll (fx) {
				var stop = 0;
				t.parents().each(function () {
					var num;
					if (fx == 'top') {
						num = $(this).scrollTop();
					};
					if (fx == 'left') {
						num = $(this).scrollLeft();
					};
					if (num != 0) {
						stop = num;
						return false;
					};
				});
				return stop;
			};
			var	tWidth = t.outerWidth(),
				tHeight = t.outerHeight(),
				tLeft = t.position().left,
				tTop = t.position().top,
				tsLeft = tLeft + getscroll('left'),
				tsTop = tTop + getscroll('top'),
				sLeft = event.pageX - tsLeft,
				sTop = event.pageY - tsTop,
				index = t.index(),
				mbox = t.clone();
			t.css('visibility', 'hidden');
			mbox.css({
				position : 'absolute',
				opacity : 0.5,
				left : tsLeft,
				top : tsTop,
				width : tWidth
			});
			function move (event) {
				event.preventDefault()
				var mst = getscroll('top');
				var msl = getscroll('left');
				var left = event.pageX - sLeft,
					top = event.pageY - sTop;
				mbox.css({
					left : left,
					top : top
				});
				if ( top > (tTop + tHeight + mst) ) {
					t.next(items).after(t);
					tTop = t.position().top;
				};
				if ( (top + tHeight - mst) < tTop ) {
					t.prev(items).before(t);
					tTop = t.position().top;
				};
				if ( left > (tLeft + tWidth + msl) ) {
					t.next(items).after(t);
					tLeft = t.position().left;
				};
				if ( (left + tWidth - msl) < tLeft ) {
					t.prev(items).before(t);
					tLeft = t.position().left;
				};
			};
			function up () {
				$(this).off({
					'mousemove' : move,
					'mouseup' : up
				});
				mbox.remove();
				t.removeAttr('style');
				if (index != t.index() && typeof json.success == 'function') {
					json.success();
				};
			};
			$(document).on({
				'mousemove': move,
				'mouseup': up
			});
			t.parent().append(mbox);
		});
	},
	/*使用方法
	var throttled = ui.letter(function () {})
	$(window).scroll(throttled);
	*/
	letter : function (fn) {
		if (typeof arguments[0] != 'function') return;
		fn();
		var times = typeof arguments[1] != 'number'?300:arguments[1];
		var timer = null;
		var st = new Date().getTime();
		return function () {
			var et = new Date().getTime();
			if (et - st < times) {
				clearTimeout(timer);
				timer = setTimeout(function () {
					//return fn.apply(this,arguments);
					fn();
				}, times);
			} else{
				clearTimeout(timer);
				st = et;
				fn();
			};
		};
	}
};

$.fn.imgAuto = function(co){
	$(this).each(function(){
		var t = $(this);
		t.css('opacity',0);
		var cover = t.attr('img-Auto')=='cover'||co?true:false;
		var img = new Image();
		img.src = t.attr('src');
		var _w = t.attr('width');
		var _h = t.attr('height');
		if (_w && _h) {
			var box = $('<div class="imgAuto_box"></div>');
			box.css({
				width:_w,
				height:_h,
				"text-align":'left',
				overflow:'hidden'
			})
			t.wrapAll(box);
		} else{
			var box = t.parent();
		};
		function move (){
			if (img.width>0 || img.height>0) {
				t.css({'display':'block','margin':0}).parent().css('overflow', 'hidden');
				var i_w = img.width;//原图宽
				var i_h = img.height;//原图高
				var b_w = box.width();//父元素宽
				var b_h = box.height();//父元素高
				var t_w = (b_h/i_h) * i_w;//实际显示的图片宽
				var t_h = (b_w/i_w) * i_h;//实际显示的图片高
				if ( i_w/i_h < b_w/b_h ) {
					if (cover) {
						t.css({'width':'100%','height':'auto'}).css('margin-top', -(t_h-b_h)/2);
					}else{
						t.css({'width':'auto','height':'100%'}).css('margin-left', (b_w-t_w)/2);
					};
				}else{
					if (cover) {
						t.css({'width':'auto','height':'100%'}).css('margin-left', -(t_w-b_w)/2);
					}else{
						t.css({'width':'100%','height':'auto'}).css('margin-top', (b_h-t_h)/2);
					};
				};
			}else{
				setTimeout(move);
			}
		};
		move();
		t.fadeTo(2000, 1);
		var throttled = ui.letter(move);
		$(window).resize(throttled);
	});
	return this;
};
