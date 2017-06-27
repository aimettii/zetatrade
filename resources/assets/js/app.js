
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

// window.Pace = require('pace-progress');
//
// Pace.options = {
//     ajax: false
// };
//
// Pace.start();

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

Vue.component('app', require('./components/App.vue'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.Echo = require('laravel-echo');

window.rtrim = function ( str, charlist ) {	// Strip whitespace (or other characters) from the end of a string
    //
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +	  input by: Erkekjetter
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)

    charlist = !charlist ? ' \s\xA0' : charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '\$1');
    var re = new RegExp('[' + charlist + ']+$', 'g');
    return str.replace(re, '');
}

window.ltrim = function ( str, charlist ) {	// Strip whitespace (or other characters) from the beginning of a string
    //
    // +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
    // +	  input by: Erkekjetter
    // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)

    charlist = !charlist ? ' \s\xA0' : charlist.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g, '\$1');
    var re = new RegExp('^[' + charlist + ']+', 'g');
    return str.replace(re, '');
}
