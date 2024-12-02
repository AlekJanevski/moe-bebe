<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {Head, Link, useForm} from '@inertiajs/vue3';

defineProps({
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Заборавена лозинка" />
    <div class="flex flex-row main-wrapper h-full p-8 bg-primary-gradient">
        <!--Left section-->
        <div class="w-1/2 flex items-center justify-center">
            <img src="../../../img/welcome.svg" alt="welcome illustration" />
        </div>

        <!--Right section-->
        <div class="w-1/2 flex items-center justify-center">
            <div class="max-w-[576px] rounded-[24px] overflow-hidden shadow-lg px-8 py-11 w-6 w-full bg-white">
                <h1 class="text-center w-full welcome-title"> Заборавена лозинка? </h1>
                <h2 class="text-center w-full mb-8">
                    Без грижи, внесете ја вашата емаил адреса и ќе ви испратиме линк за
                    ресетирање на вашата лозинка.
                </h2>
                <form @submit.prevent="submit">
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

                    <div class="mt-4 flex items-center justify-center">
                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Обнови лозинка
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
