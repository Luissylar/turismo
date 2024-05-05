<script setup>
import AdminLayout from '@/Layouts/GuestLayout.vue';
import TestModal from '@/Components/TestModal.vue';
import { ref } from 'vue';

const showModal = ref(false);

function toggleModal() {
  showModal.value = !showModal.value;
}
</script>

<template>
  <AdminLayout title="xd">
    <button @click="toggleModal">Mostrar modal</button>
    <TestModal :visible="showModal" @update:visible="showModal = $event" />
  </AdminLayout>
</template>
