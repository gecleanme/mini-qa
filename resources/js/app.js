import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import {InertiaProgress} from "@inertiajs/progress";
import '../css/app.css'
import VueSweetalert2 from "vue-sweetalert2";
import 'sweetalert2/dist/sweetalert2.min.css';


InertiaProgress.init();
createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return await (pages[`./Pages/${name}.vue`])
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin).use(VueSweetalert2)
            .mount(el)
    },
})
