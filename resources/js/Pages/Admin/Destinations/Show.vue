    <script setup>
    import { defineProps } from 'vue';
    import AdminLayout from '@/Layouts/AdminLayout.vue';
    import Breadcrumb from '@/Layouts/Partials/Admin/Breadcrumb.vue';
    const props = defineProps({
    destination: Object
});
    const breadcrumbs = [
        { name: 'admin.dashboard', label: 'Dashboard' },
        { name: 'admin.destinations.index', label: 'Destinos' },
        { name: 'admin.destinations.show', label: 'ver' }
    ];
    </script>
    <template>
    <AdminLayout title="Destinos">
        <Breadcrumb :breadcrumbs="breadcrumbs" />

        <div>
            <h1>{{ props.destination.title }}</h1>
            <p>{{ props.destination.description }}</p>
            <p>{{ props.destination.address }}</p>
            <!-- Agrega más detalles según lo necesites -->
        </div>
    </AdminLayout>
    </template>
