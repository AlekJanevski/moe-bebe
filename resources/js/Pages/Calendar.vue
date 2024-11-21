<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useInertia } from '../../utils/useInertia.js';
import { ScheduleXCalendar } from '@schedule-x/vue'
import {
    createCalendar,
    createViewDay,
    createViewMonthAgenda,
    createViewMonthGrid,
    createViewWeek,
} from '@schedule-x/calendar'
import '@schedule-x/theme-default/dist/index.css'
import { createCalendarControlsPlugin } from '@schedule-x/calendar-controls'

// Usages
const inertia = useInertia();
const calendarControls = createCalendarControlsPlugin()

// Define the props being passed from the server (the `babies` data)
const props = defineProps({
    babies: Array
});

// Do not use a ref here, as the calendar instance is not reactive, and doing so might cause issues
// For updating events, use the events service plugin
const calendarApp = createCalendar({
    selectedDate: '2024-11-19',
    views: [
        createViewDay(),
        createViewWeek(),
        createViewMonthGrid(),
        createViewMonthAgenda(),
    ],
    events: [
        {
            id: 1,
            title: 'Посета',
            start: '2024-11-20 12:00',
            end: '2024-11-20 13:00',
        },
        {
            id: 2,
            title: 'Посета',
            start: '2024-11-21 12:00',
            end: '2024-11-21 16:00',
        },
    ],
    dayBoundaries: {
        start: '10:00',
        end: '18:00',
    },
    callbacks: {
        onEventClick(calendarEvent) {
            console.log('onEventClick', calendarEvent)
        }
    }
}, [calendarControls])
calendarControls.setLocale('mk-MK')

// Methods
const handleToggleAppointmentModal = () => {
    console.log(props.babies[0])
}

</script>

<template>
    <Head title="Календар" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-sm sm:rounded-lg"
                >
                    <div class="p-6 text-gray-900">
                        <div class="flex justify-between">
                        Тука ќе може да закажете посета за вашето бебе
                        <div class="h-full flex flex-col justify-end items-start">
                            <button @click="handleToggleAppointmentModal" class="w-full bg-blue-600 text-white font-montserrat py-2 px-8 font-medium rounded-md hover:bg-blue-500 transition-all duration-300 text-center">Закажи посета</button>
                        </div>
                        </div>
                        <div class="mt-20">
                            <div>
                                <ScheduleXCalendar :calendar-app="calendarApp" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

