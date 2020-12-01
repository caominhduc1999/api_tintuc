import Vue from 'vue';
import App from './App.vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import router from './router';
import store from './store';

import BootstrapVue from 'bootstrap-vue';
import FlashMessage from '@smartweb/vue-flash-message';
import VueSpinners from 'vue-spinners';
Vue.use(BootstrapVue);
Vue.use(FlashMessage);
Vue.use(VueSpinners);

Vue.filter('stringLimit', function (value, size) {
    if (!value) return '';
    value = value.toString();

    if (value.length <= size) {
        return value;
    }
    return value.substr(0, size) + '...';
});

const app = new Vue({
    el: '#app',
    router,
    store,
    render : h => h(App)
});

