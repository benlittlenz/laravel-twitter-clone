/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex';
import VueObserveVisibility from 'vue-observe-visibility'

Vue.use(Vuex);
Vue.use(VueObserveVisibility);

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import timeline from './store/timeline'

const store = new Vuex.Store({
    modules: {
        timeline
    }
})

const app = new Vue({
    el: '#app',
    store
});
