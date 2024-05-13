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
    content: '',
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

        <h1 class="my-4 text-2xl font-bold">Crear un nuevo destino</h1>
        <p class="mb-4 text-gray-600">Modificar esta vista, falta añadir validaciones en el front, en el back, parece
            estar lo suficiente, aunque igual mejorar, pero en el front, falta validaciones, y mejorar...</p>
        <form @submit.prevent="submit" class="space-y-4">
            <input class="w-full p-2 border rounded" v-model="destination.title" placeholder="Título" />
            <textarea class="w-full p-2 border rounded" v-model="destination.description"
                placeholder="Descripción"></textarea>
            <textarea class="w-full p-2 border rounded" v-model="destination.content"
                placeholder="Contenido"> </textarea>

            <input class="w-full p-2 border rounded file:bg-blue-50 file:border-none file:rounded file:p-2" type="file"
                @change="handleFileChange" placeholder="Imagen" />
            <input class="w-full p-2 border rounded" v-model="destination.address" placeholder="Dirección" />
            <input class="w-full p-2 border rounded" v-model="destination.latitude" placeholder="Latitud" />
            <input class="w-full p-2 border rounded" v-model="destination.longitude" placeholder="Longitud" />
            <input class="w-full p-2 border rounded" v-model="destination.weather" placeholder="Clima" />
            <input class="w-full p-2 border rounded" v-model="destination.slug" placeholder="Slug" />
            <input class="w-full p-2 border rounded" required v-model="destination.accesibility"
                placeholder="Accesibilidad" />
            <button class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600" type="submit">Guardar
                Destino</button>
        </form>
    </AdminLayout>


</template>
