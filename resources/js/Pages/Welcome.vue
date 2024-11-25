<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    }
});
</script>

<template>
    <Head title="Добредојде" />
    <div class="bg-gray-50 text-black/50">
        <div
            class="relative h-screen flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white"
        >
            <div class="relative flex flex-col justify-between w-full h-full">
                <header
                    class="grid items-center grid-cols-2 gap-2 py-10 lg:grid-cols-3"
                >
                    <nav
                        v-if="canLogin"
                        class="flex justify-start flex-1 -mx-3 px-8"
                    >
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                        >
                            Панел
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Најава
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Регистрирај се
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="px-24 flex flex-row">
                    <div class="w-full flex items-center justify-center">
                        <img src="../../img/logo.svg" alt="logo" class="" />
                    </div>
                </main>

                <footer
                    class="py-16 text-sm text-center text-black"
                >
                    МоеБебе @2024
                </footer>
            </div>
        </div>
    </div>
</template>
