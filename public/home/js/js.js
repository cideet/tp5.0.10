/**
 * Created by sf on 2017/10/14.
 */

/**
 * 前端判断是否登录
 * recordUrl的作用是：记录当前网址，登录后跳转回来
 * @returns {boolean}
 */
function isLogin() {
    if (!vdouwTool.getCookie('memberUserCookie')) {
        vdouwTool.setCookie('recordUrl', location.href);
        dialog.confirm('请先登录', '/index.php/home/login/index');
    }
}

