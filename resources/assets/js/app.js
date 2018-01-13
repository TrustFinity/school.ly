/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.config.productionTip = false;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('TeacherKanban', require('./components/TeacherKanban.vue'));
Vue.component('FormInput', require('./components/Forms/FormInput.vue'));
Vue.component('SearchStudent', require('./components/Forms/SearchStudent.vue'));
Vue.component('SearchTeachers', require('./components/Forms/SearchTeachers.vue'));

const app = new Vue({
    el: '#app'
});
