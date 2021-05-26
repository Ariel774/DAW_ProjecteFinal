/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2'; /* Importamos la librería Sweetalert */

import 'sweetalert2/dist/sweetalert2.min.css';

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.use(VueSweetalert2); // Agregamos nuestro componente SweetAlert

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('eliminar-ambito', require('./components/EliminarAmbito.vue').default);
Vue.component('actualizar-ambito', require('./components/ActualizarAmbito.vue').default)
Vue.component('eliminar-objetivo', require('./components/EliminarObjetivo.vue').default);
Vue.component('eliminar-sub-objetivo', require('./components/EliminarSubObjetivo.vue').default);
Vue.component('calendario-component', require('./components/CalendarioComponent.vue').default);




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
