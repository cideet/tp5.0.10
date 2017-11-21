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
401 未授权 <br>
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

写接口的时候，先把debug关了 <br>

APP-API数据安全 <br>
基本参数放入header <br>
每次http请求都携带唯一的sign <br>
请求参数、返回数据按安全性适当加密 <br>
access_token，登录时获取 <br>

每次http请求，必须得验证请求的合法性，所以引入sign。可以放在header，也可以放在body里面。 <br>
建议放在header头里，body里面就放一些业务相关的字段。 <br>
基本参数每次请都放入header，比如: <br>
Content-Type => application/x-www-form-urlencoded <br>
sign => sdfsdfs <br>
version => 版本号 <br>
app_type => android <br>
did => 设备号 <br>
model => 浏览器适配号，比如sanxing5.6 <br>

API接口的数据安全解决方案之授权码sign解剖 <br>
sign加密需要客户端工程师做，解密需要服务端工程师做 <br>
测试Aes加密 =》application/api/controller/Common.php->testAes1 <br>
测试Aes解密 =》application/api/controller/Common.php->testAes2 <br>

获取服务器时间戳（记得是get方式） <br>
http://127.0.0.65/index.php/api/getservicetimestamp <br>

获取分类（记得是get方式） <br>
http://127.0.0.65/index.php/api/testgetallcategory <br>

版本控制 <br>
不同版本号，放入不同的文件夹，比如v1/v2 <br>
postman中输入以下链接，对比查看效果： <br>
http://127.0.0.65/index.php/api/v1/testgetallcategory <br>
http://127.0.0.65/index.php/api/v2/testgetallcategory <br>

API接口文档编写 <br>
有利于客户端工程师熟悉接口 <br>
有利于服务端工程师接手接口 <br>
经过对比， 用http://doc.oschina.net 编写接口文档比较不错 <br>
右上角记得有个“切换团队” <br>
公开的接口文档：http://zhangsanfeng_test2.mydoc.io/ <br>
输入密码可访问的接口文档：http://doc.oschina.net/zhangsanfeng_test1 <br>
团队文档：http://doc.oschina.net/vdouw_team_test1 <br>

React <br>
npm install webpack webpack-dev-server extract-text-webpack-plugin open-browser-webpack-plugin optimize-css-assets-webpack-plugin --save-dev <br>
npm install babel-core babel-loader babel-plugin-react-transform babel-preset-latest babel-preset-react --save-dev <br>
npm install autoprefixer css-loader@0.28.7 cssnano file-loader html-loader html-webpack-plugin img-loader json-loader less@2.7.2 less-loader@4.0.5 postcss@6.0.8 postcss-loader@1.3.3 style-loader@0.18.2 url-loader@0.5.9 --save-dev <br>
npm install react-transform-hmr ---save-dev 安装这个才能实现热替换的功能<br>
npm install koa@1.2.2 koa-body@1.6.0 koa-router@5.4.0 --save-dev <br>
npm install es6-promise --save <br>
npm install immutable react@15.6.1 react-addons-css-transition-group react-addons-perf react-addons-pure-render-mixin react-dom@15.6.1 react-redux react-router@2.8.1 react-router-dom@4.2.2 redux whatwg-fetch --save <br>
npm install react-swipe swipe-js-iso --save <br>










<br><br><br><br><br>
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






