<script setup>

import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
    breadcrumbs: Array
});
</script>

<template>


    <!-- para colocar un fondo blanco bg-white rounded-lg shadow dentro del nav (Opcional)-->
    <nav aria-label="breadcrumb" class="p-4">
        <ol class="flex flex-wrap list-none">
            <li v-for="(crumb, index) in props.breadcrumbs" :key="index" class="flex items-center">
                <Link v-if="index !== props.breadcrumbs.length - 1" :href="route(crumb.name)"
                    class="relative text-blue-600 transition-colors duration-300 ease-in-out hover:text-blue-800 hover:scale-110 before:absolute before:bg-blue-600 before:inset-0 before:opacity-0 before:transition-opacity before:duration-300 hover:before:opacity-5">
                {{ crumb.label }}
                </Link>
                <span v-else class="font-semibold text-gray-500">
                    {{ crumb.label }}
                </span>
                <span v-if="index < props.breadcrumbs.length - 1" class="mx-2 text-gray-500 animate-pulse">/</span>
            </li>
        </ol>
    </nav>
</template>
