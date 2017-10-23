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

var vdouwTool = {
    //数据去重
    unique2: function ($array) {
        var res = [];
        var json = {};
        for (var i = 0; i < $array.length; i++) {
            if (!json[$array[i]]) {
                res.push($array[i]);
                json[this[i]] = 1;
            }
        }
        return res;
    },
    setCookie: function (name, value, iDay, iPath) {
        var oDate = new Date();
        iDay = arguments[2] ? arguments[2] : 7;
        iPath = arguments[3] ? arguments[3] : "/";
        oDate.setDate(oDate.getDate() + iDay);
        document.cookie = name + "=" + escape(value) + ";expires=" + oDate + ";path=" + iPath;
    },
    getCookie: function (name) {
        var arr = document.cookie.split("; ");
        for (var i = 0; i < arr.length; i++) {
            var arr2 = arr[i].split("=");
            if (arr2[0] == name) {
                return unescape(arr2[1]);
            }
        }
        return "";
    }
};


$(function () {
    //多选
    $(document).on("click", "[data-choice=more] span", function () {
        var i = $(this).find("i");
        var str = $(this).parents('[data-choice=more]').find('input').val();
        console.log(str + "|" + i.attr('data-id'));
        if (i.hasClass("icon-check-empty")) {
            var array1 = !!str ? str.split(',') : [];
            array1.push(i.attr('data-id'));
            var array111 = vdouwTool.unique2(array1);
            var strr = array111.toString();
            $(this).parents('[data-choice=more]').find('input').val(strr);
            i.removeClass("icon-check-empty").addClass("icon-check");
        } else {
            var array = str.split(',');
            var tmp = [];
            for (var k = 0; k < array.length; k++) {
                if (array[k] != i.attr('data-id')) {
                    tmp.push(array[k]);
                }
            }
            $(this).parents('[data-choice=more]').find('input').val(tmp.toString());
            i.removeClass("icon-check").addClass("icon-check-empty");
        }
        console.log($(this).parents('[data-choice=more]').find('input').val());
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

    //整站表单提交 函数
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
            console.log(data);
            var postData = {};
            $(data).each(function () {
                postData[this.name] = this.value;
            });
            if (typeof(ue) != 'undefined') {
                postData['content'] = ue.getContent(content);
            }
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

    //整站表单提交 触发
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



