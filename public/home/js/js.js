/**
 * Created by sf on 2017/10/14.
 */

function isLogin() {
    if (vdouwTool.getCookie('memberUserCookie')) {
        return true;
    } else {
        //vdouwTool.setCookie('recordUrl', location.href);
        dialog.confirm('请先登录', '/index.php/home/login/index');
        // dialog.error('请先登录');
        // return false;
    }
}
