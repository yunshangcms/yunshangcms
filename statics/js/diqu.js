function diqu(layer, form, box) {
    var diqu = $(box),
        init = function (parents) {
            parents.find('input:checkbox').each(function(index, el) {
                var t = $(el);
                var children = t.siblings('ul').find('input:checkbox').length;
                if (!children) return;
                var checked = t.siblings('ul').find('input:checkbox:checked').length;
                t.removeClass('layui-form-checked-some');
                if (checked) {
                    if (!t.is(':checked')) {
                        t.prop('checked', true);
                        init(parents);
                    }
                    if (checked != children) {
                        t.addClass('layui-form-checked-some');
                    }
                }else{
                    if (t.is(':checked')) {
                        t.removeProp('checked');
                        init(parents);
                    }
                }
            });
        }
    //checkbox事件
    form.on('checkbox(diqu)', function(data){
        var t = $(data.elem),
            layer = t.parents('ul'),
            parents = t.parents('li');
        if (layer.length != 3) {
            var group = parents.first().find('input:checkbox');
            if (data.elem.checked) {
                group.prop('checked', true);
            } else {
                group.removeProp('checked');
            }
        }
        init(parents);
        form.render('checkbox', 'diqu');
    });
    //防止选框超出
    $(box+'>ul>li>ul>li').on('mouseenter', function () {
        var t = $(this),
            popup = t.children('ul');
        if (diqu.outerWidth(true) - (t.position().left+popup.outerWidth(true)) < 20) {
            popup.addClass('diqu_popup_r');
            t.off('mouseenter');
        }
    });
    //初始化
    init(diqu);
}