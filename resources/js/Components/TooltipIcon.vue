<template>
    <span class="info-icon relative" @mouseover="showTooltip = true" @mouseleave="showTooltip = false">
      <i class="fas fa-info-circle ml-1 cursor-pointer"></i>
      <span v-if="showTooltip" class="info-text absolute bg-gray-700 text-white text-xs rounded py-1 px-2 bottom-full mb-2 left-1/2 transform -translate-x-1/2 whitespace-nowrap">
        {{ message }}
      </span>
    </span>
  </template>

  <script setup>
  import { ref } from 'vue';

  const props = defineProps({
    message: String
  });

  const showTooltip = ref(false);
  </script>

  <style scoped>
  .info-text::after {
    content: '';
    position: absolute;
    top: 100%; /* Ajusta según sea necesario */
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
  }
  </style>
