ThinkPHP 5.0 <br>

config调用方法：<br>
config('config.myname') <br>

allowField(true)的作用：存数据库的时候，过滤掉数据表中没有的字段，防止报错。 <br>
$this->allowField(true)->add($data); <br>

验证码配置：config.php <br>
'captcha'=>['imageH'=>50,'imageW'=>200] <br>

PHP第三方登录 <br>
OAuth is short for open authorization <br>
理论学习地址：http://www.imooc.com/learn/557 <br>

QQ登录 <br>
http://www.imooc.com/learn/596 <br>
申请AppID和AppKey https://connect.qq.com <br>
已向QQ互联提交申请，等待中 <br>
20171101 <br>
Recorder.class.php 配置读写与session存取 <br>
URL.class.php 基于CURL库的GET和POST请求 <br>
Oauth.class.php Oauth相关URL动态拼接与token操作 <br>
每个QQ的openid具有唯一性，可以判断是否是第一次登录 <br>
基本完成，查看效果地址：http://blog.vdouw.com/plugins/qqlogin/ <br>

获取最后一条SQL <br>
echo $this->getLastSql(); <br>






