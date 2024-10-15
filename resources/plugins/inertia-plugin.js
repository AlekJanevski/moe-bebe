// inertia-plugin.js
import { Inertia } from '@inertiajs/inertia';

export default {
    install(app) {
        // Provide the Inertia instance globally
        app.provide('inertia', Inertia);
    }
};
