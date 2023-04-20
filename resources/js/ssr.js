// import './bootstrap';
import Vue from 'vue'
import { createRenderer } from 'vue-server-renderer'
import { createInertiaApp } from '@inertiajs/inertia-vue'
import createServer from '@inertiajs/server'
import VueCompositionAPI from '@vue/composition-api'
import { library } from '@fortawesome/fontawesome-svg-core'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(fab, fas, far)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.use(VueCompositionAPI)
createServer(page =>
        createInertiaApp({
            page,
            render: createRenderer().renderToString,
            resolve: name => {
                const pages =
                    import.meta.glob('./Pages/**/*.vue', { eager: true })
                return pages[`./Pages/${name}.vue`]
            },
            title: title => `${title} - CartonShop`,
            setup({ App, props, plugin }) {
                Vue.use(plugin)
                return new Vue({
                    render: h => h(App, props),
                })
            },
        }),
    )
    // Vue.mixin({
    //     methods: {
    //         route: window.route,
    //     }
    // })
    // Vue.prototype.route = route
Vue.mixin({
    methods: {
        hasAnyPermission: function(permissions) {

            var allPermissions = this.$page.props.auth.can;
            var hasPermission = false;
            permissions.forEach(function(item) {
                if (allPermissions[item]) hasPermission = true;
            });
            return hasPermission;
        },


        formatDate: function(value) {
            if (value) {
                return moment(String(value)).format('DD/MM/YYYY HH:mm')
            }
        },
    },
})

Vue.mixin(require('./base'))
Vue.config.devtools = true;
Vue.config.productionTip = false