<script setup>
import { ref } from 'vue';
import { useForm, useField } from 'vee-validate';
import * as yup from 'yup';
import axios from 'axios';


import AdminLayout from '@/Layouts/AdminLayout.vue';
import Breadcrumb from '@/Layouts/Partials/Admin/Breadcrumb.vue';
import QuillEditor from '@/Components/QuillEditor.vue';

const breadcrumbs = [
    { name: 'admin.dashboard', label: 'Dashboard' },
    { name: 'admin.destinations.index', label: 'Destinos' },
    { name: 'admin.destinations.create', label: 'Crear' }
];

const schema = yup.object({
    title: yup.string().required('El título es requerido'),
    description: yup.string().required('La descripción es requerida'),
    content: yup.string().required('El contenido es requerido'),
    image: yup.mixed().required('La imagen es requerida'),
    address: yup.string().required('La dirección es requerida'),
    latitude: yup.string().required('La latitud es requerida'),
    longitude: yup.string().required('La longitud es requerida'),
    weather: yup.string().required('El clima es requerido'),
    slug: yup.string().required('El slug es requerido'),
    accesibility: yup.string().required('La accesibilidad es requerida'),
});

const { handleSubmit, resetForm, setErrors } = useForm({
    validationSchema: schema,
});

const { value: title, errorMessage: titleError, handleBlur: titleBlur, } = useField('title');

const { value: description, errorMessage: descriptionError, handleBlur: descriptionBlur, } = useField('description');

const { value: content, errorMessage: contentError, handleBlur: contentBlur, } = useField('content');

const { value: image, errorMessage: imageError, handleBlur: imageBlur, } = useField('image');

const { value: address, errorMessage: addressError, handleBlur: addressBlur, } = useField('address');

const { value: latitude, errorMessage: latitudeError, handleBlur: latitudeBlur, } = useField('latitude');

const { value: longitude, errorMessage: longitudeError, handleBlur: longitudeBlur, } = useField('longitude');

const { value: weather, errorMessage: weatherError, handleBlur: weatherBlur, } = useField('weather');

const { value: slug, errorMessage: slugError, handleBlur: slugBlur, } = useField('slug');

const { value: accesibility, errorMessage: accesibilityError, handleBlur: accesibilityBlur, } = useField('accesibility');

const handleFileChange = (event) => {
    image.value = event.target.files[0];
};

const successMessage = ref('');
const errorMessage = ref('');

const submit = handleSubmit(async (values) => {
    const formData = new FormData();
    for (const key in values) {
        formData.append(key, values[key]);
    }

    try {
        // Envía los datos al servidor
        const response = await axios.post('/admin/destinations', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        });

        successMessage.value = response.data.message;
        errorMessage.value = '';
        resetForm();
    } catch (error) {
        if (error.response && error.response.data && error.response.data.errors) {
            setErrors(error.response.data.errors);
            errorMessage.value = error.response.data.message;
        } else {
            console.error('Unexpected error', error);
            errorMessage.value = 'Ha ocurrido un error inesperado.';
        }
    }
});

const quillOptions = {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ 'font': [] }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'list': 'ordered' }, { 'list': 'bullet' }],
            [{ 'script': 'sub' }, { 'script': 'super' }],
            [{ 'indent': '-1' }, { 'indent': '+1' }],
            [{ 'direction': 'rtl' }],
            [{ 'size': ['small', false, 'large', 'huge'] }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }],
            ['link', 'image', 'video'],
            ['blockquote', 'code-block'],
            ['clean']
        ]
    }
};
</script>

<template>
    <AdminLayout title="destinos">
        <Breadcrumb :breadcrumbs="breadcrumbs" />


        <form @submit.prevent="submit" class="space-y-4">
            <div>
                <input class="w-full p-2 border rounded" v-model="title" @blur="titleBlur" placeholder="Título" />
                <span class="text-red-500">{{ titleError }}</span>
            </div>
            <div>
                <textarea class="w-full p-2 border rounded" v-model="description" @blur="descriptionBlur"
                    placeholder="Descripción"></textarea>
                <span class="text-red-500">{{ descriptionError }}</span>
            </div>
            <div>
                <QuillEditor v-model="content" :options="quillOptions" />
                <span class="text-red-500">{{ contentError }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded file:bg-blue-50 file:border-none file:rounded file:p-2"
                    type="file" @change="handleFileChange" placeholder="Imagen" />
                <span class="text-red-500">{{ imageError }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded" v-model="address" @blur="addressBlur"
                    placeholder="Dirección" />
                <span class="text-red-500">{{ addressError }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded" v-model="latitude" @blur="latitudeBlur"
                    placeholder="Latitud" />
                <span class="text-red-500">{{ latitudeError }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded" v-model="longitude" @blur="longitudeBlur"
                    placeholder="Longitud" />
                <span class="text-red-500">{{ longitudeError }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded" v-model="weather" @blur="weatherBlur" placeholder="Clima" />
                <span class="text-red-500">{{ weatherError }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded" v-model="slug" @blur="slugBlur" placeholder="Slug" />
                <span class="text-red-500">{{ slugError }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded" v-model="accesibility" @blur="accesibilityBlur"
                    placeholder="Accesibilidad" />
                <span class="text-red-500">{{ accesibilityError }}</span>
            </div>
            <button class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600" type="submit">Guardar
                Destino</button>
        </form>

        <!-- Mensajes de éxito o error -->
        <div v-if="successMessage" class="p-4 mt-4 text-green-700 bg-green-100 rounded">
            {{ successMessage }}
        </div>
        <div v-if="errorMessage" class="p-4 mt-4 text-red-700 bg-red-100 rounded">
            {{ errorMessage }}
        </div>
    </AdminLayout>
</template>
