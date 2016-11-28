# Laravel, VueJS, Webpack Hot Reload, Hot Module Replacement And Eslint (Airbnb)

This is an example project  of using webpack hot reload, hot module replacement on laravel using browser sync
and  javascript, vuejs and eslint warnings and error will be seen on your browser screen, node console and browser
console at same time. 

#Requirements
-   Nodejs
-   NPM
-   BrowserSync
-   Eslint with Airbnb configs
-   Webpack and its plugins

***If you have nodejs and npm then just a `npm i` will do all the things.***

#Install
-   Clone this repo
-   Do `composer install`
-   Set the env values and (Databases, App)
-   Run `php artisan migrate`
-   Also edit Proxy hostname on dev/webpack.config.base.js
-   Run `npm run dev` for development
-   Run `npm run build` for production
