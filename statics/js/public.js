$(function(){
	var sidebar_tool = 1;
	var sidebar2_tool = 1;
	var btn_sidebar = $('.sidebar_tool i');
	var btn_expand = $('.btn_expand');
	var btn_contract = $('.btn_contract');
	btn_expand.show();
	btn_contract.hide();
	$('.sidebar_tool').click(function(){
		sidebar_tool *= -1;
		if (sidebar_tool == -1) {
			btn_sidebar.removeClass('icon-dedent').addClass('icon-indent');
			$('.sidebar').addClass('sidebar_mini');
			$('.main').addClass('main_big');
			$('.sidebar2').addClass('sidebar2_mini2');
		}else{
			btn_sidebar.removeClass('icon-indent').addClass('icon-dedent');
			$('.sidebar').removeClass('sidebar_mini');
			$('.main').removeClass('main_big');
			$('.sidebar2').removeClass('sidebar2_mini2');
		};
	})
	btn_expand.add(btn_contract).click(function(){
		sidebar2_tool *= -1;
		if (sidebar2_tool == -1) {
			$('.sidebar2').addClass('sidebar2_mini');
			$('.content_box').addClass('content_big');
			btn_expand.hide();
			btn_contract.show();
		}else{
			$('.sidebar2').removeClass('sidebar2_mini');
			$('.content_box').removeClass('content_big');
			btn_expand.show();
			btn_contract.hide();
		};
	});

	var table = new ui.table($('.table'));
	// table.checked() 获取表格选中的tr元素
	ui.select($('.select'));
});

