require('./bootstrap');
// importing the vue
window.Vue = require('vue');



// Registration of admin components
// Vue.component('file-uploader', require('./components/FileUploader').default);


const app = new Vue({
    el: '#app',
});
