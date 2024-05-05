<template>
    <div>
      <Head title="Log in" />

      <!-- Modal Overlay -->
      <div v-if="visible" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-75 z-50" @click="handleOutsideClick">
        <!-- Modal Content -->
        <div class="p-8 bg-white rounded-lg shadow-lg max-w-lg w-full mx-auto" @click.stop>
          <!-- Status Message -->
          <div v-if="status" class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
            {{ status }}
          </div>

          <!-- Form -->
          <form @submit.prevent="submit" class="space-y-6">
            <div>
              <InputLabel for="email" value="Email" />
              <TextInput id="email" v-model="form.email" type="email" class="block w-full mt-1" required autofocus autocomplete="username" />
              <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
              <InputLabel for="password" value="Password" />
              <TextInput id="password" v-model="form.password" type="password" class="block w-full mt-1" required autocomplete="current-password" />
              <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex items-center justify-between">
              <label class="flex items-center">
                <Checkbox v-model:checked="form.remember" name="remember" />
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
              </label>
              <PrimaryButton class="ml-auto" :class="{ 'opacity-50': form.processing }" :disabled="form.processing">
                Log in
              </PrimaryButton>
            </div>
          </form>

          <!-- Close Button -->
          <button @click="closeModal" class="mt-4 text-gray-600 hover:text-gray-900">
            Close
          </button>
        </div>
      </div>
    </div>
  </template>

  <script setup>
  import { defineProps, defineEmits, onMounted, onUnmounted, ref } from 'vue';
  import { Head, Link, useForm } from '@inertiajs/vue3';
  import Checkbox from '@/Components/Checkbox.vue';
  import InputError from '@/Components/InputError.vue';
  import InputLabel from '@/Components/InputLabel.vue';
  import PrimaryButton from '@/Components/PrimaryButton.vue';
  import TextInput from '@/Components/TextInput.vue';

  const props = defineProps({
    visible: Boolean,
    canResetPassword: Boolean,
    status: String
  });

  const emits = defineEmits(['update:visible']);

  const form = useForm({
    email: '',
    password: '',
    remember: false
  });

  const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : ''
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
  };

  function closeModal() {
    emits('update:visible', false);
  }

  function handleOutsideClick() {
    closeModal();
  }

  onMounted(() => {
    window.addEventListener('popstate', closeModal);
  });

  onUnmounted(() => {
    window.removeEventListener('popstate', closeModal);
  });
  </script>

  <style>
  /* Aquí puedes agregar estilos globales o específicos que no sean de Tailwind */
  </style>
