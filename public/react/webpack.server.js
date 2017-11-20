/**
 * Created by sf on 2017/8/6.
 */

var fs = require('fs');
var path = require('path');
var webpack = require('webpack');
var htmlWebpackPlugin = require('html-webpack-plugin');
var OpenBrowserPlugin = require('open-browser-webpack-plugin');
var app = new require('koa')();
var router = require('koa-router')();
var koaBody = require('koa-body')();

module.exports = {
    entry: [
        'webpack/hot/dev-server.js',
        'webpack-dev-server/client?http://localhost:1999',
        './src/index.jsx'
    ],
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'js/[name].bundle.js'
    },
    resolve: {
        extensions: ['.js', '.jsx']
    },
    module: {
        loaders: [
            {
                test: /\.(js|jsx)$/,
                loader: 'babel-loader',
                include: path.resolve(__dirname, 'src'),
                exclude: path.resolve(__dirname, 'node_modules'),
                query: {presets: ['latest', 'react']}
            },
            {
                test: /\.css$/,
                use: ['style-loader', 'css-loader?importLoaders=1', 'postcss-loader']
            },
            {
                test: /\.less$/,
                loader: 'style-loader!css-loader!postcss-loader!less-loader'
            },
            {
                test: /\.scss$/,
                loader: 'style-loader!css-loader!postcss-loader!sass-loader'
            },
            {
                test: /\.html$/,
                loader: 'html-loader'
            },
            {
                test: /\.tpl$/,
                loader: 'ejs-loader'
            },
            {
                test: /\.(jpe?g|png|gif|svg|ico)$/i,
                loaders: ['url-loader?limit=10000&name=assets/[name]-[hash:5].[ext]', 'img-loader']
            },
            {
                test: /\.(woff|woff2|ttf|eot)($|\?)/i,
                loader: 'url-loader?limit=5000&name=fonts/[name]-[hash:5].[ext]'
            }
        ]
    },

    plugins: [
        new webpack.LoaderOptionsPlugin({
            options: {
                postcss: function () {
                    return [
                        require('autoprefixer')({
                            browsers: ['last 10 versions', 'ie>=8', '>1% in CN']
                        })
                    ]
                }
            }
        }),

        new htmlWebpackPlugin({
            template: './src/index.html',
            favicon:'./src/static/images/favicon.ico'
        }),

        // 自动打开浏览器
        new OpenBrowserPlugin({
            url: 'http://localhost:1999'
        })
    ],

    devServer: {
        proxy: {
            // 凡是 `/api` 开头的 http 请求，都会被代理到 localhost:3000 上，由 koa 提供 mock 数据。
            // koa 代码在 ./mock 目录中，启动命令为 npm run mock
            '/api': {
                target: 'http://localhost:9527',
                secure: true
            }
        },
        // contentBase: "./public", //本地服务器所加载的页面所在的目录
        // colors: true, //终端中输出结果为彩色
        historyApiFallback: true, //不跳转
        inline: true, //实时刷新
        hot: true  // 使用热加载插件 HotModuleReplacementPlugin
    }

};


// test1
router.get('/', function *(next) {
    this.body = 'hello koa!';
});

// test2
router.get('/api', function *(next) {
    this.body = 'test data';
});

// 首页 超值特惠
var homeAdData = require('./mock/home/ad.js');
router.get('/api/homead', function *(next) {
    console.log('----mock/home/ad.js-----');
    console.log(this.params);
    this.body = homeAdData;
});

// 首页 猜你喜欢
var homeListData = require('./mock/home/list.js');
router.get('/api/homelist/:city/:page', function *(next) {
    console.log(this.params);
    this.body = homeListData;
});

// 搜索结果页 三个参数
var searchListData = require('./mock/search/list.js');
router.get('/api/search/:page/:city/:category/:keyword', function *(next) {
    console.log(this.params);
    this.body = searchListData;
});

// 搜索结果页 两个参数
var searchListData2 = require('./mock/search/list2.js');
router.get('/api/search/:page/:city/:category', function *(next) {
    console.log(this.params);
    this.body = searchListData2;
});

// 详情页 商户信息
const detailInfo = require('./mock/detail/info.js');
router.get('/api/detail/info/:id', function *(next) {
    console.log(this.params);
    this.body = detailInfo
});

// 详情页 用户评论
const detailComment = require('./mock/detail/comment.js');
router.get('/api/detail/comment/:page/:id', function *(next) {
    console.log(this.params);
    this.body = detailComment
});

// 订单列表
const orderList = require('./mock/orderlist/orderList.js');
router.get('/api/orderlist/:username', function *(next) {
    console.log(this.params);
    this.body = orderList;
});

// 提交评论
router.post('/api/submitComment', function *(next) {
// router.post('/api/submitComment',koaBody, function *(next) {
    this.body = {errno: 0, msg: 'ok'};
});

app.use(router.routes()).use(router.allowedMethods());
app.listen(9527);






