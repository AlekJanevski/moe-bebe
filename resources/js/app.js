// Importing necessary modules
import '../css/app.css';
import './bootstrap';

import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import InertiaPlugin from '../plugins/inertia-plugin';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        ),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        // Use Inertia and Ziggy as plugins
        app.use(plugin);
        app.use(ZiggyVue);
        app.use(InertiaPlugin); // Use the Inertia plugin to set it globally

        app.mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
