require('./bootstrap');
// importing the vue
window.Vue = require('vue');

import FlashMessage from '@smartweb/vue-flash-message';
Vue.use(FlashMessage);

// Registration of admin components
Vue.component('employee-instant-actions', require('./components/EmployeeInstantAction').default);


const app = new Vue({
    el: '#app',
});
