<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';

import AdminHeader from '@/Layouts/Partials/Admin/AdminHeader.vue';
import AdminSidebar from '@/Layouts/Partials/Admin/AdminSidebar.vue';
import AdminFooter from '@/Layouts/Partials/Admin/AdminFooter.vue';

defineProps({
    title: String,
});
const logout = () => {
    router.post(route('logout'));
};
</script>

<template>
    <div class="bg-gray-50 dark:bg-gray-800">

        <Head :title="title" />
        <AdminHeader />


        <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
            <AdminSidebar />
            <div class="fixed inset-0 z-10 hidden bg-gray-900/50 dark:bg-gray-900/90" id="sidebarBackdrop"></div>




            <!-- 'lg:ml-64' : 'lg:ml-16'-->
            <div id="main-content" class="relative w-full h-full overflow-y-auto lg:ml-64 bg-gray-50 dark:bg-gray-900">


                <main>
                    <div class="px-4 pt-6">
                        <slot />
                    </div>
                </main>

                <AdminFooter /> <!-- Incluye el componente AdminFooter aquí -->
            </div>

        </div>
    </div>
</template>
