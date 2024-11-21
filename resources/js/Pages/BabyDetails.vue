<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useInertia } from '../../utils/useInertia.js';

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
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

