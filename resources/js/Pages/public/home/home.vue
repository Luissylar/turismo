<script setup>
import AdminLayout from '@/Layouts/GuestLayout.vue';
import { ref } from 'vue';

const showModal = ref(false);

function toggleModal() {
    showModal.value = !showModal.value;
}
</script>

<template>
    <AdminLayout title="xd">



            <section class="relative bg-center bg-no-repeat bg-cover"
                style="background-image: url('https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3');">
                <div
                    class="absolute inset-0 bg-white/75 sm:bg-transparent sm:from-white/95 sm:to-white/25 ltr:sm:bg-gradient-to-r rtl:sm:bg-gradient-to-l">
                </div>

                <div
                    class="relative max-w-screen-xl px-4 py-32 mx-auto sm:px-6 lg:flex lg:h-screen lg:items-center lg:px-8">
                    <div class="max-w-xl text-center ltr:sm:text-left rtl:sm:text-right">
                        <h1 class="text-3xl font-extrabold leading-tight sm:text-5xl"
                            style="text-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);">
                            Descubre Perú con
                            <span class="block">
                                <span class="text-red-600">Peru</span>
                                <span class="text-white">Safe</span>
                                <span class="text-red-600">Travel</span>
                            </span>
                            <span class="block text-white">Experiencias inolvidables.</span>
                        </h1>


                        <p class="max-w-lg mt-4 text-white shadow-md sm:text-xl">
                            Viajes seguros y experiencias inolvidables en el corazón de los Andes. ¡Tu aventura comienza
                            aquí!
                        </p>


                        <div class="flex flex-wrap justify-center gap-4 mt-8">
                            <a href="#"
                                class="block w-full px-12 py-3 text-sm font-medium text-white bg-blue-600 border border-blue-600 rounded sm:w-auto hover:bg-transparent focus:outline-none focus:ring">
                                Comienza tu Viaje
                            </a>

                            <a href="#"
                                class="block w-full px-12 py-3 text-sm font-medium text-blue-600 bg-white rounded sm:w-auto hover:bg-blue-600 hover:text-white focus:outline-none focus:ring">
                                Más Información
                            </a>
                        </div>
                    </div>
                </div>

            </section>



        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
            dsada
        </div>



    </AdminLayout>
</template>
