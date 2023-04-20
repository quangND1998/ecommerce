import './bootstrap';
// import jQuery from 'jQuery'
import Vue from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import { InertiaProgress } from '@inertiajs/progress'
import VueCompositionAPI from '@vue/composition-api'
import moment from 'moment';
// Import thư viện Font Awesome
import { library } from '@fortawesome/fontawesome-svg-core'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import CKEditor from 'ckeditor4-vue';
library.add(fab, fas, far)
Vue.component('font-awesome-icon', FontAwesomeIcon)
import stores from './store';
import Vuex from 'vuex';
import VueSwal from 'vue-swal'

Vue.use(Vuex);
Vue.use(VueSwal)
InertiaProgress.init({})
Vue.use(VueCompositionAPI)
Vue.use(CKEditor)
const store = new Vuex.Store({
    modules: { stores },
});
createInertiaApp({
    resolve: name =>
        require(`./Pages/${name}`),
    title: title => `${title} - CartonShop`,
    setup({ el, App, props, plugin }) {
        Vue.use(plugin)

        new Vue({
            store,
            render: h => h(App, props),
        }).$mount(el)
    },
})
Vue.prototype.route = route

Vue.mixin({
    methods: {
        hasAnyPermission: function (permissions) {

            var allPermissions = this.$page.props.auth.can;
            var hasPermission = false;
            permissions.forEach(function (item) {
                if (allPermissions[item]) hasPermission = true;
            });
            return hasPermission;
        },


        formatDate: function (value) {
            if (value) {
                return moment(String(value)).format('DD/MM/YYYY HH:mm')
            }
        },
        formatTimeDayMonthyear: function (value) {
            if (value) {
                return moment(String(value)).format('HH:mm DD/MM/YYYY ')
            }
        },
        formatPrice(value) {
            let val = (value / 1).toFixed(0).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },
        multipleSelect(data) {
            let object = Object.assign({}, data);
            console.log(typeof object);
            // // // let first = Object.assign({}, object[0]);
            let array = [];
            $.each(object, function (key, value) {
                array.push(parseInt(value.id));
            });
            return array;
        }
    },
})
window.Bus = new Vue();
Vue.mixin(require('./base'))
Vue.config.devtools = true;
Vue.config.productionTip = false