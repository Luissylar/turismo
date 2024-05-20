<script setup>
import { ref, watch } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import * as yup from 'yup';
import { useToast } from 'vue-toastification';

import TooltipIcon from '@/Components/TooltipIcon.vue';

import DOMPurify from 'dompurify';
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

const imagePreview = ref(null);

const { props } = usePage();
const toast = useToast();


const successMessage = ref(props.flash?.success || '');
const errorMessage = ref('');
const isLoading = ref(false);


watch(() => props.flash, (newFlash) => {
    if (newFlash?.success) {
        toast.success(newFlash.success);
    }
    if (newFlash?.error) {
        toast.error(newFlash.error);
    }
});

const submit = () => {
    isLoading.value = true;
    form.transform(data => ({
        ...data,
        image: form.image instanceof File ? form.image : null,
        content: DOMPurify.sanitize(data.content) // Sanitiza el contenido aquí
    }))
        .post('/admin/destinations', {
            onStart: () => {
                // No mostrar notificación "Procesando..."
            },
            onSuccess: () => {
                toast.success('Destino guardado exitosamente', {
                    timeout: 5000 // Tiempo de visualización de la alerta en milisegundos
                });
                errorMessage.value = '';
                form.reset();
                imagePreview.value = null;
                isLoading.value = false;
            },
            onError: errors => {
                toast.error('Ha ocurrido un error', {
                    timeout: 1000 // Tiempo de visualización de la alerta en milisegundos
                });
                form.setErrors(errors);
                isLoading.value = false;
            },
            onFinish: () => {
                isLoading.value = false;
            }
        });
};

const handleFileChange = (event) => {
    const file = event.target.files[0];
    form.image = file;

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    } else {
        imagePreview.value = null;
    }
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
                <!-- <input class="w-full p-2 border rounded" v-model="form.title" placeholder="Título" />
                <span class="text-red-500">{{ form.errors.title }}</span> -->
            </div>
            <div>
                <!-- <textarea class="w-full p-2 border rounded" v-model="form.description"
                    placeholder="Descripción"></textarea>
                <span class="text-red-500">{{ form.errors.description }}</span> -->
            </div>
            <div>
                <!-- <QuillEditor v-model="form.content" :options="quillOptions" />
                <span class="text-red-500">{{ form.errors.content }}</span> -->
            </div>
            <div>
                <!-- <input class="w-full p-2 border rounded file:bg-blue-50 file:border-none file:rounded file:p-2"
                    type="file" @change="handleFileChange" placeholder="Imagen" />
                <span class="text-red-500">{{ form.errors.image }}</span> -->
            </div>
            <div>
                <!-- <input class="w-full p-2 border rounded" v-model="form.address" placeholder="Dirección" />
                <span class="text-red-500">{{ form.errors.address }}</span> -->
            </div>
            <div>
                <!-- <input class="w-full p-2 border rounded" v-model="form.latitude" placeholder="Latitud" />
                <span class="text-red-500">{{ form.errors.latitude }}</span> -->
            </div>
            <div>
                <!-- <input class="w-full p-2 border rounded" v-model="form.longitude" placeholder="Longitud" />
                <span class="text-red-500">{{ form.errors.longitude }}</span> -->
            </div>
            <div>

            </div>
            <div>
                <!-- <input class="w-full p-2 border rounded" v-model="form.slug" placeholder="Slug" />
                <span class="text-red-500">{{ form.errors.slug }}</span> -->
            </div>
            <div>
                <!-- <input class="w-full p-2 border rounded" v-model="form.accesibility" placeholder="Accesibilidad" />
                    <span class="text-red-500">{{ form.errors.accesibility }}</span> -->
            </div>
            <!-- <button class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600" type="submit">Guardar
                Destino</button> -->
        </form>










        <section class="bg-white dark:bg-gray-900">


            <form @submit.prevent="submit">
                <div class="max-w-5xl px-4 py-8 mx-auto lg:py-16">

                    <div id="create-product-accordion-collapse">

                        <div id="create-product-accordion-collapse-body-1" class=""
                            aria-labelledby="create-product-accordion-collapse-heading-1">
                            <div class="py-4 border-gray-200 sm:py-5 dark:border-gray-700">
                                <!-- Inputs -->
                                <div class="grid gap-4 md:gap-6 md:grid-cols-2">
                                    <!-- Column -->
                                    <div class="space-y-4 sm:space-y-6">
                                        <div>
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo
                                                del Destino
                                                <TooltipIcon
                                                    message="Este es el título del destino. Asegúrate de que sea descriptivo y claro." />
                                            </label>


                                            <input
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                v-model="form.title" placeholder="Título" />
                                            <span class="text-red-500">{{ form.errors.title }}</span>

                                        </div>
                                        <div>
                                            <label for="description"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                            <div
                                                class="w-full mb-4 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600">
                                                <div class="flex items-center px-3 py-2 border-b dark:border-green-600">

                                                    <div class="flex items-center space-x-1 sm:pr-4">
                                                        <label for="description"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Una
                                                            descripción corta.
                                                        </label>
                                                        <span class="text-red-500">{{ form.errors.description }}</span>
                                                    </div>


                                                </div>
                                                <div class="px-4 py-2 rounded-b-lg bg-gray-50 dark:bg-gray-700">
                                                    <textarea rows="6"
                                                        class="block w-full px-0 text-sm text-gray-800 border-0 bg-gray-50 dark:bg-gray-700 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                                        v-model="form.description" placeholder="Descripción"></textarea>
                                                </div>



                                            </div>
                                        </div>
                                        <div>
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Accesibilidad
                                                <TooltipIcon message="Aceesibilidad palabras cortas" />
                                            </label>

                                            <input
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                v-model="form.accesibility" placeholder="Accesibilidad" />
                                            <span class="text-red-500">{{ form.errors.accesibility }}</span>

                                        </div>
                                        <div class="space-y-4 sm:flex sm:space-x-4 sm:space-y-0">
                                            <div class="w-full">
                                                <label for="length"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latitud
                                                    φ (Phi)
                                                    <TooltipIcon message="Opcional" />
                                                </label>
                                                <input
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    v-model="form.latitude" placeholder="Latitud" />

                                                <span class="text-red-500">{{ form.errors.latitude }}</span>

                                            </div>
                                            <div class="w-full">
                                                <label for="breadth"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">longitud
                                                    <TooltipIcon message="Opcional" />
                                                </label>
                                                <input
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    v-model="form.longitude" placeholder="Longitud" />
                                                <span class="text-red-500">{{ form.errors.longitude }}</span>

                                            </div>
                                            <div class="w-full">
                                                <label for="width"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Clima
                                                    <TooltipIcon message="Opcional" />
                                                </label>

                                                <input
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    v-model="form.weather" placeholder="Clima" />
                                                <span class="text-red-500">{{ form.errors.weather }}</span>

                                            </div>
                                        </div>




                                    </div>
                                    <!-- Column -->
                                    <div class="space-y-4 sm:space-y-6">
                                        <div>
                                            <label for="tags"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug
                                                <TooltipIcon message="El slug sirve para tema de SEO" />
                                            </label>
                                            <input
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                v-model="form.slug" placeholder="Slug" />
                                            <span class="text-red-500">{{ form.errors.slug }}</span>

                                        </div>
                                        <div>
                                            <label for="description"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección
                                                <TooltipIcon message="Usar solo un link de Google maps" />
                                            </label>
                                            <input
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                v-model="form.address" placeholder="https://maps.app.goo.gl/example" />
                                            <span class="text-red-500">{{ form.errors.address }}</span>

                                            <div
                                                class="w-full mb-4 bg-gray-100 border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600">


                                                <div class="px-4 py-2 rounded-b-lg bg-gray-50 dark:bg-gray-700">
                                                    <textarea id="description" rows="16"
                                                        class="block w-full px-0 text-sm text-gray-800 border-0 bg-gray-50 dark:bg-gray-700 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                                                        placeholder="Escriba la descripción"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <!-- colocar QUiLL -->
                                <div>
                                    <label for="dropzone-file"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                        Images</label>



                                </div>
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file"
                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div v-if="!imagePreview"
                                            class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                </path>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="mb-4 text-xs text-gray-500 dark:text-gray-400">Max. File Size:
                                                30MB</p>
                                        </div>
                                        <div v-else
                                            class="flex items-center justify-center w-full h-full overflow-hidden">
                                            <img :src="imagePreview" alt="Preview" class="max-w-full max-h-full">
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" @change="handleFileChange">
                                    </label>
                                </div>
                                <span class="text-red-500">{{ form.errors.image }}</span>
                                <br>


                                <div>
                                    <label for="description"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenido</label>
                                    <div class="w-full mb-4 bg-gray-100 border border-gray-200 rounded-lg ">
                                        <QuillEditor v-model="form.content" :options="quillOptions" />



                                    </div>

                                </div>

                                <span class="text-red-500">{{ form.errors.content }}</span>
                            </div>
                        </div>

                        <div id="create-product-accordion-collapse-body-2"
                            aria-labelledby="create-product-accordion-collapse-heading-2">
                            <div class="pt-4 border-gray-200 sm:pt-5 dark:border-gray-700">
                                <!-- Inputs -->
                                <div class="grid gap-4 md:gap-6 md:grid-cols-2">
                                    <!-- Column -->
                                    <div class="space-y-4 sm:space-y-6">




                                        <div class="flex items-center">
                                            <input id="offer-checkbox" type="checkbox" value=""
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="offer-checkbox"
                                                class="ml-2 text-sm text-gray-500 dark:text-gray-300">Publicar</label>
                                        </div>
                                    </div>
                                    <!-- Column -->

                                </div> <br>
                            </div>
                        </div>
                    </div>

                    <button class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600" type="submit">Guardar
                        Destino</button>

                </div>
            </form>
        </section>



    </AdminLayout>
</template>
