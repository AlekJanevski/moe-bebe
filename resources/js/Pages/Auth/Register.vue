<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    baby_name: '',
    baby_reference_id: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Регистрирај се" />

    <div class="flex flex-row main-wrapper h-full p-8 bg-primary-gradient">
        <!--Left section-->
        <div class="w-1/2 flex items-center justify-center">
            <img src="../../../img/welcome.svg" alt="welcome illustration" />
        </div>

        <!--Right section-->
        <div class="w-1/2 flex items-center justify-center">
            <div class="max-w-[576px] rounded-[24px] overflow-hidden shadow-lg px-8 py-11 w-6 w-full bg-white">
                <h1 class="text-center w-full welcome-title"> Добредојде! </h1>
                <h2 class="text-center w-full welcome-subtitle"> Регистрирај се на МоеБебе </h2>
                <form @submit.prevent="submit">
                    <div>
                        <InputLabel for="name" value="Име и презиме на родител" />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.name"
                            required
                            autofocus
                            autocomplete="name"
                        />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="baby_name" value="Име на бебе" />

                        <TextInput
                            id="baby_name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.baby_name"
                            required
                            autofocus
                            autocomplete="baby_name"
                        />

                        <InputError class="mt-2" :message="form.errors.baby_name" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="baby_reference_id" value="Референтен број" />

                        <TextInput
                            id="baby_reference_id"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.baby_reference_id"
                            required
                            autofocus
                            autocomplete="baby_reference_id"
                        />

                        <InputError class="mt-2" :message="form.errors.baby_reference_id" />
                    </div>

                    <div class="mt-4">
                        <InputLabel for="email" value="Емаил" />

                        <TextInput
                            id="email"
                            type="email"
                            class="mt-1 block w-full"
                            v-model="form.email"
                            required
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
                            autocomplete="new-password"
                        />

                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="mt-4">
                        <InputLabel
                            for="password_confirmation"
                            value="Повтори лозинка"
                        />

                        <TextInput
                            id="password_confirmation"
                            type="password"
                            class="mt-1 block w-full"
                            v-model="form.password_confirmation"
                            required
                            autocomplete="new-password"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.password_confirmation"
                        />
                    </div>

                    <div class="mt-4">
                        <Link
                            :href="route('login')"
                            class="text-secondary transition hover:text-black/70"
                        >
                            Веќе сте регистрирани?
                        </Link>
                    </div>

                    <div class="w-full flex items-center justify-center">
                        <PrimaryButton
                            class="w-1/4 text-center"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            style="margin-top: 16px; width: 180px;"
                        >
                            Регистрирај се
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style scoped>
.welcome-title {
    margin-bottom: 32px;
}
</style>
