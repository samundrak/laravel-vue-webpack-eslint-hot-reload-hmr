/* global require,module */
const webpack = require('webpack');
var path = require('path');
const merge = require('webpack-merge');
let webpackBaseConfig = require('./webpack.config.base');
var ExtractTextPlugin = require('extract-text-webpack-plugin');

// var CompressionWebpackPlugin = require('compression-webpack-plugin');
// webpackBaseConfig.plugins.push(
//     new CompressionWebpackPlugin({
//         asset: '[path].gz[query]',
//         algorithm: 'gzip',
//         test: new RegExp(
//             '\\.(' +
//             ['js', 'css'].join('|') +
//             ')$'
//         ),
//         threshold: 10240,
//         minRatio: 0.8
//     })
// );

const GLOBAL = {
    'process.env.NODE_ENV': JSON.stringify('production')
};
module.exports = merge(webpackBaseConfig, {
    output: {
        publicPath: '/script',
        path: path.join(__dirname, '../public/script'),
        filename: '[name].build.js'
    },
    module: {
        loaders: [
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract("css?sourcemap"),
            },
        ]
    },
    debug: false,
    noInfo: true,
    devtool: 'source-map',
    plugins: [
        new webpack.optimize.OccurenceOrderPlugin(),
        new webpack.NoErrorsPlugin(),
        new webpack.DefinePlugin(GLOBAL),
        new webpack.optimize.DedupePlugin(),
        new webpack.optimize.UglifyJsPlugin({
            compress: {
                warnings: false
            }
        }),
    ]
});
