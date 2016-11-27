/* global require,module */
const webpack = require('webpack');
var path = require('path');
var hotMiddlewareScript = 'webpack-hot-middleware/client?path=/__webpack_hmr&timeout=20000&reload=true';
const merge = require('webpack-merge');
let webpackBaseConfig = require('./webpack.config.base');

webpackBaseConfig.entry.main.push(hotMiddlewareScript);
module.exports = merge(webpackBaseConfig, {
    output: {
        publicPath: '/script',
        path: '/',
        filename: '[name].build.js'
    },
    devtool: '#eval-source-map',
    module: {
        loaders: [
            {
                enforce: 'pre',
                test: /\.(js|vue)?$/,
                loaders: ['eslint'],
                include: /(resources\/assets\/js)/,
            },
        ]
    },
    plugins: [
        new webpack.optimize.OccurenceOrderPlugin(),
        new webpack.HotModuleReplacementPlugin(),
        new webpack.NoErrorsPlugin(),
    ],
    eslint: {
        configFile: './.eslintrc.yml',  //your .eslintrc file
        emitWarning: true,
    }
});
