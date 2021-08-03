require('./bootstrap');

window.Vue = require('vue');

Vue.component('create-review', require('./components/review/Create.vue'));
Vue.component('select-school', require('./components/review/SelectSchool.vue'));
Vue.component('home-page', require('./components/static/Home.vue'));

const app = new Vue({
    el: '#app'
});