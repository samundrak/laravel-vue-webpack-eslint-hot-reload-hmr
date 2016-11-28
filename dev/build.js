const webpack = require('webpack');
const webpackConfig = require('./webpack.config.prod');
const colors = require('colors');

process.env.NODE_ENV = 'production';

console.log('Generating minified bundle for production via webpack. This will take moment.');

webpack(webpackConfig).run((err, stats) => {
    "use strict";

    if (err) {
        console.log(err.bold.red);
        return 1;
    }

    const jsonStats = stats.toJson();

    if (jsonStats.hasErrors) {
        return jsonStats.errors.map(console.log);
    }
    if (jsonStats.hasWarnings) {
        console.log('Webpack generated the following errors:'.bold.yellow);
        return jsonStats.warnings.map(console.log);
    }

    console.log(`Webpack stats: ${stats}`);

    console.log('App is ready for production'.green);
});