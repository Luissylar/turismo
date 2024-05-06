<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Breadcrumb from '@/Layouts/Partials/Admin/Breadcrumb.vue';

const breadcrumbs = [
  { name: 'admin.dashboard', label: 'Dashboard' },
  { name: 'admin.destinations.index', label: 'Destinos' },
  { name: 'admin.destinations.create', label: 'Crear' }
];
</script>
<template>
    <AdminLayout title="destinos">
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        <h1>acá se podrá crear el destino</h1>

    </AdminLayout>
</template>
