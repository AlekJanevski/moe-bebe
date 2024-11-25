<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Најава" />

    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
        {{ status }}
    </div>

    <div class="flex flex-row main-wrapper h-full p-8 bg-primary-gradient">
        <!--Left section-->
        <div class="w-1/2 flex items-center justify-center">
            <img src="../../../img/welcome.svg" alt="welcome illustration" />
        </div>

        <!--Right section-->
        <div class="w-1/2 flex items-center justify-center">
            <div class="max-w-[576px] rounded-[24px] overflow-hidden shadow-lg px-8 py-11 w-6 w-full bg-white">
                <h1 class="text-center w-full welcome-title"> Добредојде! </h1>
                <h2 class="text-center w-full welcome-subtitle"> Најави се на МоеБебе </h2>
                <form @submit.prevent="submit" class="w-full">
                <div>
                    <InputLabel for="email" value="Емаил" />

                    <TextInput
                        id="email"
                        type="email"
                        class="mt-1 block w-full"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel for="password" value="Лозинка" />

                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4 flex flex-row items-center justify-between">
                    <label class="flex items-center">
                        <Checkbox name="remember" v-model:checked="form.remember" />
                        <span class="ms-2 text-sm text-gray-600">
                            Запамети ме
                        </span>
                    </label>
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-secondary transition hover:text-black/70"
                    >
                        Ја заборавивте вашата лозинка?
                    </Link>
                </div>

                <div class="mt-4 flex items-center justify-center">
                    <PrimaryButton
                        class="ms-4 w-1/4 text-center"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Најави се
                    </PrimaryButton>
                </div>

                    <div class="mt-8 text-center text-secondary">
                        Ако сеуште немате профил на МоеБебе, регистрирајте се
                        <Link
                            :href="route('register')"
                            class="text-link cursor-pointer font-bold transition hover:text-black/70"
                        >
                            тука
                        </Link>
                    </div>
            </form>
            </div>
        </div>
    </div>
</template>
