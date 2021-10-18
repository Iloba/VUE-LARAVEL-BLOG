
require('./bootstrap');

window.Vue = require('vue').default;
import VueSweetalert2 from 'vue-sweetalert2';
import VueRouter from 'vue-router';
import routes from './routes';
Vue.use(VueRouter);
Vue.use(VueSweetalert2);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
