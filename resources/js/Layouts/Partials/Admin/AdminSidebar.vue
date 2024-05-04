<!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
    <!--
      This example requires updating your template:

      ```
      <html class="h-full bg-white">
      <body class="h-full">
      ```
    -->
    <div>
        <TransitionRoot as="template" :show="sidebarOpen">
            <Dialog class="relative z-50 lg:hidden" @close="sidebarOpen = false">
                <TransitionChild as="template" enter="transition-opacity ease-linear duration-300"
                    enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300"
                    leave-from="opacity-100" leave-to="opacity-0">
                    <div class="fixed inset-0 bg-gray-900/80" />
                </TransitionChild>

                <div class="fixed inset-0 flex">
                    <TransitionChild as="template" enter="transition ease-in-out duration-300 transform"
                        enter-from="-translate-x-full" enter-to="translate-x-0"
                        leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0"
                        leave-to="-translate-x-full">
                        <DialogPanel class="relative flex flex-1 w-full max-w-xs mr-16">
                            <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0"
                                enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100"
                                leave-to="opacity-0">
                                <div class="absolute top-0 flex justify-center w-16 pt-5 left-full">
                                    <button type="button" class="-m-2.5 p-2.5" @click="sidebarOpen = false">
                                        <span class="sr-only">Close sidebar</span>
                                        <XMarkIcon class="w-6 h-6 text-white" aria-hidden="true" />
                                    </button>
                                </div>
                            </TransitionChild>
                            <!-- Sidebar component, swap this element with another sidebar if you like -->
                            <div class="flex flex-col px-6 pb-4 overflow-y-auto bg-white grow gap-y-5">
                                <div class="flex items-center h-16 shrink-0">
                                    <img class="w-auto h-8"
                                        src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                                        alt="Your Company" />
                                </div>
                                <nav class="flex flex-col flex-1">
                                    <ul role="list" class="flex flex-col flex-1 gap-y-7">
                                        <li>
                                            <ul role="list" class="-mx-2 space-y-1">
                                                <li v-for="item in navigation" :key="item.name">
                                                    <a :href="item.href"
                                                        :class="[item.current ? 'bg-gray-50 text-indigo-600' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                                                        <component :is="item.icon"
                                                            :class="[item.current ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600', 'h-6 w-6 shrink-0']"
                                                            aria-hidden="true" />
                                                        {{ item.name }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="text-xs font-semibold leading-6 text-gray-400">Your teams</div>
                                            <ul role="list" class="mt-2 -mx-2 space-y-1">
                                                <li v-for="team in teams" :key="team.name">
                                                    <a :href="team.href"
                                                        :class="[team.current ? 'bg-gray-50 text-indigo-600' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                                                        <span
                                                            :class="[team.current ? 'text-indigo-600 border-indigo-600' : 'text-gray-400 border-gray-200 group-hover:border-indigo-600 group-hover:text-indigo-600', 'flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border text-[0.625rem] font-medium bg-white']">{{
                                                                team.initial }}</span>
                                                        <span class="truncate">{{ team.name }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="mt-auto">
                                            <a href="#"
                                                class="flex p-2 -mx-2 text-sm font-semibold leading-6 text-gray-700 rounded-md group gap-x-3 hover:bg-gray-50 hover:text-indigo-600">
                                                <Cog6ToothIcon
                                                    class="w-6 h-6 text-gray-400 shrink-0 group-hover:text-indigo-600"
                                                    aria-hidden="true" />
                                                Settings
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </Dialog>
        </TransitionRoot>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col px-6 pb-4 overflow-y-auto bg-white border-r border-gray-200 grow gap-y-5">
                <div class="flex items-center h-16 shrink-0">
                    <img class="w-auto h-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                        alt="Your Company" />
                </div>
                <nav class="flex flex-col flex-1">
                    <ul role="list" class="flex flex-col flex-1 gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li v-for="item in navigation" :key="item.name">
                                    <a :href="item.href"
                                        :class="[item.current ? 'bg-gray-50 text-indigo-600' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                                        <component :is="item.icon"
                                            :class="[item.current ? 'text-indigo-600' : 'text-gray-400 group-hover:text-indigo-600', 'h-6 w-6 shrink-0']"
                                            aria-hidden="true" />
                                        {{ item.name }}
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="text-xs font-semibold leading-6 text-gray-400">Your teams</div>
                            <ul role="list" class="mt-2 -mx-2 space-y-1">
                                <li v-for="team in teams" :key="team.name">
                                    <a :href="team.href"
                                        :class="[team.current ? 'bg-gray-50 text-indigo-600' : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-50', 'group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold']">
                                        <span
                                            :class="[team.current ? 'text-indigo-600 border-indigo-600' : 'text-gray-400 border-gray-200 group-hover:border-indigo-600 group-hover:text-indigo-600', 'flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border text-[0.625rem] font-medium bg-white']">{{
                                                team.initial }}</span>
                                        <span class="truncate">{{ team.name }}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="mt-auto">
                            <a href="#"
                                class="flex p-2 -mx-2 text-sm font-semibold leading-6 text-gray-700 rounded-md group gap-x-3 hover:bg-gray-50 hover:text-indigo-600">
                                <Cog6ToothIcon class="w-6 h-6 text-gray-400 shrink-0 group-hover:text-indigo-600"
                                    aria-hidden="true" />
                                Settings
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="lg:pl-72">
            <div class="sticky top-0 z-40 lg:mx-auto lg:max-w-7xl lg:px-8">
                <div
                    class="flex items-center h-16 px-4 bg-white border-b border-gray-200 shadow-sm gap-x-4 sm:gap-x-6 sm:px-6 lg:px-0 lg:shadow-none">
                    <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden" @click="sidebarOpen = true">
                        <span class="sr-only">Open sidebar</span>
                        <Bars3Icon class="w-6 h-6" aria-hidden="true" />
                    </button>

                    <!-- Separator -->
                    <div class="w-px h-6 bg-gray-200 lg:hidden" aria-hidden="true" />

                    <div class="flex self-stretch flex-1 gap-x-4 lg:gap-x-6">
                        <form class="relative flex flex-1" action="#" method="GET">
                            <label for="search-field" class="sr-only">Search</label>
                            <MagnifyingGlassIcon
                                class="absolute inset-y-0 left-0 w-5 h-full text-gray-400 pointer-events-none"
                                aria-hidden="true" />
                            <input id="search-field"
                                class="block w-full h-full py-0 pl-8 pr-0 text-gray-900 border-0 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                                placeholder="Search..." type="search" name="search" />
                        </form>
                        <div class="flex items-center gap-x-4 lg:gap-x-6">
                            <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">View notifications</span>
                                <BellIcon class="w-6 h-6" aria-hidden="true" />
                            </button>

                            <!-- Separator -->
                            <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-200" aria-hidden="true" />

                            <!-- Profile dropdown -->
                            <Menu as="div" class="relative">
                                <MenuButton class="-m-1.5 flex items-center p-1.5">
                                    <span class="sr-only">Open user menu</span>
                                    <button v-if="$page.props.jetstream.managesProfilePhotos"
                                        class="flex items-center text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                        <!-- Verificación de la imagen de perfil -->
                                        <img v-if="$page.props.auth.user.profile_photo_url"
                                            class="object-cover w-8 h-8 rounded-full"
                                            :src="$page.props.auth.user.profile_photo_url"
                                            :alt="`Profile picture of ${$page.props.auth.user.name}`" />
                                        <span v-else
                                            class="flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full">
                                            <span class="text-xs text-gray-600">{{ $page.props.auth.user.name.charAt(0)
                                                }}</span>
                                        </span>
                                        <!-- Información del usuario visible en pantallas grandes -->
                                        <span class="hidden lg:flex lg:items-center">
                                            <span class="ml-4 text-sm font-semibold leading-6 text-gray-900"
                                                aria-hidden="true">
                                                {{ $page.props.auth.user.name }}
                                            </span>
                                            <ChevronDownIcon class="w-5 h-5 ml-2 text-gray-400" aria-hidden="true" />
                                        </span>
                                    </button>
                                </MenuButton>
                                <transition enter-active-class="transition duration-100 ease-out"
                                    enter-from-class="transform scale-95 opacity-0"
                                    enter-to-class="transform scale-100 opacity-100"
                                    leave-active-class="transition duration-75 ease-in"
                                    leave-from-class="transform scale-100 opacity-100"
                                    leave-to-class="transform scale-95 opacity-0">
                                    <MenuItems
                                        class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none">
                                        <!-- Mostrar nombre, email y rol -->
                                        <div class="px-3 py-1 text-sm text-gray-900">
                                            {{ $page.props.auth.user.email }}<br>
                                            {{ $page.props.auth.user.role }}
                                        </div>
                                        <hr class="my-1">

                                        <dropdownLink :href="route('dashboard')">
                                            Dashboard
                                        </DropdownLink>
                                        <form @submit.prevent="logout">
                                            <DropdownLink as="button" type="submit">
                                                Cerrar sesión
                                            </DropdownLink>
                                        </form>
                                    </MenuItems>
                                </transition>
                            </Menu>
                        </div>
                    </div>
                </div>
            </div>

            <main class="py-10">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <!-- Your content -->
                </div>
            </main>
        </div>
    </div>
</template>

<script setup>

import { ref } from 'vue'


import {
    Dialog,
    DialogPanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
} from '@headlessui/vue'
import {
    Bars3Icon,
    BellIcon,
    CalendarIcon,
    ChartPieIcon,
    Cog6ToothIcon,
    DocumentDuplicateIcon,
    FolderIcon,
    HomeIcon,
    UsersIcon,
    XMarkIcon,
} from '@heroicons/vue/24/outline'
import DropdownLink from '@/Components/DropdownLink.vue';
import { ChevronDownIcon, MagnifyingGlassIcon } from '@heroicons/vue/20/solid'

const navigation = [
    { name: 'Dashboard', href: '#', icon: HomeIcon, current: true },
    // { name: 'Team', href: '#', icon: UsersIcon, current: false },
    // { name: 'Projects', href: '#', icon: FolderIcon, current: false },
    // { name: 'Calendar', href: '#', icon: CalendarIcon, current: false },
    // { name: 'Documents', href: '#', icon: DocumentDuplicateIcon, current: false },
    // { name: 'Reports', href: '#', icon: ChartPieIcon, current: false },
]
const teams = [
    { id: 1, name: 'Heroicons', href: '#', initial: 'H', current: false },
    { id: 2, name: 'Tailwind Labs', href: '#', initial: 'T', current: false },
    { id: 3, name: 'Workcation', href: '#', initial: 'W', current: false },
]
const logout = () => {
    Inertia.post('/logout');
};

const sidebarOpen = ref(false)
</script>
