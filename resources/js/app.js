

require('./bootstrap');

window.Vue = require('vue');
Vue.component('pagination', require('laravel-vue-pagination'));


Vue.component('customer', require('./components/customer.vue').default);
Vue.component('addCustomer', require('./components/addCustomer.vue').default);
Vue.component('editCustomer', require('./components/editCustomer.vue').default);
Vue.component('deleteCustomer', require('./components/deleteCustomer.vue').default);





const app = new Vue({
    el: '#app',
});
