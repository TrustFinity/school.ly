
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// require('bulma');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('TeacherKanban', require('./components/TeacherKanban.vue'));
Vue.component('FormInput', require('./components/Forms/FormInput.vue'));
Vue.component('Search', require('./components/Forms/Search.vue'));

const app = new Vue({
    el: '#app'
});