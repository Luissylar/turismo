<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
</script>

<template>
  <AdminLayout title="Dashboard de Administración">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div
            class="flex flex-col items-center justify-center p-6 bg-white border-gray-200 border-dashed rounded-lg dark:border-gray-700">

                <h2 class="mt-4 text-xl font-semibold text-gray-800 dark:text-black">Bienvenido,
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Tu rol es: <span
                        class="font-semibold"></span></p>

            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Este es tu panel de control desde donde puedes
                gestionar tu cuenta y configuraciones.</p>
        </div>
        <div
            class="flex flex-col items-center justify-center p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white"></h2>
            <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Conéctate con nosotros</h2>
            <div class="flex mt-4 space-x-3">
                <a href="" target="_blank" class="text-blue-600 hover:text-blue-800">
                    <i class="fab fa-facebook-f fa-2x"></i>
                </a>
                <a href="" target="_blank" class="text-pink-600 hover:text-pink-800">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
                <a href="" target="_blank" class="text-blue-400 hover:text-blue-600">
                    <i class="fab fa-twitter fa-2x"></i>
                </a>
                <a href="" target="_blank" class="text-blue-700 hover:text-blue-900">
                    <i class="fab fa-linkedin-in fa-2x"></i>
                </a>
                <a href="" target="_blank" class="text-red-600 hover:text-red-800">
                    <i class="fab fa-youtube fa-2x"></i>
                </a>
                <a href="" target="_blank" class="text-green-500 hover:text-green-700">
                    <i class="fab fa-whatsapp fa-2x"></i>
                </a>
            </div>
        </div>



    </div><br>


  </AdminLayout>
</template>



