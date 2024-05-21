<script setup>
import { ref, computed } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Breadcrumb from '@/Layouts/Partials/Admin/Breadcrumb.vue';

const breadcrumbs = [
    { name: 'admin.dashboard', label: 'Dashboard' },
    { name: 'admin.setting', label: 'Facturación rápida' }
];

// Definir las pestañas
const tabs = ref([
    { name: 'xdxd', href: 'admin.dashboard', current: false },
    { name: 'Crear Factura', href: 'admin.facturacion.home', current: false },
    { name: 'Crear Boleta', href: 'admin.facturacion.home', current: false },
    { name: 'Crear Factura', href: 'admin.dashboard', current: false },

]);

// Obtener la ruta actual
const page = usePage();
const currentUrl = page.url;

// Computar las pestañas actualizadas con el estado current
const tabsComputed = computed(() => {
    return tabs.value.map(tab => {
        tab.current = route().current(tab.href);
        return tab;
    });
});
</script>


<template>
    <AdminLayout title="Help">
        <div class="relative pb-5 border-b border-gray-200 sm:pb-0">
            <div class="md:flex md:items-center md:justify-between">
                <h3 class="text-base font-semibold leading-6 text-gray-900">
                    <Breadcrumb :breadcrumbs="breadcrumbs" />
                </h3>
                <div class="flex mt-3 md:absolute md:right-0 md:top-3 md:mt-0">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 ml-3 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Boton</button>
                </div>
            </div>
            <div class="mt-4">
                <div class="sm:hidden">
                    <label for="current-tab" class="sr-only">Select a tab</label>
                    <select id="current-tab" name="current-tab"
                        class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                        <option v-for="tab in tabsComputed" :key="tab.name" :selected="tab.current">{{ tab.name }}
                        </option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <nav class="flex items-center -mb-px">
                        <div class="flex space-x-8">
                            <Link v-for="tab in tabsComputed" :key="tab.name" :href="route(tab.href)"
                                :class="[tab.current ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700', 'whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium']"
                                :aria-current="tab.current ? 'page' : undefined">{{ tab.name }}</Link>
                        </div>
                        <div class="ml-auto">
                            <Link :href="route('admin.dashboard')"
                                class="inline-flex items-center px-3 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Opciones Avanzadas
                            </Link>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>

