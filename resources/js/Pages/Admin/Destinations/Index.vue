<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Breadcrumb from '@/Layouts/Partials/Admin/Breadcrumb.vue';

const breadcrumbs = [
  { name: 'admin.dashboard', label: 'Dashboard' },

  { name: 'admin.destinations.index', label: 'Destinos' }


];
</script>
<template>
    <AdminLayout title="destinos">
        <Breadcrumb :breadcrumbs="breadcrumbs" />


    </AdminLayout>
</template>
