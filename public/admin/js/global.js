/**
 * Created by zhangsf on 2016/11/7.
 */

var dialog = {
    // 错误弹出层
    error: function (message) {
        layer.open({content: message, icon: 2, title: '错误提示'});
    },

    //成功弹出层
    success: function (message, url) {
        layer.open({
            content: message, icon: 1, yes: function () {
                location.href = url;
            }
        });
    },

    // 确认弹出层
    confirm: function (message, url) {
        layer.open({
            content: message, icon: 3, btn: ['是', '否'], yes: function () {
                location.href = url;
            }
        });
    },

    //无需跳转到指定页面的确认弹出层
    toconfirm: function (message) {
        layer.open({content: message, icon: 3, btn: ['确定']});
    }
};

$(function () {
    //多选
    $("[data-choice=more] span").click(function () {
        var i = $(this).find("i");
        if (i.hasClass("icon-check-empty")) {
            i.removeClass("icon-check-empty").addClass("icon-check");
        } else {
            i.removeClass("icon-check").addClass("icon-check-empty");
        }
    });

    //单选
    $("[data-choice=one] span").click(function () {
        var i = $(this).find("i");
        if (i.hasClass("icon-circle-blank")) {
            $(this).parents("[data-choice=one]").find("i.icon-ok-sign").removeClass("icon-ok-sign").addClass("icon-circle-blank");
            i.removeClass("icon-circle-blank").addClass("icon-ok-sign");
        }
        $(this).parents("[data-choice=one]").find("input").val($(this).attr("data-value"));
    });

    function vdouwSubmitFun(callback) {
        var flag = true;
        try {
            if (typeof callback != undefined) {
                if (callback() != true) {
                    flag = false;
                }
            }
        } catch (error) {
        }
        if (flag) {
            var data = $("#vdouw-form").serializeArray();
            var postData = {};
            $(data).each(function () {
                postData[this.name] = this.value;
            });
            console.log(postData);
            $.post(SCOPE.save_url, postData, function (result) {
                if (result.status == 1) {
                    return (dialog.success(result.message, SCOPE.jump_url));
                } else if (result.status == 0) {
                    return (dialog.error(result.message));
                }
            }, "JSON");
        }
    }

    //整站表单提交
    $("#vdouw_submit").click(function () {
        if (typeof submitValidateCallback == 'undefined') {
            vdouwSubmitFun();
        } else {
            vdouwSubmitFun(submitValidateCallback);
        }
    });

    //排序
    $('.listorder').blur(function () {
        var val = $(this).val();
        if (val == $(this).attr('data-value')) return false;
        var id = $(this).attr('data-id');
        var postData = {'id': id, 'listorder': val};
        console.log(postData);
        $.post(SCOPE.listorder_url, postData, function (result) {
            if (result.status == 1) {
                return (dialog.success(result.message, SCOPE.jump_url));
            } else if (result.status == 0) {
                return (dialog.error(result.message));
            }
        }, "json");
    });
    
});



