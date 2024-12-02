<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useInertia } from '../../utils/useInertia.js';
import { ref, computed } from 'vue';

const inertia = useInertia();

// Define the props being passed from the server (the `babies` data)
const props = defineProps({
    babies: Array
});

// Define the months
const mkMonths = [
    'јануари', 'февруари', 'март', 'април', 'мај', 'јуни',
    'јули', 'август', 'септември', 'октомври', 'ноември', 'декември',
];
// Function that formats the date
const formatAppointmentDate = (dateString) => {
    if (!dateString) return 'Нема датум';
    const date = new Date(dateString);
    const day = date.getDate();
    const month = mkMonths[date.getMonth()];
    const year = date.getFullYear();
    return `${day} ${month} ${year}`;
};

// Progress bar calculation method
const calculateProgressBarWidth = (totalValue, value) => {
    const percentage = (value / totalValue) * 100;
    return `${percentage}%`;
};
</script>

<template>
    <Head title="Детали" />

    <AuthenticatedLayout>
        <div class="flex h-full p-8">
            <!-- sidebar-->
            <div class="sidebar flex flex-col h-full px-8">
                <div class="text-white text-2xl font-bold">
                    {{ $attrs.auth.user.name }}
                </div>
                <div class="text-white">
                    {{ $attrs.auth.user.email }}
                </div>
            </div>

            <div class="p-8 w-full bg-white rounded-[24px]">
                <div class="mx-auto">
                    <div
                        class="w-full"
                    >
                        <h1 class="details-title text-black-500">
                            Здраво, <br />
                            {{ $attrs.auth.user.name }}!
                        </h1>

                        <div class="mt-20 w-full flex gap-[24px]">

                            <!-- Food card -->
                            <div class="bg-white rounded-[24px] shadow-2xl w-full lg:w-2/5 md:flex flex-col h-full p-6">
                                <h3 class="text-xl mb-4"> Количество на млеко </h3>

                                <div class="w-full bg-blue-200 rounded-full h-2.5">
                                    <div class="bg-blue-400 h-2.5 rounded-full"  :style="{ width: calculateProgressBarWidth(200, babies[0].food_amount ) }"></div>
                                </div>

                            </div>
                            <!-- / Food card -->


                                <!-- Graph card -->
                            <div class="bg-white rounded-[24px] shadow-2xl w-full lg:w-3/5 md:flex flex-col h-full p-6">
                                <h3 class="text-xl mb-4"> Останати детали </h3>
                                <div v-for="baby in babies" :key="baby.id" class="flex flex-col">
                                    <span>
                                        <strong>Име и презиме:</strong>
                                        {{ baby.name }}
                                    </span>
                                    <span>
                                        <strong>Возраст:</strong>
                                        {{ baby.age }} години
                                    </span>
                                    <span>
                                        <strong>Тежина:</strong>
                                        {{ baby.weight }}гр
                                    </span>
                                    <span>
                                        <strong>Телесна температура:</strong>
                                        {{ baby.body_temperature }}
                                    </span>
                                    <span>
                                        <strong>Примено храна:</strong>
                                        {{ baby.is_fed ? 'Да' : 'Не' }}
                                        <span v-if="baby.is_fed" class="ml-1">(Количество: {{ baby.food_amount }}гр)</span>
                                    </span>
                                    <span>
                                        <strong>Примено лекарства:</strong>
                                        {{ baby.medicine_taken ? 'Да' : 'Не' }}
                                    </span>
                                    <span>
                                        <strong>Примено лекови:</strong>
                                        {{ baby.medicine_taken ? 'Да' : 'Не' }}
                                    </span>
                                    <span>
                                        <strong>Закажан датум за посета:</strong>
                                        {{ formatAppointmentDate(baby.appointment_date) }}
                                    </span>
                                </div>
                            </div>
                                <!-- / Graph card -->
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style>
.details-title {
    font-size: 36px;
    line-height: 35px;
    font-weight: 300;
}
</style>

