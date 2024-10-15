<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useInertia } from '../../utils/useInertia.js';

const inertia = useInertia(); // Get the global Inertia instance

const goToBabyDetails = () => {
    inertia.visit('/baby-details'); // Use Inertia to navigate to the baby-details route
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        You're logged in! Yo man!
                    </div>

                    <button @click="goToBabyDetails"> Check your baby details</button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
