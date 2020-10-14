import Vue from 'vue';
import App from './App.vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';

const app = new Vue({
    el: '#app',
    render : h => h(App)
});
