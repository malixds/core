import './bootstrap.js';
import '../css/app.css';

import { createApp, h } from "vue/dist/vue.esm-bundler";
import ChatMessages from "@/Components/ChatMessages.vue";
import ChatForm from "@/Components/ChatForm.vue";

// Vue.component('chat-form', ChatMessages);
//
// new Vue({
//     render: h => h(App),
// }).$mount('#app');
//
// Vue.component('chat-messages', ChatForm);
//
// new Vue({
//     render: h => h(App),
// }).$mount('#app');

const app = createApp({})
console.log('app', app)
app.component('ChatForm', ChatForm)
app.component('ChatMessages', ChatMessages)

app.mount('#chat');

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

