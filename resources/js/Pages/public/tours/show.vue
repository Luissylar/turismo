<script setup>
import { ref } from 'vue';
import { defineProps } from 'vue';
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import { BellIcon } from '@heroicons/vue/24/outline';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import 'github-markdown-css';
import MarkdownIt from 'markdown-it';
import DOMPurify from 'dompurify';
// Define las props para recibir los datos del tour
const props = defineProps({
    tour: Object
});

const md = new MarkdownIt();
const tour = ref(props.tour);



// Usa DOMPurify para sanitizar el HTML
const descriptionHTML = computed(() => {
    const rawHtml = md.render(tour.value.description_larga);
    return DOMPurify.sanitize(rawHtml);
});
</script>

<template>

    <GuestLayout title="Tour">

        <div class="flex flex-col min-h-full">
            <header class="bg-white border-b border-gray-200 shrink-0">
                <div class="flex items-center justify-between h-16 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <img class="w-auto h-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                        alt="Your Company" />
                    <div class="flex items-center gap-x-8">
                        <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-300">
                            <span class="sr-only">View notifications</span>
                            <BellIcon class="w-6 h-6" aria-hidden="true" />
                        </button>
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your profile</span>
                            <img class="w-8 h-8 bg-gray-800 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="" />
                        </a>
                    </div>
                </div>

            </header>

            <!-- Modificar el "rem" -->
            <div class="flex items-start w-full px-4 py-10 mx-auto gap-x-8 sm:px-6 lg:px-8" style="max-width: 100rem;">

                <!-- Left column area -->
                <!-- <aside class="sticky hidden top-8 w-44 shrink-0 lg:block">

                    dadas dsa
                </aside> -->

                <main class="flex-1">
                    <br><br>
                    <div class="justify-between lg:flex">
                        <div class="px-4">
                            <div class="flex flex-col justify-center max-w-md mx-auto mb-4 lg:max-w-none lg:flex-row">
                                <ul class="grid order-2 grid-cols-4 gap-4 mt-8 lg:block lg:order-1 lg:space-y-4 lg:mt-0"
                                    id="product-2-tab" data-tabs-toggle="#product-2-tab-content"
                                    data-tabs-active-classes="border-gray-200 dark:border-gray-700"
                                    data-tabs-inactive-classes="border-transparent hover:border-gray-200 dark:hover:dark:border-gray-700 dark:border-transparent"
                                    role="tablist">
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="w-20 h-20 p-2 mx-auto overflow-hidden border-2 rounded-lg cursor-pointer sm:h-20 sm:w-20 md:h-24 md:w-24"
                                            id="product-2-image-1-tab" data-tabs-target="#product-2-image-1"
                                            type="button" role="tab" aria-controls="product-2-image-1"
                                            aria-selected="false">
                                            <img class="object-contain w-full h-full dark:hidden"
                                                src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                                alt="" />
                                            <img class="hidden object-contain w-full h-full dark:block"
                                                src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                                alt="" />
                                        </button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="w-20 h-20 p-2 mx-auto overflow-hidden border-2 rounded-lg cursor-pointer sm:h-20 sm:w-20 md:h-24 md:w-24"
                                            id="product-2-image-2-tab" data-tabs-target="#product-2-image-2"
                                            type="button" role="tab" aria-controls="product-2-image-2"
                                            aria-selected="false">
                                            <img class="object-contain w-full h-full dark:hidden"
                                                src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                                alt="" />
                                            <img class="hidden object-contain w-full h-full dark:block"
                                                src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                                alt="" />
                                        </button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="w-20 h-20 p-2 mx-auto overflow-hidden border-2 rounded-lg cursor-pointer sm:h-20 sm:w-20 md:h-24 md:w-24"
                                            id="product-2-image-3-tab" data-tabs-target="#product-2-image-3"
                                            type="button" role="tab" aria-controls="product-2-image-3"
                                            aria-selected="false">
                                            <img class="object-contain w-full h-full dark:hidden"
                                                src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                                alt="" />
                                            <img class="hidden object-contain w-full h-full dark:block"
                                                src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                                alt="" />
                                        </button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="w-20 h-20 p-2 mx-auto overflow-hidden border-2 rounded-lg cursor-pointer sm:h-20 sm:w-20 md:h-24 md:w-24"
                                            id="product-2-image-4-tab" data-tabs-target="#product-2-image-4"
                                            type="button" role="tab" aria-controls="product-2-image-4"
                                            aria-selected="false">
                                            <img class="object-contain w-full h-full dark:hidden"
                                                src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                                alt="" />
                                            <img class="hidden object-contain w-full h-full dark:block"
                                                src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                                alt="" />
                                        </button>
                                    </li>
                                </ul>

                                <div id="product-2-tab-content" class="order-1 lg:order-2">
                                    <div class="hidden px-4 bg-white rounded-lg dark:bg-gray-900" id="product-2-image-1"
                                        role="tabpanel" aria-labelledby="product-2-image-1-tab">
                                        <img class="w-full mx-auto dark:hidden"
                                            src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                            alt="" />
                                        <img class="hidden w-full mx-auto dark:block"
                                            src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                            alt="" />
                                    </div>
                                    <div class="hidden px-4 bg-white rounded-lg dark:bg-gray-900" id="product-2-image-2"
                                        role="tabpanel" aria-labelledby="product-2-image-2-tab">
                                        <img class="w-full mx-auto dark:hidden"
                                            src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                            alt="" />
                                        <img class="hidden w-full mx-auto dark:block"
                                            src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                            alt="" />
                                    </div>
                                    <div class="hidden px-4 bg-white rounded-lg dark:bg-gray-900" id="product-2-image-3"
                                        role="tabpanel" aria-labelledby="product-2-image-3-tab">
                                        <img class="w-full mx-auto dark:hidden"
                                            src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                            alt="" />
                                        <img class="hidden w-full mx-auto dark:block"
                                            src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                            alt="" />
                                    </div>
                                    <div class="hidden px-4 bg-white rounded-lg dark:bg-gray-900" id="product-2-image-4"
                                        role="tabpanel" aria-labelledby="product-2-image-4-tab">
                                        <img class="w-full mx-auto dark:hidden"
                                            src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                            alt="" />
                                        <img class="hidden w-full mx-auto dark:block"
                                            src="https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3"
                                            alt="" />
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div>
                        <div class="markdown-body" v-html="descriptionHTML"></div>
                    </div>

                    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">


                        <div>

                            <div class="relative mt-4">

                                <div v-for="itinerary in tour.itineraries" :key="itinerary.id"
                                    class="relative flex flex-col items-start mb-8 space-y-4 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-6">
                                    <div
                                        class="z-10 flex items-center justify-center w-8 h-8 bg-purple-500 rounded-full dark:bg-purple-400">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 32 32">
                                            <path
                                                d="M0 16q0-3.232 1.28-6.208t3.392-5.12 5.12-3.392 6.208-1.28q3.264 0 6.24 1.28t5.088 3.392 3.392 5.12 1.28 6.208q0 3.264-1.28 6.208t-3.392 5.12-5.12 3.424-6.208 1.248-6.208-1.248-5.12-3.424-3.392-5.12-1.28-6.208zM4 16q0 3.264 1.6 6.048t4.384 4.352 6.016 1.6 6.016-1.6 4.384-4.352 1.6-6.048-1.6-6.016-4.384-4.352-6.016-1.632-6.016 1.632-4.384 4.352-1.6 6.016zM14.016 16v-5.984q0-0.832 0.576-1.408t1.408-0.608 1.408 0.608 0.608 1.408v4h4q0.8 0 1.408 0.576t0.576 1.408-0.576 1.44-1.408 0.576h-6.016q-0.832 0-1.408-0.576t-0.576-1.44z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex items-center space-x-4">
                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 32 32">
                                                <path
                                                    d="M0 16q0-3.232 1.28-6.208t3.392-5.12 5.12-3.392 6.208-1.28q3.264 0 6.24 1.28t5.088 3.392 3.392 5.12 1.28 6.208q0 3.264-1.28 6.208t-3.392 5.12-5.12 3.424-6.208 1.248-6.208-1.248-5.12-3.424-3.392-5.12-1.28-6.208zM4 16q0 3.264 1.6 6.048t4.384 4.352 6.016 1.6 6.016-1.6 4.384-4.352 1.6-6.048-1.6-6.016-4.384-4.352-6.016-1.632-6.016 1.632-4.384 4.352-1.6 6.016zM14.016 16v-5.984q0-0.832 0.576-1.408t1.408-0.608 1.408 0.608 0.608 1.408v4h4q0.8 0 1.408 0.576t0.576 1.408-0.576 1.44-1.408 0.576h-6.016q-0.832 0-1.408-0.576t-0.576-1.44z">
                                                </path>
                                            </svg>
                                            <p class="text-lg font-bold text-gray-700 dark:text-gray-300">
                                                Inicio: {{ itinerary.start }}
                                            </p>
                                            <span class="mx-2 text-gray-700 dark:text-gray-300">|</span>
                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 32 32">
                                                <path
                                                    d="M0 16q0-3.232 1.28-6.208t3.392-5.12 5.12-3.392 6.208-1.28q3.264 0 6.24 1.28t5.088 3.392 3.392 5.12 1.28 6.208q0 3.264-1.28 6.208t-3.392 5.12-5.12 3.424-6.208 1.248-6.208-1.248-5.12-3.424-3.392-5.12-1.28-6.208zM4 16q0 3.264 1.6 6.048t4.384 4.352 6.016 1.6 6.016-1.6 4.384-4.352 1.6-6.048-1.6-6.016-4.384-4.352-6.016-1.632-6.016 1.632-4.384 4.352-1.6 6.016zM14.016 16v-5.984q0-0.832 0.576-1.408t1.408-0.608 1.408 0.608 0.608 1.408v4h4q0.8 0 1.408 0.576t0.576 1.408-0.576 1.44-1.408 0.576h-6.016q-0.832 0-1.408-0.576t-0.576-1.44z">
                                                </path>
                                            </svg>
                                            <p class="text-lg font-bold text-gray-700 dark:text-gray-300">
                                                Fin: {{ itinerary.end }}
                                            </p>
                                        </div>
                                        <div class="mt-2">
                                            <h4 class="text-xl font-bold text-gray-900 dark:text-white">
                                                <a href="#" class="hover:underline">{{ itinerary.title }}</a>
                                            </h4>
                                            <p class="mt-2 text-base font-normal text-gray-500 dark:text-gray-400">
                                                {{ itinerary.description }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>








                </main>
                <!-- Modificar el "w"  w-96 y colocarlo ono se -->
                <aside class="sticky hidden top-8 shrink-0 xl:block">
                    <!-- Right column area -->
                    <br><br>
                    <div class="w-full px-4 mt-6 lg:max-w-lg lg:mt-0 shrink-0">
                        <div
                            class="p-4 border border-gray-200 rounded-lg sm:p-6 lg:p-8 bg-gray-50 dark:border-gray-700">
                            <h1 class="text-xl font-semibold text-gray-900 dark:text-white">
                                {{ props.tour.title }}
                            </h1>

                            <div class="mt-4 sm:gap-4 sm:items-center sm:flex">
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                    the last 2 products
                                </span>

                                <div class="flex items-center gap-2 mt-4 sm:mt-0">
                                    <div class="flex items-center gap-1">
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                        </svg>
                                    </div>
                                    <a href="#"
                                        class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline dark:text-white">
                                        345 Reviews
                                    </a>
                                </div>
                            </div>

                            <div class="flex items-center gap-1 mt-4">
                                <svg class="w-5 h-5 text-primary-700 dark:text-primary-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                                </svg>
                                <p class="text-sm font-medium text-primary-700 dark:text-primary-500">
                                    Deliver to Bonnie Green- Sacramento 23647
                                </p>
                            </div>

                            <div class="flex items-center justify-between gap-4 mt-4 md:mt-6">
                                <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                                    ${{ props.tour.precio }}
                                </p>
                                <!-- Modificar para que muestre pa escoger entre adultos niños etc -->
                                <form class="flex items-center gap-2 mt-0">
                                    <div class="flex items-center gap-1">
                                        <label for="quantity"
                                            class="text-sm font-medium text-gray-900 dark:text-white">Quantity</label>
                                        <button data-tooltip-target="quantity-desc-3" data-tooltip-trigger="hover"
                                            class="text-gray-400 dark:text-gray-500 hover:text-gray-900 dark:hover:text-white">
                                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <div id="quantity-desc-3" role="tooltip"
                                            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            Quantity: Number of units to purchase.
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                    </div>
                                    <select id="quantity"
                                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected>0</option>
                                        <option value="1" selected>1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </form>
                            </div>

                            <div class="gap-4 mt-4 md:mt-6 sm:flex sm:items-center lg:flex-col">
                                <a href="#" title=""
                                    class="flex items-center w-full justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                    role="button">
                                    <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                    </svg>
                                    Add to cart
                                </a>

                                <a href="#" title=""
                                    class="text-white w-full mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
                                    role="button">
                                    <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                    </svg>

                                    Comprar ahora
                                </a>
                            </div>
                            <!--
                            <p class="mt-4 text-sm font-normal text-gray-500 md:mt-6 dark:text-gray-400">
                                Also available at competitive prices from
                                <a href="#" title=""
                                    class="font-medium underline text-primary-700 hover:no-underline dark:text-primary-500">authorized
                                    retailers</a>,
                                with optional Premium delivery for expedited shipping.
                            </p> -->

                            <div class="pt-8 mt-8 space-y-6 border-t border-gray-200 dark:border-gray-700">


                                <div>
                                    <p class="text-base font-medium text-gray-900 dark:text-white">
                                        SSD capacity
                                    </p>

                                    <div class="flex flex-wrap items-center gap-2 mt-2">
                                        <label for="256gb2" class="relative block">
                                            <input type="radio" name="capacity2" id="256gb2"
                                                class="absolute appearance-none top-2 left-2 peer" />
                                            <div
                                                class="relative flex items-center justify-center gap-4 px-2 py-1 overflow-hidden text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:peer-checked:bg-primary-900 dark:peer-checked:border-primary-600 dark:peer-checked:text-primary-300 dark:hover:bg-gray-600">
                                                <p class="text-sm font-medium">256GB</p>
                                            </div>
                                        </label>

                                        <label for="512gb2" class="relative block">
                                            <input type="radio" name="capacity2" id="512gb2"
                                                class="absolute appearance-none top-2 left-2 peer" />
                                            <div
                                                class="relative flex items-center justify-center gap-4 px-2 py-1 overflow-hidden text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:peer-checked:bg-primary-900 dark:peer-checked:border-primary-600 dark:peer-checked:text-primary-300 dark:hover:bg-gray-600">
                                                <p class="text-sm font-medium">512GB</p>
                                            </div>
                                        </label>

                                        <label for="1tb2" class="relative block">
                                            <input type="radio" name="capacity2" id="1tb2"
                                                class="absolute appearance-none top-2 left-2 peer" />
                                            <div
                                                class="relative flex items-center justify-center gap-4 px-2 py-1 overflow-hidden text-gray-500 bg-white border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:peer-checked:bg-primary-900 dark:peer-checked:border-primary-600 dark:peer-checked:text-primary-300 dark:hover:bg-gray-600">
                                                <p class="text-sm font-medium">1TB</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <p class="text-base font-medium text-gray-900 dark:text-white">
                                        Pickup
                                    </p>

                                    <div class="flex flex-col gap-4 mt-2">
                                        <div class="flex">
                                            <div class="flex items-center h-5">
                                                <input id="shipping-checkbox2"
                                                    aria-describedby="shipping-checkbox-text2" type="radio" value=""
                                                    name="shipping-2"
                                                    class="w-4 h-4 bg-white border-gray-300 rounded-full text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                            </div>
                                            <div class="text-sm ms-2">
                                                <label for="shipping-checkbox2"
                                                    class="font-medium text-gray-900 dark:text-white">
                                                    Shipping - $19
                                                </label>
                                                <p id="shipping-checkbox-text2"
                                                    class="text-xs font-normal text-gray-500 dark:text-gray-400">
                                                    Arrives Nov 17
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex">
                                            <div class="flex items-center h-5">
                                                <input id="pickup-checkbox2" aria-describedby="pickup-checkbox-text2"
                                                    type="radio" value="" name="shipping-2"
                                                    class="w-4 h-4 bg-white border-gray-300 rounded-full text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                            </div>
                                            <div class="text-sm ms-2">
                                                <label for="pickup-checkbox2"
                                                    class="font-medium text-gray-900 dark:text-white">
                                                    Pickup from Flowbox- $9
                                                </label>
                                                <a href="#" title="" id="pickup-checkbox-text2"
                                                    class="block text-xs font-medium underline text-primary-700 hover:no-underline dark:text-primary-500">
                                                    Pick a Flowbox near you
                                                </a>
                                            </div>
                                        </div>

                                        <div class="flex">
                                            <div class="flex items-center h-5">
                                                <input id="pickup-store-checkbox2"
                                                    aria-describedby="pickup-store-checkbox-text2" type="radio" value=""
                                                    name="shipping-2"
                                                    class="w-4 h-4 bg-white border-gray-300 rounded-full text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                    disabled />
                                            </div>
                                            <div class="text-sm ms-2">
                                                <label for="pickup-store-checkbox2"
                                                    class="font-medium text-gray-400 dark:text-gray-500">
                                                    Pickup from our store
                                                </label>
                                                <p id="pickup-store-checkbox-text2"
                                                    class="text-xs font-normal text-gray-400 dark:text-gray-500">
                                                    Not available
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <p class="text-base font-medium text-gray-900 dark:text-white">
                                        Add extra warranty
                                    </p>

                                    <div class="flex flex-wrap items-center gap-4 mt-2">
                                        <div class="flex items-center">
                                            <input id="1-year2" type="radio" value="" name="warranty-2"
                                                class="w-4 h-4 bg-white border-gray-300 rounded-full text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                            <label for="1-year2"
                                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">
                                                1 year - $39
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="2-years2" type="radio" value="" name="warranty-2"
                                                class="w-4 h-4 bg-white border-gray-300 rounded-full text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                            <label for="2-years2"
                                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">
                                                2 years - $69
                                            </label>
                                        </div>

                                        <div class="flex items-center">
                                            <input id="3-years2" type="radio" name="warranty-2" value=""
                                                class="w-4 h-4 bg-white border-gray-300 rounded-full text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
                                            <label for="3-years2"
                                                class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">
                                                3 years - $991
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <p class="text-base font-medium text-gray-900 dark:text-white">
                                        Metodos de pago
                                    </p>

                                    <div class="flex flex-wrap items-center gap-4 mt-2">
                                        <div class="flex items-center">
                                            <img src="" alt="Visa" class="h-8">
                                        </div>
                                        <!-- Mastercard -->
                                        <div class="flex items-center">
                                            <img src="" alt="Mastercard" class="h-8">
                                        </div>
                                        <!-- PayPal -->
                                        <div class="flex items-center">
                                            <img src="" alt="PayPal" class="h-8">
                                        </div>


                                    </div>
                                    <div class="flex flex-wrap items-center gap-4 mt-2">
                                        <!-- Diners Club -->
                                        <div class="flex items-center">
                                            <img src="" alt="Diners Club" class="h-8">
                                        </div>
                                        <!-- Yape -->
                                        <div class="flex items-center">
                                            <img src="" alt="Yape" class="h-8">
                                        </div>
                                        <!-- Transferencia -->
                                        <div class="flex items-center">
                                            <img src="" alt="Transferencia" class="h-8">
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </aside>
            </div>
        </div>


        <section>
            <div class="relative flex items-center justify-center text-white bg-center bg-no-repeat bg-cover"
                style="background-image: url('https://bing.com/th?id=OSGI.F39D9798C92E78B965070399A498A0E2&h=1000&w=1920&c=1&rs=1&o=3'); height: 50vh;">
                <div class="absolute inset-0 bg-black/40"></div> <!-- oscurecimiento más intenso -->
                <div class="z-10 flex flex-col items-center justify-center p-4 text-center">
                    <!-- Título centrado y grande -->
                    <h1
                        class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                        <span
                            class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">SHOW
                            TOURS</span>
                    </h1>
                    <p class="mt-4 text-base sm:text-lg md:text-xl">Descubre increibles </p>
                </div>
            </div>
        </section>

        <section class="py-8 antialiased bg-white md:py-16 xl:py-24 dark:bg-gray-900">
            <div class="max-w-screen-xl mx-auto">
                <div class="justify-between lg:flex">
                    <div class="px-4">
                        <div class="flex flex-col justify-center max-w-md mx-auto mb-4 lg:max-w-none lg:flex-row">
                            <ul class="grid order-2 grid-cols-4 gap-4 mt-8 lg:block lg:order-1 lg:space-y-4 lg:mt-0"
                                id="product-2-tab" data-tabs-toggle="#product-2-tab-content"
                                data-tabs-active-classes="border-gray-200 dark:border-gray-700"
                                data-tabs-inactive-classes="border-transparent hover:border-gray-200 dark:hover:dark:border-gray-700 dark:border-transparent"
                                role="tablist">
                                <li class="me-2" role="presentation">
                                    <button
                                        class="w-20 h-20 p-2 mx-auto overflow-hidden border-2 rounded-lg cursor-pointer sm:h-20 sm:w-20 md:h-24 md:w-24"
                                        id="product-2-image-1-tab" data-tabs-target="#product-2-image-1" type="button"
                                        role="tab" aria-controls="product-2-image-1" aria-selected="false">
                                        <img class="object-contain w-full h-full dark:hidden"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                                            alt="" />
                                        <img class="hidden object-contain w-full h-full dark:block"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"
                                            alt="" />
                                    </button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="w-20 h-20 p-2 mx-auto overflow-hidden border-2 rounded-lg cursor-pointer sm:h-20 sm:w-20 md:h-24 md:w-24"
                                        id="product-2-image-2-tab" data-tabs-target="#product-2-image-2" type="button"
                                        role="tab" aria-controls="product-2-image-2" aria-selected="false">
                                        <img class="object-contain w-full h-full dark:hidden"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-back.svg"
                                            alt="" />
                                        <img class="hidden object-contain w-full h-full dark:block"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-back-dark.svg"
                                            alt="" />
                                    </button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="w-20 h-20 p-2 mx-auto overflow-hidden border-2 rounded-lg cursor-pointer sm:h-20 sm:w-20 md:h-24 md:w-24"
                                        id="product-2-image-3-tab" data-tabs-target="#product-2-image-3" type="button"
                                        role="tab" aria-controls="product-2-image-3" aria-selected="false">
                                        <img class="object-contain w-full h-full dark:hidden"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components.svg"
                                            alt="" />
                                        <img class="hidden object-contain w-full h-full dark:block"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components-dark.svg"
                                            alt="" />
                                    </button>
                                </li>
                                <li class="me-2" role="presentation">
                                    <button
                                        class="w-20 h-20 p-2 mx-auto overflow-hidden border-2 rounded-lg cursor-pointer sm:h-20 sm:w-20 md:h-24 md:w-24"
                                        id="product-2-image-4-tab" data-tabs-target="#product-2-image-4" type="button"
                                        role="tab" aria-controls="product-2-image-4" aria-selected="false">
                                        <img class="object-contain w-full h-full dark:hidden"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-side.svg"
                                            alt="" />
                                        <img class="hidden object-contain w-full h-full dark:block"
                                            src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-side-dark.svg"
                                            alt="" />
                                    </button>
                                </li>
                            </ul>

                            <div id="product-2-tab-content" class="order-1 lg:order-2">
                                <div class="hidden px-4 bg-white rounded-lg dark:bg-gray-900" id="product-2-image-1"
                                    role="tabpanel" aria-labelledby="product-2-image-1-tab">
                                    <img class="w-full mx-auto dark:hidden"
                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                                        alt="" />
                                    <img class="hidden w-full mx-auto dark:block"
                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"
                                        alt="" />
                                </div>
                                <div class="hidden px-4 bg-white rounded-lg dark:bg-gray-900" id="product-2-image-2"
                                    role="tabpanel" aria-labelledby="product-2-image-2-tab">
                                    <img class="w-full mx-auto dark:hidden"
                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-back.svg"
                                        alt="" />
                                    <img class="hidden w-full mx-auto dark:block"
                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-back-dark.svg"
                                        alt="" />
                                </div>
                                <div class="hidden px-4 bg-white rounded-lg dark:bg-gray-900" id="product-2-image-3"
                                    role="tabpanel" aria-labelledby="product-2-image-3-tab">
                                    <img class="w-full mx-auto dark:hidden"
                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components.svg"
                                        alt="" />
                                    <img class="hidden w-full mx-auto dark:block"
                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components-dark.svg"
                                        alt="" />
                                </div>
                                <div class="hidden px-4 bg-white rounded-lg dark:bg-gray-900" id="product-2-image-4"
                                    role="tabpanel" aria-labelledby="product-2-image-4-tab">
                                    <img class="w-full mx-auto dark:hidden"
                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-side.svg"
                                        alt="" />
                                    <img class="hidden w-full mx-auto dark:block"
                                        src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-side-dark.svg"
                                        alt="" />
                                </div>
                            </div>
                        </div>

                        <!-- <div id="accordion-flush" data-accordion="collapse"
                            data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
                            data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 id="accordion-flush-heading-1">
                                <button type="button"
                                    class="flex items-center justify-between w-full gap-3 py-5 font-medium text-gray-500 border-b border-gray-200 rtl:text-right dark:border-gray-700 dark:text-gray-400"
                                    data-accordion-target="#accordion-flush-body-1" aria-expanded="true"
                                    aria-controls="accordion-flush-body-1">
                                    <span>Product Details</span>
                                    <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 9-7 7-7-7" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-1" class="hidden" aria-labelledby="accordion-flush-heading-1">
                                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">The product is a high-quality,
                                        durable solution designed to meet the needs of modern consumers. It features
                                        advanced technology and ergonomic design for optimal performance and comfort.
                                    </p>
                                    <p class="text-gray-500 dark:text-gray-400">Key features include a sleek interface,
                                        customizable settings, and compatibility with various devices. It is ideal for
                                        professionals and enthusiasts alike.</p>
                                </div>
                            </div>
                            <h2 id="accordion-flush-heading-2">
                                <button type="button"
                                    class="flex items-center justify-between w-full gap-3 py-5 font-medium text-gray-500 border-b border-gray-200 rtl:text-right dark:border-gray-700 dark:text-gray-400"
                                    data-accordion-target="#accordion-flush-body-2" aria-expanded="false"
                                    aria-controls="accordion-flush-body-2">
                                    <span>Specifications</span>
                                    <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 9-7 7-7-7" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">Specifications include advanced
                                        processor capabilities, extensive storage options, and seamless connectivity.
                                        The product is designed to handle demanding tasks efficiently.</p>
                                    <p class="text-gray-500 dark:text-gray-400">Additional features include
                                        high-resolution display, long-lasting battery life, and intuitive user interface
                                        for enhanced productivity.</p>
                                </div>
                            </div>
                            <h2 id="accordion-flush-heading-3">
                                <button type="button"
                                    class="flex items-center justify-between w-full gap-3 py-5 font-medium text-gray-500 border-b border-gray-200 rtl:text-right dark:border-gray-700 dark:text-gray-400"
                                    data-accordion-target="#accordion-flush-body-3" aria-expanded="false"
                                    aria-controls="accordion-flush-body-3">
                                    <span>Warranty</span>
                                    <svg data-accordion-icon class="w-5 h-5 rotate-180 shrink-0" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 9-7 7-7-7" />
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">The product comes with a
                                        comprehensive warranty that covers manufacturing defects and malfunctions. It
                                        provides peace of mind and assurance of product quality.</p>
                                    <p class="mb-2 text-gray-500 dark:text-gray-400">Customers can enjoy reliable
                                        support and prompt assistance for any issues related to the product during the
                                        warranty period.</p>
                                </div>
                            </div>
                        </div> -->

                    </div>


                </div>
            </div>
        </section>
        <div class="container p-4 mx-auto">
            <h1 class="mb-4 text-2xl font-bold">{{ tour.title }}</h1>
            <p><strong>ID:</strong> {{ tour.id }}</p>
            <p><strong>Título:</strong> {{ tour.title }}</p>
            <p><strong>Descripción Corta:</strong> {{ tour.description_corta }}</p>
            <p><strong>Descripción Larga:</strong> {{ tour.description_larga }}</p>
            <p><strong>Duración (Horas):</strong> {{ tour.duracion_horas }}</p>
            <p><strong>Hora de Inicio:</strong> {{ tour.hora_inicio }}</p>
            <p><strong>Hora de Fin:</strong> {{ tour.hora_fin }}</p>
            <p><strong>Máximo de Personas:</strong> {{ tour.max_personas }}</p>
            <p><strong>Mínimo de Personas:</strong> {{ tour.min_personas }}</p>
            <p><strong>Imagen:</strong> <img :src="tour.imagen" alt="Imagen del tour"></p>
            <p><strong>Estatus:</strong> {{ tour.estatus }}</p>
            <p><strong>Slug:</strong> {{ tour.slug }}</p>
            <p><strong>Idioma:</strong> {{ tour.idioma }}</p>
            <p><strong>Información Adicional:</strong> {{ tour.informacion_adicional }}</p>
            <p><strong>Políticas de Cancelación:</strong> {{ tour.politicas_cancela }}</p>
            <p><strong>Recomendaciones:</strong> {{ tour.recomendaciones }}</p>
            <p><strong>Precio:</strong> {{ tour.precio }}</p>
            <p><strong>ID del Usuario:</strong> {{ tour.user_id }}</p>
            <p><strong>ID de la Categoría:</strong> {{ tour.category_id }}</p>
            <p><strong>ID del Precio:</strong> {{ tour.price_id }}</p>
            <p><strong>Fecha de Creación:</strong> {{ tour.created_at }}</p>
            <p><strong>Fecha de Actualización:</strong> {{ tour.updated_at }}</p>
        </div>


        <div class="py-24 bg-white sm:py-32">
            <div class="px-6 mx-auto max-w-7xl lg:px-8">
                <div
                    class="max-w-2xl mx-auto mt-16 rounded-3xl ring-1 ring-gray-200 sm:mt-20 lg:mx-0 lg:flex lg:max-w-none">
                    <div class="p-8 sm:p-10 lg:flex-auto">
                        <h3 class="text-2xl font-bold tracking-tight text-gray-900">{{ props.tour.title }}</h3>
                        <p class="mt-6 text-base leading-7 text-gray-600">{{ props.tour.description_corta }}</p>
                        <div class="flex items-center mt-10 gap-x-4">
                            <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">What’s included</h4>
                            <div class="flex-auto h-px bg-gray-100"></div>
                        </div>
                        <!-- Detalles de tour -->
                        <ul role="list"
                            class="grid grid-cols-1 gap-4 mt-8 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                HORA INICIO - {{ props.tour.hora_inicio }}
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                PERSONAS MINIMAS - {{ props.tour.min_personas }}
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                HORA FIN - {{ props.tour.hora_fin }}
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="flex-none w-5 h-6 text-indigo-600" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                        clip-rule="evenodd" />
                                </svg>
                                PERSONAS MAXIMAS - {{ props.tour.max_personas }}
                            </li>
                        </ul>
                    </div>
                    <div class="p-2 -mt-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
                        <div
                            class="py-10 text-center rounded-2xl bg-gray-50 ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                            <div class="max-w-xs px-8 mx-auto">
                                <p class="text-base font-semibold text-gray-600">IDIOMA : {{ props.tour.idioma }}</p>
                                <p class="flex items-baseline justify-center mt-6 gap-x-2">
                                    <span class="text-5xl font-bold tracking-tight text-gray-900">${{ props.tour.precio
                                        }}</span>
                                    <span class="text-sm font-semibold leading-6 tracking-wide text-gray-600">USD</span>
                                </p>

                                <div
                                    class="block w-full px-3 py-2 mt-10 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    <i class="fas fa-cart-plus"></i>
                                    <Link :href="`#`">.AGREGAR</Link>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
