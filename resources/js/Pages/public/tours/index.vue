<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Link } from '@inertiajs/vue3';
import { defineProps, ref } from 'vue';

// Definiendo las propiedades de la vista
const props = defineProps({ tours: Array, });

const tours = ref([]);

// Asignando las propiedades a la variable tours
tours.value = props.tours;

</script>


<template>

    <GuestLayout title="Tours">

        <!-- despues modificar y arreglar -->
        <section
            class="bg-[url('https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3')] bg-no-repeat bg-cover bg-center bg-gray-400 bg-blend-multiply">
            <div class="relative max-w-screen-xl px-4 py-8 mx-auto text-white lg:py-16 xl:px-0 z-1">
                <div class="z-10 flex flex-col items-center justify-center p-4 text-center">
                    <!-- Título centrado y grande -->
                    <h1
                        class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                        <span
                            class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">TOURS</span>
                    </h1>
                    <p class="mt-4 text-base sm:text-lg md:text-xl">Descubre increibles </p>
                </div>
                <div class="max-w-screen-md mb-6 lg:mb-0">
                </div>
                <form action=""
                    class="grid w-full p-4 mt-8 bg-white rounded gap-y-4 lg:gap-x-4 lg:grid-cols-9 lg:mt-12 ">
                    <div class="lg:col-span-3">
                        <label for="location-form" class="sr-only">Location</label>
                        <div class="relative">
                            <input type="text" id="location-form"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search tours">
                        </div>
                    </div>
                    <div date-rangepicker datepicker-orientation="top" class="grid grid-cols-2 gap-x-4 lg:col-span-3">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input name="start" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Check in">
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input name="end" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Check out">
                        </div>
                    </div>
                    <div class="lg:col-span-1">
                        <label for="guests" class="sr-only">Select number of guests</label>
                        <select id="guests"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Add guests</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5+</option>
                        </select>
                    </div>
                    <button type="submit"
                        class="lg:col-span-2 justify-center md:w-auto text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 inline-flex items-center">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Search
                    </button>
                </form>
            </div>
        </section>









        <div class="py-24 bg-white sm:py-32">
            <ul>
                <li v-for="tour in tours" :key="tour.id">
                    <div class="px-6 mx-auto max-w-7xl lg:px-8">
                        <div
                            class="max-w-2xl mx-auto mt-16 rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
                            <div class="p-8 sm:p-10 lg:flex-auto">
                                <h3 class="text-2xl font-bold tracking-tight text-gray-900">{{ tour.title }}:{{ tour.id
                                    }}</h3>
                                <p class="mt-6 text-base leading-7 text-gray-600">{{ tour.description_corta }}</p>
                                <div class="flex items-center mt-10 gap-x-4">
                                    <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">What’s
                                        included</h4>
                                    <div class="flex-auto h-px bg-gray-100"></div>
                                </div>
                                <!-- Detalles de tour -->
                                <ul role="list"
                                    class="grid grid-cols-1 gap-4 mt-8 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                                    <li class="flex gap-x-3">
                                        <svg class="flex-none w-5 h-6 text-indigo-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        HORA INICIO - {{ tour.hora_inicio }}
                                    </li>
                                    <li class="flex gap-x-3">
                                        <svg class="flex-none w-5 h-6 text-indigo-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        PERSONAS MINIMAS - {{ tour.min_personas }}
                                    </li>
                                    <li class="flex gap-x-3">
                                        <svg class="flex-none w-5 h-6 text-indigo-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        HORA FIN - {{ tour.hora_fin }}
                                    </li>
                                    <li class="flex gap-x-3">
                                        <svg class="flex-none w-5 h-6 text-indigo-600" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        PERSONAS MAXIMAS - {{ tour.max_personas }}
                                    </li>
                                </ul>
                            </div>
                            <div class="p-2 -mt-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                                <div
                                    class="py-10 text-center rounded-2xl bg-gray-50 ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                                    <div class="max-w-xs px-8 mx-auto">
                                        <p class="text-base font-semibold text-gray-600">IDIOMA : {{ tour.idioma }}</p>
                                        <p class="flex items-baseline justify-center mt-6 gap-x-2">
                                            <span class="text-5xl font-bold tracking-tight text-gray-900">${{
                                                tour.precio }}</span>
                                            <span
                                                class="text-sm font-semibold leading-6 tracking-wide text-gray-600">USD</span>
                                        </p>
                                        <!--boton que envia los datos -->
                                        <div
                                            class="block w-full px-3 py-2 mt-10 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                            <Link :href="`/tours/${tour.slug}`">Ver Detalles del Tour</Link>
                                        </div>


                                        <p class="mt-6 text-xs leading-5 text-gray-600">todos los derechos reservados
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

    </GuestLayout>
</template>
