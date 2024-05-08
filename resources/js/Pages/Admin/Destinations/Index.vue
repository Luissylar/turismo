<script setup>
import { usePage } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Breadcrumb from '@/Layouts/Partials/Admin/Breadcrumb.vue';
// Utiliza usePage para acceder a los props de Inertia
const { props } = usePage();





//el array de breadcrumbs
const breadcrumbs = [
    { name: 'admin.dashboard', label: 'Dashboard' },
    { name: 'admin.dashboard', label: 'Dashboard' },

    { name: 'admin.destinations.index', label: 'Destinos' }


];
</script>
<template>
    <AdminLayout title="destinos">
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <div class="mt-4">
            <h2 class="mb-4 text-2xl font-bold">Lista de Destinos</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Título
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="destination in props.destinations" :key="destination.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ destination.title }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ destination.status }}
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <a :href="destination.viewUrl" class="px-4 text-indigo-600 hover:text-indigo-900">Ver</a>
                            <a :href="destination.editUrl" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- <div>
            <h2>Lista de Destinos</h2>
            <ul>
                <li v-for="destination in props.destinations" :key="destination.id">
                    {{ destination.title }} - {{ destination.status }}
                </li>
            </ul>
        </div> -->
    </AdminLayout>
</template>
