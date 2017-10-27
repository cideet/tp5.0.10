/**
 * Created by sf on 2017/10/14.
 */

function isLogin() {
    if (vdouwTool.getCookie('memberInfo')) {
        return true;
    } else {
        dialog.error('请先登录');
        return false;
    }
}
