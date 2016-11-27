/* global require */
const webpack = require('webpack');
const webpackDevMiddleware = require("webpack-dev-middleware");
const webpackHotMiddleware = require('webpack-hot-middleware');
let webpackConfig = require('./webpack.config.dev.js');
const path = require('path');
const compiler = webpack(webpackConfig);
const port = 3000;
const browserSync = require('browser-sync');
const proxyHost = 'http://samundra.local';
const host = 'http://localhost' + port;
const appName = 'App Name';

browserSync({
    port,
    server: false,
    online: false,
    logFileChanges: true,
    logConnections: true,
    logPrefix: appName,
    logLevel: "debug",
    open: false,
    middleware: [
        webpackDevMiddleware(compiler, {
            publicPath: webpackConfig.output.publicPath,
            stats: {colors: true}
            // http://webpack.github.io/docs/webpack-dev-middleware.html
        }),
        // bundler should be the same as above
        webpackHotMiddleware(compiler)
    ],
    proxy: {
        target: proxyHost,
        proxyRes: [
            function (proxyRes, req, res) {
            }
        ],
    },
    files: [
        './resources/views/**.blade.php',
    ]
});
