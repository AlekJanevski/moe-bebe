<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useInertia } from '../../utils/useInertia.js';

const inertia = useInertia();
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        Здраво, {{ $attrs.auth.user.name }}
                    </div>

                    <div class="flex justify-between md:p-20 gap-20 items-center">
                        <div class="bg-white rounded-lg shadow-2xl w-full lg:w-1/2 md:flex flex-col">
                            <img height="307" src="https://img.freepik.com/free-vector/resume-writing-service-abstract-concept_335657-3098.jpg?semt=ais_hybrid" class="md:w-full rounded-t-lg md:rounded-t-none md:rounded-l-lg object-contain" style="height: 254px;">
                            <div class="p-6 flex flex-col">
                                <h2 class="flex-none text-center font-bold text-2xl md:text-xl text-gray-800 hover:text-gray-700 mb-2">
                                    Тука ќе можете да ги погледнете сите ажурирани детали околу вашете бебе
                                </h2>
                                <div class="mt-5 h-full flex flex-col justify-end items-end">
                                    <a :href="route('baby-details')" class="w-full bg-blue-600 text-white font-montserrat py-2 px-8 font-medium rounded-md hover:bg-blue-500 transition-all duration-300 text-center">Понатаму</a>
                                </div>
                            </div>

                        </div>
                        <div class="bg-white rounded-lg shadow-2xl w-full lg:w-1/2 md:flex flex-col">
                            <img src="https://img.freepik.com/free-vector/businessman-planning-events-deadlines-agenda_74855-6274.jpg" class="md:w-full rounded-t-lg md:rounded-t-none md:rounded-l-lg object-contain" style="height: 254px;">
                            <div class="p-6 flex flex-col">
                                <h2 class="flex-none text-center font-bold text-2xl md:text-xl text-gray-800 hover:text-gray-700 mb-2">
                                    Тука можете да закажете термин во дозволеното време на болницата
                                </h2>
                                <div class="mt-5 h-full flex flex-col justify-end items-end">
                                    <a :href="route('calendar')" class="w-full bg-blue-600 text-white font-montserrat py-2 px-8 font-medium rounded-md hover:bg-blue-500 transition-all duration-300 text-center">Понатаму</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
