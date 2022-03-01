require('./bootstrap');
window.axios = require("axios");

window.Vue = require('vue');

import SearchForm from "./components/form/searchForm";

const app = new Vue({
    components: {
        'v-form': SearchForm
    },
    el: '#app',
});
