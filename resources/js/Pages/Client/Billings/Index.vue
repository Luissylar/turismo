<script setup>
import { ref, onMounted, computed, watch } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import { defineProps } from 'vue';
import { loadStripe } from '@stripe/stripe-js';

import axios from 'axios';

const props = defineProps({
    intent: Object,
    stripeKey: String,
    customerId: String,
    paymentMethods: Array, // Recibe los métodos de pago desde el backend
    defaultPaymentMethod: String, // Recibe el método de pago predeterminado desde el backend
});
const stripe = ref(null);
const elements = ref(null);
const cardElement = ref(null);
const cardHolderName = ref('');
const processing = ref(false);
const errorMessage = ref('');
const successMessage = ref('');
const loading = ref(false); // Estado para controlar la pantalla de carga

const deletingMethods = ref({});

// Estado local para los métodos de pago
const localPaymentMethods = ref([...props.paymentMethods]);

onMounted(async () => {
    stripe.value = await loadStripe(props.stripeKey);
    elements.value = stripe.value.elements();
    cardElement.value = elements.value.create('card');
    cardElement.value.mount('#card-element');
});
const resetForm = () => {
    cardHolderName.value = '';
    cardElement.value.clear(); // Limpia el contenido del elemento de la tarjeta
};


const handleSubmit = async () => {
    processing.value = true;
    loading.value = true; // Mostrar pantalla de carga
    errorMessage.value = '';
    successMessage.value = '';

    const { setupIntent, error } = await stripe.value.confirmCardSetup(props.intent.client_secret, {
        payment_method: {
            card: cardElement.value,
            billing_details: {
                name: cardHolderName.value,
            },
        },
    });

    if (error) {
        errorMessage.value = error.message;
        processing.value = false;
        loading.value = false; // Ocultar pantalla de carga
    } else {
        try {
            const response = await axios.post('/billing/payment-method', {
                payment_method_id: setupIntent.payment_method,
            });
            successMessage.value = response.data.message; // Usar el mensaje del backend

            // Añadir el nuevo método de pago a la lista local
            localPaymentMethods.value.push(response.data.paymentMethod);

            // Resetear el formulario
            resetForm();
        } catch (postError) {
            errorMessage.value = postError.response.data.message || 'An error occurred';
        }
        processing.value = false;
        loading.value = false; // Ocultar pantalla de carga
    }
};




const positionClass = computed(() => {
    return window.innerWidth >= 768 ? 'alert-large' : 'alert-small';
});

watch(successMessage, (newMessage) => {
    if (newMessage) {
        setTimeout(() => {
            successMessage.value = '';
        }, 3000); // 3000 milisegundos = 3 segundos
    }
});



const handleDelete = async (paymentMethodId) => {
    try {
        deletingMethods.value[paymentMethodId] = true; // Marcar como "eliminando"
        const response = await axios.delete(`/billing/payment-method/${paymentMethodId}`);
        successMessage.value = response.data.message; // Usar el mensaje del backend
        // Eliminar el método de pago de la lista local
        localPaymentMethods.value = localPaymentMethods.value.filter(method => method.id !== paymentMethodId);
    } catch (error) {
        errorMessage.value = error.response.data.message || 'Ocurrió un error';
    } finally {
        deletingMethods.value[paymentMethodId] = false; // Marcar como "no eliminando"
    }
};


</script>

<template>
    <AppLayout title="Billings">
        <div class="max-w-lg mx-auto mt-8">
            <h2 class="mb-4 text-2xl font-bold">Billing Information</h2>
            <form @submit.prevent="handleSubmit">
                <div class="mb-4">
                    <label for="card-holder-name" class="block text-gray-700">Cardholder's Name</label>
                    <input id="card-holder-name" v-model="cardHolderName" type="text"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="card-element" class="block text-gray-700">Credit or Debit Card</label>
                    <div id="card-element"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                </div>

                <div v-if="errorMessage" class="mb-4 text-red-500">{{ errorMessage }}</div>

                <div class="flex items-center justify-end mt-4">
                    <button type="submit" :disabled="processing"
                        class="flex items-center px-4 py-2 text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none disabled:bg-gray-400">
                        <span v-if="processing" class="flex items-center">
                            <svg class="w-4 h-4 mr-2 text-white animate-spin" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                            </svg>
                            <span>Processing...</span>
                        </span>
                        <span v-else>Save Card</span>
                    </button>
                </div>
            </form><br>


            <h3 class="mt-8 text-2xl font-bold text-blue-900">Métodos de Pago Guardados</h3><br>

            <div>
                <ul>


                    <li v-for="method in localPaymentMethods" :key="method.id" class="mb-6">

                        <div
                            class="flex items-center justify-between p-4 border border-gray-200 rounded-lg bg-gray-50 ps-4 dark:border-gray-600 dark:bg-gray-700">
                            <div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Default</span>
                                    </div>

                                    <div class="text-sm ms-4">
                                        <label for="visa-2" class="font-medium text-gray-900 dark:text-white"> Visa
                                            ending in {{ method.card.last4 }}
                                        </label>
                                        <p id="visa-text-2"
                                            class="text-xs font-normal text-gray-500 dark:text-gray-400">Expiry {{
                                                method.card.exp_month }}/{{
                                                method.card.exp_year }}</p>
                                    </div>
                                </div>


                                <div class="flex items-center gap-2 mt-4">
                                    <button @click="handleDelete(method.id)" :disabled="deletingMethods[method.id]"
                                        class="text-red-600 transition duration-300 ease-in-out rounded-lg shadow hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed">
                                        <span v-if="!deletingMethods[method.id]">Eliminar</span>
                                        <span v-else>Eliminando...</span>
                                    </button>
                                    <div class="w-px h-6 bg-gray-300 shrink-0 dark:bg-gray-600"></div>

                                    <button type="button"
                                        class="text-sm font-medium text-gray-600 transition-colors duration-300 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                        Editar
                                    </button>
                                </div>

                            </div>

                            <div class="shrink-0">

                                <!-- colocar imagenes logo de acuerdo a la empresa, -->

                                <img class="w-auto h-8 dark:hidden"
                                    src=""
                                    alt="" />
                                <img class="hidden w-auto h-8 dark:flex"
                                    src=""
                                    alt="" />
                                <!-- eliminar y modificar despues -->


                                {{ method.card.brand }}
                            </div>
                        </div>






                    </li>

                </ul>
            </div>




        </div>




        <div v-if="successMessage" :class="positionClass" class="alert-container">
            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ successMessage }}</span>
                </div>
            </div>
        </div>

    </AppLayout>
</template>

<style>
.alert-container {
    position: fixed;
    z-index: 1000;
    transition: opacity 0.5s;
}

.alert-large {
    bottom: 20px;
    right: 20px;
}

.alert-small {
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
}

.spinner-border {
    border-top-color: transparent;
    border-right-color: transparent;
    border-radius: 50%;
    width: 1rem;
    height: 1rem;
    border-width: 2px;
    animation: spin 0.6s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

button[disabled] {
    cursor: not-allowed;
}
</style>
