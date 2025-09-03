import './vendor'

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";


createInertiaApp({
    progress: {
        color: "#dd2222",
        showSpinner: false,
    },
    resolve: (name) => {
        const pages = import.meta.glob("../views/**/*.vue", { eager: false });
        return pages[`../views/${name}.vue`]();
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

