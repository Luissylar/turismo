<script setup>
import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import * as yup from 'yup';

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

const form = useForm({
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

const { props } = usePage();
const successMessage = ref(props.flash?.success || '');
const errorMessage = ref('');

watch(() => props.flash, (newFlash) => {
    successMessage.value = newFlash?.success || '';
});

const submit = () => {
    form.transform(data => ({
        ...data,
        image: form.image instanceof File ? form.image : null
    }))
    .post('/admin/destinations', {
        onSuccess: () => {
            successMessage.value = 'Destino guardado exitosamente';
            errorMessage.value = '';
            form.reset();
        },
        onError: errors => {
            errorMessage.value = 'Ha ocurrido un error';
            form.setErrors(errors);
        }
    });
};

const handleFileChange = (event) => {
    form.image = event.target.files[0];
};

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
                <input class="w-full p-2 border rounded" v-model="form.title" placeholder="Título" />
                <span class="text-red-500">{{ form.errors.title }}</span>
            </div>
            <div>
                <textarea class="w-full p-2 border rounded" v-model="form.description" placeholder="Descripción"></textarea>
                <span class="text-red-500">{{ form.errors.description }}</span>
            </div>
            <div>
                <QuillEditor v-model="form.content" :options="quillOptions" />
                <span class="text-red-500">{{ form.errors.content }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded file:bg-blue-50 file:border-none file:rounded file:p-2"
                    type="file" @change="handleFileChange" placeholder="Imagen" />
                <span class="text-red-500">{{ form.errors.image }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded" v-model="form.address" placeholder="Dirección" />
                <span class="text-red-500">{{ form.errors.address }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded" v-model="form.latitude" placeholder="Latitud" />
                <span class="text-red-500">{{ form.errors.latitude }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded" v-model="form.longitude" placeholder="Longitud" />
                <span class="text-red-500">{{ form.errors.longitude }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded" v-model="form.weather" placeholder="Clima" />
                <span class="text-red-500">{{ form.errors.weather }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded" v-model="form.slug" placeholder="Slug" />
                <span class="text-red-500">{{ form.errors.slug }}</span>
            </div>
            <div>
                <input class="w-full p-2 border rounded" v-model="form.accesibility" placeholder="Accesibilidad" />
                <span class="text-red-500">{{ form.errors.accesibility }}</span>
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
