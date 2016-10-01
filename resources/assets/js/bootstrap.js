
// Lodash
window._ = require('lodash');

// Load jQuery
window.$ = window.jQuery = require('jquery');

// Load Bootstrap scripts
require('bootstrap-sass');

// Require Raven (Sentry Client)
window.Raven = require('raven-js');

// Load Vue
window.Vue = require('vue');

// Load Vue-Resource
require('vue-resource');

// Emulate Json
Vue.http.options.emulateJSON = true;


// CSRF for Laravel Routes
Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;

    next();
});
