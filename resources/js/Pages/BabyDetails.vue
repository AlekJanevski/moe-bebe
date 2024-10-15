<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useInertia } from '../../utils/useInertia.js';

const inertia = useInertia();
</script>

<template>
    <Head title="Детали" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Детали за вашето бебе
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        Тука ќе може да ги видите деталите за вашето бебе
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

