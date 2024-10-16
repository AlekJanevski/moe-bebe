<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useInertia } from '../../utils/useInertia.js';

const inertia = useInertia();

// Define the props being passed from the server (the `babies` data)
const props = defineProps({
    babies: Array
});
</script>

<template>
    <Head title="Детали" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        Тука ќе може да ги видите деталите за вашето бебе
                        <div class="mt-20">
                            {{ babies }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

