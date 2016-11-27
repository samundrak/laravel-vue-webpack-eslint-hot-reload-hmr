/* global Vue VueRouter require*/
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import helper from './Helpers';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */
const components = [
    {
        name: 'upload',
        src: helper.component.home('Upload'),
        path: '/upload'
    },
    {
        name: 'repository',
        src: helper.component.home('Repository'),
        path: '/repository'
    },
    {
        name: 'profile',
        src: helper.component.home('Profile'),
        path: '/profile'
    }
];

const routes = components.filter(component => {
    "use strict";
    return component.hasOwnProperty('path');
}).map(component => {
    "use strict";
    return Object.assign({}, component, {
        component: Vue.component(
            component.name,
            require('' + component.src)
        )
    });
});

new Vue({
    el: '#Profio',
    router: new VueRouter({
        routes
    })
});
