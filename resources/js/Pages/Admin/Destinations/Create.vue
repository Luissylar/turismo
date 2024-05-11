<script setup>
import { ref } from 'vue';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import Breadcrumb from '@/Layouts/Partials/Admin/Breadcrumb.vue';

const breadcrumbs = [
    { name: 'admin.dashboard', label: 'Dashboard' },
    { name: 'admin.destinations.index', label: 'Destinos' },
    { name: 'admin.destinations.create', label: 'Crear' }
];
const destination = ref({
  title: '',
  description: '',
  image: null,
  address: '',
  latitude: '',
  longitude: '',
  weather: '',
  slug: '',
  accesibility: '',
});

const handleFileChange = (event) => {
  destination.value.image = event.target.files[0];
};

const submit = async () => {
  const formData = new FormData();
  for (const key in destination.value) {
    if (destination.value[key] !== null) {
      formData.append(key, destination.value[key]);
    }
  }

  // Envía los datos al servidor
  await axios.post('/admin/destinations', formData, {
    headers: {
      'Content-Type': 'multipart/form-data'
    }
  });
};
</script>
<template>
    <AdminLayout title="destinos">
        <Breadcrumb :breadcrumbs="breadcrumbs" />


        <h1>Crear un nuevo destino</h1>
        <p>Modificar esta vista, falta añadir validaciones en el front, en el back, parece estar lo suficiente, auque igual mejoarar, pero en el front, falta validaciones, y mejorar bla bla bla bla bla bla bla bla</p>
        <form @submit.prevent="submit">
            <input v-model="destination.title" placeholder="Título" />
            <textarea v-model="destination.description" placeholder="Descripción"></textarea>
            <input type="file" @change="handleFileChange" placeholder="Imagen" />
            <input v-model="destination.address" placeholder="Dirección" />
            <input v-model="destination.latitude" placeholder="Latitud" />
            <input v-model="destination.longitude" placeholder="Longitud" />
            <input v-model="destination.weather" placeholder="Clima" />
            <input v-model="destination.slug" placeholder="Slug" />
            <input require v-model="destination.accesibility" placeholder="Accesibilidad" />
            <button type="submit">Guardar Destino</button>
        </form>
    </AdminLayout>

</template>
