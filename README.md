ThinkPHP 5.0 <br>

config调用方法：<br>
config('config.myname') <br>

allowField(true)的作用：存数据库的时候，过滤掉数据表中没有的字段，防止报错。 <br>
$this->allowField(true)->add($data); <br>

$user=model('AdminUser')->get(['username'=>$data['username']); <br>
ThinkPHP5提供的这个get方法不错 <br>

halt($data) == var_dump($data);exit; <br>

验证码配置：config.php <br>
'captcha'=>['imageH'=>50,'imageW'=>200] <br>

将post得到的数据，以URL参数的形式写入URL <br>
http_build_query()函数的作用是使用给出的关联（或下标）数组生成一个经过 URL-encode 的请求字符串 <br>
$data=input('param.');$query=http_build_query($data); <br>
具体查看 app_teacher_code/application/admin/controller/News.php 第10行 54行 <br>
app_teacher_code/application/admin/view/news/index.html 第67行 <br>
$query = http_build_query($data); <br>
'query' => $query, <br>
var url = '{:url("news/index")}'+'?{$query}'; <br>

回到来源的页面 <br>
return $this->result(['jump_url'=>$_SERVER['HTTP_REFERER'];]) <br>

restful api简介 <br>
获取用户信息 get /api/user/1 <br>
更新用户信息 put /api/user/1 <br>
新增用户信息 post /api/user <br>
删除用户信息 delete /api/user/1 <br>

HTTP状态码 <br>
200 请求成功 <br>
201 创建成功 <br>
202 更新成功 <br>
400 无效请求 <br>
401 地址不存在 <br>
403 禁止访问 <br>
404 请求资源不存在 <br>
500 内部错误 <br>

API数据结构格式 <br>
status 业务状态码 <br>
message 提示信息 <br>
data 数据层 <br>

TP5使用方法 <br>
Route::get <br>
Route::post <br>
Route::put <br>
Route::delete <br>
Route::resourse <br>

比如Route::resourse('blog','index/blog'); 对应的index模块的blog控制器 <br>
具体看一下TP5手册的96页，搜索“restful” <br>









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






