require('./bootstrap');
// importing the vue
window.Vue = require('vue');


import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.use(VueToast);


// Registration of admin components
Vue.component('employee-instant-actions', require('./components/EmployeeInstantAction').default);


const app = new Vue({
    el: '#app',
});
