<script setup>
import { defineProps, computed } from 'vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Breadcrumb from '@/Layouts/Partials/Admin/Breadcrumb.vue';
import DOMPurify from 'dompurify';

const props = defineProps({
    destination: Object
});

const breadcrumbs = [
    { name: 'admin.dashboard', label: 'Dashboard' },
    { name: 'admin.destinations.index', label: 'Destinos' },
    { name: 'admin.destinations.show', label: 'Ver' }
];

const sanitizedContent = computed(() => {
    return DOMPurify.sanitize(props.destination.content);
});
</script>

<template>
    <AdminLayout title="Destinos">
        <Breadcrumb :breadcrumbs="breadcrumbs" />

        <div>
            <h1>{{ props.destination.title }}</h1>
            <p>{{ props.destination.description }}</p>
            <div v-html="sanitizedContent"></div>
            <img :src="props.destination.image" alt="Imagen de destino" />
            <p>{{ props.destination.address }}</p>
            <p>{{ props.destination.latitude }}</p>
            <p>{{ props.destination.longitude }}</p>
            <p>{{ props.destination.weather }}</p>
            <p>{{ props.destination.slug }}</p>
            <p>{{ props.destination.accesibility }}</p>
            <p>{{ props.destination.status }}</p>
        </div>
    </AdminLayout>
</template>
