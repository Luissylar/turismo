<template>
    <div v-if="visible" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
      <div class="p-8 bg-white rounded-lg">
        <h2>Modal Title</h2>
        <p>Contenido del modal.</p>
        <button @click="closeModal">Cerrar</button>
      </div>
    </div>
  </template>

  <script setup>
  import { defineProps, defineEmits } from 'vue';

  const props = defineProps({
    visible: Boolean
  });

  const emits = defineEmits(['update:visible']);

  function closeModal() {
    emits('update:visible', false);
  }
  </script>
