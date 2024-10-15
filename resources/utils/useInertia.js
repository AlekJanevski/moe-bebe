import { inject } from 'vue';

export function useInertia() {
    const inertia = inject('inertia');
    if (!inertia) {
        throw new Error('Inertia not provided! Please ensure InertiaPlugin is installed.');
    }
    return inertia;
}
