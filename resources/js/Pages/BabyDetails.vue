<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { useInertia } from "../../utils/useInertia.js";
import { ref, computed } from "vue";

const inertia = useInertia();

// Define the props being passed from the server (the `babies` data)
const props = defineProps({
    babies: Array,
});

// Define the months
const mkMonths = [
    "јануари",
    "февруари",
    "март",
    "април",
    "мај",
    "јуни",
    "јули",
    "август",
    "септември",
    "октомври",
    "ноември",
    "декември",
];
// Function that formats the date
const formatAppointmentDate = (dateString) => {
    if (!dateString) return "Нема датум";
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
            <div class="flex flex-col justify-between h-full px-8 sidebar">
                <!-- Top section -->
                <div>
                    <div class="text-2xl font-bold text-white">
                        {{ $attrs.auth.user.name }}
                    </div>
                    <div class="text-white">
                        {{ $attrs.auth.user.email }}
                    </div>
                </div>
                <!-- Bottom section -->
                <div>
                    <a
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="text-white"
                    >
                        <i class="mr-2 fa fa-sign-out" aria-hidden="true"></i>
                        Одјави се
                    </a>
                </div>
            </div>

            <div
                class="p-8 w-full bg-white rounded-[24px] flex items-start justify-start"
            >
                <div class="mx-auto">
                    <div class="w-full">
                        <div class="flex flex-col items-start mb-10">
                            <h1 class="details-title text-black-500 text-light">
                                Здраво, ова се деталите за вашето бебе
                            </h1>
                            <span class="mt-2 text-sm text-gray-400"
                                >Последно обновени податоци на
                                {{ new Date().getDate() }}
                                {{ mkMonths[new Date().getMonth()] }}
                            </span>
                        </div>

                        <div class="w-full flex gap-[24px]">
                            <div class="flex flex-col">
                                <!-- Food card -->
                                <div
                                    class="bg-white rounded-[24px] shadow-2xl w-full md:flex flex-col h-full p-6 mb-4"
                                >
                                    <div class="flex flex-col items-start">
                                        <span class="text-sm">
                                            <strong>Име и презиме:</strong>
                                            {{ babies[0].name }}
                                        </span>
                                        <span class="text-sm">
                                            <strong>Возраст:</strong>
                                            {{ babies[0].age }} годинa
                                        </span>
                                        <span class="text-sm">
                                            <strong>
                                                Закажан датум за посета: </strong
                                            ><br />
                                            {{
                                                formatAppointmentDate(
                                                    babies[0].appointment_date
                                                )
                                            }}
                                        </span>
                                    </div>
                                </div>
                                <!-- / Food card -->

                                <!-- Food card -->
                                <div
                                    class="bg-white rounded-[24px] shadow-2xl w-full d:flex flex-col h-full p-6"
                                >
                                    <div class="flex flex-col items-start">
                                        <h3 class="mb-2 text-xl">
                                            Количество на млеко
                                        </h3>
                                        <span class="text-sm text-gray-400"
                                            >Конзумирано и препорачано
                                            количество</span
                                        >
                                    </div>

                                    <span
                                        class="text-right text-blue-400 text-md d-block"
                                        >{{ babies[0].food_amount }}гр</span
                                    >

                                    <div
                                        class="w-full bg-blue-200 rounded-full h-2.5"
                                    >
                                        <div
                                            class="bg-blue-400 h-2.5 rounded-full"
                                            :style="{
                                                width: calculateProgressBarWidth(
                                                    200,
                                                    babies[0].food_amount
                                                ),
                                            }"
                                        ></div>
                                    </div>
                                </div>
                                <!-- / Food card -->
                            </div>

                            <div class="p-6 bg-white shadow-md rounded-2xl">
                                <!-- Header -->
                                <div
                                    class="flex items-center justify-between mb-4"
                                >
                                    <h2
                                        class="text-xl font-semibold text-black"
                                    >
                                        Останати детали
                                    </h2>
                                    <button
                                        class="text-gray-400 hover:text-gray-600"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-6 h-6"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M6 12h.01M12 12h.01M18 12h.01"
                                            />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Legend -->
                                <div class="flex mb-6 space-x-4 text-sm">
                                    <div class="flex items-center space-x-1">
                                        <div
                                            class="w-3 h-3 bg-green-500 rounded-full"
                                        ></div>
                                        <span>Тежина</span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <div
                                            class="w-3 h-3 bg-blue-500 rounded-full"
                                        ></div>
                                        <span>Температура</span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <div
                                            class="w-3 h-3 rounded-full bg-sky-300"
                                        ></div>
                                        <span>Извршено нужда</span>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <div
                                            class="w-3 h-3 bg-yellow-400 rounded-full"
                                        ></div>
                                        <span>Издадено лекарства</span>
                                    </div>
                                </div>

                                <!-- Details -->
                                <div class="flex justify-around mb-4">
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="flex items-center justify-center w-24 h-24 bg-green-100 rounded-full"
                                        >
                                            <span
                                                class="text-lg font-bold text-green-600"
                                                >{{ babies[0].weight }}гр</span
                                            >
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="flex items-center justify-center w-24 h-24 bg-blue-100 rounded-full"
                                        >
                                            <span
                                                class="text-lg font-bold text-blue-600"
                                                >{{
                                                    babies[0].body_temperature
                                                }}</span
                                            >
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="flex items-center justify-center w-24 h-24 rounded-full bg-sky-100"
                                        >
                                            <span
                                                class="text-lg font-bold text-sky-600"
                                                >Да</span
                                            >
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <div
                                            class="flex items-center justify-center w-24 h-24 bg-yellow-100 rounded-full"
                                        >
                                            <span
                                                class="text-lg font-bold text-yellow-600"
                                                >Не</span
                                            >
                                        </div>
                                    </div>
                                </div>

                                <!-- Footer -->
                                <p class="text-sm text-gray-500">
                                    Тука се претставени останатите детали околу
                                    вашето бебе, тежина, температура, податоци
                                    за извршено нужда и издадени лекарства.
                                </p>
                            </div>
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
