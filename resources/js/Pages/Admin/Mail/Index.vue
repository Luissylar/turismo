<script setup>
import { usePage, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Breadcrumb from '@/Layouts/Partials/Admin/Breadcrumb.vue';
import { useToast } from 'vue-toastification';

const { props } = usePage();

//Acá esta el array del pan, xdd, osea literal se traduce, pan de migas, la cosa es que es para la navegación, xd
const breadcrumbs = [
    { name: 'admin.dashboard', label: 'Dashboard' },
    { name: 'admin.dashboard', label: 'Mail' },
    { name: 'admin.mail', label: 'Mail' }


];

const toast = useToast();

const showToast = () => {
    toast.success('¡Hola, este es un toast de éxito!');
};
</script>



<template>
    <AdminLayout title="Mail">
        <Breadcrumb :breadcrumbs="breadcrumbs" />
        aCÁ SERA PARA LOS MAILS, CREAR ETC ETC
        <button @click="showToast">Mostrar Toast</button>
    </AdminLayout>
</template>
