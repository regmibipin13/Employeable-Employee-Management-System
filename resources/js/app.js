require('./bootstrap');
// importing the vue
window.Vue = require('vue');


import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
Vue.use(VueToast);

import ToggleButton from 'vue-js-toggle-button';
Vue.use(ToggleButton);

import InfiniteLoading from 'vue-infinite-loading';

Vue.use(InfiniteLoading);


// Registration of admin components
Vue.component('employee-instant-actions', require('./components/EmployeeInstantAction').default);
Vue.component('employee-attendance', require('./components/EmployeeAttendance').default);
Vue.component('leave-approve', require('./components/LeaveApprove').default);
Vue.component('holidays', require('./components/Holidays').default);


const app = new Vue({
    el: '#app',
});
