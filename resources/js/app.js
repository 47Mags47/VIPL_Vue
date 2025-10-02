import './vendor'

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";

import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(fas)

createInertiaApp({
    progress: {
        color: "#dd2222",
        showSpinner: false,
    },
    resolve: (name) => {
        const pages = import.meta.glob("../views/**/*.vue");
        return pages[`../views/${name}.vue`]();
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
});

