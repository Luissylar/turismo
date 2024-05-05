<script setup>
import AdminLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import GuestFooter from '@/Layouts/Partials/Guest/GuestFooter.vue';


defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <!-- <AdminLayout title="Log in"> -->

    <Head title="Log in" />

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-1 min-h-full">
            <div class="relative flex-1 hidden w-0 lg:block">
                <img class="absolute inset-0 object-cover w-full h-full"
                    src="https://images.unsplash.com/photo-1496917756835-20cb06e75b4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80"
                    alt="" />
            </div>
            <div class="flex flex-col justify-center flex-1 px-4 py-12 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                <div class="w-full max-w-sm mx-auto lg:w-96">
                    <div>
                        <img class="w-auto h-10"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Pornhub-logo.svg/2560px-Pornhub-logo.svg.png"
                            alt="Your Company" />
                        <h2 class="mt-8 text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                            account
                        </h2>
                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Not a member?
                            {{ ' ' }}
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Start a 14 day free
                                trial</a>
                        </p>
                    </div>

                    <div v-if="status" class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                        {{ status }}
                    </div>
                    <div class="mt-10">
                        <div>
                            <form @submit.prevent="submit">
                                <div>
                                    <InputLabel for="email" value="Email" />
                                    <TextInput id="email" v-model="form.email" type="email" class="block w-full mt-1"
                                        required autofocus autocomplete="username" />
                                    <InputError class="mt-2" :message="form.errors.email" />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="password" value="Password" />
                                    <TextInput id="password" v-model="form.password" type="password"
                                        class="block w-full mt-1" required autocomplete="current-password" />
                                    <InputError class="mt-2" :message="form.errors.password" />
                                </div>

                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center">
                                        <!-- Checkbox para "Remember me" -->
                                        <Checkbox id="remember-me" v-model:checked="form.remember" name="remember-me"
                                            class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-600" />
                                        <label for="remember-me"
                                            class="ml-3 text-sm text-gray-600 dark:text-gray-400">Remember me</label>
                                    </div>

                                    <!-- Enlace para "Forgot your password?" -->
                                    <div class="text-sm">
                                        <Link v-if="canResetPassword" :href="route('password.request')"
                                            class="font-semibold text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                        Forgot your password?
                                        </Link>
                                    </div>
                                </div>


                                <div class="flex items-center justify-end mt-4">



                                    <PrimaryButton
                                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                                        :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Log in
                                    </PrimaryButton>

                                </div>
                                <div class="text-center">
                                    <Link :href="route('register')"
                                        class="text-sm font-semibold text-indigo-600 hover:text-indigo-500">
                                    ¿No tienes cuenta? Crea una aquí
                                    </Link>
                                </div>
                            </form>
                        </div>
                        <div class="mt-10">
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                    <div class="w-full border-t border-gray-200" />
                                </div>
                                <div class="relative flex justify-center text-sm font-medium leading-6">
                                    <span class="px-6 text-gray-900 bg-white">Or continue with</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 mt-6">
                                <a href="#"
                                    class="flex items-center justify-center w-full gap-3 px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:ring-transparent">
                                    <svg class="w-5 h-5" aria-hidden="true" viewBox="0 0 24 24">
                                        <path
                                            d="M12.0003 4.75C13.7703 4.75 15.3553 5.36002 16.6053 6.54998L20.0303 3.125C17.9502 1.19 15.2353 0 12.0003 0C7.31028 0 3.25527 2.69 1.28027 6.60998L5.27028 9.70498C6.21525 6.86002 8.87028 4.75 12.0003 4.75Z"
                                            fill="#EA4335" />
                                        <path
                                            d="M23.49 12.275C23.49 11.49 23.415 10.73 23.3 10H12V14.51H18.47C18.18 15.99 17.34 17.25 16.08 18.1L19.945 21.1C22.2 19.01 23.49 15.92 23.49 12.275Z"
                                            fill="#4285F4" />
                                        <path
                                            d="M5.26498 14.2949C5.02498 13.5699 4.88501 12.7999 4.88501 11.9999C4.88501 11.1999 5.01998 10.4299 5.26498 9.7049L1.275 6.60986C0.46 8.22986 0 10.0599 0 11.9999C0 13.9399 0.46 15.7699 1.28 17.3899L5.26498 14.2949Z"
                                            fill="#FBBC05" />
                                        <path
                                            d="M12.0004 24.0001C15.2404 24.0001 17.9654 22.935 19.9454 21.095L16.0804 18.095C15.0054 18.82 13.6204 19.245 12.0004 19.245C8.8704 19.245 6.21537 17.135 5.2654 14.29L1.27539 17.385C3.25539 21.31 7.3104 24.0001 12.0004 24.0001Z"
                                            fill="#34A853" />
                                    </svg>
                                    <span class="text-sm font-semibold leading-6">Google</span>
                                </a>

                                <a href="#"
                                    class="flex items-center justify-center w-full gap-3 px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:ring-transparent">
                                    <svg class="h-5 w-5 fill-[#24292F]" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 0C4.477 0 0 4.484 0 10.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0110 4.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.203 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.942.359.31.678.921.678 1.856 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0020 10.017C20 4.484 15.522 0 10 0z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm font-semibold leading-6">GitHub</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
    <GuestFooter />

    <!-- </AdminLayout> -->
</template>
