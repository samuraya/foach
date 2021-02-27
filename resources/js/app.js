require('./bootstrap');

import Vue from 'vue';
import Vuetify from 'vuetify';
import Vuelidate from 'vuelidate';


Vue.use(Vuetify); 
Vue.use(Vuelidate);

// Start Turbolinks
require('turbolinks').start()

// Register all the Vue components
const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Boot the current Vue component
document.addEventListener('turbolinks:load', (event) => {

	const root = document.getElementById('app');

	if (window.vue) {
        window.vue.$destroy(true)
    };

	window.vue = new Vue({
		vuetify: new Vuetify({
	            theme: { light: true },
	    }),
	    render: h => h(
	        Vue.component(root.dataset.component), {
	            props: JSON.parse(root.dataset.props)
	        }
	    )
	}).$mount(root)



});
