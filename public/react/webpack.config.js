/**
 * Created by zhangsanfeng on 2017/6/26.
 */

var fs = require('fs');
var path = require('path');
var webpack = require('webpack');
var htmlWebpackPlugin = require('html-webpack-plugin');
var ExtractTextPlugin = require('extract-text-webpack-plugin');
var OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
var OpenBrowserPlugin = require('open-browser-webpack-plugin');

var package = require('./package.json').dependencies;
var vendor = [];
for (var i in package) {
    vendor.push(i);
}

module.exports = {
    // entry: ['./src/index.jsx'],
    entry: {
        main: './src/index.jsx',
        vendor: vendor
        // vendor: Object.keys(packageJson.dependencies)
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: 'js/[name].[chunkhash:8].js'
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
                exclude: path.resolve(__dirname, 'node_modules'),       //绝对路径
                query: {presets: ['latest', 'react']}
            },
            {
                test: /\.css$/,
                use: ExtractTextPlugin.extract({
                    fallback: "style-loader?importLoaders=1",
                    use: ["css-loader", "postcss-loader"]
                })
                // use: ['style-loader', 'css-loader?importLoaders=1', 'postcss-loader']
            },
            {
                test: /\.less$/,
                use: ExtractTextPlugin.extract({
                    fallback: "style-loader?importLoaders=1",
                    use: ["css-loader", "postcss-loader", "less-loader"]
                })
                // loader: 'style-loader!css-loader!postcss-loader!less-loader'
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
                postcss: ()=> {
                    return [
                        require('autoprefixer')({
                            browsers: ['last 10 versions', 'ie>=8', '>1% in CN']
                        })
                    ]
                }
            }
        }),
        new webpack.DefinePlugin({
            'process.env': {
                'NODE_ENV': JSON.stringify('production')
            }
        }),
        new htmlWebpackPlugin({
            filename: 'index.html',
            template: './src/index.html',
            inject: 'body',
            chunks: ['vendor', 'main'],
            favicon:'./src/static/images/favicon.ico',
            minify: {
                removeComments: true,
                collapseWhitespace: true
            }
        }),
        new ExtractTextPlugin({
            filename: "css/[name].[chunkhash:8].css"
        }),
        new OptimizeCssAssetsPlugin({
            // assetNameRegExp: /\.optimize\.css$/g,
            cssProcessor: require('cssnano'),
            cssProcessorOptions: {discardComments: {removeAll: true}},
            canPrint: true
        }),
        new webpack.optimize.UglifyJsPlugin({
            sourceMap: true,
            minimize: true,
            compress: {warnings: false},
            output: {comments: false},
            minChunks: Infinity
        }),

        // 为组件分配ID最小的ID，通过这个插件webpack可以分析和优先考虑使用最多的模块
        new webpack.optimize.OccurrenceOrderPlugin(),

        new webpack.optimize.CommonsChunkPlugin('vendor')

    ]
};