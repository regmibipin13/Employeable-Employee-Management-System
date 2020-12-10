require('./bootstrap');
// importing the vue
window.Vue = require('vue');


// Registring the global components
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
});
