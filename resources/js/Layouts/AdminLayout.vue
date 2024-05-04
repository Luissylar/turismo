<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import AdminHeader from '@/Layouts/Partials/Admin/AdminHeader.vue';
import AdminSidebar from '@/Layouts/Partials/Admin/AdminSidebar.vue';
import AdminFooter from '@/Layouts/Partials/Admin/AdminFooter.vue';

defineProps({
    title: String,
});
</script>

<template>
    <div>
        <Head :title="title" />
        <AdminHeader />  <!-- Incluye el componente AdminHeader aquí -->
        <div class="main-content">
            <AdminSidebar />  <!-- Incluye el componente AdminSidebar aquí -->
            <main>
                <slot />  <!-- Este slot permite la inclusión de contenido adicional -->
            </main>
            <AdminFooter />  <!-- Incluye el componente AdminFooter aquí -->
        </div>
    </div>
</template>

